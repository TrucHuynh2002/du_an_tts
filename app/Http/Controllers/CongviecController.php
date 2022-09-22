<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nhom;
use App\Models\congviec;
use App\Models\phancongcongviec;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $get_all = DB::table('congviec')->join('phancong_congviec','congviec.id_congviec','=','phancong_congviec.id_congviec')
                                        ->join('nhom','nhom.id_nhom','congviec.id_nhom')
                                        ->join('users','users.id_sv','phancong_congviec.id_sv')
                                        ->select('congviec.ten_congviec',
                                                'congviec.id_congviec',
                                                'nhom.ten_nhom',
                                                'users.hoten_sv',
                                                'congviec.created_at',
                                                'congviec.updated_at',
                                                'phancong_congviec.tien_do',
                                                'phancong_congviec.trang_thai',
                                                'phancong_congviec.ghi_chu'
                                                )
                                        ->get();
                                        
        return view('congviec.list', compact('title','get_nhom','get_congviec','get_phancongcongviec','get_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm công việc";
        $get_nhom = nhom::where('id_nhomtruong','=',Auth::user()->id_sv)->first();
        $get_users = User::all();
        
        return view('congviec.add', compact('title','get_users','get_nhom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id_sv){
            congviec::create([
                'ten_congviec' => $request->ten_congviec,
                'id_nhom' => $request->id_nhom,
                'created_at' => $request->ngay_batdau,
                'updated_at' => $request->ngay_ketthuc
            ]);
            $congviec= congviec::orderBy('id_congviec','DESC')->first();
        
            phancongcongviec::create([
                'id_sv' => $request->id_sv,
                'id_congviec' => $congviec->id_congviec,
                'tien_do' => 0,
                'trang_thai' => 0,
            ]);
        }
        congviec::create([
            'ten_congviec' => $request->ten_congviec,
            'id_nhom' => $request->id_nhom,
            'created_at' => $request->ngay_batdau,
            'updated_at' => $request->ngay_ketthuc
        ]);
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
