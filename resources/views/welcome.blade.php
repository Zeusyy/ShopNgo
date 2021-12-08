<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                /* background-color: #fff; */
                
                background-image: url("https://www.state.gov/wp-content/uploads/2019/04/shutterstock_563430904-2560x852.jpg");
                background-color: #cccccc;
                background-repeat: no-repeat;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                color:white;
                font-weight:bold;
                /* font-size: 80px; */
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .tieude{
                margin-left:50px;
                margin-top:50px;
            }
        </style>
    </head>
    <body>
        
        <div class="flex-center position-ref full-height">
           
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Đăng nhập</a>
                        <a href="{{ route('register') }}">Đăng kí</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Welcome To ShopNgo 
                </div>

                <div class="links">
                    <a href="{{ url('/home') }}">Trang chủ</a>
                    <a href="https://laracasts.com">Sản Phẩm</a>
                    <a href="https://laravel-news.com">Thông tin liên hệ</a>
                </div>
            </div>
        </div>
    </body>
</html>
