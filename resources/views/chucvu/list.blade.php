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
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th>ID chức vụ</th>
                <th>Tên chức vụ</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>                      
                <tr>
                  <td>1</td>
                  <td>2</td>
                  <td>
                    <a href=""><button type="button" class="btn btn-outline-info"><i class='bx bxs-edit'></i></button></a>
                  </td>
                  <td>
                    <a href=""><button type="button" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button></a>
                  </td>
                </tr>                          
            </tbody>
        </table>
    </div>      
@endsection