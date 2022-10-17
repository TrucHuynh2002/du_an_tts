@extends('layout.layout_admin')
@section('title')
{{$title}}
@endsection       
    <!-- Begin Page Content -->
@section('main')

    {{-- kiểm lỗi --}}
    @if(Session::has('success'))
    <div class="alert alert-success text-success">
        {{Session::get('success')}}
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu không hợp lệ. Vui lòng kiểm tra lại !</div>
    @endif

    <!-- Nội dung -->
    <form action="{{route('thuctapsinh.update',['thuctapsinh' => $t->id_sv])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="hoten_sv">Tên sinh viên</label>
            <input class="form-control" type="text" id="hoten_sv" name="hoten_sv" value="{{$t->hoten_sv}}">
            @error('hoten_sv')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="mssv">Mã số sinh viên</label>
            <input class="form-control" type="text" id="mssv" name="mssv" value="{{$t->mssv}}">
            @error('mssv')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" value="{{$t->email}}">
            @error('email')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        {{-- <div class="form-group">
            <label for="email">Mật khẩu</label>
            <input class="form-control" type="password" id="password" name="password" value="{{$t->password}}">
            @error('password')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div> --}}
        <div class="form-group">
            <label for="sdt">Số điện thoại</label>
            <input class="form-control" type="text" id="sdt" name="sdt" value="{{$t->sdt}}">
            @error('sdt')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="img">Hình ảnh</label>
            <input class="form-control" type="file" id="img" name="img" value="{{$t->img}}">
            @error('img')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa chỉ</label>
            <input class="form-control" type="text" id="dia_chi" name="dia_chi" value="{{$t->dia_chi}}">
            @error('dia_chi')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_chucvu">Chức vụ</label>
            <select class="form-control" id="id_chucvu" name="id_chucvu">
                @foreach($get_chucvu as $data)
                <option {{$t->id_chucvu == $data->id_chucvu ? 'selected' : ''}} value="{{$data->id_chucvu}}">{{$data->ten_chucvu}}</option>
                @endforeach
              </select>
            @error('id_chucvu')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_dot">Đợt</label>
            <select class="form-control" id="id_dot" name="id_dot">
                @foreach($get_dotthuctap as $data)
                <option {{$t->id_dot == $data->id_dot ? 'selected' : ''}} value="{{$data->id_dot}}">{{$data->ten_dot}}</option>
                @endforeach
              </select>
            @error('id_dot')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary btn-block" name="submit">Cập nhật</button>
    </form>                          
@endsection

