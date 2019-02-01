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
                            <h1><a href="{{ route('user.index') }}">Data User </a>/ Tambah User</h1>
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
                        <strong>Tambah User</strong>
                    </div>
                    <div class="card-body card-block">

                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
                              class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="nama"
                                                                 class=" form-control-label">Nama</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" value="{{ old('nama') }}"
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
                                                                    placeholder="Masukkan username" value="{{ old('username') }}"
                                                                    class="form-control">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('username'))
                                            {{ $errors->first('username') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="password"
                                                                 class=" form-control-label">Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" id="password" name="password"
                                                                    placeholder="Masukkan password"
                                                                    class="form-control">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Role</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="role_id" id="role_id" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" @if($role->id == old('role_id')) selected @endif>{{ $role->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Tambah
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>

@endsection