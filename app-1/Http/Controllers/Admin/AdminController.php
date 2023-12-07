<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'CheckOuts Admin Dashboard';

        $data['total_user'] = User::count();
        $data['total_orders'] = Order::count();
        $data['form_company'] = Order::where('order_type', 0)->count();
        $data['registered_agent'] = Order::where('order_type', 1)->count();
        $data['file_annual'] = Order::where('order_type', 2)->count();


        return view('admin.dashboard.index', compact('title', 'data'));
    }

    public function userDateFilter(Request $request)
    {

        $fromDate = $request->input('from_date');
        $timestamp = strtotime($fromDate);
        $formattedFrom = date('Y-m-d', $timestamp);

        $toDate = $request->input('to_date');
        $timestamp = strtotime($toDate);
        $formattedTo = date('Y-m-d', $timestamp);


        $filteredUserData = User::whereBetween('created_at', [$formattedFrom, $formattedTo])->count();

        return response()->json($filteredUserData);
    }

    public function dateFilter(Request $request)
    {

        $fromDate = $request->input('from_date');
        $timestamp = strtotime($fromDate);
        $formattedFrom = date('Y-m-d', $timestamp);

        $toDate = $request->input('to_date');
        $timestamp = strtotime($toDate);
        $formattedTo = date('Y-m-d', $timestamp);


        $filteredData = Order::whereBetween('created_at', [$formattedFrom, $formattedTo])->count();

        return response()->json($filteredData);
    }

    public function filterAgentDate(Request $request)
    {

        $fromDate = $request->input('from_date');
        $timestamp = strtotime($fromDate);
        $formattedFrom = date('Y-m-d', $timestamp);

        $toDate = $request->input('to_date');
        $timestamp = strtotime($toDate);
        $formattedTo = date('Y-m-d', $timestamp);


        $filteredAgentData = Order::where('order_type', 1)->whereBetween('created_at', [$formattedFrom, $formattedTo])->count();

        return response()->json($filteredAgentData);
    }

    public function filterCompanyDate(Request $request)
    {

        $fromDate = $request->input('from_date');
        $timestamp = strtotime($fromDate);
        $formattedFrom = date('Y-m-d', $timestamp);

        $toDate = $request->input('to_date');
        $timestamp = strtotime($toDate);
        $formattedTo = date('Y-m-d', $timestamp);


        $filteredCompanyData = Order::where('order_type', 0)->whereBetween('created_at', [$formattedFrom, $formattedTo])->count();

        return response()->json($filteredCompanyData);
    }

    public function filterAnnualDate(Request $request)
    {

        $fromDate = $request->input('from_date');
        $timestamp = strtotime($fromDate);
        $formattedFrom = date('Y-m-d', $timestamp);

        $toDate = $request->input('to_date');
        $timestamp = strtotime($toDate);
        $formattedTo = date('Y-m-d', $timestamp);


        $filteredAnnualData = Order::where('order_type', 2)->whereBetween('created_at', [$formattedFrom, $formattedTo])->count();

        return response()->json($filteredAnnualData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('admin.settings.edit', ['title' => 'Edit Admin Profile', 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $admin = Auth::user();
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,' . $admin->id,
        ]);
        $input = $request->all();
        if (empty($input['password'])) {
            $input['password'] = $admin->password;
        } else {
            $input['password'] = bcrypt($input['password']);
        }
        $admin->fill($input)->save();
        Session::flash('success_message', 'Great! admin successfully updated!');
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
        //
    }
}
