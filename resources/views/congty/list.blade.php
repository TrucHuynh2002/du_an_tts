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
                <th>STT công ty</th>
                <th>Tên công ty</th>
                <th>Địa chỉ</th>
                <th>Hình ảnh</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            {{$i = 1}}
            @foreach($data as $t)
            <tbody>                      
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$t->ten_congty}}</td>
                  <td>{{$t->dia_chi}}</td>
                  <td><img src="upload/{{$t->img}}" width="80px" height="80px"></td>
                  <td>
                    <a href="{{route('qtv.congty.edit',['congty'=>$t->id_congty])}}"><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                  </td>
                  <td>
                    <form action="{{route('qtv.congty.destroy',['congty' => $t->id_congty])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button>
                    </form>
                  </td> 
                </tr>                          
            </tbody>
            @endforeach
        </table>
    </div>      
@endsection