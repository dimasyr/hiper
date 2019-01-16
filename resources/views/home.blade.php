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

        <!-- Table -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Daftar Truk</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th>Plat Nomor</th>
                                            <th>Nama Supir</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($kendaraan as $data)
                                        <tr>
                                            <td class="serial">{{ $loop->iteration }}</td>
                                            <td>{{ $data->plat_nomor }}</td>
                                            <td><span class="name">{{ $data->getSupir(false)->nama ?? '(Belum ada
                                                    supir)' }}</span></td>
                                            <td>
                                                <a href="{{ route('detailTruck', [
                                                'plat_nomor' => $data->plat_nomor
                                                ]) }}">
                                                    <button type="button" class="btn btn-secondary btn-sm">Detail Truk
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

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
