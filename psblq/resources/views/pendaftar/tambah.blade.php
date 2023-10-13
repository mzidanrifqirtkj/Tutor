@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/pendaftar') }}" type="button" class="btn btn-md btn-primary float-right">Back</a>

                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="post">
                        @csrf
                        @include('pendaftar.form-control')
                        
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
