<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\hanghoa;
use App\tochuc;
use DB;

class HangHoacontroller extends Controller
{
    //------------------------------------------Thêm hàng hóa
    public function getPhieunhaphanghoa($id)
    {
        // Cart::clear();

        $tochuc = tochuc::all();
        $hanghoa = hanghoa::where('matc', $id)->get();
        return view('admin.nhaphang.nhaphang',compact( 'tochuc','hanghoa'));
    }
    public function getHangHoa($id)
    {
        $hanghoa = hanghoa::where('matc', $id)->get();
        $tochuc = tochuc::where('id', $id)->get();
        return view('admin.hanghoa.hanghoa',['hanghoa'=>$hanghoa, 'tochuc' => $tochuc]);
    }
    

    public function postThemHangHoa(Request $request)
    {
        $this->validate($request,
            [
                'tenhang' => 'required|min:3|max:100',
                'soluong' => 'required',
                'dvt' => 'required',
                'matc' => 'required',
            ],
            [
                'tenhang.required' => 'Lỗi rồi! Bạn chưa điền tên nguyên liệu',
                'tenhang.min' => 'Tên nguyên liệu phải có ít nhất 3 ký tự',
                'tenhang.unique' => 'Lỗi rồi! Tên nguyên liệu đã tồn tại',
                                
            ]);

            $hanghoa = new hanghoa;
            $hanghoa->tenhang = $request->tenhang;
            $hanghoa->soluong = $request->soluong;  
            $hanghoa->dvt = $request->dvt;  
            $hanghoa->matc = $request->matc;         
            $hanghoa->save();
            
            return redirect()->back()->with(Toastr::success('Thêm thành công'));
    }

    // ------------------------------------Sửa hàng hóa
    public function getSuaHangHoa($id)
    {
        $ban = ban::find($id);       
        $tochuc = tochuc::all();
        return view('admin.hanghoa.hanghoa',['hanghoa'=>$hanghoa, 'tochuc' => $tochuc]);
    }

    public function postSuaHangHoa(Request $request, $id)
    {
        $hanghoa = hanghoa::where('id', $id)->first();

        $this->validate($request,
        [
            'tenhang' => 'required|min:3|max:100',
            'soluong' => 'required',
            'dvt' => 'required',
            'matc' => 'required',
        ],
        [
            'tenhang.required' => 'Lỗi rồi! Bạn chưa điền tên nguyên liệu',
            'tenhang.min' => 'Tên nguyên liệu phải có ít nhất 3 ký tự',
            
                            
        ]);
        $hanghoa->id = $id;
        $hanghoa->tenhang = $request->tenhang;
        $hanghoa->soluong = $request->soluong;  
        $hanghoa->dvt = $request->dvt;  
        $hanghoa->matc = $request->matc;         
        $hanghoa->save();
        return redirect()->back()->with(Toastr::success('Sửa thành công'));
    }

    //-----------------------------------------Xóa hàng hóa

    public function getXoaHangHoa($id)
    {
        $hanghoa = hanghoa::where('id', $id);        
        $hanghoa->delete($hanghoa);
        
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    }    
    
}