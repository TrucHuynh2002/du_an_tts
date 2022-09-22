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
    <form action="{{route('nhom.update',['nhom' => $t->id_nhom])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="ten_nhom">Tên nhóm</label>
            <input class="form-control" type="text" id="ten_nhom" name="ten_nhom" value="{{$t->ten_nhom}}">
            @error('ten_nhom')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="de_tai">Đề tài</label>
            <input class="form-control" type="text" id="de_tai" name="de_tai" value="{{$t->de_tai}}">
            @error('de_tai')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="nhom_truong">Nhóm trưởng</label>
            <select class="form-control" id="nhom_truong" name="id_nhomtruong" value="">
                @foreach($get_users as $data)
                <option {{$t->id_nhomtruong == $data->id_sv ? 'selected' : ''}} value="{{$data->id_sv}}">{{$data->hoten_sv}}</option>
                @endforeach
            </select>
            @error('nhom_truong')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="id_dot">ID đợt</label>
            <select class="form-control" id="id_dot" name="id_dot">
                @foreach($get_dotthuctap as $data)
                <option {{$t->id_dot == $data->id_dot ? 'selected' : ''}} value="{{$data->id_dot}}">{{$data->ten_dot}}</option>
                @endforeach
              </select>
            @error('id_dot')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Sửa nhóm thực tập</button>
    </form>                          
@endsection
