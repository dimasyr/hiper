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
                        <h1><a href="{{ route('onderdil.index') }}">Data Alat Berat </a>/ Tambah Alat Berat</h1>
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
                    <strong>Tambah Alat Berat</strong>
                </div>
                <div class="card-body card-block">

                    <form action="{{ route('onderdil.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="nama" class=" form-control-label">Nama</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama"
                                    class="form-control">
                                <small class="form-text text-muted alert-danger">
                                    @if($errors->has('nama'))
                                    {{ $errors->first('nama') }}
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="nama" class=" form-control-label">Tahun</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama"
                                    class="form-control">
                                <small class="form-text text-muted alert-danger">
                                    
                                </small>
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
