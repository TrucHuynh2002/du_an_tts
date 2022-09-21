@extends('layout.layout_admin')
@section('title')
{{$title}}
@endsection       
    <!-- Begin Page Content -->
@section('main')

    <!-- Nội dung -->
    <div class="row">
      {{-- kiểm lỗi --}}
      @if(Session::has('success'))
      <div class="alert alert-success text-success">
          {{Session::get('success')}}
      </div>
      @endif
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th>ID sinh viên</th>
                <th></th>
                <th>Tên sinh viên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Đợt</th>
                <th>Chức vụ</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            @foreach($data as $t)
            <tbody>                      
                <tr>
                  <td>{{$t->id_sv}}</td>
                  <td><img src="upload/{{$t->img}}" width="80px" height="80px"></td>
                  <td>{{$t->hoten_sv}}</td>
                  <td>{{$t->email}}</td>
                  <td>{{$t->sdt}}</td>
                  <td>{{$t->dia_chi}}</td>
                  <td>
                  @foreach($get_dotthuctap as $data)
                  {{$t->id_dot == $data->id_dot ? $data->ten_dot : ''}}
                  @endforeach
                  </td>
                  <td>
                  @foreach($get_chucvu as $data)
                  {{$t->id_chucvu == $data->id_chucvu ? $data->ten_chucvu : ''}}
                  @endforeach
                  </td>
                  <td>
                    <a href="{{route('thuctapsinh.edit',['thuctapsinh'=>$t->id_sv])}}"><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                  </td>
                  <td>
                    <form action="{{route('thuctapsinh.destroy',['thuctapsinh' => $t->id_sv])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button>
                    </form>
                  </td>
                </tr>                          
            </tbody>
            @endforeach
        </table>
    </div>  
@endsection