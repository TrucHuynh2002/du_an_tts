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
      <div class="alert alert-success">
          {{Session::get('success')}}
      </div>
      @endif<div style="margin: 20px 0px 20px 30px;"class="dropdown">
    <button style="   box-shadow: 0px 0px 17px 2px rgba(91, 87, 87, 0.8);
   "  type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
      Tìm theo
    </button>
    		<div  style=" margin-top:2px; background-color:white; " class="dropdown-menu">
				<a class="dropdown-item" href="#">Mã số sinh viên</a>
				<a class="dropdown-item" href="#">Tên sinh viên</a>
        <a class="dropdown-item" href="#">Đợt thực tập</a>
        <a class="dropdown-item" href="#">Chức vụ</a>
			  
      
    		</div>
  </div>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th>ID sinh viên</th>
                <th>Tên sinh viên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>ID đợt</th>
                <th>ID chức vụ</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>                      
                <tr>
                  <td>1</td>
                  <td>2</td>
                  <td>3</td>
                  <td>4</td>
                  <td>5</td>
                  <td>6</td>
                  <td>7</td>
                  <td>
                    <a href=""><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                  </td>
                  <td>
                    <a href=""><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
                  </td>
                </tr>                          
            </tbody>
        </table>
    </div>  
@endsection