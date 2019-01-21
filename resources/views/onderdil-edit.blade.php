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
                        <h1><a href="{{ route('onderdil.index') }}">Data Onderdil </a>/ Edit Onderdil</h1>
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
                    <strong>Edit Onderdil</strong>
                </div>
                <div class="card-body card-block">

                    <form action="{{ route('onderdil.update', ['id' => $onderdil->id]) }}" method="POST" enctype="multipart/form-data"
                          class="form-horizontal">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="nama"
                                                             class=" form-control-label">Nama</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" value="{{ $onderdil->nama }}"
                                                                placeholder="Masukkan nama" class="form-control">
                                <small class="form-text text-muted alert-danger">
                                    @if($errors->has('nama'))
                                    {{ $errors->first('nama') }}
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Edit
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