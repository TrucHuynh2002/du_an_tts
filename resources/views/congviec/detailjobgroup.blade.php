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
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Trạng thái</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
              @foreach ($get_detailGroup as $item)
              <tr>
                <td>{{$i++}}</td>
                <td>
                  @foreach ($get_userJob as $items)
                      @if($item->id_congviec==$items_id_congviec)
                        {{$items->hoten_sv}},
                      @else
                        Chưa có người thực hiện
                      @endif
                      
                   @endforeach

                </td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td class="{{$item->trang_thai == 1 ? 'text-success':'text-danger'}}">{{$item->trang_thai == 1 ? 'Hoàn thành':'Chưa hoàn thành'}}</td>
                
              </tr> 
              
              @endforeach 
            </tbody>
        </table>
    </div>      
@endsection