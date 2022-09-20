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
            <h5>Tên đợt thực tập</h5>                       
            <input class="form-control" type="text" name="ten_dot" value="">
            @error('ten_dot')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <h5>Ngày bắt đầu</h5>                       
            <input class="form-control" type="datetime" name="ngay_batdau" value="">
            @error('ngay_batdau')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <h5>Ngày kết thúc</h5>                       
            <input class="form-control" type="datetime" name="ngay_ketthuc" value="">
            @error('ngay_ketthuc')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_congty">ID công ty</label>
            <select class="form-control" id="id_congty">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            @error('id_congty')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Cập nhật đợt thực tập</button>
    </form>                          
@endsection
