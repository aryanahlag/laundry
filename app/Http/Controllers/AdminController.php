<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getRegister()
    {
    	return view('auth.register');
    }

    public function postRegister(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required|unique:users|min:2',
    		'password' => 'required',
    		'name' => 'required',
    	]);

    	$user = User::create([
    		'username' => $request->username,
    		'password' => bcrypt($request->password),
    		'role' => "admin",
    	]);

    	$admin = Admin::create([
    		'name' => $request->name,
    		'user_id' => $user->id,
    	]);

    	Auth::loginUsingId($user->id);

    	return redirect()->route('admin.dashboard');

    }
}
