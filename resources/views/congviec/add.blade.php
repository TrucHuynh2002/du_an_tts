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
    <form action="{{route('congviec.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_nhom">Nhóm</label>
            <input class="form-control" type="text" id="ten_nhom" name="ten_nhom" disabled value="{{$get_nhom->ten_nhom}}">
            <input class="form-control" type="text" id="id_nhom" name="id_nhom" hidden value="{{$get_nhom->id_nhom}}">
        </div>
        <div class="form-group">
            <label for="ten_congviec">Tên công việc</label>
            <input class="form-control" type="text" id="ten_congviec" name="ten_congviec">
            @error('ten_congviec')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="nguoi_thuchien">Người thực hiện</label>
            <select class="form-control select-multiple" id="id_sv" name="id_sv[]" multiple onChange="alert('chi so index select da chon:'+options[selectIndex].value);">
                @foreach($get_users as $data)
                <option value="{{$data->id_sv}}">{{$data->hoten_sv}}</option>
                @endforeach
            </select>
            @error('nguoi_thuchien')
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
        <button type="submit" class="btn btn-primary btn-block" name="submit">Thêm công việc</button>
    </form>                          
@endsection
