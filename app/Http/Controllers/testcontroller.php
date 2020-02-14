<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\test;
class testcontroller extends Controller
{
    //
    public function getTest()
    {
        $test = test::all();    
        return view('admin.test.test',['test' => $test]);
    }

    public function postTest(Request $request)
    {
        $this->validate($request,[

        'ho' => 'required',
        'ten' => 'required',
        ]);

        $test = new test;
        $test->ho = $request->input('ho');
        $test->ten = $request->input('ten');
        $test->save();

        return redirect('/test')->with('thongbao', 'thanh cong');
    }
}
