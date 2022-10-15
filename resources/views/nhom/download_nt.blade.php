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
    @if(Session::has('errors'))
    <div class="alert alert-danger text-danger">
        {{Session::get('errors')}}
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
        <form action="{{route('downloadAll')}}" method="POST" >
          @csrf
          @if (count($data) <= 0)
          <tr>
          <td colspan="3" align="center">Chưa có file nào cả</td>
          </tr>
          @else
          @foreach ($data as $t)
          <tr>
            <td><input type="checkbox" name="fileDownload[]" value="{{$t->id}}" ></td>
            <td>
              <a href="{{route('downloadFile',['id'=>$t->id])}}">{{$t->ten_file}}</a>
            </td>
            <td>
              {{-- <form action="{{route('file.destroy',['file' => $t->id])}}">
                @csrf
                @method('DELETE')
                <button  class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button>
              </form> --}}
              </td>
          </tr>
          @endforeach
          @endif
          
          
          
        </tbody>
        <td>
          <button class="btn btn-outline-primary" id="download">Download</button>
          
        </td>
      </form>
      </table>

      <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="upload">Upload File</label>
                <input type="file" class="form-control" id="upload" name="upload">
                @error('upload')
                <span style="color:red">{{$message}}</span>
                @enderror
            </div>                  
        </div>
        <button type="submit" class="btn btn-primary" name="sub_mit">Upload</button>               
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
    // $(document).ready(function(){
    
    //   $("#download").on('click',function(){
    //     var checked = $("input[type='checkbox']:checked");
    //     var _token = $('input[name="_token"]').val();
    //     console.log(_token);
    //              var checkbox = [];
    //     for (let index = 1; index < checked.length; index++) {

    //       checkbox.push(checked[index].value);
    //     }

    //     // $.ajaxSetip({
    //     //   headers:{
    //     //       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
    //     //   }
    //     // })
       
    //     $.ajax({
    //         url:"{{route('downloadAll')}}",
    //         method:"GET",
    //         data:{
    //               checkbox:123,
    //               // '_token':'{{csrf_token()}}',
    //             },
            
    //         success:function(data){
    //             console.log(data);
    //             // $('#nhom_truong').html(data);
    //         }
    //     })
  
  

    //   })
  
    // })

    </script>
@endpush