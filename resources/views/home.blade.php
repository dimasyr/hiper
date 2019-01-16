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
            <form action="{{ route('cariPlatNomor') }}" method="GET" role="search">
                @csrf
                <div class="search-form col-lg-12">
                    <div class="form-group">
                        {{--<label>Cari Plat Nomor</label>--}}
                        <input type="text" name="q" placeholder="Cari Plat Nomor ...">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-info ml-3 w-10">
                                <span class="fa fa-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        @include('layouts.alert')
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
                                                <td>
                                                    <span class="name">{{ $data->getSupir(false)->nama ?? '(Belum ada supir)' }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('detailTruck', [
                                                'plat_nomor' => $data->plat_nomor
                                                ]) }}">
                                                        <button type="button" class="btn btn-secondary btn-sm">Detail
                                                            Truk
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                            {{ $kendaraan->links() }}
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