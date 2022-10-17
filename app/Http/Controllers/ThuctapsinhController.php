<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\dot_thuctap;
use App\Models\chucvu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\MailSendAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        // $data = User::where('id_chucvu','=',7)->paginate(4);
        if (Gate::allows('get-quantrivien')) {
            $data = User::whereNot(function ($query){
                $query->where('id_chucvu','=',5);
            })->get();
        }else {
            $data = User::where('id_chucvu','=',7)->where('id_dot','=',Auth::User()->id_dot)->get();
        }
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
        if (Gate::allows('get-quantrivien')) {
        $title = "Thêm thực tập sinh";
        $get_dotthuctap = dot_thuctap::all();
        $get_chucvu = chucvu::all();
        } else {
            return back();
        }
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
        if($request->id_dot){
            $request->validate([
                'hoten_sv'=> 'required',
                'mssv'=> 'required|unique:users',
                'email'=> 'required|unique:users|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                // 'password'=> 'required',
                'sdt'=> 'required|unique:users|min:10|max:12',
                'img'=> 'required',
                'dia_chi'=> 'required',
                'id_dot'=> 'required',
                'id_chucvu'=> 'required'
            ],[
                'hoten_sv.required' => 'Họ tên không được bỏ trống',
                'mssv.required' => 'Mã số sinh viên không được bỏ trống',
                'mssv.unique' => 'Mã số sinh viên đã tồn tại',
                'email.required' => 'Email không được bỏ trống',
                'email.unique' => 'Email đã tồn tại',
                'email.regex' => 'Email không đúng định dạng. Vd: abc@example.com',
                // 'password.required' => 'Mật khẩu không được bỏ trống',
                'sdt.required' => 'Số điện thoại không được bỏ trống',
                'sdt.unique' => 'Số điện thoại đã tồn tại',
                'sdt.min' => 'Số điện thoại phải từ 10 số',
                'sdt.max' => 'Số điện thoại không đúng',
                // 'sdt.number' => 'Số điện thoại không đúng',
                'img.required' => 'Ảnh không được bỏ trống',
                'dia_chi.required' => 'Địa chỉ không được bỏ trống',
                'id_dot.required' => 'Đợt thực tập không được bỏ trống',
                'id_chucvu.required' => 'Chức vụ không được bỏ trống'
            ]);
            $t->id_dot = $request->id_dot;
    }
        else{
            $request->validate([
                'hoten_sv'=> 'required',
                'mssv'=> 'required|unique:users',
                'email'=> 'required|unique:users|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                // 'password'=> 'required',
                'sdt'=> 'required|unique:users|min:10|max:12',
                'img'=> 'required',
                'dia_chi'=> 'required',
                
                'id_chucvu'=> 'required'
            ],[
                'hoten_sv.required' => 'Họ tên không được bỏ trống',
                'mssv.required' => 'Mã số sinh viên không được bỏ trống',
                'mssv.unique' => 'Mã số sinh viên đã tồn tại',
                'email.required' => 'Email không được bỏ trống',
                'email.unique' => 'Email đã tồn tại',
                'email.regex' => 'Email không đúng định dạng. Vd: abc@example.com',
                // 'password.required' => 'Mật khẩu không được bỏ trống',
                'sdt.required' => 'Số điện thoại không được bỏ trống',
                'sdt.unique' => 'Số điện thoại đã tồn tại',
                'sdt.min' => 'Số điện thoại phải từ 10 số',
                'sdt.max' => 'Số điện thoại không đúng',
                // 'sdt.number' => 'Số điện thoại không đúng',
                'img.required' => 'Ảnh không được bỏ trống',
                'dia_chi.required' => 'Địa chỉ không được bỏ trống',
                'id_chucvu.required' => 'Chức vụ không được bỏ trống'
            ]);
            
        }
 
        $t->hoten_sv = $request->hoten_sv;
        $t->mssv = $request->mssv;
        $t->email = $request->email;
        $mk = Str::random(10);
        $t->password = Hash::make($mk);
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
      
        $t->save();
        Mail::to($request->email)->send(new MailSendAccount($request->hoten_sv,$request->email,$mk));
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
        if (Gate::allows('get-quanli')) {
        $title = "Cập nhật thực tập sinh";
        $get_dotthuctap = dot_thuctap::all();
        $get_chucvu = chucvu::all();
        $t= User::find($id_sv);
        } else {
            return back();
        }
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
        $request->validate([
            'hoten_sv'=> 'required',
            'mssv'=> 'required|',
            'email'=> 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'sdt'=> 'required|min:10|max:12',
            // 'img'=> 'required',
            'dia_chi'=> 'required',
            'id_dot'=> 'required',
            'id_chucvu'=> 'required'
        ],[
            'hoten_sv.required' => 'Họ tên không được bỏ trống',
            'mssv.required' => 'Mã số sinh viên không được bỏ trống',
            // 'mssv.unique' => 'Mã số sinh viên đã tồn tại',
            'email.required' => 'Email không được bỏ trống',
            // 'email.unique' => 'Email đã tồn tại',
            'email.regex' => 'Email không đúng định dạng. Vd: abc@example.com',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            // 'sdt.unique' => 'Số điện thoại đã tồn tại',
            'sdt.min' => 'Số điện thoại phải từ 10 số',
            'sdt.max' => 'Số điện thoại không đúng',
            // 'sdt.number' => 'Số điện thoại không đúng',
            // 'img.required' => 'Ảnh không được bỏ trống',
            'dia_chi.required' => 'Địa chỉ không được bỏ trống',
            'id_dot.required' => 'Đợt thực tập không được bỏ trống',
            'id_chucvu.required' => 'Chức vụ không được bỏ trống'
        ]);
        $t= User::find($id_user);
        $t->hoten_sv = $request->hoten_sv;
        $t->mssv = $request->mssv;
        $t->email = $request->email;
        // $t->password = Hash::make($request->password);
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
        if (Gate::allows('get-quanli')) {
        $t= User::find($id_sv);
        $t->delete();
        } else {
            return back();
        }
        return redirect()->back()->with(['success' => 'Xóa thành công !']);
    }

    public function get_profile($id){
        $title = "Thông tin tài khoản";
        $get_profile = DB::table('users')->join('chucvu','users.id_chucvu','=','chucvu.id_chucvu')->where('users.id_sv','=',$id)->first();
        return view('taikhoan.thongtin', compact('title','get_profile'));
    }
}
