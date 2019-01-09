@extends('layout.parent')

@section('title', 'Hiper')

@section('home')

<!-- Content -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
<!-- Animated -->
<div class="animated fadeIn">
    <!-- Search  -->
    <div class="search-form col-lg-12">
        <div class="form-group">
             <label>Cari Plat Nomor</label>
                <input type="text" name="search" placeholder="Masukkan Plat Nomor ...">
        </div>
     </div>
    <!-- /Search -->

    <!-- Table -->
    <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Daftar Truk</strong>
                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th>ID</th>
                                            <th>Nama Supir</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="serial">1.</td>
                                            <td> L 1234 A </td>
                                            <td>  <span class="name">Nurhadi</span> </td>
                                            <td>
                                                <a href="info.html"><button type="button" class="btn btn-secondary btn-sm">Detail Truk</button></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>
                </div>
            </div>

        </div>      
    <!-- /Table -->
</div>
<!-- .animated -->
</div>
<!-- /.content -->
<div class="clearfix"></div>
    
@endsection