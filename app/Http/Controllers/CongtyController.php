<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\congty;

class CongtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Gate::allows('get-quantrivien')) {
        $title = "Danh sách công ty";
        $data = congty::all();
        // } else {
        //     return abort(403);
        // }
        return view('congty.list', compact('title'),['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        // if (Gate::allows('get-quantrivien')) {
        $title = "Thêm công ty";
        // } else {
        //     return abort(403);
        // }
        return view('congty.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $t = new congty;
        $t->ten_congty = $request->ten_congty;
        $t->dia_chi = $request->dia_chi;
        // $t->img = $request->file('img');
        $get_image = $request->file('img');
        if ($get_image) {
                $get_name_image = $get_image->getClientOriginalName();
                $path = 'upload/';
                $name_image  = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                $t->img = $new_image;
        }
        $t->save();
        return redirect(route('congty.index'))->with(['success' => 'Thêm công ty thành công !']);
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
    public function edit($id_congty)
    {
        // if (Gate::allows('get-quantrivien')) {
        $title = "Cập nhật công ty";
        $t= congty::find($id_congty);
        // } else {
        //     return abort(403);
        // }
        return view('congty.edit',compact('t','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_congty)
    {
        $t= congty::find($id_congty);
        $t->ten_congty = $request->ten_congty;
        $t->dia_chi = $request->dia_chi;
        // $t->img = $request->file('img');
        $get_image = $request->file('img');
        if ($get_image) {
                $get_name_image = $get_image->getClientOriginalName();
                $path = 'upload/';
                $name_image  = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                $t->img = $new_image;
        }
        $t->save();
        return redirect(route('congty.index'))->with(['success' => 'Sửa thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_congty)
    {
        // if (Gate::allows('get-quantrivien')) {
        $congty= congty::find($id_congty);
        $congty->delete();
        // } else {
        //     return abort(403);
        // }
        return redirect()->back()->with(['success' => 'Xóa thành công !']);
        // return redirect(route('congty.index'));
    }
        
    
}
