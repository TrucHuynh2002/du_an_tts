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
    <form action="{{route('qtv.congty.update',['congty' => $t->id_congty])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="ten_congty">Tên công ty <span style="color: red">*</label>
            <input class="form-control" type="text" id="ten_congty" name="ten_congty" value="{{$t->ten_congty}}">
            @error('ten_congty')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="ma_sothue">Mã số thuế <span style="color: red">*</label>
            <input class="form-control" type="text" id="ma_sothue" name="ma_sothue" value="{{$t->ma_sothue}}">
            @error('ma_sothue')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa chỉ <span style="color: red">*</label>
            <input class="form-control" type="text" id="dia_chi" name="dia_chi" value="{{$t->dia_chi}}">
            @error('dia_chi')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="sdt">Số điện thoại <span style="color: red">*</label>
            <input class="form-control" type="text" id="sdt" name="sdt" value="{{$t->sdt}}">
            @error('sdt')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="nguoi_daidien">Người đại diện <span style="color: red">*</label>
            <input class="form-control" type="text" id="" name="nguoi_daidien" value="{{$t->nguoi_daidien}}">
            @error('nguoi_daidien')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Cập nhật công ty</button>
    </form>                          
@endsection
