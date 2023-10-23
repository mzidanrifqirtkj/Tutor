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
    <title>Register | PSBLQ </title>
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
        margin-top: 100px;
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

    .btn-color-theme {
        color: white !important;
        background-color: #3F4B36;
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
                        <h3> <B>BUAT AKUN</B></h3>
                        <p2>Silahkan buat akun terlebih dahulu <br>
                            untuk melanjutkan pendaftaran
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

                            <label for="Password" class="form-label">Password</label>
                            <input required type="Password" class="form-control" id="password" name="password"
                                placeholder="Password">

                            <label for="Password" class="form-label">Confirm Password</label>
                            <input required type="Password" class="form-control" id="konfirm_password"
                                name="konfirm_password" placeholder="Confirm Password">

                            <button type="submit" class="signin">Buat Akun Anda</button>
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
<!-- <footer class="site-footer mt-5">
    <div class="container">
        <div class="row">
            <div class="mt-3">
            <h5 style="text-align: center;">YAYASAN MAMBA’UL ULUM <br> PONDOK PESANTREN AL LUQMANIYYAH YOGYAKARTA </h5>
            <p style="text-align: center;">Alamat: Gg. Cemani No.759-P, Umbulharjo,
                Kota Yogyakarta, Daerah Istimewa Yogyakarta 55161. <br>Email : pplqjogja@gmail.com WA : +62 851-7209-9220</p>
            </div>
        </div>
    </div>
</footer> -->

</html>
