@extends('layout.parent')

@section('title', 'Hiper')

@section('inputuser')

<!-- Content -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tambah</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
<!-- Animated -->
<div class="animated fadeIn">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah User</strong>
            </div>
            <div class="card-body card-block">
                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Role</label></div>
                        <div class="col-12 col-md-9">
                            <select name="select" id="select" class="form-control">
                                <option value="0">Pilih Role</option>
                                <option value="1">Administrator</option>
                                <option value="2">Operator</option>
                                <option value="3">Teknisi</option>
                            </select>
                        </div>
                    </div>
                </form>    
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary">Submit
                </button>
                <button type="button" class="btn btn-danger">Reset
                </button>
            </div>
        </div>
    </div>
</div>
<!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>
    
@endsection