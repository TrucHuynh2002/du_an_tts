<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\StudentRequest;
use App\Models\chucvu;

class ChucvuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Danh sách chức vụ";
        $data = chucvu::all();
        return view('chucvu.list', compact('title'),['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm chức vụ";
        return view('chucvu.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = new chucvu;
        $t->ten_chucvu = $request->ten_chucvu;
        $t->save();
        return redirect(route('chucvu.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Cập nhật chức vụ";
        return view('chucvu.edit', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_chucvu)
    {
        $title = "Cập nhật chức vụ";
        $t= chucvu::find($id_chucvu);
        return view('chucvu.edit',compact('t','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_chucvu)
    {
        $t= chucvu::find($id_chucvu);
        $t->ten_chucvu = $request->ten_chucvu;
        $t->save();
        return redirect(route('chucvu.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_chucvu)
    {
        $t = chucvu::find($id_chucvu);
        $t->delete();
        return redirect(route('chucvu.index'));
    }
}
