<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{

    public function index()
    {
        $title = 'NewsWatch Client Dashboard';
        return view('client.dashboard.index', compact('title'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('client.settings.edit', ['title' => 'Edit Profile', 'user' => $user]);
    }

    public function update(Request $request)
    {
        $profile = User::where('id', $request->id)->first();
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->country = $request->country;
        $profile->city = $request->city;
        $profile->state_province = $request->state_province;
        $profile->update();
        return back()->with('success_message','Profile update successfully');
    }
}
