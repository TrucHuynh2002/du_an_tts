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
      <div class="alert alert-success">
          {{Session::get('success')}}
      </div>
      
      @endif
      <div style="margin: 20px 0px 20px 30px;"class="dropdown">
    <button style="   box-shadow: 0px 0px 17px 2px rgba(91, 87, 87, 0.8);
   "  type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
      Tìm theo
    </button>
    		<div  style=" margin-top:2px; background-color:white; " class="dropdown-menu">
				<a class="dropdown-item" href="#">Mã chức vụ</a>
				<a class="dropdown-item" href="#">Tên chức vụ</a>
			  
      
    		</div>
  </div>
        <table class="table">
          
            <thead class="thead-light">
              <tr>
                <th>ID chức vụ</th>
                <th>Tên chức vụ</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            @foreach($data as $t)
            <tbody>                      
                <tr>
                  <td>{{$t->id_chucvu}}</td>
                  <td>{{$t->ten_chucvu}}</td>
                  <td>
                    <a href="{{route('chucvu.edit',['chucvu'=>$t->id_chucvu])}}"><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                  </td>
                  <td>
                    <form action="{{route('chucvu.destroy',['chucvu' => $t->id_chucvu])}}" method="post">
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