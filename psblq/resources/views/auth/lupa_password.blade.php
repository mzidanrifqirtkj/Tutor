<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Lupa Password | PSBLQ </title>
</head>


<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;800&display=swap');



body {
        background: #E9E6DF;
        font-family: 'Inter';
        background-image: url(img/masjidweb.png);
        color: #3F4B36;
        background-repeat: no-repeat;
        background-size: 100%;
        background-position-y: 85%;
        position: relative;
}

.card{
    color: #3F4B36;
    padding: 10px
}

.btn-color-theme{
    color: white !important;
    background-color: #3F4B36;
}

.text-theme{
    color: #3F4B36;
}

.border-radius-10{
    border-radius: 30px;
}


</style>
<body>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-5 mx-5 mt-5">
                <img style = "width: 100%;" src="img/logo website psb.png" alt="">
                <p> </p>
            </div>
            <div class="col-md-5 mt-5">
                <div class="card shadow border-radius-10">
                    <div class="card-body mt-3">
                        <p style="font-size: 30px; margin-bottom: 0px; padding-bottom: 0px; text-align: center;"><b>SELAMAT DATANG</b></p>
                        <p style=" font-size: 14px; text-align: center; margin: 0 auto; line-height: 110%"> di laman Pendaftaran Santri Baru <br> Pondok Pesantren Alluqmaniyyah <br> Umbulharjo Yogyakarta</p>

                        @if(session('error'))
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
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="" style="text-align: center;"></label>
                            <h3 style="text-align: center;">Lupa Password</h3>
                        </div>
                        <div class="login-form">
                            <label for="Email" class="form-label"><h5>Email</h5></label>
                            <input type="Email" required class="form-control" id="email" name="email"
                                placeholder="Email">
                            <button  class="btn btn-color-theme btn-black form-control p-2 mt-3" type="submit">Lupa Password</button> <br>
                            <br>
                            <a href="{{ url('login') }}" class="text-decoration-none">Login?</a>
                            <hr />
                            <span style="margin: 20%;">Belum Punya Akun?
                            <a href="{{ url('register') }}" class="inputBx">Buat Akun</a></span>
                        </div>
                    </form>
                    {{-- <form method="POST" action="{{ url('login') }}">
                        @csrf

                        <div class="inputBx">
                            <span>Email</span>
                            <input type="email" class="form-control" required name="email">
                        </div>
                        <div class="inputBx">
                            <span>Password</span>
                            <input type="password" class="form-control" required name="password">
                        </div>
                        <divc class="remember">
                            <label><a href="{{ url('lupa_password') }}" class="text-decoration-none text-theme">lupa password?</a></label>
                        </divc>
                        <div class="inputBx">
                            <input type="submit" value="Masuk" name="" class="btn btn-color-theme btn-black form-control p-2 mt-3">
                        </div>
                        <div class="inputBx">
                            <p- style="font-size: 14px">Belum Punya Akun? <a href="{{ url('register') }}">Buat Akun</a></p->
                        </div>
 --}}

                    </div>
                </div>
            </div>
            <img style = "width: 300px; margin-top:80px; margin-left: auto; margin-right: auto; display: block;" src="img/mark up betul2.png" alt="">
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>


</body>


</html>
{{--

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Sign In | PSBLQ </title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;800&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        color: #3F4B36;
    }

    .footer {
        background-color: #3F4B36;
        padding: 20px;
        text-align: center;
        color: #ddd;
        margin-top: 40px;
    }

    .split {
        height: 100%;
        width: 50%;
        position: fixed;
        z-index: 1;
        top: 0;
        overflow-x: hidden;
        padding-top: 20px;
    }

    /* Control the left side */
    .left {
        left: 0;
        background-image: url(img/masjidweb3.png);
        display: flex;
        /* background-size: 100%;  */
        /* background-attachment: fixed; */
    }

    /* Control the right side */
    .right {
        right: 0;
        background-color: white;
    }

    /* If you want the content centered horizontally and vertically */
    .centered h1 {
        position: absolute;
        top: 250px;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .centered p1 {
        position: absolute;
        left: 25%;
        bottom: 50px;
    }

    .text-theme {
        color: #3F4B36;
    }

    .split-right {
        /* font-style: normal;
font-weight: 700;
font-size: 36px;
line-height: 44px;
display: flex;
align-items: center; */
    }

    .row h3 {
        margin-top: 150px;
        margin-left: 21%;
    }

    .row p2 {
        margin-left: 21%;
        margin-bottom: 10px;
    }

    .login-form input {
        margin-bottom: 20px;
        display: flex;
        width: 50%;
        margin-left: 20%;
    }

    .login-form .signin {
        background: #3F4B36;
        border-radius: 4px;
        width: 50%;
        height: 32px;
        color: white;
        margin-left: 20%;
        margin-bottom: 10px;
    }

    .login-form a {
        margin-left: 20%;
    }

    .login-form .form-label {
        margin-left: 20%;
    }





    /* Style the image inside the centered container, if needed
.centered img {
  width: 150px;
  border-radius: 50%;
} */
</style>

<body>
    <div class="container">
        <div class="row d-flex">
            <div class="split left">
                <div class="row">
                    <div class="centered">
                        <h1><img src="{{ url('img/logo website psb.png') }}" width="300" alt=""
                                style="margin-bottom: 100px;"></h1>
                        <p1><img src="{{ url('img/mark up betul2.png') }}" width="300" alt=""></p1>
                    </div>
                </div>
                <div class="split right">
                    <div class="row">
                        <h3> <B>SELAMAT DATANG</B></h3>
                        <p2>di laman Pendaftaran Santri Baru <br>Pondok Pesantren Al Luqmaniyyah Umbulharjo Yogyakarta
                        </p2>
                    </div>
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
                    <form action="" method="POST">
                        @csrf
                        <div class="login-form">
                            <label for="Email" class="form-label">Email</label>
                            <input type="Email" required class="form-control" id="email" name="email"
                                placeholder="Email">
                            <button class="signin" type="submit">Lupa Password</button> <br>
                            <a href="{{ url('login') }}" class="text-decoration-none">Login?</a>
                            <hr />
                            <span style="margin: 20%;">Belum Punya Akun?</span> <br>
                            <a href="{{ url('register') }}" class="signup">Buat Akun</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    -->
</body>


</html> --}}
