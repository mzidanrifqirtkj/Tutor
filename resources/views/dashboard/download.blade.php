@extends('layouts.layout')

@section('content')

<div class="col-12 col-lg-12">
    <div style="position: center">
        <div class="card-body text-center">
            <div class="row mt-2 center">
                <div class="col-md-2 center">
                </div>
                <div class="col-md-8 center">
                    <h3><b>SELAMAT</b></h3>
                    <p>Pengisian Data Diri Telah selesai</p>
                    <br>
                    <br>
                    <p>Tahap selanjutnya:</p>
                    <ol style="align-items: flex-start">
                        <li>Silahkan download file berikut, dan dibawa saat registrasi ulang di pondok.</li>
                        <li>Silahkan menghubungi admin untuk konfirmasi kedatangan ke pondok.</li>
                    </ol>
                    <br>
                    <div class="col-8">
                        <a href="{{ url('dashboard/downloadberkas?type=kesanggupan') }}"
                            class="btn btn-color-theme btn-black form-control p-2 mt-3">DOWNLOAD
                            FILE KESANGGUPAN</a>
                        <a href="{{ url('dashboard/downloadberkas?type=pernyataan') }}"
                            class="btn btn-color-theme btn-black form-control p-2 mt-3">DOWNLOAD
                            FILE PERNYATAAN</a>
                        <a href="{{ url('dashboard/downloadberkas?type=mukim') }}"
                            class="btn btn-color-theme btn-black form-control p-2 mt-3">DOWNLOAD
                            FORM FORMULIR SANTRI</a>
                    </div>
                    <div class="col-8">
                        <a href="https://api.whatsapp.com/send/?phone=6285172099220&text=Assalamu'alaikum, Maaf mau menanyakan pendaftaran min&type=phone_number&app_absent=0"
                            class="btn btn-color-theme btn-black form-control p-2 mt-3">Whatsapp
                            Admin</a>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>

        </div>



    </div>

</div>
@endsection