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
    <form action="{{route('nhom.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="ten_nhom">Tên nhóm</label>
            <input class="form-control" type="text" id="ten_nhom" name="ten_nhom">
            @error('ten_nhom')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="de_tai">Đề tài</label>
            <input class="form-control" type="text" id="de_tai" name="de_tai">
            @error('de_tai')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="nhom_truong">Nhóm trưởng</label>
            <select class="form-control" id="nhom_truong" name="id_nhomtruong">
                @foreach($get_users as $data)
                <option value="{{$data->id_sv}}">{{$data->hoten_sv}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_dot">ID đợt</label>
            <select class="form-control" id="id_dot" name="id_dot">
                @foreach($get_dotthuctap as $data)
                <option value="{{$data->id_dot}}">{{$data->ten_dot}}</option>
                @endforeach
            </select>
            @error('id_dot')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Thêm nhóm thực tập</button>
    </form>                          
@endsection
