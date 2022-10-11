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
      <div style="margin: 20px 0px 20px 30px;"class="dropdown">
    <button style="   box-shadow: 0px 0px 17px 2px rgba(91, 87, 87, 0.8);
   "  type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
      Tìm theo
    </button>
    		<div  style=" margin-top:2px; background-color:white; " class="dropdown-menu">
				<a class="dropdown-item" href="#">Tên nhóm</a>
				<a class="dropdown-item" href="#">Đợt thực tập</a>
			  <a class="dropdown-item" href="#">Đề tài</a>
      
    		</div>
  </div>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th>ID nhóm thực tập</th>
                <th>Tên nhóm thực tập</th>
                <th>Trưởng nhóm</th>
                <th>Đợt thực tập</th>
                <th>Đề tài</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            @foreach($get_nhom as $t)
            <tbody>                      
                <tr>
                  <td>{{$t->id_nhom}}</td>
                  <td>{{$t->ten_nhom}}</td>
                  <td>
                  @foreach($get_users as $data)
                  {{$t->id_nhomtruong == $data->id_sv ? $data->hoten_sv : ''}}
                  @endforeach
                  </td>
                  <td>
                    @foreach($get_dotthuctap as $data)
                    {{$t->id_dot == $data->id_dot ? $data->ten_dot : ''}}
                    @endforeach
                    </td>
                  <td>{{$t->de_tai}}</td>
                  
                  <td>
                    <a href="{{route('detailtGroup',['id'=>$t->id_nhom])}}">Chi tiết nhóm</a>
                  </td>
                  <td>
                    <a href="{{route('detailtJobGroup',['id'=>$t->id_nhom])}}">Tiến độ làm việc</a>
                  </td>
                  <td>
                    <a href="{{route('nhom.edit',['nhom'=>$t->id_nhom])}}"><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                  </td>
                  <td>
                    <form action="{{route('nhom.destroy',['nhom' => $t->id_nhom])}}" method="post">
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