<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sendmailthuctapsinh</title>
    <style>
        body{
            padding: 50px 500px 50px 500px;
        }
        .table{
            background-color: aliceblue;
            height: 550px;
            width: 650px;
            padding: 12px 12px 12px 12px;
        }
        .header{
            text-align: center;
        }
        .body h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="table">
    <div class="header">
    <h1>{{env('APP_NAME')}}
        
</h1>
    <img src="{{asset('')}}" width="100px" height="100px">
    </div>
    <div class="body">
        <h2>Xác nhận mật khẩu</h2>
        <b>Hello, {{$hoten_sv}}</b>
        <p>Chào mừng bạn gia nhập công ty {{env('APP_NAME')}} với vai trò là thực tập sinh.</p>
        <p>Thông tin tài khoản của bạn:</p>
        <p>Tài khoản: {{$email}}<br>
        Mật khẩu: {{$password}}<p>
        <p>Vui lòng nhấp <a href="{{route('login')}}">vào đây</a> để đăng nhập vào tài khoản.</p>
        
    </div>
    <div class="footer">
        <p>Thân,<br>
        {{env('APP_NAME')}}</p>
    </div>
    </div>
</body>
</html>