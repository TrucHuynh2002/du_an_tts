@extends('layout.layout_admin')
@section('title')
{{$title}}
@endsection       
    <!-- Begin Page Content -->
@section('main')
  <div>
    <form>
      <select  style=" margin-top:2px;width:120px" class="form-control">
        <option >Đợt</option>
        <option >Trưởng nhóm</option>
        <option >Tên đề tài</option>
        <option >Trạng thái</option>
      </select>
    </form>
  </div>
    <!-- Nội dung -->
      {{-- kiểm lỗi --}}
      @if(Session::has('success'))
      <div class="alert alert-success text-success">
          {{Session::get('success')}}
      </div>
      @endif
      <div style="margin: 20px 0px 20px 30px;">
        
      </div>
        <table class="table" id="myTable">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>Tên nhóm thực tập</th>
                <th>Trưởng nhóm</th>
                <th>Đợt thực tập</th>
                <th>Đề tài</th>
                
                @cannot('get-thuctapsinh')
                <th>File</th>
                @endcan
                
                @can('get-quanli')
                <th>Link tham gia nhóm</th>
                <th></th>
                <th></th>
                @endcan
                <th></th>
              </tr>
            </thead>
            @php
                $i=1;
            @endphp
            @foreach($get_nhom as $t)
            <tbody>       
         
                <tr>
                  <td>{{$i++}}</td>
                  <td><a href="{{route('detailtGroup',['id'=>$t->id_nhom])}}">{{$t->ten_nhom}}</a></td>
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
                                  
                  @cannot('get-thuctapsinh')
                  @if ($get_file)
                  <td><a href="{{route('downloadFile',['id'=>$t->id])}}" class="link">{{$get_file->ten_file}}</a></td>
                  @else
                      
                  @endif
                <td></td>
                @endcan
                  @can('get-quanli')
                  <td><a href="{{route('thamgianhom.index',['token' => $t->token])}}">{{route('thamgianhom.index',['token' => $t->token])}}</a></td>
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
                  @endcan
                </tr>         
              </form>               
                               
            </tbody>
            @endforeach
        </table>   
@endsection