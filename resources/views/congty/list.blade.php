@extends('layout.layout_admin')
@section('title')
{{$title}}
@endsection       
    <!-- Begin Page Content -->
@section('main')

    <!-- Nội dung -->
      {{-- kiểm lỗi --}}
      @if(Session::has('success'))
      <div class="alert alert-success text-success">
          {{Session::get('success')}}
      </div>
      @endif
      <div style="padding: 5px;">
        <a href="{{route('qtv.congty.create')}}" class="btn btn-primary">Thêm công ty</a>
      </div>
        <table class="table" id="myTable">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Tên công ty</th>
                <th>Mã số thuế</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Người đại diện</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <?php $i=1?>
            @foreach($data as $t)
            <tbody>                      
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$t->ten_congty}}</td>
                  <td>{{$t->ma_sothue}}</td>
                  <td>{{$t->sdt}}</td>
                  <td>{{$t->dia_chi}}</td>
                  <td>{{$t->nguoi_daidien}}</td>
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
@endsection