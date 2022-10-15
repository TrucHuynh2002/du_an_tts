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
    <form action="{{route('qtv.thuctapsinh.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="hoten_sv">Tên sinh viên</label>
            <input class="form-control" type="text" id="hoten_sv" name="hoten_sv" value="{{old('hoten_sv')}}">
            @error('hoten_sv')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="mssv">Mã số sinh viên</label>
            <input class="form-control" type="text" id="mssv" name="mssv" value="{{old('mssv')}}">
            @error('mssv')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" value="{{old('email')}}">
            @error('email')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        {{-- <div class="form-group">
            <label for="email">Mật khẩu</label>
            <input class="form-control" type="password" id="password" name="password" value="{{old('password')}}">
            @error('password')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div> --}}
        <div class="form-group">
            <label for="sdt">Số điện thoại</label>
            <input class="form-control" type="text" id="sdt" name="sdt" value="{{old('sdt')}}">
            @error('sdt')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="img">Hình ảnh</label>
            <input class="form-control" type="file" id="img" name="img" value="{{old('img')}}">
            @error('img')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa chỉ</label>
            <input class="form-control" type="text" id="dia_chi" name="dia_chi" value="{{old('dia_chi')}}">
            @error('dia_chi')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_dot">Đợt</label>
            <select class="form-control" id="id_dot" name="id_dot">
                <option value="">Chưa chọn đợt thực tập</option>
                @foreach($get_dotthuctap as $data_dotthuctap)
                <option value="{{$data_dotthuctap->id_dot}}">{{$data_dotthuctap->ten_dot}}</option>
                @endforeach
              </select>
            @error('id_dot')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_chucvu">Chức vụ</label>
            <select class="form-control" id="id_chucvu" name="id_chucvu">
                <option value="">Chưa chọn chức vụ</option>
                @foreach($get_chucvu as $data_chucvu)
                <option value="{{$data_chucvu->id_chucvu}}">{{$data_chucvu->ten_chucvu}}</option>
                @endforeach
              </select>
              
            @error('id_chucvu')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button style=" margin-left:10px; width: 1250px;" type="submit" class="btn btn-primary btn-block" name="submit">Thêm thực tập sinh</button>
    </form>                          
@endsection
