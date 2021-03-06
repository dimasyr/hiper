@extends('layout.parent')

@section('title', 'Hiper')

@section('content')

    <!-- Content -->
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1><a href="{{ route('user.index') }}">Data User </a>/ Edit User</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
    @include('layouts.alert')
    <!-- Animated -->
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit User</strong>
                    </div>
                    <div class="card-body card-block">
                        {{--ganti nama & username--}}
                        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST"
                              enctype="multipart/form-data"
                              class="form-horizontal">
                            @csrf

                            <input type="hidden" name="_method" value="PATCH">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nama" class=" form-control-label">Nama</label>
                                </div>
                                <div class="col-12 col-md-9"><input type="text" id="nama" name="nama"
                                                                    value="{{ $user->nama }}"
                                                                    placeholder="Masukkan nama" class="form-control">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('nama'))
                                            {{ $errors->first('nama') }}
                                        @endif
                                    </small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="username"
                                                                 class=" form-control-label">Username</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="username" name="username"
                                                                    value="{{ $user->username }}"
                                                                    placeholder="Masukkan username"
                                                                    class="form-control">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('username'))
                                            {{ $errors->first('username') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="mb-5">
                                <button type="submit" class="btn btn-primary">Edit
                                </button>
                            </div>
                        </form>
                        {{--end ganti nama & username--}}

                        {{--ganti role--}}
                        <form action="{{ route('ganti.role', ['id' => $user->id]) }}" method="POST"
                              enctype="multipart/form-data"
                              class="form-horizontal">
                            @csrf

                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Role</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="role_id" id="role_id" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"
                                                    @if($user->role_id == $role->id) selected @endif>{{ $role->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-5">
                                <button type="submit" class="btn btn-primary">Ganti Role
                                </button>
                            </div>

                        </form>
                        {{--end ganti role--}}

                        {{--ganti password--}}
                        <form action="{{ route('ganti.password', ['id' => $user->id]) }}" method="POST"
                              enctype="multipart/form-data"
                              class="form-horizontal">
                            @csrf

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="password"
                                                                 class=" form-control-label">Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" id="password" name="password"
                                                                    class="form-control">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @endif
                                    </small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="password"
                                                                 class=" form-control-label">Konfirmasi Password</label>
                                </div>
                                <div class="col-12 col-md-9"><input type="password" id="password-confirm"
                                                                    name="password_confirmation"
                                                                    class="form-control">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @endif
                                    </small>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Ganti Password
                                </button>
                            </div>
                        </form>
                        {{--end ganti password--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>

@endsection