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
            <th>Link</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><input type="checkbox"></td>
            <td>
              <a href=""></a>
            </td>
            <td>
                <a href="#"><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>
              <a href=""></a>
            </td>
            <td>
                
                <a href="#"><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
            </td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td>
              <a href=""></a>
            </td>
            <td>
                <a href="#"><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
            </td>
          </tr>
        </tbody>
        <td>
          <a href="#"><button type="button" class="btn btn-outline-primary">Tải về</button></a>
        </td>
      </table>

      <form action="" method="">
        <div class="row">
            <div style="margin-left: 15px;" class="form-group">
                <label for="upload">Tải thư mục lên</label>
                <input type="file" class="form-control" id="upload" name="upload">
            </div>                  
        </div>
        <button style="margin-left: 15px;" type="submit" class="btn btn-primary" name="sub_mit">Tải lên</button>               
      </form>

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