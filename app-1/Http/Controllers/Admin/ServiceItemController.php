<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $title = 'Services';
	    return view('admin.service-items.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function getClients(Request $request){
		$columns = array(
			0 => 'id',
			1 => 'name',
			2 => 'email',
			3 => 'active',
			4 => 'created_at',
			5 => 'action'
		);

		$totalData = ServiceItem::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		// $order = $columns[$request->input('order.4.column')];
		// $dir = $request->input('order.4.dir');

		if(empty($request->input('search.value'))){
			$users = ServiceItem::offset($start)
				->limit($limit)
				// ->orderBy($order,$dir)
				->get();
			$totalFiltered = ServiceItem::count();
		}else{
			$search = $request->input('search.value');
			$users = ServiceItem::where([
				['is_admin',0],
				['name', 'like', "%{$search}%"],
			])
				->orWhere('price','like',"%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				// ->orderBy($order, $dir)
				->get();
			$totalFiltered = ServiceItem::where([
				['is_admin',0],
				['name', 'like', "%{$search}%"],
			])
				->orWhere('name', 'like', "%{$search}%")
				->orWhere('price','like',"%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}


		$data = array();

		if($users){
			foreach($users as $r){

				$edit_url = route('service-items.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="services[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['name'] = $r->name;
				$nestedData['price'] = $r->price;

				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View Client" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-eye"></i>
                                    </a>
                                    <a title="Edit Client" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete Client" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-delete"></i>
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
	    $title = 'Add New Service';
	    return view('admin.service-items.create',compact('title'));
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
		    'price' => 'required|numeric',
			'description' => 'required',

	    ]);

	    $input = $request->all();
	    $user = new ServiceItem();
	    $user->name = $input['name'];
	    $user->price = $input['price'];
		$user->description = $input['description'];


	    $user->save();

	    Session::flash('success_message', 'Great! Service has been saved successfully!');
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
	    $user = ServiceItem::find($id);
	    return view('admin.service-items.single', ['title' => 'Service detail', 'user' => $user]);
    }

	public function clientDetail(Request $request)
	{

		$user = ServiceItem::findOrFail($request->id);


		return view('admin.service-items.detail', ['title' => 'Client Detail', 'user' => $user]);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $user = ServiceItem::find($id);
	    return view('admin.service-items.edit', ['title' => 'Edit Service details'])->withUser($user);
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
	    $user = ServiceItem::find($id);
	    $this->validate($request, [
		    'name' => 'required|max:255',
		    'price' => 'required|numeric',
			'description' => 'required',

	    ]);
	    $input = $request->all();

	    $user->name = $input['name'];
	    $user->price = $input['price'];
	    $user->description = $input['description'];

	    $user->save();

	    Session::flash('success_message', 'Great! Service successfully updated!');
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
	    $user = ServiceItem::find($id);

        $user->delete();
        Session::flash('success_message', 'Service successfully deleted!');

	    return redirect()->route('service-items.index');

    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'services' => 'required',

		]);
		foreach ($input['services'] as $index => $id) {

			$user = ServiceItem::find($id);

				$user->delete();

		}
		Session::flash('success_message', 'Services successfully deleted!');
		return redirect()->back();

	}
}
