<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderApprovalMail;
use App\Mail\OrderRejectionMail;
use App\Models\AgentRenewal;
use App\Models\AgentRenewalUpdateRequest;
use App\Models\ApprovalReject;
use App\Models\CompanyManagement;
use App\Models\CompanyManagementUpdateRequest;
use App\Models\Document;
use App\Models\Kid;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\OrderItem;
use App\Models\OrderManagement;
use App\Models\OrderManagementUpdateRequest;
use App\Models\OrderUpdateRequest;
use App\Models\School;
use App\Models\ShareType;
use App\Models\ShareTypeUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Orders';
        $qry = Order::query();

        if ($request->isMethod('post')) {

            $qry->when($request->order_type, function ($query, $order_type) {
                return $query->where('order_type', $order_type);
            });

            $qry->when($request->payment_status, function ($query, $payment_status) {
                return $query->where('payment_status', $payment_status);
            });

            $qry->when($request->order_type, function ($query, $order_type) {
                return $query->where('order_type', $order_type);
            });

            $qry->when($request->date, function ($query, $date) {
                return $query->whereDate('created_at', $date);
            });
        }

        $orders = $qry->get();
        return view('admin.orders.index', ["title" => $title, "orders" => $orders]);
    }

    public function agentRegisterOrders()
    {
        $title = 'Agent Register Orders';
        $agent_orders = Order::where('order_type', 1)->get();
        return view('admin.orders.agent_register', ["title" => $title, "agent_orders" => $agent_orders]);
    }

    public function formCompanyOrders()
    {
        $title = 'From New Company Orders';
        $from_company = Order::where('order_type', 0)->get();
        return view('admin.orders.from_company', ["title" => $title, "from_company" => $from_company]);
    }

    public function fileAnnualOrders()
    {
        $title = 'File Annual Orders';
        $file_annual = Order::where('order_type', 2)->get();
        return view('admin.orders.renewal', ["title" => $title, "file_annual" => $file_annual]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function getClients(Request $request)
    // {
    //     $columns = array(
    //         0 => 'first_name',
    //         1 => 'company_name',
    //         2 => 'order_type',
    //         3 => 'payment_status',
    //         4 => 'total',
    //         5 => 'created_at',
    //         6 => 'action',
    //     );
    //     $id =  Auth::user()->id;
    //     $totalData = Order::count();
    //     $limit = $request->input('length');
    //     $start = $request->input('start');
    //     $order = $columns[$request->input('order.0.column')];
    //     $dir = $request->input('order.0.dir');

    //     if (empty($request->input('search.value'))) {
    //         $users = Order::offset($start)
    //             ->limit($limit)
    //             ->orderBy('created_at', 'desc')
    //             ->get();
    //         $totalFiltered = Order::count();
    //     } else {
    //         $search = $request->input('search.value');
    //         $users = Order::where([
    //             ['created_at', 'like', "%{$search}%"],
    //         ])->orWhere([
    //             ['total', 'like', "%{$search}%"],
    //         ])
    //             ->orWhere([
    //                 ['first_name', 'like', "%{$search}%"],
    //             ])->orWhere([
    //                 ['last_name', 'like', "%{$search}%"],
    //             ])
    //             ->orWhere([
    //                 ['company_name', 'like', "%{$search}%"],
    //             ])

    //             ->offset($start)
    //             ->limit($limit)
    //             ->orderBy('created_at', 'desc')
    //             ->get();
    //         $totalFiltered = Order::where([
    //             ['created_at', 'like', "%{$search}%"],
    //         ])->orWhere([
    //             ['total', 'like', "%{$search}%"],
    //         ])->orWhere([
    //             ['first_name', 'like', "%{$search}%"],
    //         ])->orWhere([
    //             ['last_name', 'like', "%{$search}%"],
    //         ])
    //             ->orWhere([
    //                 ['company_name', 'like', "%{$search}%"],
    //             ])

    //             ->count();
    //     }


    //     $data = array();

    //     if ($users) {
    //         foreach ($users as $r) {
    //             $edit_url = route('orders.edit', $r->id);
    //             $show_url = route('orders.show', $r->id);
    //             // $nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="schools[]" value="'.$r->id.'"><span></span></label></td>';
    //             $nestedData['company_name'] = $r->company_name;
    //             $nestedData['first_name'] = $r->first_name;
    //             $nestedData['order_type'] = ($r->order_type == 1) ? 'Registered Agent' : 'Start A Company';
    //             $nestedData['total'] = '$' . $r->total;
    //             if ($r->payment_status == 0) {
    //                 $nestedData['payment_status'] = '<span class="label label-info label-inline mr-2">Payment is pending</span>';
    //             } elseif ($r->payment_status == 1) {
    //                 $nestedData['payment_status'] = '<span class="label label-success label-inline mr-2">Paid</span>';
    //             } elseif ($r->payment_status == 2) {
    //                 $nestedData['payment_status'] = '<span class="label label-danger label-inline mr-2">Cancel</span>';
    //             }
    //             $nestedData['created_at'] = date('d-m-Y', strtotime($r->created_at));
    //             $nestedData['action'] = '
    //                             <div>
    //                             <td>

    //                                 <a title="Show Order" class="btn btn-sm btn-clean btn-icon"
    //                                    href="' . $show_url . '">
    //                                    <i class="icon-1x text-dark-50 flaticon-eye"></i>
    //                                 </a>

    //                             </td>
    //                             </div>
    //                         ';
    //             $data[] = $nestedData;
    //         }
    //     }

    //     $json_data = array(
    //         "draw"            => intval($request->input('draw')),
    //         "recordsTotal"    => intval($totalData),
    //         "recordsFiltered" => intval($totalFiltered),
    //         "data"            => $data
    //     );

    //     echo json_encode($json_data);
    // }
    public function create()
    {
        $title = 'Add New Order';
        $kids  =  Kid::where("user_id", Auth::user()->id)->get();
        $menus = Menu::all();
        return view('admin.orders.item-add', ['title' => ' Kid Items', 'menus' => $menus, 'kids' => $kids]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'school' => 'required',
        ]);

        $input = $request->all();
        $user = new Kid();
        $user->name = $input['name'];
        $user->school_id = $input['school'];
        $user->food_allergy = $input['food_allergy'];
        $user->division_number = $input['division_number'];
        $user->user_id = Auth::user()->id;

        $user->save();

        Session::flash('success_message', 'Great! Kid has been saved successfully!');
        $user->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Order::where('id', $id)->first();
        return view('admin.orders.single', ['title' => 'Order detail', 'user' => $user]);
    }

    public function clientDetail(Request $request)
    {
        $user = Kid::findOrFail($request->id);
        return view('admin.kids.detail', ['title' => 'School Detail', 'user' => $user]);
    }
    public function menuProducts(Request $request)
    {
        $user = Menu::findOrFail($request->id);
        $products  = $user->products;
        return view('admin.kids.menu-item', ['title' => 'School Detail', 'products' => $products]);
    }
    public function orderplace(Request $request)
    {
        $inputs = $request->all();
        //	    dd($inputs);
        $order = new Order();
        $order->status = 0;
        $order->kid_id = $request->kid_id;
        $order->school_id  = $request->school_id;
        $order->total  = $request->overall;
        $order->user_id  = Auth::user()->id;
        $order->save();
        foreach ($inputs['item_id'] as $index => $input) {
            $detail =  $inputs['detail'][$index];
            $amount =  $inputs['amount'][$index];
            $date =  $inputs['date'][$index];
            //            dd($date);
            $order_item = new OrderItem();
            $order_item->detail = $detail;
            $order_item->amount = $amount;
            $order_item->date = $date;
            $order_item->product_id = $input;
            $order_item->order_id = $order->id;
            $order_item->kid_id = $request->kid_id;
            $order_item->save();
        }
        Session::flash('success_message', 'Great! Order successfully placed!');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Kid::find($id);
        $schools = School::all();
        return view('admin.kids.edit', ['title' => 'Edit Kid details', "schools" => $schools])->withUser($user);
    }

    public function editOrder($id)
    {
        $title = "Edit Order";
        $order_edit = Order::find($id);
        return view('admin.orders.edit_order', compact('order_edit', 'title'));
    }

    public function updateOrder(Request $request)
    {
        $orders = Order::where('id', $request->order_update_id)->first();
        $orders->company_name = $request->company_name;
        $orders->first_name = $request->first_name;
        $orders->last_name = $request->last_name;
        $orders->email = $request->email;
        $orders->country = $request->country;
        $orders->phone_number = $request->phone_number;
        $orders->mailing_address = $request->mailing_address;
        $orders->zip_postal_code = $request->zip_postal_code;
        $orders->city = $request->city;
        $orders->state_province = $request->state_province;
        $orders->attorney = $request->has('attorney') ? 1 : 0;
        $orders->attorney_first_name = $request->attorney_first_name;
        $orders->attorney_last_name = $request->attorney_last_name;
        $orders->attorney_mailing_address = $request->attorney_mailing_address;
        $res = $orders->update();
        if ($res) {
            return redirect()->route('orders.index')->with('success_message', 'Order update successfull');
        } else {
            return redirect()->route('orders.index')->with('error_message', 'Order update successfull');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Order::find($id);
        $input = $request->all();
        $user->status = $input['status'];
        $user->save();

        Session::flash('success_message', 'Great! Order successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Kid::find($id);

        $user->delete();
        Session::flash('success_message', 'Kid successfully deleted!');
        return redirect()->route('schools.index');
    }
    public function calendar($id)
    {
        $user = Kid::find($id);
        $items = OrderItem::where("kid_id", $id)->get();
        return view('admin.kids.calendar', ['title' => ' Kid Items', "items" => $items])->withUser($user);
    }
    public function addItem($id)
    {
        $user = Kid::find($id);
        $menus = Menu::all();
        return view('admin.kids.item-add', ['title' => ' Kid Items', 'menus' => $menus])->withUser($user);
    }

    public function deleteSelectedClients(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'schools' => 'required',

        ]);
        foreach ($input['schools'] as $index => $id) {

            $user = Kid::find($id);
            $user->delete();
        }
        Session::flash('success_message', 'Kids successfully deleted!');
        return redirect()->back();
    }


    public function ordersRequests()
    {
        $title = "Orders Requests";
        $order_requests = OrderUpdateRequest::where('status', 0)->orderBy('id', 'desc')->get();
        return $order_requests;

        $history = [];

        foreach ($order_requests as $order_request) {
            $history[] = OrderHistory::where('order_id', $order_request->order_update_id)->get();
        }
        return view('admin.orders.order_requests', compact('title', 'order_requests', 'history'));
    }

    public function ordersEditRequests(Request $request)
    {
        $title = "Orders Edit Requests";
        $orders = Order::get();
        $allUpdateRequest = [];
        foreach ($orders as $order) {
            $order_update = OrderUpdateRequest::where('order_update_id', $order->id)->get();
            $allUpdateRequest = array_merge($allUpdateRequest, $order_update->toArray());
        }

        // return $allUpdateRequest;

        return view('admin.orders.order_edit_requests', compact('title', 'allUpdateRequest'));
    }


    public function ordersEditPending(Request $request)
    {
        $title = "Orders Edit Pending";
        $data['order_pending'] = Order::with(['orderupdate', 'shareupdate', 'managementupdate', 'companymanagementupdate', 'renewalupdate'])->get();
        return view('admin.orders.order_edit_pending_requests', compact('title', 'data'));
    }


    public function ordersEditApproved(Request $request)
    {
        $title = "Orders Edit Approved";
        $orders = Order::get();
        $approvedUpdateRequest = [];
        foreach ($orders as $order) {
            $order_update = OrderUpdateRequest::where('order_update_id', $order->id)->where('status', 1)->get();
            $approvedUpdateRequest = array_merge($approvedUpdateRequest, $order_update->toArray());
        }
        return view('admin.orders.order_edit_approved_requests', compact('title', 'approvedUpdateRequest'));
    }

    public function viewChanges(Request $request)
    {
        $data['order_previous'] = Order::with(['orderupdate', 'shareupdate', 'managementupdate', 'compmanagment', 'companymanagementupdate', 'renewalupdate'])->where('id', $request->order_id)->first();
        // return $data['order_previous'];
        $data['order_new'] = OrderUpdateRequest::where('order_update_id', $data['order_previous']->id)->first();
        $data['order_new_renewal'] = AgentRenewalUpdateRequest::where('order_id', $data['order_previous']->id)->first();
        $title = "View Changes";
        return view('admin.orders.view_changes', compact('title', 'data'));
    }

    public function viewChangesOmanage(Request $request)
    {
        $from = OrderManagement::where('order_id', $request->order_id)->first();
        $to = OrderManagementUpdateRequest::where('order_id', $from->order_id)->first();
        return $to;
        $title = "View Changes Order Manage";
        return view('admin.orders.view_changes_o_manage', compact('title', 'from', 'to'));
    }


    public function orderRequestStatus(Request $request)
    {

        if ($request->personal == 'personal') {
            $update_status = OrderUpdateRequest::where('order_update_id', $request->order_id)->first();

            if ($update_status && $update_status->status == 0) {
                $update_status->status = 1;
                $res = $update_status->update();
                if ($res) {

                    $order_update = Order::where('id', $update_status->order_update_id)->first();

                    $order_update->update([
                        'type_of_business' => $update_status->type_of_business,
                        'order_type' => $update_status->order_type,
                        'company_name' => $update_status->company_name,
                        'first_name' => $update_status->first_name,
                        'last_name' => $update_status->last_name,
                        'email' => $update_status->email,
                        'country' => $update_status->country,
                        'phone_number' => $update_status->phone_number,
                        'mailing_address' => $update_status->mailing_address,
                        'zip_postal_code' => $update_status->zip_postal_code,
                        'city' => $update_status->city,
                    ]);
                }
            }
        }

        if ($request->omanage == 'omanage') {
            // Then, loop through the OrderManagementUpdateRequest records and create new records in OrderManagement
            $order_manager_statuses = OrderManagementUpdateRequest::where('order_id', $request->order_id)
                ->where('status', 0)
                ->get();

            if ($order_manager_statuses->count() > 0) {

                OrderManagement::where('order_id', $request->order_id)->delete();

                foreach ($order_manager_statuses as $order_manager_status) {
                    if ($order_manager_status->status == 0) {
                        // Set status to 1 and save the update
                        $order_manager_status->status = 1;
                        $order_manager_status->update();

                        // Create a new record
                        $newOrderManagement = new OrderManagement();
                        $newOrderManagement->order_id = $order_manager_status->order_id;
                        $newOrderManagement->type = $order_manager_status->type;
                        $newOrderManagement->first_name = $order_manager_status->first_name;
                        $newOrderManagement->last_name = $order_manager_status->last_name;
                        $newOrderManagement->address_to_record_with_state = $order_manager_status->address;
                        $newOrderManagement->save();
                    }
                }
            }
        }

        if ($request->cmanage == 'cmanage') {
            // Then, loop through the OrderManagementUpdateRequest records and create new records in OrderManagement
            $company_manager_statuses = CompanyManagementUpdateRequest::where('order_id', $request->order_id)
                ->where('status', 0)
                ->get();

            if ($company_manager_statuses->count() > 0) {

                CompanyManagement::where('order_id', $request->order_id)->delete();

                foreach ($company_manager_statuses as $company_manager_status) {
                    if ($company_manager_status->status == 0) {
                        // Set status to 1 and save the update
                        $company_manager_status->status = 1;
                        $company_manager_status->update();

                        // Create a new record
                        $newOrderManagement = new CompanyManagement();
                        $newOrderManagement->order_id = $company_manager_status->order_id;
                        $newOrderManagement->type = $company_manager_status->type;
                        $newOrderManagement->first_name = $company_manager_status->first_name;
                        $newOrderManagement->last_name = $company_manager_status->last_name;
                        $newOrderManagement->address = $company_manager_status->address;
                        $newOrderManagement->save();
                    }
                }
            }
        }

        if ($request->sharetype == 'sharetype') {

            $share_type_statuses = ShareTypeUpdateRequest::where('order_id', $request->order_id)
                ->where('status', 0)
                ->get();

            if ($share_type_statuses->count() > 0) {
                // Delete existing ShareType records for the same order_id
                ShareType::where('order_id', $request->order_id)->delete();

                foreach ($share_type_statuses as $share_type_status) {
                    if ($share_type_status->status == 0) {
                        // Set status to 1 and save the update
                        $share_type_status->status = 1;
                        $share_type_status->update();

                        // Create a new record
                        $newShareType = new ShareType();
                        $newShareType->order_id = $share_type_status->order_id;
                        $newShareType->type = $share_type_status->type;
                        $newShareType->share_number = $share_type_status->share_number;
                        $newShareType->share_value = $share_type_status->share_value;
                        $newShareType->save();
                    }
                }
            }
        }

        if ($request->renewal == 'renewal') {
            $agent_renewal = AgentRenewalUpdateRequest::where('order_id', $request->order_id)->first();

            if ($agent_renewal && $agent_renewal->status == 0) {
                $agent_renewal->status = 1;
                $res = $agent_renewal->update();
                if ($res) {
                    $this->agentRenewal($agent_renewal);
                }
            }
        }


        return response()->json([
            'status' => 200,
        ]);
    }

    public function approvalReject(Request $request)
    {
        ApprovalReject::where('order_id', $request->order_id)->delete();
        $reject = new ApprovalReject();
        $reject->order_id = $request->order_id;
        $reject->reason = $request->reason;
        $reject->save();
        return back()->with('success_message', 'Not approve notification send successfull');
    }

    // public function orderRequestStatus(Request $request)
    // {
    //     $requestData = json_decode($request->getContent(), true);

    //     $response = ['status' => 400, 'message' => 'Action not performed'];

    //     foreach ($requestData as $item) {
    //         $id = $item['id'];
    //         $value = $item['value'];
    //         $action = $item['action'];

    //         switch ($value) {
    //             case 'personal':
    //                 $model = OrderUpdateRequest::find($id);
    //                 break;
    //             case 'omanage':
    //                 $model = OrderManagementUpdateRequest::find($id);
    //                 break;
    //             case 'cmanage':
    //                 $model = CompanyManagementUpdateRequest::find($id);
    //                 break;
    //             case 'sharetype':
    //                 $model = ShareTypeUpdateRequest::find($id);
    //                 break;
    //             case 'renewal':
    //                 $model = AgentRenewalUpdateRequest::find($id);
    //                 break;
    //             default:
    //                 return response()->json([
    //                     'status' => 400,
    //                     'message' => 'Invalid value type',
    //                 ]);
    //         }

    //         if (!$model) {
    //             return response()->json([
    //                 'status' => 400,
    //                 'message' => 'Model not found',
    //             ]);
    //         }

    //         if ($model->status == 0 && $action == 'approve') {
    //             $model->status = 1;
    //             $res = $model->update();

    //             if ($res) {
    //                 // Handle additional logic if needed
    //                 // Mail::to($model->email)->send(new OrderApprovalMail($model));
    //                 $response = ['status' => 200, 'message' => 'Successfully'];
    //             }
    //         } else if ($action == 'reject') {
    //             // Handle rejection logic if needed
    //             // Mail::to($model->email)->send(new OrderRejectionMail($model));
    //             $response = ['status' => 200, 'message' => 'Rejected'];
    //         }
    //     }

    //     return response()->json($response);
    // }




    //order Agent Renewal update after admin approval
    public function agentRenewal(AgentRenewalUpdateRequest $agent_renewal)
    {
        $agent_r = AgentRenewal::where('order_id', $agent_renewal->order_id)->first();

        $agent_r->update([
            'cash' => $agent_renewal->cash,
            'tradeNotesInput' => $agent_renewal->tradeNotesInput,
            'allowanceInput' => $agent_renewal->allowanceInput,
            'accountsReceivable' => $agent_renewal->accountsReceivable,
            'governmentObligations' => $agent_renewal->governmentObligations,
            'securities' => $agent_renewal->securities,
            'currentAssets' => $agent_renewal->currentAssets,
            'loans' => $agent_renewal->loans,
            'mortgage' => $agent_renewal->mortgage,
            'otherInvestments' => $agent_renewal->otherInvestments,
            'buildings' => $agent_renewal->buildings,
            'depietableAssets' => $agent_renewal->depietableAssets,
            'land' => $agent_renewal->land,
            'intangibleAssets' => $agent_renewal->intangibleAssets,
            'accumulatedAmortization' => $agent_renewal->accumulatedAmortization,
            'intangibleAmortization' => $agent_renewal->intangibleAmortization,
            'otherAssets' => $agent_renewal->otherAssets,
            'totalAssetsValue' => $agent_renewal->totalAssetsValue,
        ]);
    }

    //order share type update after admin approval
    public function shareType(ShareTypeUpdateRequest $share_type_status)
    {
        $com_manage_update = ShareType::where('order_id', $share_type_status->order_id)->first();
        $com_manage_update->update([
            'type' => $share_type_status->type,
            'share_number' => $share_type_status->share_number,
            'share_value' => $share_type_status->share_value,
        ]);
    }

    //order company manager after admin approval
    public function comapnyManage(CompanyManagementUpdateRequest $company_manager_status)
    {

        dd($company_manager_status);

        $com_manage_update = CompanyManagement::where('order_id', $company_manager_status->order_id)->first();

        $com_manage_update->update([
            'type' => $company_manager_status->type,
            'first_name' => $company_manager_status->first_name,
            'last_name' => $company_manager_status->last_name,
            'address' => $company_manager_status->address,
        ]);
    }

    //order manage update after admin approval
    public function orderManage(OrderManagementUpdateRequest $order_manager_status)
    {
        $order_m_update = OrderManagement::where('order_id', $order_manager_status->order_id)->first();

        $order_m_update->update([
            'type' => $order_manager_status->type,
            'first_name' => $order_manager_status->first_name,
            'last_name' => $order_manager_status->last_name,
            'address_to_record_with_state' => $order_manager_status->address,
        ]);
    }

    //order personal or company detail after admin approval
    public function approveOrderDetail(OrderUpdateRequest $update_status)
    {
        $order_update = Order::where('id', $update_status->order_update_id)->first();

        $order_update->update([
            'type_of_business' => $update_status->type_of_business,
            'order_type' => $update_status->order_type,
            'company_name' => $update_status->company_name,
            'first_name' => $update_status->first_name,
            'last_name' => $update_status->last_name,
            'email' => $update_status->email,
            'country' => $update_status->country,
            'phone_number' => $update_status->phone_number,
            'mailing_address' => $update_status->mailing_address,
            'zip_postal_code' => $update_status->zip_postal_code,
            'city' => $update_status->city,
        ]);
    }
}
