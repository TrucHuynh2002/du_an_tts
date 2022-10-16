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
                <th>Tiến độ</th>
                <th>Trạng thái</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody> 
            @php
                $i = 0;
            @endphp
            @foreach ($detail_yourJob as $item)
                
          
              <tr>
                <td>{{$i++}}</td>
                <td>{{$item->ten_congviec}}</td>
                <td>{{$item->hoten_sv}}</td>
                @if ($item->updated_at < $time)
                <td>{{$item->tien_do}}</td>
                @else
                <td>
                  <form action="{{route('updateJob',['id' => $item->id_congviec])}}" method="post">
                      @csrf
                      <input type="number"  value="{{$item->tien_do}}" name="tien_do" style="width: 65px;padding:4px"> <strong>%</strong>
                  </form>
              </td>
                @endif
                <td class="{{$item->trang_thai == 1 ? 'text-success' : 'text-danger'}}">{{$item->trang_thai == 1 ? 'Hoàn thành' : 'Chưa hoàn thành'}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                {{-- <td>
                  <a href=""><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                </td> --}}
                {{-- <td>
                  <a href=""><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
                </td> --}}
              </tr>        
            @endforeach
           
            <tr>
              <td colspan="9" align="center">Chưa có người thực hiện</td>
            </tr>
                        
                                
            </tbody>
        </table>
    </div>      
@endsection