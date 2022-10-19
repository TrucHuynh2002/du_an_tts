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
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>            
                <th>Trạng thái</th>                
                @can('get-thuctapsinh')
                <th></th>
                <th></th>
                <th></th>  
                @endcan
              </tr>
            </thead>
            <tbody>
              @if ($get_nhom)
                @foreach($get_congviec as $cv)
                  
                      @if ($cv->id_nhom == $get_nhom->id_nhom)
                        <tr>
                          <td>{{$cv->id_congviec}}</td>
                          <td>{{$cv->ten_congviec}}</td>
                        
                      
                          <td>{{$cv->ngay_batdau}}</td>
                          <td>{{$cv->ngay_ketthuc}}</td>
                        
                          
                          <td class="{{$cv->trang_thai == 0 ? 'text-danger' : 'text-success'}}">
                            {{$cv->trang_thai == 0 ? 'Chưa hoàn thành' : 'Hoàn thành'}}
                          </td>
                      
                          {{-- @can('get-thuctapsinh') --}}
                          <td>
                            <a href="xemcongviec?id_cv={{$cv->id_congviec}}">Xem chi tiết</a>
                          </td>
                          <td>
                            <a href="{{route('congviec.edit',['congviec'=>$cv->id_congviec])}}?id_nhom={{$cv->id_nhom}}"><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                          </td>
                          <td>
                            <form action="{{route('congviec.destroy',['congviec'=>$cv->id_congviec])}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button>
                            </form>
                            
                          </td>
                          {{-- @endcan --}}
                        </tr>     
                                          
                      @endif
                                    
                    
                @endforeach
              @else
                <tr>
                  <td colspan="8" align="center">Bạn chưa có nhóm</td>
                </tr>
              @endif   
            </tbody>
        </table>
    </div>      
@endsection