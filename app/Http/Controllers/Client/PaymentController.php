<?php



namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\AdminNotificationMail;
use App\Mail\UserRegisterMail;
use App\Models\AgentRenewal;
use App\Models\CompanyManagement;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderManagement;
use App\Models\ServiceItem;
use App\Models\Setting;
use App\Models\ShareType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{
    public function ProcessPayPalCheckout(Request $request)
    {
        $id = session()->get('order_id');
        $order = Order::findorFail($id);
        $date = date('Y-m-d');
        $total = $order->total;
        $totalAmount = number_format((float)$total, 2);

        /** PayPal api context **/
        //        $paypal_conf = \Config::get('paypal');

        $settings = Setting::pluck('value', 'name')->toArray();
        if (isset($settings['paypal_client'])) {
            $client_id = $settings['paypal_client'];
        } else {
            $client_id = "";
        }
        if (isset($settings['paypal_secret'])) {
            $secret = $settings['paypal_secret'];
        } else {
            $secret = "";
        }
        if (isset($settings['paypal_mode'])) {
            $mode = $settings['paypal_mode'];
        } else {
            $mode = "sandbox";
        }

        $paypal_conf = [
            'client_id' => $client_id,
            'secret' => $secret,
            'settings' => array(
                'mode' => $mode,
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path() . '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            ),
        ];

        $this->_api_context = new ApiContext(
            new OAuthTokenCredential(
                $client_id,
                $secret
            )
        );

        $this->_api_context->setConfig($paypal_conf['settings']);


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($order->service_title)
            /** item name **/
            ->setCurrency('CAD')
            ->setQuantity(1)
            ->setPrice($totalAmount);
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('CAD')
            ->setTotal($totalAmount);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Payment');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to("status/$order->id"))
            /** Specify return URL **/
            ->setCancelUrl(URL::to("status/$order->id"));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
            //dd($respose);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
                return Redirect::to('/');
            } else {
                Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('/');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
    }



    public function getPaymentStatus(Request $request, $id)
    {
        $settings = Setting::pluck('value', 'name')->toArray();
        if (isset($settings['paypal_client'])) {
            $client_id = $settings['paypal_client'];
        } else {
            $client_id = "";
        }
        if (isset($settings['paypal_secret'])) {
            $secret = $settings['paypal_secret'];
        } else {
            $secret = "";
        }
        if (isset($settings['paypal_mode'])) {
            $mode = $settings['paypal_mode'];
        } else {
            $mode = "sandbox";
        }
        $paypal_conf = [
            'client_id' => $client_id,
            'secret' => $secret,
            'settings' => array(
                'mode' => $mode,
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path() . '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            ),
        ];

        $this->_api_context = new ApiContext(
            new OAuthTokenCredential(
                $client_id,
                $secret
            )
        );

        $this->_api_context->setConfig($paypal_conf['settings']);

        $order = Order::findOrFail($id);
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->PayerID) || empty($request->token)) {
            Session::put('error', 'Payment failed');
            return view('client.orders.single', ['title' => 'Order detail', 'user' => $order]);
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            Session::flash('success_message', 'Payment success');
            $order->status = 1;
            $order->save();
            Session::forget('order_id');
            $settings = Setting::pluck('value', 'name')->all();
            $user = $order->parent;
            $data = array(
                'name' => $user->name,
                'user_email' => $user->email,
                'subject' => "Order Payment",
                'order' => $order,
                'msg' => "Order is Paid Successfully ",
                'email' => isset($settings['email']) ? $settings['email'] : 'contact@huntpro.ca',
                'logo' => isset($settings['logo']) ? $settings['logo'] : '',
                'site_title' => isset($settings['site_title']) ? $settings['site_title'] : 'Libby Kitchen',
            );
            Mail::send('emails.order', $data, function ($message) use ($data) {
                $message->to($data['user_email'], $data['email'])
                    ->from($data['email'], $data['site_title'])
                    ->subject($data['subject']);
            });
            $user = Order::find($id);

            return view('client.orders.single', ['title' => 'Order detail', 'user' => $user]);
            //return Redirect::to('/');
        }
        Session::flash('error_message', 'Payment failed');
        $user = Order::find($id);
        return view('client.orders.single', ['title' => 'Order detail', 'user' => $user]);
    }


    public function stripe()
    {
        return view('stripe');
    }



    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)
    {
        $user_id = $this->userRegister($request);
        $setting = \App\Models\Setting::pluck('value', 'name')->toArray();
        $agent_fixed_price = isset($setting['agent_fixed_price']) ? $setting['agent_fixed_price'] : '20.00';
        $company_fixed_price = isset($setting['company_fixed_price']) ? $setting['company_fixed_price'] : '135.00';


        $data = $request->all();

        // return $data;

        DB::beginTransaction();


        try {

            $order = new Order();
            $business_type = $request->entity_type;

            if ($request->company == 0 && $request->company != null) {
                if ($business_type == "Corp") {
                    $totalCompany = $request->total_price ? $request->total_price : $company_fixed_price;
                } elseif ($business_type == "NP_Corp") {
                    $totalCompany = $request->total_price ? $request->total_price : $company_fixed_price;
                } elseif ($business_type == "LLC") {
                    $totalCompany = $request->total_price ? $request->total_price : $company_fixed_price;
                }
            }

            if ($request->agent == 1 && $request->agent != null) {
                if ($business_type == "Corp") {
                    $totalAgent = $request->total_price ? $request->total_price : $agent_fixed_price;
                } elseif ($business_type == "NP_Corp") {
                    $totalAgent = $request->total_price ? $request->total_price : $agent_fixed_price;
                } elseif ($business_type == "LLC") {
                    $totalAgent = $request->total_price ? $request->total_price : $agent_fixed_price;
                } else {
                    $totalAgent = $request->total_price ? $request->total_price : $agent_fixed_price;
                }
            }

            if ($request->renwal == 2 && $request->renwal != null) {
                $totalAnual = $request->total_price ? $request->total_price : 0;
            }

            $order->type_of_business = $request->entity_type ? $request->entity_type : 'Renewal';

            $order->company_name = $request->company_name;
            if ($request->physical_address_with_state_specify_address) {
                $order->physical_address = $request->physical_address_with_state_specify_address;
            } else {
                $order->physical_address = $request->mailing_address["address_line1"];
            }
            if ($request->mailing_address_with_state_specify_address) {
                $order->company_mailing_address = $request->mailing_address_with_state_specify_address;
            } else {
                $order->company_mailing_address = $request->mailing_address["address_line1"];
            }
            if ($request->company) {
                $order->order_type = 0;
            } elseif ($request->agent) {
                $order->order_type = 1;
            } else if ($request->renwal) {
                $order->order_type = 2;
            }

            $order->user_id = $user_id;
            $order->management_type = $request->management_type;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->mailing_address = $request->mailing_address["address_line1"];
            $order->zip_postal_code = $request->mailing_address["address_code"];
            $order->state_province = $request->mailing_address["state_province"];
            $order->country = $request->mailing_address["address_country"];
            $order->city = $request->mailing_address["city"];
            $order->phone_number = $request->phone_number;
            $order->email = $request->email;
            if ($request->company == 0 && $request->company != null) {
                $order->total = $totalCompany;
                $total = $totalCompany;
            }
            if ($request->agent == 1 && $request->agent != null) {
                $order->total = $totalAgent;
                $total = $totalAgent;
            }

            if ($request->renwal == 2 && $request->renwal != null) {
                $order->total = $totalAnual;
                $total = $totalAnual;
            }

            $order->payment_id = "3";
            $order->total = $total;
            $order->tot_assets_fee = $request->tot_assets_fee;
            $order->payment_status = 1;
            $order->save();


            $selectedServiceIds = [];

            // Loop through the services and check if they were selected
            $services = ServiceItem::all();
            foreach ($services as $service) {
                $inputName = "service{$service->id}";
                if (array_key_exists($inputName, $data)) {
                    $selectedServiceIds[] = $service->id;
                }
            }

            // Calculate the total and save order items
            $total = 0;
            foreach ($selectedServiceIds as $serviceId) {
                $service = ServiceItem::find($serviceId);

                if ($service) {
                    $total += $service->price;
                    $order_items = new OrderItem([
                        'order_id' => $order->id,
                        'service_item_id' => $serviceId,
                        'amount' => $service->price,
                        'description' => $service->name,
                    ]);

                    $order_items->save();
                }
            }


            // if ($request->entity_type != 'NP Corp' && $request->entity_type != 'Corp') {

            if ($request->entity_type == 'Corp' || $request->entity_type == 'NP_Corp' || $request->renwal == 2) {

                if (!empty($request->director)) {
                    foreach ($request->director as $mem) {
                        // Check if all required fields have values
                        if (!empty($mem['first_name']) && !empty($mem['last_name']) && (!empty($mem['address']) || !empty($mem['address_selector']))) {
                            $management = new OrderManagement();
                            $management->first_name = $mem['first_name'];
                            $management->last_name = $mem['last_name'];
                            $management->order_id = $order->id;
                            $management->type = "director";

                            // Determine the address based on the available data
                            if (!empty($mem['address'])) {
                                $management->address_to_record_with_state = $mem['address'];
                            } else {
                                $management->address_to_record_with_state = $mem['address_selector'];
                            }

                            $management->save();
                        }
                    }
                }
            } else {

                if ($order->management_type == 'Member_Managed' || $request->renwal == 2) {
                    if (!empty($request->member)) {
                        foreach ($request->member as $mem) {
                            // Check if all required fields have values
                            if (!empty($mem['first_name']) && !empty($mem['last_name']) && (!empty($mem['address']) || !empty($mem['address_selector']))) {
                                $management = new OrderManagement();
                                $management->first_name = $mem['first_name'];
                                $management->last_name = $mem['last_name'];
                                $management->order_id = $order->id;
                                $management->type = "member";

                                // Determine the address based on the available data
                                if (!empty($mem['address'])) {
                                    $management->address_to_record_with_state = $mem['address'];
                                } else {
                                    $management->address_to_record_with_state = $mem['address_selector'];
                                }

                                $management->save();
                            }
                        }
                    }
                } else if ($order->management_type == 'Manager_Managed' || $request->renwal == 2) {
                    if (!empty($request->manager)) {
                        foreach ($request->manager as $mem) {
                            // Check if all required fields have values
                            if (!empty($mem['first_name']) && !empty($mem['last_name']) && (!empty($mem['address']) || !empty($mem['address_selector']))) {
                                $management = new OrderManagement();
                                $management->first_name = $mem['first_name'];
                                $management->last_name = $mem['last_name'];
                                $management->order_id = $order->id;
                                $management->type = "manager";

                                // Determine the address based on the available data
                                if (!empty($mem['address'])) {
                                    $management->address_to_record_with_state = $mem['address'];
                                } else {
                                    $management->address_to_record_with_state = $mem['address_selector'];
                                }

                                $management->save();
                            }
                        }
                    }
                }
            }


            // }
            if ($request->entity_type == 'NP_Corp') {

                if (!empty($request->np_director)) {
                    foreach ($request->np_director as $mem) {
                        $management = new OrderManagement();
                        $management->np_corp_type = $mem['non_profit_type'];
                        $management->np_exempt_status = $mem['np_tax_Exempt'];

                        $management->first_name = $mem['first_name'];
                        $management->last_name = $mem['last_name'];
                        $management->order_id = $order->id;
                        $management->type = "Director";
                        if ($mem['address']) {
                            $management->address_to_record_with_state = $mem['address'];
                        } else {
                            $management->address_to_record_with_state = $mem['address_selector'];
                        }
                        $management->save();
                    }
                }
            }
            if ($request->entity_type == 'Corp' || $request->entity_type == 'NP_Corp' || $request->renwal == 2) {


                if (!empty($request->president)) {
                    foreach ($request->president as $mem) {
                        // Check if all required fields have values
                        if (
                            !empty($mem['first_name']) && !empty($mem['last_name']) &&
                            (!empty($mem['address_corp']) || !empty($mem['address_selector']))
                        ) {
                            $management = new CompanyManagement();
                            $management->first_name = $mem['first_name'];
                            $management->last_name = $mem['last_name'];
                            $management->user_id = $user_id;
                            $management->order_id = $order->id;
                            $management->type = "president";

                            // Determine the address based on the available data
                            if (!empty($mem['address_corp'])) {
                                $management->address = $mem['address_corp'];
                            } else {
                                $management->address = $mem['address_selector'];
                            }

                            $management->save();
                        }
                    }
                }

                if (!empty($request->secretary)) {
                    foreach ($request->secretary as $mem) {
                        // Check if all required fields have values
                        if (
                            !empty($mem['first_name']) && !empty($mem['last_name']) &&
                            (!empty($mem['address_corp']) || !empty($mem['address_selector']))
                        ) {
                            $management = new CompanyManagement();
                            $management->first_name = $mem['first_name'];
                            $management->last_name = $mem['last_name'];
                            $management->user_id = $user_id;
                            $management->order_id = $order->id;
                            $management->type = "secretary";

                            // Determine the address based on the available data
                            if (!empty($mem['address_corp'])) {
                                $management->address = $mem['address_corp'];
                            } else {
                                $management->address = $mem['address_selector'];
                            }

                            $management->save();
                        }
                    }
                }

                if (!empty($request->treasurer)) {
                    foreach ($request->treasurer as $mem) {
                        // Check if all required fields have values
                        if (
                            !empty($mem['first_name']) && !empty($mem['last_name']) &&
                            (!empty($mem['address_corp']) || !empty($mem['address_selector']))
                        ) {
                            $management = new CompanyManagement();
                            $management->first_name = $mem['first_name'];
                            $management->last_name = $mem['last_name'];
                            $management->user_id = $user_id;
                            $management->order_id = $order->id;
                            $management->type = "treasurer";

                            // Determine the address based on the available data
                            if (!empty($mem['address_corp'])) {
                                $management->address = $mem['address_corp'];
                            } else {
                                $management->address = $mem['address_selector'];
                            }

                            $management->save();
                        }
                    }
                }

                $this->shareType($request, $order, $user_id);
            }


            $total = round($total, 2);
            if ($request->renwal == 2 && $request->cash != '') {
                $this->agentRenewal($request, $order);
            }

            // $setting = Setting::pluck('value', 'name')->toArray();

            // $stripe_secret = isset($setting['stripe_secret']) ? $setting['stripe_secret'] : 'sk_test_yuY4UYGeJGxumai6SIfYipu0002zCTovjq';
            // Stripe::setApiKey($stripe_secret);
            // $charge  = Charge::create([
            //     "amount" => $total * 100,
            //     "currency" => "usd",
            //     "source" => $request->stripeToken,
            //     "description" => "Payment From $request->billing_first_name"
            // ]);
            // $order->payment_id = $charge->id;

            DB::commit();

            return redirect()->route('main')->with('success_message', 'Order Placed Successfully!  Please Allow 24 Hours For Processing!.');
        } catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            echo 'Status is:' . $e->getHttpStatus() . '\n';
            echo 'Type is:' . $e->getError()->type . '\n';
            echo 'Code is:' . $e->getError()->code . '\n';
            // param is '' in this case
            echo 'Param is:' . $e->getError()->param . '\n';
            echo 'Message is:' . $e->getError()->message . '\n';
        } catch (\Stripe\Exception\RateLimitException $e) {
            DB::rollback();
            Session::flash('error_message', $e->getMessage());
            return back();
            // Too many requests made to the API too quickly
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            DB::rollback();
            Session::flash('error_message', $e->getMessage());
            return back();
            // Invalid parameters were supplied to Stripe's API
        } catch (\Stripe\Exception\AuthenticationException $e) {
            DB::rollback();
            Session::flash('error_message', $e->getMessage());
            return back();
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            DB::rollback();
            Session::flash('error_message', $e->getMessage());
            return back();
            // Network communication with Stripe failed
        } catch (\Stripe\Exception\ApiErrorException $e) {
            DB::rollback();
            Session::flash('error_message', $e->getMessage());
            return back();
            // Display a very generic error to the user, and maybe send
            // yourself an email
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error_message', $e->getMessage());
            return redirect()->route('main')->with('error_message', $e->getMessage());
            // Something else happened, completely unrelated to Stripe
        } catch (Throwable $e) {
            info($e);

            DB::rollback();
            return redirect()->route('main')->with('error_message', $e->getMessage());
        }
    }

    public function shareType($request, $order, $user_id)
    {
        if ($request->share_type == 'common') {
            if ($request->has('common')) {
                $commonShareData = $request->input('common')[0];
                if (!empty($commonShareData['share_number']) && !empty($commonShareData['share_value'])) {
                    $common = new ShareType();
                    $common->user_id = $user_id;
                    $common->order_id = $order->id;
                    $common->type = $request->share_type;
                    $common->share_number = $commonShareData['share_number'];
                    $common->share_value = $commonShareData['share_value'];
                    $common->save();
                }
            }
        } elseif ($request->share_type == 'preferred') {
            if ($request->has('preferred')) {
                $preferredShareData = $request->input('preferred')[0];
                if (!empty($preferredShareData['share_number']) && !empty($preferredShareData['share_value'])) {
                    $preferred = new ShareType();
                    $preferred->user_id = $user_id;
                    $preferred->order_id = $order->id;
                    $preferred->type = $request->share_type;
                    $preferred->share_number = $preferredShareData['share_number'];
                    $preferred->share_value = $preferredShareData['share_value'];
                    $preferred->save();
                }
            }
        } else {
            if ($request->has('common')) {
                $commonShareData = $request->input('common')[0];
                if (!empty($commonShareData['share_number']) && !empty($commonShareData['share_value'])) {
                    $common = new ShareType();
                    $common->type = 'common';
                    $common->user_id = $user_id;
                    $common->order_id = $order->id;
                    $common->share_number = $commonShareData['share_number'];
                    $common->share_value = $commonShareData['share_value'];
                    $common->save();
                }
            }

            if ($request->has('preferred')) {
                $preferredShareData = $request->input('preferred')[0];
                if (!empty($preferredShareData['share_number']) && !empty($preferredShareData['share_value'])) {
                    $preferred = new ShareType();
                    $preferred->user_id = $user_id;
                    $preferred->type = 'preferred';
                    $preferred->order_id = $order->id;
                    $preferred->share_number = $preferredShareData['share_number'];
                    $preferred->share_value = $preferredShareData['share_value'];
                    $preferred->save();
                }
            }
        }
    }

    public function agentRenewal($request, $order)
    {
        $renewal = new AgentRenewal();
        $renewal->order_id = $order->id;
        $renewal->cash = $request->cash;
        $renewal->tradeNotesInput = $request->tradeNotesInput;
        $renewal->allowanceInput = $request->allowanceInput;
        $renewal->accountsReceivable = (float) preg_replace('/[^0-9.]/', '', $request->accountsReceivable);
        $renewal->governmentObligations = $request->governmentObligations;
        $renewal->securities = $request->securities;
        $renewal->currentAssets = $request->currentAssets;
        $renewal->loans = $request->loans;
        $renewal->mortgage = $request->mortgage;
        $renewal->otherInvestments = $request->otherInvestments;
        $renewal->buildings = $request->buildings;
        $renewal->depietableAssets = $request->depietableAssets;
        $renewal->land = $request->land;
        $renewal->intangibleAssets = $request->intangibleAssets;
        $renewal->accumulatedAmortization = $request->accumulatedAmortization;
        $renewal->intangibleAmortization = (float) preg_replace('/[^0-9.]/', '', $renewal->intangibleAmortization);
        $renewal->otherAssets = $request->otherAssets;
        $renewal->totalAssetsValue = (float) preg_replace('/[^0-9.]/', '', $request->totalAssetsValue);
        $renewal->cirtify = $request->cirtify == 'on' ? 1 : 0;
        $renewal->save();
    }

    public function userRegister(Request $request)
    {
        $user_exist = User::where('email', $request->email)->first();
        if ($user_exist) {
            $user_id = $user_exist->id;
            return $user_id;
        } else {
            $user_id = Auth::user()->id;
            return $user_id;
        }
    }
}
