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
            <label for="ten_congviec">Tên công việc</label>
            <input class="form-control" type="text" id="ten_congviec" name="ten_congviec" value="">
            @error('ten_congviec')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="nguoi_thuchien">Người thực hiện</label>
            <input class="form-control" type="text" id="nguoi_thuchien" name="nguoi_thuchien" value="">
            @error('nguoi_thuchien')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="ngay_batdau">Ngày bắt đầu</label>
            <input class="form-control" type="datetime" id="ngay_batdau" name="ngay_batdau" value="">
            @error('ngay_batdau')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="ngay_ketthuc">Ngày kết thúc</label>
            <input class="form-control" type="text" id="ngay_ketthuc" name="ngay_ketthuc" value="">
            @error('ngay_ketthuc')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Thêm công việc</button>
    </form>                          
@endsection
