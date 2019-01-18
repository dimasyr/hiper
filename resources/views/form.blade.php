@extends('layout.parent')

@section('title', 'Hiper')

@section('form')

<!-- Content -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Perbaikan</h1>
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
                <strong>Form Perbaikan</strong>
            </div>
            <div class="card-body card-block">
                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Plat Nomor</label></div>
                        <div class="col-12 col-md-9">
                            <select name="plat_nomor" id="plat_nomor" class="form-control">
                                @foreach($kendaraan as $truk)
                                <option value="{{ $truk->plat_nomor }}">{{ $truk->plat_nomor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Tanggal</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input" placeholder="<?php
                            $tgl=date('l, d-m-Y');
                            echo $tgl;
                            ?>" disabled="" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Teknisi</label></div>
                        <div class="col-12 col-md-9">
                            <select name="teknisi" id="teknisi" class="form-control">
                                @foreach($user as $teknisi)
                                    <option value="{{ $teknisi->id}}">{{ $teknisi->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="card-title">Basic Table</button>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">First</th>
                                          <th scope="col">Last</th>
                                          <th scope="col">Handle</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>    
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