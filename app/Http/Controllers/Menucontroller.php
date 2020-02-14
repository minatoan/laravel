<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\menu;
use App\loaimon;

class Menucontroller extends Controller
{
    //
    public function getMenu()
    {
        $menu = menu::all();    
        return view('admin.menu.menu',['menu' => $menu]);
    }
}
