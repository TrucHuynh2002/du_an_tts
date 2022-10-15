<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhomRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\chitiet_nhom;
use App\Models\nhom;
use App\Models\dot_thuctap;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate as FacadesGate;
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
            if (Gate::allows('get-quantrivien')) {
                $get_nhom = DB::table('nhom')
                ->join('users','nhom.id_nhomtruong','=','users.id_sv')
                ->join('dot_thuctap','dot_thuctap.id_dot','=','users.id_dot')
                ->get();
            }else {
                $get_nhom = DB::table('nhom')
                ->join('users','nhom.id_nhomtruong','=','users.id_sv')
                ->join('dot_thuctap','dot_thuctap.id_dot','=','users.id_dot')
                ->where('nhom.id_dot','=',Auth::user()->id_dot)
                ->get();
            }
            // dd($get_nhom);
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
        $get_dotthuctap = dot_thuctap::find(Auth::user()->id_dot)
        // ->groupBy('dot_thuctap.id_dot')
        ->get();

        // $get_dotthuctap = dot_thuctap::all();
        $get_users = DB::table('users')->join('chitiet_nhom','users.id_sv','chitiet_nhom.id_sv')
                                    ->get();
        
     
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
        if (FacadesGate::allows('get-quantrivien') || FacadesGate::allows('get-quanli')) {
        $token = Str::random(60);
        $t = new nhom; 
        $t->ten_nhom = $request->ten_nhom;
        $t->id_dot = $request->id_dot;
        $t->de_tai = $request->de_tai;
        $t->id_nhomtruong = $request->id_nhomtruong;
        $t->token =  $token;
        $t->save();
        if($request->id_nhomtruong){
           $get_nhom = nhom::orderBy('id_nhom','DESC')->first();
            chitiet_nhom::create([
                'id_nhom' => $get_nhom->id_nhom,
                'id_sv' => $request->id_nhomtruong
            ]);
        };
        } else {
           return abort(403);
        }
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
        $get_dotthuctap = DB::table('dot_thuctap')
                            // ->join('users','dot_thuctap.id_dot','=','users.id_dot')
                            // ->select('users.id_dot','dot_thuctap.ten_dot')
                            // ->groupBy('dot_thuctap.id_dot')->groupBy('dot_thuctap.ten_dot')
                            ->where('id_dot','=',Auth::user()->id_dot)
                            ->get();
        // dd($get_dotthuctap);
        $get_users = DB::table('users')
                                        ->join('chitiet_nhom','users.id_sv','chitiet_nhom.id_sv')
                                        ->where('chitiet_nhom.id_nhom','=',$id_nhom)
                                        ->get();
        $t= nhom::find($id_nhom);

        $get_allMember = DB::table('chitiet_nhom')
                                                ->join('users','chitiet_nhom.id_sv','=','users.id_sv')
                                                ->join('chucvu','users.id_chucvu','=','chucvu.id_chucvu')
                                                ->where('chitiet_nhom.id_nhom','=',$id_nhom)
                                                ->where('users.id_chucvu','=','7')
                                                ->get();
        $get_leaderGroup = nhom::where('id_nhom',$id_nhom);
        // $get_users = User::all();
        // $get_dotthuctap = dot_thuctap::all();
        return view('nhom.edit', compact('title','t','get_users','get_dotthuctap','get_allMember','get_leaderGroup'));
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
        chitiet_nhom::where('id_nhom','=',$id_nhom)->delete();
        return redirect()->back()->with(['success' => 'Xóa thành công !']);
    }

    public function get_Dot(Request $request){
        $get_user = User::where('id_dot','=',$request->id_dot)->where('id_chucvu','=',7)->get();
    
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

    public function delete_memberGroup(Request $request){
        // dd($request->id_sv);

        chitiet_nhom::where('id_sv','=',$request->id_sv)->where('id_nhom','=',$request->id_group)->delete();
        return redirect()->back();
    }

    public function detailtGroup(Request $request , $id){
        $nhom = nhom::find($id);
        $title = "Chi tiết nhóm ".$nhom->ten_nhom;
        $get_member = DB::table('chitiet_nhom')->join('users','chitiet_nhom.id_sv','=','users.id_sv')
                                        ->where('chitiet_nhom.id_nhom' ,'=',$id)->get();
        $get_leader = nhom::find($id);                                         
        return view('nhom.detailgroup',compact('title','get_member','get_leader'));
    }

    public function downloadQL(){
        $title = "Quản lý thư mục của nhóm";
        return view('nhom.download_ql', compact('title'));
    }

    public function downloadNT(){
        $title = "Quản lý thư mục của thành viên";
        return view('nhom.download_nt', compact('title'));
    }
}
