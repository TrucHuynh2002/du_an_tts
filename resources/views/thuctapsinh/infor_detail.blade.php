@extends('layout.layout_admin')
@section('title')
{{$title}}
@endsection       
    <!-- Begin Page Content -->
@section('main')

    {{-- kiểm lỗi --}}
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu không hợp lệ. Vui lòng kiểm tra lại !</div>
    @endif

    <!-- Nội dung -->
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="hoten_sv">Tên sinh viên</label>
            <input class="form-control" type="text" id="hoten_sv" name="hoten_sv">
            @error('hoten_sv')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email">
            @error('email')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="sdt">Số điện thoại</label>
            <input class="form-control" type="text" id="sdt" name="sdt">
            @error('sdt')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="img">Hình ảnh</label>
            <input class="form-control" type="file" id="img" name="img">
            @error('img')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa chỉ</label>
            <input class="form-control" type="text" id="dia_chi" name="dia_chi">
            @error('dia_chi')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_dot">ID đợt</label>
            <select class="form-control" id="id_dot">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            @error('id_dot')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_chucvu">ID chức vụ</label>
            <select class="form-control" id="id_chucvu">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            @error('id_chucvu')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Thêm thực tập sinh</button>
    </form>                          
@endsection
