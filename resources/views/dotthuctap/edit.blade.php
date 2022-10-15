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
    <form action="{{route('qtv.dotthuctap.update',['dotthuctap' => $t->id_dot])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <h5>Tên đợt thực tập</h5>                       
            <input class="form-control" type="text" name="ten_dot" value="{{$t->ten_dot}}">
            @error('ten_dot')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <h5>Ngày bắt đầu</h5>                     
            <input type="date" name="ngay_batdau" class="form-control" value="{{ date_format(date_create($t->created_at), 'Y-m-d') }}" >
            @error('ngay_batdau')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <h5>Ngày kết thúc</h5>                       
            <input class="form-control" type="date" name="ngay_ketthuc" value="{{ date_format(date_create($t->updated_at), 'Y-m-d') }}">
            @error('ngay_ketthuc')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="id_congty">Tên công ty</label>
            <select class="form-control" id="id_congty" name="id_congty">
                @foreach($get_congty as $data)
                <option {{$t->id_congty == $data->id_congty ? 'selected' : ''}} value="{{$data->id_congty}}">{{$data->ten_congty}}</option>
                @endforeach
              </select>
            @error('id_congty')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Cập nhật đợt thực tập</button>
    </form>                          
@endsection
