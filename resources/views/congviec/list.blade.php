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
      @endif
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
            <tbody>                      
                <tr>
                  <td>1</td>
                  <td>2</td>
                  <td>3</td>
                  <td>4</td>
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
        </table>
    </div>      
@endsection