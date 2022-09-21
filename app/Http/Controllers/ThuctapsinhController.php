<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\User;
use App\Models\dot_thuctap;
use App\Models\chucvu;
use Illuminate\Support\Facades\Hash;

class ThuctapsinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Danh sách thực tập sinh";
        $data = User::all();
        $get_dotthuctap = dot_thuctap::all();
        $get_chucvu = chucvu::all();
        return view('thuctapsinh.list', compact('title','data','get_dotthuctap','get_chucvu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm thực tập sinh";
        $get_dotthuctap = dot_thuctap::all();
        $get_chucvu = chucvu::all();
      
        return view('thuctapsinh.add', compact('title','get_dotthuctap','get_chucvu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = new User;
        $t->hoten_sv = $request->hoten_sv;
        $t->email = $request->email;
        $t->password = Hash::make($request->password);
        $t->sdt = $request->sdt;
        $get_image = $request->file('img');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'upload/';
            $name_image  = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $t->img = $new_image;
    }
        $t->dia_chi = $request->dia_chi;
        $t->id_chucvu = $request->id_chucvu;
        $t->id_dot = $request->id_dot;
        $t->save();
        return redirect(route('thuctapsinh.index'))->with(['success' => 'Thêm thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Cập nhật thực tập sinh";
        return view('thuctapsinh.edit', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sv)
    {
        $title = "Cập nhật thực tập sinh";
        $get_dotthuctap = dot_thuctap::all();
        $get_chucvu = chucvu::all();
        $t= User::find($id_sv);
        
        return view('thuctapsinh.edit',compact('t','title','get_chucvu','get_dotthuctap'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $t= User::find($id_user);
        $t->hoten_sv = $request->hoten_sv;
        $t->email = $request->email;
        $t->password = Hash::make($request->password);
        $t->sdt = $request->sdt;
        $get_image = $request->file('img');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $path = 'upload/';
            $name_image  = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $t->img = $new_image;
    }
        $t->dia_chi = $request->dia_chi;
        $t->id_chucvu = "$request->id_chucvu";
        $t->id_dot = $request->id_dot;
        $t->save();
        return redirect(route('thuctapsinh.index'))->with(['success' => 'Sửa thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sv)
    {
        $t= User::find($id_sv);
        $t->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công !']);
    }
}
