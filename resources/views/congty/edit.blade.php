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
            <label for="ten_congty">Tên công ty</label>
            <input class="form-control" type="text" id="ten_congty" name="ten_congty" value="">
            @error('ten_congty')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa chỉ</label>
            <input class="form-control" type="text" id="dia_chi" name="dia_chi" value="">
            @error('dia_chi')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="img">Hình ảnh</label>
            <input class="form-control" type="file" id="img" name="img" value="">
            @error('img')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Thêm công ty</button>
    </form>                          
@endsection
