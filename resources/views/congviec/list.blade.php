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
                @can('get-thuctapsinh')
                <th></th>
                <th></th>
                <th></th>  
                @endcan
              </tr>
            </thead>
            @foreach($get_all as $cv)
            <tbody>                      
                <tr>
                  <td>{{$cv->id_congviec}}</td>
                  <td>{{$cv->ten_congviec}}</td>
                  <td>
                    {{$cv->ten_nhom}}
                  </td>
                  <td>
                    {{$cv->hoten_sv}}
                  </td>
                  <td>{{$cv->created_at}}</td>
                  <td>{{$cv->updated_at}}</td>
                
                  <td>{{$cv->tien_do}}%</td>
                  <td class="{{$cv->trang_thai == 0 ? 'text-danger' : 'text-success'}}">
                    {{$cv->trang_thai == 0 ? 'Chua hoan thanh' : 'Hoan thanh'}}
                  </td>
                  <td>{{$cv->ghi_chu}}</td>
                  @can('get-thuctapsinh')
                  <td>
                    <a href="congviec/detail"><button type="button" class="btn btn-outline-primary"><i class='bx bxs-detail'></i></button></a>
                  </td>
                  <td>
                    <a href=""><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                    {{-- {{route('congviec.edit',['congviec'=>$t->id_cv])}} --}}
                  </td>
                  <td>
                    <a href=""><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
                  </td>
                  @endcan
                </tr>                          
            </tbody>
            @endforeach
        </table>
    </div>      
@endsection