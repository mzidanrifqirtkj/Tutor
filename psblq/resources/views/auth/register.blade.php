</html>
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
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <title>Register | PSBLQ </title>
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
.hover:btn-color-theme {
    background-color: green
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
            <div class="col-md-5 mt-3">
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
                    <form method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="" style="text-align: center;"></label>
                            <h3 style="text-align: center;"><b>Login</b></h3>
                        </div>
                        <div class="inputBx">
                            <span><h6>Email</h6></span>
                            <input required type="email" class="form-control mb-2" name="email">
                        </div>
                        <div class="inputBx">
                            <span><h6
                                >Nama</h6></span>
                            <input type="text" class="form-control mb-2" required name="name">
                        </div>
                        <div class="inputBx">
                            <span><h6>Password</h6></span>
                            <input type="password" class="form-control mb-2" required name="password" id="password">
                        </div>
                        <div class="inputBx">
                            <span><h6>Confirm Password</h6></span>
                            <input type="password" class="form-control mb-2" required name="konfirm_password" id="konfirm_password">
                        </div>

                        <div class="inputBx mb-2">
                            <input type="submit" value="Buat Akun" class="btn btn-color-theme btn-black form-control p-2 mt-3 border-radius-5"  name="">
                        </div>
                        <div class="inputBx mb-3 text-center">
                            <p>Sudah Punya Akun? <a href="{{ url('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <img style = "width: 300px; margin-top:50px; margin-left: auto; margin-right: auto; display: block;" src="img/mark up betul2.png" alt="">
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

