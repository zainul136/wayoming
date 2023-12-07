<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kid;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $title = 'Orders';
	    return view('admin.orders.index',["title" => $title, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function getClients(Request $request){
		$columns = array(
			0 => 'id',
			1 => 'first_name',
			2 => 'company_name',
			3 => 'status',
			4 => 'total',
			5 => 'created_at',
			6 => 'action',
		);
        $id =  Auth::user()->id;
		$totalData = Order::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value'))){
			$users = Order::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Order::count();
		}else{
			$search = $request->input('search.value');
			$users = Order::where([
				['created_at', 'like', "%{$search}%"],
			])->
            orWhere([
				['total', 'like', "%{$search}%"],
			])
                ->
            orWhere([
				['first_name', 'like', "%{$search}%"],
			])->
            orWhere([
				['last_name', 'like', "%{$search}%"],
			])
                ->
            orWhere([
				['company_name', 'like', "%{$search}%"],
			])

				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Order::where([
                ['created_at', 'like', "%{$search}%"],
            ])->
                orWhere([
                    ['total', 'like', "%{$search}%"],
                ])    ->
            orWhere([
                ['first_name', 'like', "%{$search}%"],
            ])->
            orWhere([
                ['last_name', 'like', "%{$search}%"],
            ])
                ->
                orWhere([
                    ['company_name', 'like', "%{$search}%"],
                ])

                ->count();
		}


		$data = array();

		if($users){
			foreach($users as $r){
				$edit_url = route('orders.edit',$r->id);
				$show_url = route('orders.show',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="schools[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['company_name'] = $r->company_name;
				$nestedData['name'] = $r->first_name;
				$nestedData['total'] = '$'.$r->total;
                if($r->payment_status == 0){
                    $nestedData['payment_status'] = '<span class="label label-info label-inline mr-2">Payment is pending</span>';
                }elseif($r->payment_status == 1){
                    $nestedData['payment_status'] = '<span class="label label-success label-inline mr-2">Paid</span>';
                }elseif($r->payment_status == 2){
                    $nestedData['payment_status'] = '<span class="label label-danger label-inline mr-2">Cancel</span>';
                }
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>

                                    <a title="Show Order" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$show_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-eye"></i>
                                    </a>

                                </td>
                                </div>
                            ';
				$data[] = $nestedData;
			}
		}

		$json_data = array(
			"draw"			=> intval($request->input('draw')),
			"recordsTotal"	=> intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"			=> $data
		);

		echo json_encode($json_data);

	}
    public function create()
    {
	    $title = 'Add New Order';
	    $kids  =  Kid::where("user_id",Auth::user()->id)->get();
        $menus = Menu::all();
        return view('admin.orders.item-add', ['title' => ' Kid Items','menus' => $menus,'kids' => $kids]);
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
	    $user = Order::find($id);
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
	    return view('admin.kids.edit', ['title' => 'Edit Kid details',"schools" => $schools])->withUser($user);
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
        $items = OrderItem::where("kid_id",$id)->get();
        return view('admin.kids.calendar', ['title' => ' Kid Items',"items" => $items])->withUser($user);
    }
    public function addItem($id)
    {
	    $user = Kid::find($id);
	    $menus = Menu::all();
        return view('admin.kids.item-add', ['title' => ' Kid Items','menus' => $menus])->withUser($user);
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
}
