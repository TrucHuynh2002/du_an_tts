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
      <div style="margin: 20px 0px 20px 30px;"class="dropdown">
    <button style="   box-shadow: 0px 0px 17px 2px rgba(91, 87, 87, 0.8);
   "  type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
      Tìm theo
    </button>
    		<div  style=" margin-top:2px; background-color:white; " class="dropdown-menu">
				<a class="dropdown-item" href="#">Mã số sinh viên</a>
				<a class="dropdown-item" href="#">Ngày bắt đầu</a>
        <a class="dropdown-item" href="#">Ngày kết thúc</a>
        <a class="dropdown-item" href="#">Tiến độ</a>
        <a class="dropdown-item" href="#">Trạng thái</a>
        <a class="dropdown-item" href="#">Hoàn thành</a>


			  
      
    		</div>
  </div>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th>ID công việc</th>
                <th>Tên công việc</th>
                <th>Nhóm</th>
                <th>Người thực hiện</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Tiến độ</th>
                <th>Trạng thái</th>
                <th>Hoàn thành</th>
                <th></th>
                <th></th>
                <th></th>  
                <th></th>              
              </tr>
            </thead>
            @foreach($get_congviec as $t)
            <tbody>                      
                <tr>
                  <td>{{$t->id_congviec}}</td>
                  <td>{{$t->ten_congviec}}</td>
                  <td>{{$t->id_nhom}}</td>
                  {{-- <td>@foreach($get_phancongcongviec as $data)
                    {{$t->id_congviec == $data->id_sv ? $data->hoten_sv : ''}}
                    @endforeach</td> --}}
                  <td>5</td>
                  <td>6</td>
                  <td>7</td>
                  <td>8</td>
                  <td>9</td>
                  <td>
                    <a href=""><button type="button" class="btn btn-outline-primary"><i class='bx bxs-detail'></i></button></a>
                  </td>
                  <td>
                    <a href=""><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                  </td>
                  <td>
                    <a href=""><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
                  </td>
                </tr>                          
            </tbody>
            @endforeach
        </table>
    </div>      
@endsection