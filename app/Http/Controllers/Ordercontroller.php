<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class Ordercontroller extends Controller
{
    public function getOrder()
    {
        
        return view('admin.order.order');
    }
}
