@extends('layouts.app')

@section('content')
<body style="background-image: url(bgadmin.png); background-size: cover; font-family: 'Niramit', sans-serif;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #000000; color:#FFA07A; ">{{ __('Daftar') }}</div>

                <div class="card-body" style="background-color: #000000;opacity: 0.9; filter: alpha(opacity=90); color: #FFA07A;">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/from-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-6">
                                <input id="jenis_kelamin" type="radio" name="jenis_kelamin" required value="Laki-Laki">Laki-laki <br>
                                <input id="jenis_kelamin" type="radio" name="jenis_kelamin" required value="Perempuan">Perempuan
                                @if ($errors->has('jenis_kelamin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" required>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal_lahir" type="date" class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" name="tanggal_lahir" required>

                                @if ($errors->has('tanggal_lahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telepon" class="col-md-4 col-form-label text-md-right">{{ __('Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="telepon" type="text" class="form-control{{ $errors->has('telepon') ? ' is-invalid' : '' }}" name="telepon" required>

                                @if ($errors->has('telepon'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telepon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sosmed" class="col-md-4 col-form-label text-md-right">{{ __('Sosial Media') }}</label>

                            <div class="col-md-6">
                                <input id="sosmed" type="text" class="form-control{{ $errors->has('sosmed') ? ' is-invalid' : '' }}" name="sosmed" required>

                                @if ($errors->has('sosmed'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sosmed') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kartu_kredit" class="col-md-4 col-form-label text-md-right">{{ __('Kartu Kredit') }}</label>

                            <div class="col-md-6">
                                <input id="kartu_kredit" type="text" class="form-control{{ $errors->has('kartu_kredit') ? ' is-invalid' : '' }}" name="kartu_kredit" required>

                                @if ($errors->has('kartu_kredit'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kartu_kredit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
