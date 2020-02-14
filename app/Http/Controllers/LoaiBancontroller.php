<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ban;
use App\loaiban;
use App\tochuc;
class LoaiBancontroller extends Controller
{
    //
    public function getLoaiBan()
    {
        $loaiban = loaiban::all();        
        return view('admin.loaiban.loaiban',['loaiban' => $loaiban]);
    }

    public function getThem()
    {
        $loaiban = loaiban::all();
        $tochuc = tochuc::all();
        return view('admin.loaiban.loaiban',['loaiban' => $loaiban, 'tochuc' => $tochuc]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[

            'tenban' => 'required',
            'maloaiban' => 'required',
            ]);
            $loaiban = new loaiban;
        $loaiban->tenloaiban = $request->input('tenloaiban');
        $loaiban->maloaiban = $request->input('maloaiban');
        $loaiban->save();

        return redirect('admin/loaiban/loaiban')->with('thongbao', 'thanh cong');
    }
}
