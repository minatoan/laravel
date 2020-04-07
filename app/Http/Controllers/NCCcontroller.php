<?php


namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\phieunhap;
use App\tochuc;
use App\nhacungcap;
use DB;


class NCCcontroller extends Controller
{
    //------------------------------------------Thêm hàng hóa
    public function getNCC($id)
    {
        $nhacungcap = nhacungcap::where('matc', $id)->get();
        $phieunhap = phieunhap::all();
        $tochuc = tochuc::where('id', $id)->get();
        return view('admin.ncc.ncc',['nhacungcap'=>$nhacungcap, 'phieunhap' => $phieunhap, 'tochuc' => $tochuc]);
       
        
    }

    public function postThemNCC(Request $request)
    {
        $this->validate($request,
            [
                'tenncc' => 'required|min:3|max:100',
                'diachi' => 'required',
                'sdt' => 'required',
                'matc' => 'required',
            ],
            [
                'tenncc.required' => 'Lỗi rồi! Bạn chưa điền tên nhà cung cấp',
                'tenncc.min' => 'Tên nhà cung cấp phải có ít nhất 3 ký tự',
                                
            ]);

            $nhacungcap = new nhacungcap;
            $nhacungcap->tenncc = $request->tenncc;
            $nhacungcap->diachi = $request->diachi;  
            $nhacungcap->sdt = $request->sdt;  
            $nhacungcap->matc = $request->matc;         
            $nhacungcap->save();
            
            return redirect()->back()->with(Toastr::success('Thêm thành công'));
    }

    // ------------------------------------Sửa hàng hóa
    public function getSuaNCC($id)
    {
        $nhacungcap = nhacungcap::where('matc', $id)->get();
        $tochuc = tochuc::all();
        return view('admin.ncc.ncc',['nhacungcap'=>$nhacungcap, 'tochuc' => $tochuc]);
    }

    public function postSuaNCC(Request $request, $id)
    {
        $nhacungcap = nhacungcap::where('id', $id)->first();

        $this->validate($request,
        [
            'tenncc' => 'required|min:3|max:100',
            'diachi' => 'required',
            'sdt' => 'required',
            'matc' => 'required',
        ],
        [
            'tenncc.required' => 'Lỗi rồi! Bạn chưa điền tên nhà cung cấp',
            'tenncc.min' => 'Tên nhà cung cấp phải có ít nhất 3 ký tự',
            
                            
        ]);
        $nhacungcap->id = $id;
        $nhacungcap->tenncc = $request->tenncc;
        $nhacungcap->diachi = $request->diachi;  
        $nhacungcap->sdt = $request->sdt;  
        $nhacungcap->matc = $request->matc;           
        $nhacungcap->save();
        return redirect()->back()->with(Toastr::success('Sửa thành công'));
    }

    //-----------------------------------------Xóa hàng hóa

    public function getXoaNCC($id)
    {
        $nhacungcap = nhacungcap::where('id', $id);        
        $nhacungcap->delete($nhacungcap);
        
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    }    
    
}
