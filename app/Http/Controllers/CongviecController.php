<?php

namespace App\Http\Controllers;

use App\Models\chitiet_nhom;
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
        $get_nhom = chitiet_nhom::where('id_sv','=',Auth::user()->id_sv)->first();
        $get_congviec = congviec::all();
        // $get_phancongcongviec = phancongcongviec::all();
        // $get_all = DB::table('congviec')->join('phancong_congviec','congviec.id_congviec','=','phancong_congviec.id_congviec')
        //                                 ->join('nhom','nhom.id_nhom','congviec.id_nhom')
        //                                 ->join('users','users.id_sv','phancong_congviec.id_sv')
        //                                 ->select('congviec.ten_congviec',
        //                                         'congviec.id_congviec',
        //                                         'nhom.ten_nhom',
        //                                         'users.hoten_sv',
        //                                         'congviec.created_at',
        //                                         'congviec.updated_at',
        //                                         'phancong_congviec.tien_do',
        //                                         'phancong_congviec.trang_thai',
        //                                         'phancong_congviec.ghi_chu'
        //                                         )
        //                                 ->get();

        // $get_all = DB::table('nhom')->join('congviec','congviec.id_nhom','=','nhom.id_nhom')
        //                                 ->join('chitiet_nhom','nhom.id_nhom','=','chitiet_nhom.id_nhom')
        //                                 ->get();
                                        
                                  
        return view('congviec.list', compact('title','get_nhom','get_congviec'));
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
        $get_users = DB::table('users')
            ->join('chitiet_nhom','users.id_sv','=','chitiet_nhom.id_sv')
            ->get();
        
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
        
        foreach($request->id_sv as $id_sv){
            phancongcongviec::create([
                'id_sv' => $id_sv,
                'id_congviec' => $congviec->id_congviec,
                'tien_do' => 0,
                'trang_thai' => 0,
                'ghi_chu' => ''
            ]);
        }
        }
        else{
            congviec::create([
                'ten_congviec' => $request->ten_congviec,
                'id_nhom' => $request->id_nhom,
                'created_at' => $request->ngay_batdau,
                'updated_at' => $request->ngay_ketthuc
            ]);
        }   
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
    public function edit($id_cv, Request $request)
    {
        $title = "Cập nhật công việc";
        $t= congviec::find($id_cv);
        $get_users = DB::table('chitiet_nhom')->join('users','chitiet_nhom.id_sv','=','users.id_sv')->where('chitiet_nhom.id_nhom','=',$request->id_nhom)->get();
        // dd($get_users);
        // $get_userworks = phancongcongviec::where('id_congviec','=',$id_cv)->all();
        $get_userworks = DB::table('phancong_congviec')->join('users','phancong_congviec.id_sv','=','users.id_sv')
                                                    ->where('phancong_congviec.id_congviec','=',$id_cv)    
                                                    ->get();
        return view('congviec.edit', compact('title','t','get_users','get_userworks'));
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
        
        // dd($find_idcv);
        if($request->id_sv){
            $find_idcv = phancongcongviec::where('id_congviec','=',$id)->get();
            foreach($request->id_sv as $id_sv){
                foreach ($find_idcv as $id_cv) {
                    if(!$id_sv == $id_cv->id_sv){
                        phancongcongviec::create([
                            'id_sv' => $id_sv,
                            'id_congviec' => $id,
                            'tien_do' => 0,
                            'trang_thai' => 0,
                            'ghi_chu' => ''
                        ]);
                    }
                }
            }
        }

        $cv = congviec::find($id);
        $cv->ten_congviec = $request->ten_congviec;
        $cv->created_at = $request->ngay_batdau;
        $cv->updated_at = $request->ngay_ketthuc;
        $cv->save();
        return redirect()->back()->with('message','Cap nhat thanh cong');
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

    public function detailt(Request $request){
        $title = "Chi tiet cong viec";
        // dd($request->id_cv);
        $get_detailUser = DB::table('phancong_congviec')->join('users','phancong_congviec.id_sv','=','users.id_sv')
                                                        ->join('congviec','congviec.id_congviec','=','phancong_congviec.id_congviec')
                        ->where('phancong_congviec.id_congviec','=',$request->id_cv)->get();
        // dd($get_detailUser);
        return view('congviec.detail',compact('title','get_detailUser'));
    }
    public function detailtJobGroup(Request $request , $id){
        $nhom = nhom::find($id);
        $title = "tiến độ công việc của nhóm ".$nhom->ten_nhom;
        $get_detailGroup = congviec::where('id_nhom','=',$id)->get();
        $get_userJob = DB::table('phancong_congviec')->join('users','phancong_congviec.id_sv','=','users.id_sv')->get();
                                                    
        return view('congviec.detailjobgroup',compact('title','get_detailGroup','get_userJob'));
    }
    public function deleteUserWork($id,Request $request){
        $find_id = phancongcongviec::where('id_sv','=',$id)->where('id_congviec','=',$request->id_cv)->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công !']);
    }

    public function detailJob(){
        $title = "Chi tiết công việc của bạn";
        $detail_yourJob = DB::table('congviec')->join('phancong_congviec','congviec.id_congviec','=','phancong_congviec.id_congviec')
                                                ->join('users', 'phancong_congviec.id_sv' ,'=', 'users.id_sv')
                                                ->select(
                                                    'congviec.ten_congviec',
                                                    'users.hoten_sv',
                                                    'phancong_congviec.tien_do',
                                                    'phancong_congviec.trang_thai',
                                                    'congviec.created_at',
                                                    'congviec.updated_at',
                                                    'congviec.id_congviec'
                                                    )
                                                ->where('phancong_congviec.id_sv' ,'=' ,Auth::user()->id_sv)
                                                
                                                ->get();
        // dd($detail_yourJob);
        return view('congviec.detail_job',compact('title','detail_yourJob'));
    }
    public function update_job($id, Request $request){
        $title = "Update iten do";
        $find_job = phancongcongviec::where('id_congviec','=',$id)->where('id_sv','=',Auth::user()->id_sv)->first();
        // dd($find_job);
        if($find_job) {
            if($find_job->id_sv == Auth::user()->id_sv){
                $find_job->tien_do = $request->tien_do;
                if($request->tien_do >=100){
                    $find_job->trang_thai = 1;
                    $congviec = congviec::find($id);
                    $congviec->trang_thai = 1;
                    $congviec->save();
                }
            }
            $find_job->save();
        }else{
            $alert =  "<script>alert('Ban khong co quyen cap nhat cong viec nay')</script>";
            return redirect()->back()->with(['alert' => $alert]);
        }

        return redirect()->back();
    }
}
