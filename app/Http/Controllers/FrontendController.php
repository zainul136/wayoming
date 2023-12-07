<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("frontend.index");
    }

    public function agent()
    {
        if (auth()->check()) {
            $services = ServiceItem::all();
            return view("frontend.agent", ["services" => $services]);
        } else {
            return view('frontend.login');
        }
    }

    public function corporation()
    {
        if (auth()->check()) {
            $services = ServiceItem::all();
            return view("frontend.corporation", ["services" => $services]);
        } else {
            return view('frontend.login');
        }
    }

    public function renwal()
    {
        if (auth()->check()) {
            $services = ServiceItem::all();
            $companies = Order::select('id', 'company_name')->get();
            return view("frontend.renwal", ["services" => $services, 'companies' => $companies]);
        } else {
            return view('frontend.login');
        }
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
    public function edit($id)
    {
        //
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
        //
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
