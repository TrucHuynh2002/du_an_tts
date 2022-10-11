<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đổi mật khẩu</title>
    <style>
        body{
            padding: 50px 500px 50px 500px;
        }
        .table{
            background-color: aliceblue;
            height: 600px;
            width: 650px;
            padding: 12px 12px 12px 12px;
        }
        .header{
            text-align: center;
        }
        .body h2{
            text-align: center;
        }
        .code{
            background-color: wheat;
            height: 40px;
            width: 140px;
            text-align: center;
            padding-top: 20px;
            font-weight: bold;
            border-radius: 20px;
            font-size: 20px;
        }
        .button{
            background-color: blue;
            height: 40px;
            width: 100%;
            font-weight: bold;
            font-size:17px;
            border-radius: 20px;
            color: white;
            
        }
    </style>
</head>
<body>
    <div class="table">
    <div class="body">
        <h2>Đổi mật khẩu</h2>
        <b>Hello, {{$user->hoten_sv}}</b>
        <p>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn.</p>
        {{-- <p>Nhập mã đặt lại mật khẩu tại đây:</p>
        <p class="code">123456</p>
        <p>Ngoài ra, bạn có thể thay đổi trực tiếp mật khẩu của mình.</p> --}}
        <p>Nhập đặt lại mật khẩu ngay tại đây:</p>
        <a href="{{route('password.reset',['token' => $token])}}?email={{$user->email}}" class="button">Đổi mật khẩu</a>
    </div>
    <div class="footer">
        <p>Thân,<br>
        {{env('APP_NAME')}}</p>
    </div>
    </div>
</body>
</html>