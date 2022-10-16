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
    <form action="{{route('congviec.update',['congviec' => $t->id_congviec])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ten_congviec">Tên công việc</label>
            <input class="form-control" type="text" id="ten_congviec" name="ten_congviec" value="{{$t->ten_congviec}}">
            @error('ten_congviec')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="nguoi_thuchien">Người thực hiện</label>
            <select class="form-control select-multiple" id="id_sv" name="id_sv[]" multiple>
                @foreach($get_users as $data)
                <option  value="{{$data->id_sv}}">{{$data->hoten_sv}}</option>
                @endforeach
            </select>
            @error('nguoi_thuchien')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="ngay_batdau">Ngày bắt đầu</label>
            <input class="form-control" type="date" id="ngay_batdau" name="ngay_batdau" value="{{ date_format(date_create($t->created_at), 'Y-m-d') }}">
            @error('ngay_batdau')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="ngay_ketthuc">Ngày kết thúc</label>
            <input class="form-control" type="date" id="ngay_ketthuc" name="ngay_ketthuc" value="{{ date_format(date_create($t->updated_at), 'Y-m-d') }}">
            @error('ngay_ketthuc')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>STT</th>
                    <th></th>
                    <th>Tên người thực hiện</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i=1?>
                @foreach ($get_userworks as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td><img src="{{asset('upload/'.$item->img)}}" alt="" width="120px" height="120px"></td>
                   
                 
                    <td>{{$item->hoten_sv}}</td>
                    <td class="text-danger"><a href="{{route('deleteuserwork',['id' => $item->id_sv])}}?id_cv={{$t->id_congviec}}">Xoá</a></td>
                  </tr>      
                @endforeach                   
                                      
                </tbody>
               
            </table>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Cập nhật công việc</button>
    </form>                          
@endsection
