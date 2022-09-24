@extends('layout.layout_acount')
@section('title')
{{$title}}
@endsection
@section('main_acount')
    <div class="boydy">
        <h2>Thông tin tham gia nhóm</h2>
        <form action="{{route('thamgianhom.store',['token' => $get_nhom->token])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nhom">Nhóm</label>
                <input type="text" class="form-control" id="nhom" name="nhom" value="{{$get_nhom->ten_nhom}}" readonly>
            </div>
            <div class="form-group">
                <label for="ten_sv">Đợt thực tập</label>
                <input type="text" class="form-control" id="ten_sv" name="ten_sv" value="{{$get_nhom->ten_dot}}" readonly>
            </div>
            <div class="form-group">
                <label for="ten_sv">Nhóm trưởng</label>
                <input type="text" class="form-control" id="ten_sv" name="ten_sv" value="{{$get_nhom->id_nhomtruong == $get_nhom->id_sv ? $get_nhom->hoten_sv : ''}}" readonly>
            </div>
            <div class="form-group">
                <label for="de_tai">Đề tài</label>
                <input type="text" class="form-control" id="de_tai" name="de_tai" value="{{$get_nhom->de_tai}}" readonly>
            </div>
            <div class="form-group">
                <label for="comment">Thành viên</label>
                <textarea class="form-control" rows="5" id="comment" disabled>
                    @foreach ($get_members as $mb)
                        @if ($mb->ct_idGroup == $get_nhom->id_nhom)
                            {{$mb->member_name}}
                            
                        @endif
                    @endforeach
                </textarea>
            </div>
            <button type="submit" class="btn btn-success">Tham gia nhóm</button>
        </form>
    </div>
@endsection