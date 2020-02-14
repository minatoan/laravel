<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

use App\ban;
use App\loaiban;
use DB;
class Bancontroller extends Controller
{
    //
    public function getBan()
    {
        $ban = ban::all();    
        return view('admin.ban.ban',['ban' => $ban]);
    }

// ------------------------------------------Thêm bàn
    public function getThemBan()
    {
        $ban = ban::all();
        $loaibann = loaiban::all();
        return view('admin.ban.ban',['ban'=>$ban,'loaiban'=>$loaibann]);
    }

    public function postThemBan(Request $request)
    {
        $this->validate($request,
            [
                'tenban' => 'required|unique:ban,tenban|min:3|max:100',
                'maloaiban' => 'required',
            ],
            [
                'tenban.required' => 'Bạn chưa điền tên bàn',
                'tenban.min' => 'Tên bàn phải có ít nhất 3 ký tự',
                'tenban.unique' => 'Tên bàn đã tồn tại',
                                
            ]);

            $ban = new ban;
            $ban->tenban = $request->tenban;
            $ban->maloaiban = $request->maloaiban;
            // echo "<pre>";
            // print_r($ban->toArray());
            // echo "</pre>";
            $ban->save();
            
            return redirect()->back()->with(Toastr::success('Thêm thành công'));
    }

    // ------------------------------------Sửa bàn
    public function getSua($id)
    {
        $ban = ban::find($id);
        $loaiban = loaiban::all();
        return view('admin.ban.ban',['ban'=>$ban,'loaiban'=>$loaiban]);
    }

    public function postSua(Request $request, $id)
    {
        $ban = ban::where('id', $id)->first();

        // $this->validate($request,
        //     [
        //         'tenban' => 'required|unique:ban,tenban|min:3|max:100',
        //         'maloaiban' => 'required',
        //     ],
        //     [
        //         'tenban.required' => 'Bạn chưa điền tên bàn',
        //         'tenban.min' => 'Tên bàn phải có ít nhất 3 ký tự',
        //         'tenban.unique' => 'Tên bàn đã tồn tại',
                                
        //     ]);
        $ban->id = $id;
        $ban->tenban = $request->tenban;
        $ban->maloaiban = $request->maloaiban;

        // echo "<pre>";
        // print_r($ban->toArray());
        // echo "</pre>";
        $ban->save();
        return redirect()->back()->with(Toastr::success('Sửa thành công'));
    }

    //-----------------------------------------Xóa bàn

    public function getXoa($id)
    {
        $ban = ban::where('id', $id);
        $bill = DB::table('bill')->where('id', $id)->get();

        // if($bill)
        // {
        //     foreach ($bill as $value) {
        //         $bill_detail = DB::table('chitietbill')->where('mabill', $value->mabill)->
        //         // if($bill_detail)
        //         // {
        //         //     foreach ($bill_detail as $values) {
        //         //         // $values->delete();
        //         //         echo $values;
        //         //     }
        //         //     // $value->delete();
        //         // }
                
        //     }toastr["error"]("Are you the six fingered man?")
        // }
        $ban->delete($ban);
        
        return redirect()->back()->with(Toastr::success('Xóa thành công'));
    }    
    
}
