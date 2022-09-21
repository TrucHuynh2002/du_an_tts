<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\congty;
use App\Http\Requests\kernel;

class CongtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Danh sách công ty";
        $data = congty::all();
        return view('congty.list', compact('title'),['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $title = "Thêm công ty";
        return view('congty.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = new congty;
        $t->ten_congty = $request->ten_congty;
        $t->dia_chi = $request->dia_chi;
        // $t->$img = $request->input('img');
        $t->img = "img.png";
        $t->save();
        return redirect()->back();
        // $title = "Danh sách công ty";
        // $data = congty::all();
        // return view('congty.list', compact('title'),['data'=>$data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Cập nhật công ty";
        return view('congty.edit', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Cập nhật công ty";
        return view('congty.edit', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_congty)
    {
        $congty= congty::find($id_congty);
        $congty->delete();
        return redirect()->back();
        // return redirect(route('congty.index'));
    }
        
    
}
