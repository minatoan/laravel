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
use App\ncc;
use DB;


class NCCcontroller extends Controller
{
    //------------------------------------------Thêm hàng hóa
    public function getNCC($id)
    {
        $ncc = ncc::where('matc', $id)->get();
        $phieunhap = phieunhap::all();
        $tochuc = tochuc::where('id', $id)->get();
        return view('admin.ncc.ncc',['ncc'=>$ncc, 'phieunhap' => $phieunhap, 'tochuc' => $tochuc]);
       
        
    }

    public function postThemNCC(Request $request)
    {
        $this->validate($request,
            [
                'tenncc' => 'required|unique:ncc,tenncc|min:3|max:100',
                'diachi' => 'required',
                'sdt' => 'required',
                'matc' => 'required',
            ],
            [
                'tenncc.required' => 'Lỗi rồi! Bạn chưa điền tên nhà cung cấp',
                'tenncc.min' => 'Tên nhà cung cấp phải có ít nhất 3 ký tự',
                'tenncc.unique' => 'Lỗi rồi! Tên nhà cung cấp đã tồn tại',
                                
            ]);

            $ncc = new ncc;
            $ncc->tenncc = $request->tenncc;
            $ncc->diachi = $request->diachi;  
            $ncc->sdt = $request->sdt;  
            $ncc->matc = $request->matc;         
            $ncc->save();
            
            return redirect()->back()->with(Toastr::success('Thêm thành công'));
    }

    // ------------------------------------Sửa hàng hóa
    public function getSuaNCC($id)
    {
        $phieunhap = phieunhap::find($id);       
        $tochuc = tochuc::all();
        return view('admin.ncc.ncc',['ncc'=>$ncc, 'tochuc' => $tochuc]);
    }

    public function postSuaNCC(Request $request, $id)
    {
        $ncc = ncc::where('id', $id)->first();

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
        $ncc->id = $id;
        $ncc->tenncc = $request->tenncc;
        $ncc->diachi = $request->diachi;  
        $ncc->sdt = $request->sdt;  
        $ncc->matc = $request->matc;           
        $ncc->save();
        return redirect()->back()->with(Toastr::success('Sửa thành công'));
    }

    //-----------------------------------------Xóa hàng hóa

    public function getXoaNCC($id)
    {
        $ncc = ncc::where('id', $id);        
        $ncc->delete($ncc);
        
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    }    
    
}
