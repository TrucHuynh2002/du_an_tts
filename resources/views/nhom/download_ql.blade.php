@extends('layout.layout_admin')
@section('title')
{{$title}}
@endsection       
    <!-- Begin Page Content -->
@section('main')

    {{-- kiểm lỗi --}}
    @if(Session::has('success'))
    <div class="alert alert-success text-success">
        {{Session::get('success')}}
    </div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th><input type="checkbox" onChange="checkAll(this)"><span style="margin-left: 5px;font-size:12px;color: chocolate;">Chọn tất cả</span></th>
            
            <th>Nhóm</th>
            <th>Đợt</th>
            <th>Ngày đăng tệp</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $t)
          <tr>
            <td><input type="checkbox" value="{{$t->id}}"></td>
            <td>{{$t->ten_nhom}}</td>
            <td>{{$t->ten_dot}}</td>
            <td>{{$t->created_at}}</td>
            <td>
              <a href="{{route('downloadFile',['id'=>$t->id])}}" class="link">Tải về</a>
            </td>
          </tr>
          @endforeach
      
        </tbody>
        
      </table>
    
@endsection

@push('scripts')
    <!-- checkbox all -->
    <script>
        function checkAll(objCHK){
        var kt_true=objCHK.checked;
        var list_tr=document.querySelectorAll("tbody tr");
        for(var i=0;i<list_tr.length;i++){
            var the_tr=list_tr[i];
            var chk=the_tr.querySelector("input[type=checkbox]");
            chk.checked=kt_true;
        }	
    }
    </script>
@endpush