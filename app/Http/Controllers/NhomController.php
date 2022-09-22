<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\nhom;
use App\Models\dot_thuctap;
use App\Models\User;

class NhomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Danh sách nhóm thực tập";
        $get_nhom = nhom::all();
        $get_dotthuctap = dot_thuctap::all();
        $get_users = User::all();
        return view('nhom.list', compact('title','get_nhom','get_dotthuctap','get_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm nhóm thực tập";
        $get_dotthuctap = dot_thuctap::all();
        $get_users = User::all();
        return view('nhom.add', compact('title','get_dotthuctap','get_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = new nhom;
        $t->ten_nhom = $request->ten_nhom;
        $t->id_dot = $request->id_dot;
        $t->de_tai = $request->de_tai;
        $t->id_nhomtruong = $request->id_nhomtruong;
        $t->save();
        return redirect(route('nhom.index'))->with(['success' => 'Thêm thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Cập nhật nhóm thực tập";
        return view('nhom.edit', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_nhom)
    {
        $title = "Cập nhật nhóm";
        $t= nhom::find($id_nhom);
        $get_users = User::all();
        $get_dotthuctap = dot_thuctap::all();
        return view('nhom.edit', compact('title','t','get_users','get_dotthuctap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_nhom)
    {
        $t = nhom::find($id_nhom);
        $t->ten_nhom = $request->ten_nhom;
        $t->id_dot = $request->id_dot;
        $t->de_tai = $request->de_tai;
        $t->id_nhomtruong = $request->id_nhomtruong;
        $t->save();
        return redirect(route('nhom.index'))->with(['success' => 'Sửa thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_nhom)
    {
        $t= nhom::find($id_nhom);
        $t->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công !']);
    }
}
