@extends('layouts.layout')

@section('content')
<br><br>
<div class="card">
      <div class="card-body" style="padding: 32px; padding-bottom:0px">
            <h5>Sebelum anda melakukan pendaftaran <br>
                  silahkan membaca beberapa Informasi tentang <br>
                  Pondok Pesantren Alluqmaniyyah!</h5>
      </div>
      <br>
      <div style="padding: 40px">
            <h6>A. Alur pendaftaran</h6>
            <ol>
                  <li>Mendaftar online</li>
                  <li>Mendownload berkas</li>
                  <li>Konfirmasi pendaftaran dan tanggal kedatangan melalui WA admin</li>
                  <li>Sowan bersama orang tua ke pengasuh</li>
                  <li>Menyerahkan dokumen pendaftaran dan membayar biaya pendaftaran kepada pengurus di kantor pondok
                        pesantren</li>
                  <li>Penempatan kamar</li>
                  <li>Tes penempatan kelas</li>
            </ol>
            <h6>B. Pembayaran<br></h6>
            <ol>
                  <li>Santri wajib membayar lunas sesuai yang tertera pada brosur<br></li>
                  <li>Bagi santri baru yang boyong, biaya pendaftaran yang sudah dibayarkan tidak dapat ditarik kembali
                  </li>
                  <li>Bagi santri baru yang boyong dan belum melunasi uang awal masuk pondok, maka tetap wajib membayar
                        lunas
                        uang administrasi pendaftaran.</li>
                  <li>Biaya syahriyyah (bulanan) sebesar Rp 250.000</li>
                  <li>Bagi yang membawa peralatan pribadi tertentu dikenakan biaya tambahan. Berikut rinciannya :</li>
                  <ul type="disc">
                        <li>Laptop : Rp 20.000/bulan.</li>
                        <li>Handphone/powerbank/Vape/Pod/TWS : @ Rp 5.000/bulan.</li>
                        <li>Bagi yang membawa motor dikenakan biaya parkir sebesar Rp. 15.000/bulan.</li>
                  </ul>
            </ol>
            <h6>C. Kurikulum Pengajian</h6>
            <ol>
                  <li>Pondok Pesantren Alluqmaniyyah adalah pondok pesantren berbasis kitab kuning.</li>
                  <li>Wajib menyelesaikan kurikulum sampai kelas Ihya' (6 Tahun)</li>
                  <li>Setiap malam sabtu, santri wajib mengenakan kemeja/koko putih lengan panjang ketika mengikuti
                        kegiatan
                        pengajian.</li>
            </ol>
            <h6>D. Peraturan-peraturan</h6>
            <h6>Peraturan Umum</h6>
            <ol type="1">
                  <li>Santri baru : </li>
                  <ol type="a">
                        <li>Wajib mengikuti kegiatan Masa Ta'aruf Santri (MASTASA)</li>
                        <li>Wajib mengikuti salah satu ekstrakurikuler pondok pesantren</li>
                  </ol>
                  <li>Perizinan Santri : </li>
                  <ol>
                        <li>Perizinan pulang hanya 2 kali dalam setahun (Bulan Maulud dan Idul Fitri)</li>
                        <li>Perizinan insidental (kepentingan diluar liburan pondok) hanya diberikan sebanyak 2 kali
                              dalam
                              setahun.
                        </li>
                  </ol>
                  <li>Dilarang melakukan hubungan dengan lawan jenis dengan cara yang dapat mencemarkan nama baik
                              pondok
                              pesantren baik di
                              dalam ataupun di luar lingkungan pondok pesantren.</li>
                  <li>Santri boleh bekerja dengan syarat tetap menaati peraturan pondok pesantren.</li>
                  <li>Tidak boleh mengikuti organisasi luar pesantren yang menggangu kegiatan pondok pesantren.
                  </li>

            </ol>

            <h6>Peraturan Khusus</h6>
            <h6>Santri Putra</h6>
            <ol>
                  <li>Wajib memakai songkok hitam ketika mengikuti kegiatan wajib pesantren</li>
                  <li>Wajib memakai kemeja/koko berlengan panjang dan sarung ketika mengikuti sholat jamaah dan kegiatan wajib pesantren .</li>
                  <li>Wajib memakai peci ketika keluar dari asrama putra
                  </li>
                  <li>Tidak boleh berambut panjang.</li>
            </ol>
            <h6>Santri Putri</h6>
            <ol>
                  <li>Santri putri tidak diperbolehkan menggunakan jasa ojek motor.</li>
                  <li>Handphone wajib dikumpulkan pada pukul 00.00 sampai setelah ngaji pagi selesai (pukul
                        06.00).</li>
                  <li>Berbusana Santri Putri : </li>
                  <ol type="a">
                        <li>Pada saat kegiatan wajib pesantren dan keluar pondok, santri putri:
                              <ul type="disc">
                                    <li>Dilarang memakai celana</li>
                                    <li>Dilarang memakai pakaian berbahan kaos, jeans, dan jersey</li>
                                    <li>Dilarang memakai gamis berkerut/bertali kecuali ditutupi menggunakan jas
                                          atau
                                          kerudung yang
                                          lebar</li>
                                    <li>Wajib memakai kerudung yang menutup dada</li>
                              </ul>
                        </li>
                        <li>Ketika di dalam komplek, santri putri diperbolehkan memakai kaos untuk kegiatan
                              sehari-hari.
                        </li>
                        <li>Santri putri wajib memakai mukenah terusan/lajuran berwarna putih.</li>
                        <li>Wajib memiliki baju putih dan jilbab hitam untuk kegiatan pesantren, seperti mengaji,
                              sholawatan
                              rutin, dan acara penting lainnya.</li>
                  </ol>
            </ol>
            <hr size="5px" color="black">
            @if (Auth::user()->verif_qonun != 'yes')
            <h5>Setelah Membaca informasi dan peraturan di atas saya sanggup untuk :</h5>
            <form action="">
                  @csrf
                  <div class="table-responsive">
                        <table class="table" border="0">
                              <tr>
                                    <td>Mengikuti pendidikan di pesantren selama 6 tahun</td>
                                    <td>:</td>
                                    <td><input required name="mengikuti6thn" type="checkbox" class="ukuran-checkbox">
                                    </td>
                              </tr>
                              <tr>
                                    <td>Tidak mengikuti Kegiatan diluar selain kegiatan wajib perkuliahan </td>
                                    <td>:</td>
                                    <td><input required name="tidakmengikuti" type="checkbox" class="ukuran-checkbox">
                                    </td>
                              </tr>
                              <tr>
                                    <td>Sanggup Mematuhi segala peraturan dari pondok pesantren </td>
                                    <td>:</td>
                                    <td><input required name="sanggupperaturan" type="checkbox" class="ukuran-checkbox">
                                    </td>
                              </tr>
                              <tr>
                                    <td colspan="3"> <button type="submit" class="btn btn-color-theme btn-black">Lanjut
                                                Isi
                                                Data
                                                Diri</button></td>
                              </tr>
                        </table>
                  </div>
                  <div class="col-12">

                  </div>
            </form>
            @endif
            <br>
            <br>
            <br>
      </div>
</div>
@endsection
