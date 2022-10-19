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
                <th>STT</th>
                <th>Tên công việc</th>
                <th>Người thực hiện</th>
                <th>Tiến độ</th>
                <th>Trạng thái</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody> 
            @php
                $i = 1;
            @endphp
            @if (count($detail_yourJob)>0)
                @foreach ($detail_yourJob as $item)
            
                  <tr>
                    <td>{{$i++}}</td>
                    <td><a href="{{route('detailJob',['id' => $item->id_congviec])}}">{{$item->ten_congviec}}</a></td>
                    <td>{{$item->hoten_sv}}</td>
                    @if ($item->ngay_ketthuc < $time)
                    <td>{{$item->tien_do}}</td>
                    @else
                    <td>
                      <form action="{{route('updateJob',['id' => $item->id_congviec])}}" method="post">
                          @csrf
                          <input type="number" min="0" max="100"  value="{{$item->tien_do}}" name="tien_do" style="width: 65px;padding:4px"> <strong>%</strong>
                          {{-- <select name="tien_do" id="">
                              <option value="25">25%</option>
                              <option value="50">50%</option>
                              <option value="75">75%</option>
                              <option value="100">100%</option>
                          </select> --}}
                        </form>
                  </td>
                    @endif
                    <td class="{{$item->trang_thai == 1 ? 'text-success' : 'text-danger'}}">{{$item->trang_thai == 1 ? 'Hoàn thành' : 'Chưa hoàn thành'}}</td>
                    <td>{{$item->ngay_batdau}}</td>
                    <td>{{$item->ngay_ketthuc}}</td>
                    {{-- <td>
                      <a href=""><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                    </td> --}}
                    {{-- <td>
                      <a href=""><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
                    </td> --}}
                  </tr>        
                @endforeach
            @else
              <tr>
                <td colspan="9" align="center">Chưa có người thực hiện</td>
              </tr>     
            @endif
           </tbody>
        </table>

        {{-- Nhật ký công việc --}}

   
     
      <div class="tiendo">
        <h1>Nhật ký công việc 
          <button style="border-radius:50%; width:24px;height:24px;padding:unset;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
           +
          </button>
        </h1>
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
        
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Cập nhật tiến độ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
        
              <!-- Modal body -->
              <div class="modal-body">
                <form action="{{route('updateJob')}}" method="POST" id="form_tiendo">
                  @csrf
                  <div class="form-group">
                      <label for="ten_congviec"> Công việc</label>
                      {{-- <input class="form-control" type="text" id="ten_congviec" name="ten_congviec" value=""> --}}
                      <select name="ten_congviec" class="form-control" id="ten_congviec">
                        <option value="">Chưa chọn công việc</option>
                        @foreach ($detail_yourJob as $job)
                            <option value="{{$job->id_congviec}}">{{$job->ten_congviec}}</option>
                        @endforeach
                      </select>
                      @error('ten_congviec')
                          <span style="color:red">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="form-grpup">
                    <label for="tien_do">Tiến độ</label>
                    <input class="form-control" type="number" id="ten_congviec" name="tien_do" id="tien_do">
                    @error('tien_do')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                      @if(Session('error'))
                      <span style="color:red">{{Session('error')}}</span>
                      @endif
                  </div>
                  <button type="submit" class="btn btn-primary btn-block" name="submit">Thêm công việc</button>
                </form>  
              </div>
        
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
              </div>
        
            </div>
          </div>
        </div>
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th>STT</th>
              <th>Tên công việc</th>
              <th>Tiến độ</th>
              <th>Ngày bắt đầu</th>
              <th>Ngày kết thúc</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody> 
          @php
              $i = 1;
          @endphp
          @if (count($detail_yourJob)>0)
              @foreach ($detail_yourJob as $item)
          
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$item->ten_congviec}}</td>
                  @if ($item->ngay_ketthuc < $time)
                  <td>{{$item->tien_do}}</td>
                  @else
                  <td>
                    <form action="{{route('updateJob',['id' => $item->id_congviec])}}" method="post">
                        @csrf
                        <input type="number" min="0" max="100"  value="{{$item->tien_do}}" name="tien_do" style="width: 65px;padding:4px"> <strong>%</strong>
                        {{-- <select name="tien_do" id="">
                            <option value="25">25%</option>
                            <option value="50">50%</option>
                            <option value="75">75%</option>
                            <option value="100">100%</option>
                        </select> --}}
                      </form>
                </td>
                  @endif
                  <td>{{$item->ngay_batdau}}</td>
                  <td>{{$item->ngay_ketthuc}}</td>
                  {{-- <td>
                    <a href=""><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                  </td> --}}
                  {{-- <td>
                    <a href=""><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
                  </td> --}}
                </tr>        
              @endforeach
          @else
            <tr>
              <td colspan="9" align="center">Chưa có người thực hiện</td>
            </tr>     
          @endif
         </tbody>
        </table>
        </div>

    </div>      
@endsection

@push('scripts')
    {{-- <script>
      $("#form_tiendo").submit(function(e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.

      })
    </script> --}}
@endpush