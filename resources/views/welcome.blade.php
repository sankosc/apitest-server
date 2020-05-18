<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>API Test : SankoSC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 200vh;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
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
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                SankoSC
                <div class="title m-b-md">
                    API Test
                </div>

                <div class="m-b-md">
                    APIのテスト用のサーバーです。以下のAPIがテスト用として利用できます。<br/><br/>
                    認証ありのAPIは、ログイン時に受け取ったAccessTokenをヘッダに含めます。<br/>
                    Authorization: Bearer [Access Token]<br/><br/>
                    認証は1分で切れるようにしてあるので、リフレッシュの確認はログイン後1分後に実施できます。<br/><br/>
                </div>
                
                <div  class="m-b-md">
                    <b>Hello</b><br/>
                    GET: 認証なし<br/>
                    [URI] /api/hello<br/>
                    [Response] {"message":"hello"}
                </div>

                <div  class="m-b-md">
                    <b>Login</b><br/>
                    POST: 認証なし<br/>
                    [URI] /api/login<br/>
                    [Request] {"email":"sample@sankosc.co.jp","password":"sample123"}<br/>
                    [Response] {"access_token":"[your access token]","token_type":"bearer","expires_in":60}
                </div>

                <div  class="m-b-md">
                    <b>Me</b><br/>
                    GET: 認証あり<br/>
                    [URI] /api/me<br/>
                    [Response] {"id":1,"name":"sample","email":"sample@sankosc.co.jp","email_verified_at":null,"created_at":"2020-05-12T08:43:24.000000Z","updated_at":"2020-05-12T08:43:24.000000Z"}
                </div>

                <div  class="m-b-md">
                    <b>Echo</b><br/>
                    POST: 認証あり<br/>
                    [URI] /api/echo<br/>
                    [Request] {"message":"This is test message."}<br/>
                    [Response] {"message":"This is test message."}
                </div>

                
                <div  class="m-b-md">
                    <b>Logout</b><br/>
                    POST: 認証あり<br/>
                    [URI] /api/logout<br/>
                    [Request] {}<br/>
                    [Response] {"message":"Successfully logged out"}
                </div>

                <div  class="m-b-md">
                    <b>Refresh</b><br/>
                    GET: Refresh Tokenの期限が切れていない状態<br/>
                    [URI] /api/refresh<br/>
                    [Response] {"access_token":"[your access token]","token_type":"bearer","expires_in":60}
                </div>

                <div  class="m-b-md">
                    Sanko System Co.,Ltd.<br/>
                    created: 2020/05/12<br/>
                    updated: 2020/05/18
                </div>

                <div class="links">
                    <a href="https://github.com/sankosc/apitest-server">GitHub</a>
                    <a href="https://qiita.com/nozaki-sankosc/items/7ed320d6549f5f92b9b9">構築手順</a>
                </div>
            </div>
        </div>
    </body>
</html>
