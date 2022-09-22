<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nhom;
use App\Models\congviec;
use App\Models\phancongcongviec;
use App\Models\User;

class CongviecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Danh sách công việc";
        $get_nhom = nhom::all();
        $get_congviec = congviec::all();
        $get_phancongcongviec = phancongcongviec::all();
        return view('congviec.list', compact('title','get_nhom','get_congviec','get_phancongcongviec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm công việc";
        $get_nhom = nhom::where('id_nhomtruong','=',auth::user()->id_sv);
        dd($get_nhom);
        $get_users = User::all();
        return view('congviec.add', compact('title','get_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $t = new congviec;
        // $t->ten_congviec = $request->ten_congviec;
        // $t->id_nhom = "0";
        // $t->created_at = $request->ngay_batdau;
        // $t->updated_at = $request->ngay_ketthuc;
        // $t->save();
        congviec::create([
            'ten_congviec' => $request->ten_congviec,
            'id_nhom' => 0,
            'created_at' => $request->ngay_batdau,
            'updated_at' => $request->ngay_ketthuc
        ]);
        $congviec= congviec::orderBy('id_congviec','DESC')->first();
        $l = new phancongcongviec;
        $l->id_sv = array(1,2);
        // $l->id_congviec = $request->id_congviec;
        $l->id_congviec = '6';
        $l->tien_do = "0";
        $l->trang_thai = "0";
        $l->ghi_chu = "abc";
        $l->save();
        return redirect(route('congviec.index'))->with(['success' => 'Thêm thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Cập nhật công việc";
        return view('congviec.edit', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cv)
    {
        $title = "Cập nhật công việc";
        $t= congviec::find($id_cv);
        $get_users = User::all();
        return view('congviec.edit', compact('title','t','get_users'));
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
    public function destroy($id_cv)
    {
        $t= congviec::find($id_cv);
        $l= phancongcongviec::find($id_cv);
        $l->delete();
        $t->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công !']);
    }
}
