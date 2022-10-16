<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StudentRequest;
use App\Models\dot_thuctap;
use App\Models\congty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DotthuctapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('get-quantrivien')) {
        $title = "Danh sách đợt thực tập";
        $data = dot_thuctap::all();
        $get_congty = congty::all();
        return view('dotthuctap.list', compact('title','get_congty','data'));
        } else {
           return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('get-quantrivien')) {
            $title = "Thêm đợt thực tập";
        $get_congty = congty::all();
        return view('dotthuctap.add', compact('title','get_congty'));
        } else {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ten_dot'=> 'required|unique:dot_thuctap',
            'ngay_batdau'=> 'required',
            'ngay_ketthuc'=> 'required',
            'id_congty'=> 'required'
        ],[
            'ten_dot.required' => 'Tên đợt không được bỏ trống',
            'ten_dot.unique' => 'Tên đợt đã tồn tại',
            'ngay_batdau.required' => 'Ngày bắt đầu không được bỏ trống',
            'ngay_ketthuc.required' => 'Ngày kết thúc không được bỏ trống',
            'id_congty.required' => 'Chưa chọn công ty'
        ]);
        $t = new dot_thuctap;
        $t->ten_dot = $request->ten_dot;
        $t->id_congty = $request->id_congty;
        $t->created_at = $request->ngay_batdau;
        $t->updated_at = $request->ngay_ketthuc;
        $t->save();
        return redirect(route('qtv.dotthuctap.index'))->with(['success' => 'Thêm thành công !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Cập nhật đợt thực tập";
        return view('dotthuctap.edit', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_dot)
    {
        if (Gate::allows('get-quantrivien')) {
        $title = "Cập nhật đợt thực tập";
        $get_congty= congty::all();
        $t= dot_thuctap::find($id_dot);
        return view('dotthuctap.edit',compact('t','title','get_congty'));
    }
        else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dot)
    {
        $request->validate([
            'ten_dot'=> 'required|unique:dot_thuctap',
            'ngay_batdau'=> 'required',
            'ngay_ketthuc'=> 'required',
            'id_congty'=> 'required'
        ],[
            'ten_dot.required' => 'Tên đợt không được bỏ trống',
            'ten_dot.unique' => 'Tên đợt đã tồn tại',
            'ngay_batdau.required' => 'Ngày bắt đầu không được bỏ trống',
            'ngay_ketthuc.required' => 'Ngày kết thúc không được bỏ trống',
            'id_congty.required' => 'Chưa chọn công ty'
        ]);
        $t= dot_thuctap::find($id_dot);
        $t->ten_dot = $request->ten_dot;
        $t->id_congty = $request->id_congty;
        $t->created_at = $request->ngay_batdau;
        $t->updated_at = $request->ngay_ketthuc;
        $t->save();
        return redirect(route('qtv.dotthuctap.index'))->with(['success' => 'Sửa thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dot)
    {
        if (Gate::allows('get-quantrivien')) {
        $dot_thuctap= dot_thuctap::find($id_dot);
        $dot_thuctap->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công !']);
    } else {
        return back();
    }
    }
}
