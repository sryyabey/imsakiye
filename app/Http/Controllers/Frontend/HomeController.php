<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;

class HomeController
{
    public function index()
    {
        return view('frontend.home');
    }

     public function test()
    {
        $users = User::with(['roles'])->get();
        return view('frontend.test',compact('users'));
    }
}
