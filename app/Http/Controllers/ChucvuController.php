<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
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
    if (Gate::allows('get-quantrivien')) {
        $title = "Danh sách chức vụ";
        $data = chucvu::all();
        return view('chucvu.list', compact('title'),['data'=>$data]);
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
        $title = "Thêm chức vụ";
        return view('chucvu.add', compact('title'));
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
            'ten_chucvu'=> 'required|min:3|unique:chucvu'
        ],[
            'ten_chucvu.required' => 'Chức vụ không được bỏ trống',
            'ten_chucvu.min' => 'Tên chức vụ quá ngắn. Ít nhất 3 kí tự',
            'ten_chucvu.unique' => 'Tên chức vụ đã tồn tại'
        ]);
        $t = new chucvu;
        $t->ten_chucvu = $request->ten_chucvu;
        $t->save();   
        return redirect(route('qtv.chucvu.index'))->with(['success' => 'Thêm thành công !']);
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
        if (Gate::allows('get-quantrivien')) {
        $title = "Cập nhật chức vụ";
        $t= chucvu::find($id_chucvu);
        return view('chucvu.edit',compact('t','title'));
    } else {
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
    public function update(Request $request, $id_chucvu)
    {
        $request->validate([
            'ten_chucvu'=> 'required|min:3|unique:chucvu'
        ],[
            'ten_chucvu.required' => 'Chức vụ không được bỏ trống',
            'ten_chucvu.min' => 'Tên chức vụ quá ngắn. Ít nhất 3 kí tự',
            'ten_chucvu.unique' => 'Tên chức vụ đã tồn tại'
        ]);
        $t= chucvu::find($id_chucvu);
        $t->ten_chucvu = $request->ten_chucvu;
        $t->save();
        
        return redirect(route('qtv.chucvu.index'))->with(['success' => 'Sửa thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_chucvu)
    {
        if (Gate::allows('get-quantrivien')) {
        $t = chucvu::find($id_chucvu);
        $t->delete();
        
        return redirect(route('qtv.chucvu.index'))->with(['success' => 'Xóa thành công !']);
    } else {
        return back();
    }
    }
        
}
