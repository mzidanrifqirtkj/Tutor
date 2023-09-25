<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            text-align: center;
            border: 3px solid black;
        }

        .remember {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-5">
                <div class="card shadow border-radius-10 mb-10">
                    @if (session('error'))
                        <div class="alert alert-danger text-center">
                            <small class="font-weight-bold">
                                {{ session('error') }}
                            </small>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-info text-center">
                            <small class="font-weight-bold">
                                {{ session('success') }}
                            </small>
                        </div>
                    @endif
                    <form method="POST" action="{{ url('login') }}">
                        @csrf
                        <div class="inputBx mb-1">
                            <span>
                                <h5>Email</h5>
                            </span>
                            <input type="email" class="form-control mb-2 border-radius-5" required name="email">
                        </div>
                        <div class="inputBx mb-1">
                            <span>
                                <h5>Password</h5>
                            </span>
                            <input type="password" class="form-control mb-2 border-radius-5" required name="password">
                        </div>
                        <div class="remember">
                            <label><a href="{{ url('lupa_password') }}" class="text-decoration-none text-theme">lupa
                                    password?</a></label>
                        </div>
                        <div class="inputBx">
                            <input type="submit" value="Masuk" name=""
                                class="btn btn-color-theme btn-black form-control p-2 mt-2 mb-3 border-radius-5">
                        </div>
                        <div class="inputBx mb-3 text-center">
                            <p- style="font-size: 14px">Belum Punya Akun? <a href="{{ url('register') }}">Buat Akun</a>
                            </p->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
