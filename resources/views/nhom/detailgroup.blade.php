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
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Chức vụ</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $i = 1;
              @endphp
              @foreach ($get_member as $item)
              <tr>
                <td>{{$i++}}</td>
                <td>
                  <img src="{{asset('upload/'.$item->img)}}" alt="{{$item->hoten_sv}}" width="80px" height="80px">
                </td>
  
                <td><a href="{{route('get_profile',['id'=>$item->id_sv])}}">{{$item->hoten_sv}}</a></td>
                <td>{{$item->id_sv == $get_leader->id_nhomtruong ? 'Nhóm trưởng' : 'Thành viên'}}</td>
              </tr> 
              @endforeach 
            </tbody>
        </table>
    </div>      
@endsection