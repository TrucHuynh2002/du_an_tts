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
                    <img src="/img/blogpost.jpg" alt="hình ảnh">
                </div>
                <div class="profile--status">
                    <div class="profile-name">
                        <h2><strong>Nguyễn Minh Triển</strong></h2>
                    </div>
                    <div class="profile-position">
                        <p>Thực tập sinh</p>
                    </div>
                    
                </div>
            </div>

            <div class="profile-content">
                <h2 >Thông tin cá nhân</h2>
                <hr>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Họ và tên</label>
                        <input type="text" disabled value="Nguyễn Minh Triển" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Ngày sinh</label>
                        <input type="text" disabled value="02/02/2000" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" disabled value="triennmpc01552@fpt.edu.vn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" disabled value="0396705389" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" disabled value="CẦN THƠ" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection