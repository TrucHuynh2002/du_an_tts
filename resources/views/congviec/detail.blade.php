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
                <th>STT</th>
                <th>Ten cong viec</th>
                <th>Nguoi thuc hien</th>
                {{-- <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th> --}}
                <th>Tiến độ</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody> 
            @if (count($get_detailUser) > 0)
              @foreach ($get_detailUser as $item)
              <tr>
                <td></td>
                <td>{{$item->ten_congviec}}</td>
                <td>{{$item->hoten_sv}}</td>
                <td>{{$item->tien_do}}</td>
                <td>{{$item->trang_thai == 0 ? 'Chua Hoan thanh' : 'Hoan Thanh'}}</td>
              
                {{-- <td>
                  <a href=""><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                </td> --}}
                <td>
                  <a href=""><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
                </td>
              </tr>        
              @endforeach 
            @else
            <tr>
              <td colspan="6" align="center">Chua co nguoi thuc hien</td>
            </tr>
            @endif                    
                                
            </tbody>
        </table>
    </div>      
@endsection