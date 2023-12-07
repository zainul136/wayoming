<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\AdminNotificationMail;
use App\Models\AgentRenewalUpdateRequest;
use App\Models\ApprovalReject;
use App\Models\CompanyManagementUpdateRequest;
use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\OrderManagementUpdateRequest;
use App\Models\OrderUpdateRequest;
use App\Models\ShareTypeUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Whoops\Run;

class OrderController extends Controller
{
    public function index()
    {
        $title = "Client Orders";
        return view('client.orders.index', compact('title'));
    }

    public function getClientOrder()
    {
        $client_orders = Order::with('user')->where('user_id', Auth::user()->id)->get();
        return $client_orders;
    }


    public function show($id)
    {
        $user = Order::with('agentrenewal')->where('id', $id)->first();
        // return $user;
        return view('client.orders.single', ['title' => 'Order detail', 'user' => $user]);
    }

    public function editClientOrder(Request $request)
    {
        $title = "Edit Client Order";
        $edit_client_order = Order::where('id', $request->id)->first();
        // return $edit_client_order;
        return view('client.orders.edit_order', compact('title', 'edit_client_order'));
    }

    public function storeClientOrder(Request $request)
    {
        // return $request->order_type;
        OrderUpdateRequest::where('order_update_id', $request->order_update_id)->delete();
        ApprovalReject::where('order_id', $request->order_update_id)->delete();

        //Personal or Company Update Request
        $client_orders = new OrderUpdateRequest();
        $client_orders->user_id = Auth::user()->id;
        $client_orders->order_update_id = $request->order_update_id;
        $client_orders->company_name = $request->company_name;
        $client_orders->type_of_business = $request->type_of_business;
        $client_orders->order_type = $request->order_type_hidden;
        $client_orders->first_name = $request->first_name;
        $client_orders->last_name = $request->last_name;
        $client_orders->email = $request->email;
        $client_orders->country = $request->country;
        $client_orders->phone_number = $request->phone_number;
        $client_orders->mailing_address = $request->mailing_address;
        $client_orders->zip_postal_code = $request->zip_postal_code;
        $client_orders->city = $request->city;
        $client_orders->state_province = $request->state_province;
        $res = $client_orders->save();


        //Company Management Update Request
        CompanyManagementUpdateRequest::where('order_id', $request->order_update_id)->delete();

        // for president
        if ($request->has('president')) {
            foreach ($request->input('president') as $presidentData) {
                // Check if all required fields for the president are provided
                if (
                    $presidentData['first_name'] &&
                    $presidentData['last_name'] &&
                    $presidentData['address_selector']
                ) {
                    $president = new CompanyManagementUpdateRequest;
                    $president->type = 'president';
                    $president->order_id = $request->order_update_id;
                    $president->first_name = $presidentData['first_name'];
                    $president->last_name = $presidentData['last_name'];

                    if ($presidentData['address_selector'] == 'specifics') {
                        $president->address = $presidentData['address_corp'];
                    } else {
                        $president->address = $president['address_selector'];
                    }

                    $president->save();
                }
            }
        }

        // for secretary
        if ($request->has('secretary')) {
            foreach ($request->input('secretary') as $secretaryData) {
                // Check if all required fields for the secretary are provided
                if (
                    $secretaryData['first_name'] &&
                    $secretaryData['last_name'] &&
                    $secretaryData['address_selector']
                ) {
                    $secretary = new CompanyManagementUpdateRequest;
                    $secretary->type = 'secretary';
                    $secretary->order_id = $request->order_update_id;
                    $secretary->first_name = $secretaryData['first_name'];
                    $secretary->last_name = $secretaryData['last_name'];

                    if ($secretaryData['address_selector'] == 'specifics') {

                        $secretary->address = $secretaryData['address_corp'];
                    } else {
                        $secretary->address = $secretary['address_selector'];
                    }

                    $secretary->save();
                }
            }
        }

        // for treasurer
        if ($request->has('treasurer')) {
            foreach ($request->input('treasurer') as $treasurerData) {
                // Check if all required fields for the treasurer are provided
                if (
                    $treasurerData['first_name'] &&
                    $treasurerData['last_name'] &&
                    $treasurerData['address_selector']
                ) {
                    $treasurer = new CompanyManagementUpdateRequest;
                    $treasurer->type = 'treasurer';
                    $treasurer->order_id = $request->order_update_id;
                    $treasurer->first_name = $treasurerData['first_name'];
                    $treasurer->last_name = $treasurerData['last_name'];

                    if ($treasurerData['address_selector'] == 'specifics') {

                        $treasurer->address = $treasurerData['address_corp'];
                    } else {
                        $treasurer->address = $treasurerData['address_selector'];
                    }

                    $treasurer->save();
                }
            }
        }



        // Share Type Update Request
        ShareTypeUpdateRequest::where('order_id', $request->order_update_id)->delete();

        // for Share type
        if ($request->share_type == 'common') {
            if ($request->has('common')) {
                $commonShareData = $request->input('common')[0];
                if (!empty($commonShareData['share_number']) && !empty($commonShareData['share_value'])) {
                    $common = new ShareTypeUpdateRequest();
                    $common->order_id = $request->order_update_id;
                    $common->type = $request->share_type;
                    $common->share_type_id = $commonShareData['share_type_id'];
                    $common->share_number = $commonShareData['share_number'];
                    $common->share_value = $commonShareData['share_value'];
                    $common->save();
                }
            }
        } elseif ($request->share_type == 'preferred') {
            if ($request->has('preferred')) {
                $preferredShareData = $request->input('preferred')[0];
                if (!empty($preferredShareData['share_number']) && !empty($preferredShareData['share_value'])) {
                    $preferred = new ShareTypeUpdateRequest();
                    $preferred->order_id = $request->order_update_id;
                    $preferred->type = $request->share_type;
                    $preferred->share_type_id = $preferredShareData['share_type_id'];
                    $preferred->share_number = $preferredShareData['share_number'];
                    $preferred->share_value = $preferredShareData['share_value'];
                    $preferred->save();
                }
            }
        } else {
            if ($request->has('common')) {
                $commonShareData = $request->input('common')[0];
                if (!empty($commonShareData['share_number']) && !empty($commonShareData['share_value'])) {
                    $common = new ShareTypeUpdateRequest();
                    $common->type = 'common';
                    $common->order_id = $request->order_update_id;
                    $common->share_type_id = $commonShareData['share_type_id'];
                    $common->share_number = $commonShareData['share_number'];
                    $common->share_value = $commonShareData['share_value'];
                    $common->save();
                }
            }

            if ($request->has('preferred')) {
                $preferredShareData = $request->input('preferred')[0];
                if (!empty($preferredShareData['share_number']) && !empty($preferredShareData['share_value'])) {
                    $preferred = new ShareTypeUpdateRequest();
                    $preferred->type = 'preferred';
                    $preferred->order_id = $request->order_update_id;
                    $preferred->share_type_id = $preferredShareData['share_type_id'];
                    $preferred->share_number = $preferredShareData['share_number'];
                    $preferred->share_value = $preferredShareData['share_value'];
                    $preferred->save();
                }
            }
        }


        // Management Update Request
        OrderManagementUpdateRequest::where('order_id', $request->order_update_id)->delete();

        //save Director
        if (!empty($request->director)) {
            foreach ($request->director as $mem) {
                // Check if all required fields have values
                if (!empty($mem['first_name']) && !empty($mem['last_name']) && (!empty($mem['address']) || !empty($mem['address_selector']))) {
                    $management = new OrderManagementUpdateRequest();
                    $management->order_id = $request->order_update_id;
                    $management->first_name = $mem['first_name'];
                    $management->last_name = $mem['last_name'];
                    $management->type = "director";

                    // Determine the address based on the available data
                    if (!empty($mem['address'])) {
                        $management->address = $mem['address'];
                    } else {
                        $management->address = $mem['address_selector'];
                    }

                    $management->save();
                }
            }
        }


        //for member or manager
        if ($request->management_type == 'Member_Managed') {
            if (!empty($request->member)) {
                foreach ($request->member as $mem) {
                    // Check if all required fields have values
                    if (!empty($mem['first_name']) && !empty($mem['last_name']) && (!empty($mem['address']) || !empty($mem['address_selector']))) {
                        $management = new OrderManagementUpdateRequest();
                        $management->first_name = $mem['first_name'];
                        $management->last_name = $mem['last_name'];
                        $management->order_id = $request->order_update_id;
                        $management->type = "member";

                        // Determine the address based on the available data
                        if (!empty($mem['address'])) {
                            $management->address = $mem['address'];
                        } else {
                            $management->address = $mem['address_selector'];
                        }

                        $management->save();
                    }
                }
            }
        } else if ($request->management_type == 'Manager_Managed') {
            if (!empty($request->manager)) {
                foreach ($request->manager as $mem) {
                    // Check if all required fields have values
                    if (!empty($mem['first_name']) && !empty($mem['last_name']) && (!empty($mem['address']) || !empty($mem['address_selector']))) {
                        $management = new OrderManagementUpdateRequest();
                        $management->first_name = $mem['first_name'];
                        $management->last_name = $mem['last_name'];
                        $management->order_id = $request->order_update_id;
                        $management->type = "manager";

                        // Determine the address based on the available data
                        if (!empty($mem['address'])) {
                            $management->address = $mem['address'];
                        } else {
                            $management->address = $mem['address_selector'];
                        }

                        $management->save();
                    }
                }
            }
        }


        // Agent Renewal Update Request
        AgentRenewalUpdateRequest::where('order_id', $request->order_update_id)->delete();

        //save AgentRenewalUpdateRequest
        $renewal = new AgentRenewalUpdateRequest();
        $renewal->order_id = $request->order_update_id;
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
        $renewal->intangibleAmortization = (float) preg_replace('/[^0-9.]/', '', $request->intangibleAmortization);
        $renewal->otherAssets = $request->otherAssets;
        $renewal->totalAssetsValue = (float) preg_replace('/[^0-9.]/', '', $request->totalAssetsValue);
        $renewal->cirtify = $request->cirtify == 'on' ? 1 : 0;

        // Check if all the required fields are provided before saving
        if (
            $renewal->order_id &&
            $renewal->cash !== null &&
            $renewal->tradeNotesInput !== null &&
            $renewal->allowanceInput !== null &&
            $renewal->accountsReceivable !== null &&
            $renewal->governmentObligations !== null &&
            $renewal->securities !== null &&
            $renewal->currentAssets !== null &&
            $renewal->loans !== null &&
            $renewal->mortgage !== null &&
            $renewal->otherInvestments !== null &&
            $renewal->buildings !== null &&
            $renewal->depietableAssets !== null &&
            $renewal->land !== null &&
            $renewal->intangibleAssets !== null &&
            $renewal->accumulatedAmortization !== null &&
            $renewal->intangibleAmortization !== null &&
            $renewal->otherAssets !== null &&
            $renewal->totalAssetsValue !== null
        ) {
            $renewal->save();
        }


        if ($res) {

            // $this->clientOrderHistory($request);

            // Get the admin's email address
            // $adminEmail = $this->getAdminEmail();

            // if ($adminEmail) {
            //     $adminData = [
            //         'user_name' => $request->first_name,
            //         'user_email' => $request->email,
            //     ];
            //     Mail::to($adminEmail)->send(new AdminNotificationMail($adminData));
            // }


            return redirect()->route('orders')->with('success_message', 'Client order requested Successfully!');
        } else {
            return back()->with('error_message', 'Failed');
        }
    }

    public function clientOrderHistory($request)
    {
        OrderHistory::where('order_id', $request->order_update_id)->delete();

        $order_h = new OrderHistory();
        $order_h->order_id = $request->h_order_update_id;
        $order_h->type_of_business = $request->h_type_of_business;
        $order_h->company_name = $request->h_company_name;
        $order_h->first_name = $request->h_first_name;
        $order_h->last_name = $request->h_last_name;
        $order_h->email = $request->h_email;
        $order_h->country = $request->h_country;
        $order_h->phone_number = $request->h_phone_number;
        $order_h->mailing_address = $request->h_mailing_address;
        $order_h->zip_postal_code = $request->h_zip_postal_code;
        $order_h->city = $request->h_city;
        $order_h->state_province = $request->h_state_province;
        $order_h->attorney = $request->h_attorney;
        $order_h->attorney_first_name = $request->h_attorney_first_name;
        $order_h->attorney_last_name = $request->h_attorney_last_name;
        $order_h->attorney_mailing_address = $request->h_attorney_mailing_address;
        $order_h->save();
    }

    public function getAdminEmail()
    {
        if (auth()->user() && auth()->user()->is_admin == 0) {

            return 'dummy@gmail.com';
        }

        return 'failed';
    }

    public function approvalRejectNotify(Request $request)
    {
        $title = 'Edit Not Approval Request';

        $orders = Order::where('user_id', Auth::user()->id)->get();
        $allUpdateRequest = [];
        foreach ($orders as $order) {
            $order_update = OrderUpdateRequest::with('notapproved')->where('order_update_id', $order->id)->get();
            $allUpdateRequest = array_merge($allUpdateRequest, $order_update->toArray());
        }

        return view('client.orders.approvel_reject', compact('allUpdateRequest', 'title'));
    }

    public function getContent(Request $request)
    {
        $content = ApprovalReject::with('ordersupdatedetail')->where('order_id', $request->order_id)->first();
        return $content;
    }
}
