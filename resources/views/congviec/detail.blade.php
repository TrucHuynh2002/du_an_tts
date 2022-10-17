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
                <th>Tên công việc</th>
                <th>Người thực hiện</th>
                {{-- <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th> --}}
                <th>Tiến độ</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
            @if (count($get_detailUser) > 0)
              @foreach ($get_detailUser as $item)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$item->ten_congviec}}</td>
                <td>{{$item->hoten_sv}}</td>
                <td>{{$item->tien_do}}</td>
                <td class="{{$item->trang_thai == 0 ? 'text-danger' : 'text-success'}}">{{$item->trang_thai == 0 ? 'Chưa hoàn thành' : 'Hoàn thành'}}</td>
              
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
              <td colspan="6" align="center">Chưa có người thực hiện</td>
            </tr>
            @endif                    
                                
            </tbody>
        </table>
    </div>      
@endsection