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
          <tr>
            <td><input type="checkbox"></td>
            <td>3</td>
            <td>1</td>
            <td>01/10/2022</td>
            <td>
                <a href="#"><button type="button" class="btn btn-outline-primary">Tải về</button></a>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>3</td>
            <td>1</td>
            <td>01/10/2022</td>
            <td>
                <a href="#"><button type="button" class="btn btn-outline-primary">Tải về</button></a>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>3</td>
            <td>1</td>
            <td>01/10/2022</td>
            <td>
                <a href="#"><button type="button" class="btn btn-outline-primary">Tải về</button></a>
            </td>
          </tr>
        </tbody>
        <td>
          <a href="#"><button type="button" class="btn btn-outline-primary">Tải về tất cả</button></a>
        </td>
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