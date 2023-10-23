@extends('layouts.layout')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <div class="font-weight-bold">
                        <h3>Selamat datang {{ Auth::user()->name }}</h3>
                    </div>

                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0 mb-3">
                            <button class="btn btn-sm btn-light" type="button" id="dropdownMenuDate2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="true" style="color:white;background-color: #3F4B36">
                                <i class="mdi mdi-calendar"></i> Today ({{ date('d/m/Y') }})
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card" style="border-radius: 20px">
                    <div class="card-body" style="border-radius: 20px">
                        <div class="d-flex justify-content-between">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-subtitle text-muted">Grafik Peneriman Santri Baru Ponpes Al-Luqmaniyyah
                                        Yogyakarta</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        {!! $SantriChart->container() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-3 stretch-card transparent">
                        <div class="card card-tale" style="border-radius: 20px">
                            <div class="card-body" style="border-radius: 20px; background-color: #fcedd4">
                                <h5 class="mb-4">Santri Putra</h5>
                                <h2>{{ $jumlahlaki }}</h2>
                                <h5>Orang</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 stretch-card transparent">
                        <div class="card card-dark-blue" style="border-radius: 20px">
                            <div class="card-body" style="border-radius: 20px; background-color: #fcedd4">
                                <h5 class="mb-4">Santri Putri</h5>
                                <h2>{{ $jumlahperempuan }}</h2>
                                <h5>Orang</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue" style="border-radius: 20px">
                            <div class="card-body" style="border-radius: 20px; background-color: #fcedd4">
                                <h5 class="mb-4">Santri Aktif</h5>
                                <h2>{{ $jumlahsantriaktif }}</h2>
                                <h5>Orang</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger" style="border-radius: 20px">
                            <div class="card-body" style="border-radius: 20px; background-color: #fcedd4">
                                <h5 class="mb-4">Santri Non-Aktif</h5>
                                <h2>{{ $jumlahsantritidakaktif }}</h2>
                                <h5>Orang</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 stretch-card grid-margin">
                <div class="card" style="border-radius: 20px">
                    <div class="card-body" style="border-radius: 20px">
                        <p class="card-title mb-0">Pendaftar Terbaru</p>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th class="pl-0  pb-2 border-bottom">Santri</th>
                                        <th class="border-bottom pb-2">Status</th>
                                        <th class="border-bottom pb-2">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($pendaftar as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        @if ($item->sudah_sowan == 'N')
                                        <small class="btn btn-sm btn-warning text-dark"
                                            style="width: 100%">Belum</small>
                                        @else
                                        <small class="btn btn-sm btn-success text-white"
                                            style="width: 100%">Sudah</small>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 stretch-card grid-margin">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card" style="border-radius: 20px">
                        <div class="card" style="border-radius: 20px;background-color: #3F4B36">
                            <div class="card-body">
                                <p class="card-title" style="color: white">Santri Sowan</p>
                                <div class="charts-data">
                                    <h3 style="color: white">{{ $jumlahsowan }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                        <div class="card data-icon-card-primary" style="border-radius: 20px">
                            <div class="card-body" style="border-radius: 20px;background-color: #3F4B36 ">
                                <p class="card-title text-white">Total Santri keseluruhan</p>
                                <div class="row">
                                    <div class="col-8">
                                        <h3 style="color: white">{{ $jumlahsemua }}</h3>
                                        <p class="text-white font-weight-500 mb-0"> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="{{ $SantriChart->cdn() }}"></script>
        {{ $SantriChart->script() }}
    @endsection
