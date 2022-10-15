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
				<a class="dropdown-item" href="#">Tên đợt thực tập</a>
				<a class="dropdown-item" href="#">Ngày bắt đầu</a>
        <a class="dropdown-item" href="#">Ngày kết thúc </a>
			  
      
    		</div>
  </div>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th>ID đợt thực tập</th>
                <th>Tên đợt thực tập</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                @can('get-quantrivien')
                <th>Tên công ty</th>
                <th></th>
                <th></th>
                @endcan
              </tr>
            </thead>
            @foreach($data as $t)
            <tbody>                      
                <tr>
                  <td>{{$t->id_dot}}</td>
                  <td>{{$t->ten_dot}}</td>
                   <td>{{$t->created_at}}</td>
                  <td>{{$t->updated_at}}</td>
                 
                  @can('get-quantrivien')
                  <td>
                    @foreach($get_congty as $b)
                    {{$t->id_congty == $b->id_congty ? $b->ten_congty : ''}}
                    @endforeach
                  </td>
                  <td>
                    <a href="{{route('qtv.dotthuctap.edit',['dotthuctap'=>$t->id_dot])}}"><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                  </td>
                  <td>
                    <form action="{{route('qtv.dotthuctap.destroy',['dotthuctap' => $t->id_dot])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button>
                    </form>
                  </td>
                  @endcan
                </tr>                          
            </tbody>
            @endforeach
        </table>
    </div>      
@endsection