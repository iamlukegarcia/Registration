<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        body {
            background: rgb(97, 0, 0);
        }

        .forget-pwd>a {
            color: #510000; 
            font-weight: 500;
        }

        .forget-password .panel-default {
          
        }

        .forget-password .panel-body {
            padding: 15%;
            margin-bottom: -50%;
            background: #fff;
            border-radius: 5px;
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        img {
            width: 70%;
            margin-bottom: 10%;
        }

        .btnForget {
            background: #510000;
            border: none;
            width: 80%;
        }
    </style>

</head>

<body>
    <div class="container  mb-3 forget-password">
        <div class="row  p-5">
            <div class="col-10 offset-md-4 offset-xs-10">
            </div>
            <div class="col mt-5">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            @if ($errors->any())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif
                            <form id="register-form" class="form" method="post"
                                action="{{ route('login.authenticate') }}">
                                @csrf
                                <div class="form-group">

                                    <div class="input-group mb-3">
                                        <input id="forgetAnswer" name="username" placeholder="USERNAME"
                                            class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="input-group mb-3">

                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="forgetAnswer" name="password" placeholder="PASSWORD"
                                            class="form-control" type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="btnForget" class="btn btn-lg btn-primary btn-block btnForget"
                                        value="LOGIN" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
                < script src = "//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" >
            </script>
            </script>
</body>

</html>
