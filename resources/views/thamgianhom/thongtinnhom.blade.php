@extends('layout.layout_acount')
@section('title')
{{$title}}
@endsection
@section('main_acount')
    <div class="boydy">
        <h2>Thông tin tham gia nhóm</h2>
        <form action="" method="">
            <div class="form-group">
                <label for="nhom">Nhóm</label>
                <input type="text" class="form-control" id="nhom" name="nhom" value="Nhóm 1" readonly>
            </div>
            <div class="form-group">
                <label for="ten_sv">Tên sinh viên</label>
                <input type="text" class="form-control" id="ten_sv" name="ten_sv" value="Nguyễn Trúc Huỳnh" readonly>
            </div>
            <div class="form-group">
                <label for="de_tai">Đề tài</label>
                <input type="text" class="form-control" id="de_tai" name="de_tai" value="Quản lý thực tập sinh" readonly>
            </div>
            <div class="form-group">
                <label for="comment">Ghi chú</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Tham gia nhóm</button>
        </form>
    </div>
@endsection