<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\menu;
use App\loaimon;
use App\tochuc;
class Menucontroller extends Controller
{
    //


// ------------------------------------------Thêm menu
    public function getThemMenu($id)
    {
        $menu = menu::where('matc', $id)->get();
        $loaimon = loaimon::where('matc', $id)->get();
        $tochuc = tochuc::where('id', $id)->get();
        return view('admin.menu.menu',['menu' => $menu, 'loaimon' => $loaimon,'tochuc' => $tochuc]);
        // dd($tochuc);
    }

    public function postThemMenu(Request $request)
    {
        $this->validate($request,
            [
                'tenmon' => 'required|min:3|max:100',
                'maloaimon' => 'required',
                'dongia' => 'required',
                'matc' => 'required',
            ],
            [
                'tenmon.required' => 'Lỗi rồi! Bạn chưa điền tên đồ uống',
                'tenmon.min' => 'Tên đồ uống phải có ít nhất 3 ký tự',
                'tenmon.unique' => 'Lỗi rồi! Tên đồ uống đã tồn tại',  
                'dongia.required' => 'Lỗi rồi! Bạn chưa điền giá',          
            ]);
            $menu = new menu;
            $menu->tenmon = $request->tenmon;
            $menu->matc = $request->matc;
            $menu->dongia = $request->dongia;
            $menu->maloaimon = $request->maloaimon;
        //     echo "<pre>";
        // print_r($menu->toArray());
        // echo "</pre>";
            $menu->save();
            return redirect()->back()->with(Toastr::success('Thêm thành công'));
    }
     // ------------------------------------Sửa loại bàn
    public function getSuaMenu($id)
    {
        $menu = menu::all();
        $loaimon = loaimon::all();
        $tochuc = tochuc::all();
        return view('admin.menu.menu',['menu' => $menu, 'loaimon' => $loaimon,'tochuc' => $tochuc]);
    }

    public function postSuaMenu(Request $request, $id)
    {
        $menu = menu::where('id', $id)->first();

        $this->validate($request,
        [
            'tenmon' => 'required|min:3|max:100',
            'maloaimon' => 'required',
            'dongia' => 'required',
            'matc' => 'required',
        ],
        [
            'tenmon.required' => 'Lỗi rồi! Bạn chưa điền tên đồ uống',
            'tenmon.min' => 'Tên đồ uống phải có ít nhất 3 ký tự',        
            'dongia.required' => 'Lỗi rồi! Bạn chưa điền giá',          
        ]);
        $menu->id = $id;
        $menu->tenmon = $request->tenmon;
        $menu->matc = $request->matc;
        $menu->dongia = $request->dongia;
        $menu->maloaimon = $request->maloaimon;
        
        $menu->save();
        return redirect()->back()->with(Toastr::success('Sửa thành công'));
    }


    //_----------------------------------------------Xóa menu
    public function getXoaMenu($id)
    {
        $menu = menu::where('id', $id);        
        $menu->delete($menu);        
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    } 

}