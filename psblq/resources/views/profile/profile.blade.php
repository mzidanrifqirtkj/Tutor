@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card mb-3">

        </div>
    </div>

    <div class="col-md-8 col-xl-9">
        <div class="card">
            <div class="card-header">

                <h5 class="card-title mb-0">Activities</h5>
            </div>
            <div class="card-body h-100">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless">

                        <tr>
                            <th>Nama User</th>
                            <td>:</td>
                            <td id="name">{{$data->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td id="email">{{$data->email}}</td>
                        </tr>
                        {{-- <tr>
                                    <th>No HP</th>
                                    <td>:</td>
                                    <td id="no_hp">{{ $data->no_hp }}</td>
                        </tr> --}}
                        <tr>
                            <th>Last Login</th>
                            <td>:</td>
                            <td id="last_login">{{tanggaljam(session('last_login'))}}</td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button data-backdrop="false" onclick="editProfile()" class="btn btn-success btn-sm btn-profile mb-2"  data-bs-toggle="modal" data-bs-target="#modalProfile"><i class="fas fa-edit"></i> Edit Profile</button>
                        <button data-backdrop="false" class="btn btn-primary btn-sm btn-profile mb-2" data-bs-toggle="modal" data-bs-target="#modalPassword"><i class="fas fa-key"></i> Ubah Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-sm">
                <form action="{{ url('profile/ubah_password') }}" method="post" id="formPassword" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row px-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="varchar">Password Lama</label>
                                <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Password lama" value="" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Password Baru</label>
                                <input type="password" class="form-control form-control-sm" name="password_baru" id="password_baru" placeholder="Password Baru" value="" />
                            </div>
                            <div class="form-group">
                                <label for="varchar">Konfirm Password</label>
                                <input type="password" class="form-control form-control-sm" name="konf_password" id="konf_password" placeholder="Konfirmasi Password" value="" />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                {!! modalFooter() !!}
            </div>
        </div>
    </div>
</div>

<div id="modalProfile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-sm">
                <form action="{{ url('profile/edit_profile') }}" method="post" id="formProfile" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row px-3">
                        <div class="col-12">
                          {{--  <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control form-control-sm" name="username" id="username" placeholder="Username" value="" />
                            </div> --}}
                            <div class="form-group">
                                <label for="name">Nama User</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Username" value="" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Email" value="" required />
                            </div>
                            <div class="form-group">
                                <label for="profile">Profile</label>
                                <input type="hidden" class="form-control form-control-sm " name="profile_image" id="profile_image" placeholder="Profile" value="" />
                                <input type="file" class="form-control form-control-sm " name="profile_image_baru" id="profile_image_baru" placeholder="Profile" value="" />
                            </div>
                            {{-- <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" class="form-control form-control-sm" name="no_hp" id="no_hp" placeholder="Nomer Hp" value="" />
                            </div> --}}
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                {!! modalFooter() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascripts')
<script>
    const modalProfile = 'modalProfile'
    const modalPassword = 'modalPassword'
    const formPassword = 'formPassword'

    $(function() {
        passwordValidation(formPassword)
    })

    $('#' + modalProfile).on('hidden.bs.modal', function() {
        hiddenModal(modalProfile, 'username')
        hiddenModal(modalProfile, 'name')
        hiddenModal(modalProfile, 'email')
        hiddenModal(modalProfile, 'no_hp')
        hiddenModal(modalProfile, 'profile_image')
    })

    $('#' + modalPassword).on('hidden.bs.modal', function() {
        hiddenModal(modalPassword, 'password')
        hiddenModal(modalPassword, 'password_baru')
        hiddenModal(modalPassword, 'konf_password')
    })

    function editProfile() {
        startloading('#' + modalProfile + ' .modal-content')
        var settings = {
            'url': base_url('profile/data'),
            'method': 'GET',
            'dataType': 'json',
            'timeout': timeOut()
        };
        $.ajax(settings).done(function(response) {
            setVal(modalProfile, 'username', response.data.username)
            setVal(modalProfile, 'name', response.data.name)
            setVal(modalProfile, 'email', response.data.email)
            setVal(modalProfile, 'no_hp', response.data.no_hp_user)
            setVal(modalProfile, 'profile_image', response.data.profile_image)
            // stoploading('#' + modalProfile + ' .modal-content')
        }).
        fail(function(data, status, error) {
            if (status == 'timeout') {
                CekKonfirmasi('Timeout!', '')
            } else if (data.responseJSON.status == false) {
                CekKonfirmasi(data.responseJSON.message, '')
            }
            // stoploading('#' + modalProfile + ' .modal-content')
        });
    }

    function passwordValidation(id) {
        $('#' + id).validate({
            rules: {
                password: {
                    required: true,
                },
                password_baru: {
                    required: true
                },
                konf_password: {
                    required: true,
                    equalTo: "#password_baru"
                }
            },
            messages: {
                password: {
                    required: 'Password tidak boleh kosong',
                },
                password_baru: {
                    required: 'Password baru tidak boleh kosong',
                },
                konf_password: {
                    required: 'Konfirmasi password tidak boleh kosong',
                    equalTo: 'Password tidak sesuai'
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        })
    }
</script>
@endsection
