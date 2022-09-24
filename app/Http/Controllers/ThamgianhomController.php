<?php

namespace App\Http\Controllers;

use App\Models\chitiet_nhom;
use App\Models\nhom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThamgianhomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Thông tin tham gia nhóm";
        // $get_nhom = nhom::where('token',$request->token)->first();
        $get_nhom = DB::table('nhom')
                                    ->join('dot_thuctap','nhom.id_dot' ,'=','dot_thuctap.id_dot')
                                    ->join('users','nhom.id_nhomtruong','=','users.id_sv')
                                    ->where('nhom.token','=',$request->token)->first();
        $get_members = DB::table('chitiet_nhom')->join('users','chitiet_nhom.id_sv','=','users.id_sv')
                    ->select(
                        'chitiet_nhom.id_nhom as ct_idGroup',
                        'users.hoten_sv as member_name'
                    )
                    ->get();
    
        // dd($get_nhom);
       
        return view('thamgianhom.thongtinnhom', compact('title','get_nhom','get_members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $token = $request->token;
            $get_nhom = nhom::where('token',$token)->first();
            
            if($get_nhom){
               
               $checkMember = chitiet_nhom::where('id_nhom','=',$get_nhom->id_nhom)->where('id_sv','=',Auth::user()->id_sv);
               if(!$checkMember){
                    chitiet_nhom::create([
                        'id_nhom' => $get_nhom->id_nhom,
                        'id_sv' => Auth::user()->id_sv
                    ]);
               }else{
                 abort(403);
               }
            }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
