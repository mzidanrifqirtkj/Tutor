@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Pendaftar</h4>
                <a href="/pendaftar/tambah" class="btn btn-danger"> + Tambah Pendaftar</a>

            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Gmail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pendaftar }}</td>
                                <td>
                                    <a href="{{ url('pendaftar/' . $item->asrama_id . '/edit') }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ url('pendaftar/' . $item->asrama_id . '/delete') }}"
                                        class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
