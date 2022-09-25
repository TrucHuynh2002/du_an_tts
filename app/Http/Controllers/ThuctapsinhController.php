<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Gate;
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
        // $data = DB::table('users')->join('dot_thuctap','users.id_dot','=','dot_thuctap.id_dot')->select();
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
        // if (Gate::allows('get-quantrivien')) {
        $title = "Thêm thực tập sinh";
        $get_dotthuctap = dot_thuctap::all();
        $get_chucvu = chucvu::all();
        // } else {
        //     return abort(403);
        // }
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
        $t->mssv = $request->mssv;
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
        // if (Gate::allows('get-quantrivien')) {
        $title = "Cập nhật thực tập sinh";
        $get_dotthuctap = dot_thuctap::all();
        $get_chucvu = chucvu::all();
        $t= User::find($id_sv);
        // } else {
        //     return abort(403);
        // }
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
        $t->mssv = $request->mssv;
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
        // if (Gate::allows('get-quantrivien')) {
        $t= User::find($id_sv);
        $t->delete();
        // } else {
        //     return abort(403);
        // }
        return redirect()->back()->with(['success' => 'Xóa thành công !']);
    }
}
