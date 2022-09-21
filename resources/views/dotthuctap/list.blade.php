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
                <th>ID đợt thực tập</th>
                <th>Tên đợt thực tập</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Tên công ty</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            @foreach($data as $t)
            <tbody>                      
                <tr>
                  <td>{{$t->id_dot}}</td>
                  <td>{{$t->ten_dot}}</td>
                  <td>{{$t->updated_at}}</td>
                  <td>{{$t->created_at}}</td>
                  <td>{{$t->id_congty}}</td>
                  <td>
                    <a href="{{route('dotthuctap.edit',['dotthuctap'=>$t->id_dot])}}"><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                  </td>
                  <td>
                    <form action="{{route('dotthuctap.destroy',['dotthuctap' => $t->id_dot])}}" method="post">
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