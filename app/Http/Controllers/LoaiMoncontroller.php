<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\menu;
use App\loaimon;
use App\tochuc;

class LoaiMoncontroller extends Controller
{
    // ------------------------------------------Thêm loại món
    public function getThemLoaiMon()
    {
        $loaimon = loaimon::all();
        $tochuc = tochuc::all();
        return view('admin.loaimon.loaimon',['loaimon' => $loaimon, 'tochuc' => $tochuc]);
    }

    public function postThemLoaiMon(Request $request)
    {
        $this->validate($request,
            [
                'tenloaimon' => 'required|unique:loaimon,tenloaimon|min:3|max:100',
                'matc' => 'required',
            ],
            [
                'tenloaimon.required' => 'Lỗi rồi! Bạn chưa điền tên loại món',
                'tenloaimon.min' => 'Tên loại món phải có ít nhất 3 ký tự',
                'tenloaimon.unique' => 'Lỗi rồi! Tên loại món đã tồn tại',            
            ]);
            $loaimon = new loaimon;
            $loaimon->tenloaimon = $request->tenloaimon;
            $loaimon->matc = $request->matc;
            $loaimon->save();

            return redirect()->back()->with(Toastr::success('Thêm thành công'));
    }
    // ------------------------------------Sửa loại món
    public function getSuaLoaiMon($id)
    {
        $loaimon = loaimon::find($id);
        $tochuc = tochuc::all();
        return view('admin.loaimon.loaimon',['loaimon'=>$loaimon,'tochuc'=>$tochuc]);
    }

    public function postSuaLoaiMon(Request $request, $id)
    {
        $loaimon = loaimon::where('id', $id)->first();

        $this->validate($request,
        [
            'tenloaimon' => 'required|unique:loaimon,tenloaimon|min:3|max:100',
            'matc' => 'required',
        ],
        [
            'tenloaimon.required' => 'Lỗi rồi! Bạn chưa điền tên loai bàn',
            'tenloaimon.min' => 'Tên loại món phải có ít nhất 3 ký tự',
            'tenloaimon.unique' => 'Lỗi rồi! Tên loại món đã tồn tại',
        
        ]);
        $loaimon->id = $id;
        $loaimon->tenloaimon = $request->tenloaimon;
        $loaimon->matc = $request->matc;
        // echo "<pre>";
        // print_r($loaimon->toArray());
        // echo "</pre>";
        $loaimon->save();
        return redirect()->back()->with(Toastr::success('Sửa thành công'));
    }
//_----------------------------------------------Xóa loại món
    public function getXoaLoaiMon($id)
    {
        $loaimon = loaimon::where('id', $id);        
        $loaimon->delete($loaimon);        
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    } 

}
