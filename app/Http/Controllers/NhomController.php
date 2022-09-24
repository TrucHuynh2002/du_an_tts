<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhomRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\chitiet_nhom;
use App\Models\nhom;
use App\Models\dot_thuctap;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $get_dotthuctap = DB::table('dot_thuctap')->join('users','dot_thuctap.id_dot','=','users.id_dot')
                            // ->groupBy('dot_thuctap.id_dot')
                                ->where('users.id_chucvu','=',3)
                            ->get();
        $get_users = DB::table('users')->join('chitiet_nhom','users.id_sv','chitiet_nhom.id_sv')->get();
        
     
        return view('nhom.add', compact('title','get_dotthuctap','get_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NhomRequest $request)
    {
        $token = Str::random(60);
        $t = new nhom;
        $t->ten_nhom = $request->ten_nhom;
        $t->id_dot = $request->id_dot;
        $t->de_tai = $request->de_tai;
        $t->id_nhomtruong = $request->id_nhomtruong;
        $t->token =  $token;
        $t->save();
        return redirect()->back()->with(['success' => 'Thêm thành công !'])->with(['token' => $token]);
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
        $get_dotthuctap = DB::table('dot_thuctap')->join('users','dot_thuctap.id_dot','=','users.id_dot')
                            // ->groupBy('dot_thuctap.id_dot')
                                ->where('users.id_chucvu','=',3)
                            ->get();
        $get_users = DB::table('users')
                                        ->join('chitiet_nhom','users.id_sv','chitiet_nhom.id_sv')
                                        ->where('chitiet_nhom.id_nhom','=',$id_nhom)
                                        ->get();
        $t= nhom::find($id_nhom);

        $get_allMember = DB::table('chitiet_nhom')
                                                ->join('users','chitiet_nhom.id_sv','=','users.id_sv')
                                                ->where('chitiet_nhom.id_nhom','=',$id_nhom)->get();
        // $get_users = User::all();
        // $get_dotthuctap = dot_thuctap::all();
        return view('nhom.edit', compact('title','t','get_users','get_dotthuctap','get_allMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NhomRequest $request, $id_nhom)
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

    public function get_Dot(Request $request){
        $get_user = User::where('id_dot','=',$request->id_dot)->where('id_chucvu','=','2')->get();
    
        $output = '';
        $output .= '<option value="">Chưa có nhóm trưởng</option>';
       
        if($get_user){
            foreach($get_user as $user){
                $get_userGroup = chitiet_nhom::where('id_sv',$user->id_sv)->first();
                $get_userLeaderGroup = nhom::where('id_nhomtruong',$user->id_sv)->first();
                if(!isset($get_userGroup) && !$get_userLeaderGroup){
                    
                    $output.='<option value="'.$user->id_sv.'">'.$user->hoten_sv.'</option>';
                }
            }
        }
        
            
        return $output;
    }



    
}
