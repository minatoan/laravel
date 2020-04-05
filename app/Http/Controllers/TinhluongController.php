<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\nhanvien;
use App\tochuc;
use App\tinhluong;
use Hash;
class TinhluongController extends Controller
{
    //
    //tinh luong

    public function getLuongNhanVien($id)
    {
        $tinhluong = tinhluong::where('matc', $id)->orderBy('id', 'DESC')->get();
        $tochuc = tochuc::where('id', $id)->get();
        $nhanvien  = nhanvien::find($id);
        return view('admin.luongnv.luong',compact( 'tinhluong','tochuc','nhanvien'));
    }
//them
    public function postThemluong(Request $request)
    {
        
        $this->validate($request,
            [
                'manv' => "required",
                'giobd' => 'required',
                'giokt' => 'required',
                'luongcb' => 'required',
                'calam' => 'required',


            ],
            [
                'manv.required' => 'Lỗi rồi! Bạn chưa điền thông tin',
                'giobd.required' => 'Lỗi rồi! Bạn chưa điền thông tin',
                'giokt.required' => 'Lỗi rồi! Bạn chưa điền thông tin',
                'luongcb.required' => 'Lỗi rồi! Bạn chưa điền thông tin',
                'calam.required' => 'Lỗi rồi! Bạn chưa điền thông tin',
            ]);

        

            $tinhluong = new tinhluong;
            $tinhluong->manv = $request->manv;
            $tinhluong->luongcb = $request->luongcb;
            $tinhluong->calam = $request->calam;
            $tinhluong->ngay = $request->ngay;


            $tinhluong->matc = $request->matc;   
            $tinhluong->giobd = $request->giobd;   
            $tinhluong->giokt = $request->giokt;
            $tinhluong->songaylam = $request->songaylam;   
            $tinhluong->tienthuong = $request->tienthuong;   
            $tinhluong->tienphat = $request->tienphat;  
            $tinhluong->ghichu = $request->ghichu;   
        // echo "<pre>";
        // print_r($tinhluong->toArray());
        // echo "</pre>";
            $tinhluong->save();            
            return redirect()->back()->with(Toastr::success('Thành công'));
    }
    public function getSualuong($id)
    {
        $id_nhanvien  = nhanvien::find($id);
        $tinhluong = tinhluong::find($id);
        $nhanvien = nhanvien::where('matc', $id)->get();
        $tinhluong = tinhluong::where('matc', $id)->orderBy('id', 'DESC')->get();
        $tochuc = tochuc::where('id', $id)->get();
        return view('admin.luongnv.luong',compact('nhanvien', 'tinhluong','tochuc','id_nhanvien'));
    }

    public function postSualuong(Request $request, $id)
    {
        $tinhluong = tinhluong::where('id', $id)->first();
        
        
            $tinhluong->id = $id;
            $tinhluong->manv = $request->manv;
            $tinhluong->luongcb = $request->luongcb;
            $tinhluong->calam = $request->calam;
            $tinhluong->ngay = $request->ngay;
            $tinhluong->matc = $request->matc;   
            $tinhluong->giobd = $request->giobd;   
            $tinhluong->giokt = $request->giokt;
            $tinhluong->songaylam = $request->songaylam;   
            $tinhluong->tienthuong = $request->tienthuong;   
            $tinhluong->tienphat = $request->tienphat;  
            $tinhluong->ghichu = $request->ghichu; 
        // echo "<pre>";
        // print_r($tinhluong->toArray());
        // echo "</pre>";
        $tinhluong->save();
        return redirect()->back()->with(Toastr::success('Cập nhật thành công'));
    }

    //-----------------------------------------Xóa 

    public function getXoaluong($id)
    {
        $tinhluong = tinhluong::where('id', $id);        
        $tinhluong->delete($tinhluong);        
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    

    }  
//lich su luong
    public function getLichsuluong($id)
    {
        $tinhluong = tinhluong::where('matc', $id)->orderBy('ngay', 'DESC')->get();
        $tochuc = tochuc::where('id', $id)->get();
        $nhanvien = nhanvien::where('id', $id)->get();
        return view('admin.luongnv.lichsuluong',compact( 'tinhluong','tochuc','nhanvien'));
    }

    public function likeluong($id, Request $req)
    {

        $dateform = $req->dateform;
        $dateto = $req->dateto;
        $tinhluong  = tinhluong::where('matc', $id)->orderBy('id', 'DESC')->whereBetween('ngay', [$dateform, date('Y-m-d', strtotime($dateto. '+1 days'))])->get();
        return view('admin.luongnv.lichsuluong' ,compact('tinhluong'));
    }
}
