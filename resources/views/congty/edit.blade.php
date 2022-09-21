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
    <form action="{{route('congty.update',['congty' => $t->id_congty])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="ten_congty">Tên công ty</label>
            <input class="form-control" type="text" id="ten_congty" name="ten_congty" value="{{$t->ten_congty}}">
            @error('ten_congty')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="ten_congty">Dia chi</label>
            <input class="form-control" type="text" id="dia_chi" name="dia_chi" value="{{$t->dia_chi}}">
            @error('ten_congty')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="img">Hình ảnh</label>
            <input class="form-control" type="file" id="img" name="img" value="{{$t->img}}">
            <img src="{{asset('upload/'.$t->img)}}" width="80px" height="80px">
            @error('img')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Cập nhật công ty</button>
    </form>                          
@endsection
