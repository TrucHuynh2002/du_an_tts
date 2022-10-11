@extends('layout.layout_admin')
@section('title')
{{$title}}
@endsection       
    <!-- Begin Page Content -->
@section('main')

    <div class="container">
        <div class="profile">
            <div class="profile-infor">
                <div class="profile--image">
                    <img src="/upload/{{$get_profile->img}}" alt="{{$get_profile->hoten_sv}}"  width="100%" height="100%">
                </div>
                <div class="profile--status">
                    <div class="profile-name">
                        <h2><strong>{{$get_profile->hoten_sv}}</strong></h2>
                    </div>
                    <div class="profile-position">
                        <p>{{$get_profile->ten_chucvu}}</p>
                    </div>
                    
                </div>
            </div>

            <div class="profile-content">
                <h2 >Thông tin cá nhân</h2>
                <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Họ và tên</label>
                        <input type="text" disabled value="{{$get_profile->hoten_sv}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ngày sinh</label>
                        <input type="text" disabled value="02/02/2000" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" disabled value="{{$get_profile->email}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" disabled value="{{$get_profile->sdt}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" disabled value="{{$get_profile->dia_chi}}" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection