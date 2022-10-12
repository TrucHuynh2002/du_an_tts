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
    <form action="{{route('dotthuctap.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ten_dot">Tên đợt thực tập</label>
            <input class="form-control" type="text" id="ten_dot" name="ten_dot">
            @error('ten_dot')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="ngay_batdau">Ngày bắt đầu</label>
            <input class="form-control" type="date" id="ngay_batdau" name="ngay_batdau">
            @error('ngay_batdau')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="ngay_ketthuc">Ngày kết thúc</label>
            <input class="form-control" type="date" id="ngay_ketthuc" name="ngay_ketthuc">
            @error('ngay_ketthuc')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_congty">Tên công ty</label>
            <select class="form-control" id="id_congty" name="id_congty">
                <option value="">Chưa chọn công ty</option>
                @foreach($get_congty as $t)
                <option value="{{$t->id_congty}}">{{$t->ten_congty}}</option>
                @endforeach
                
              </select>
            @error('id_congty')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" id="button" class="btn btn-primary btn-block" name="submit">Thêm đợt thực tập</button>
    </form>                          
@endsection
