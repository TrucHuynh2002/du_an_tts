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
    <form action="{{route('qtv.chucvu.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ten_chucvu">Tên chức vụ</label>
            <input class="form-control" type="text" id="ten_chucvu" name="ten_chucvu">
            @error('ten_chucvu')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button id="button" type="submit" class="btn btn-primary btn-block"  name="submit">Thêm chức vụ</button>
    </form>                          
@endsection
