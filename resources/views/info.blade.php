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
                            <h1><a href="{{ route('dashboard') }}">Dashboard </a>/ Detail Truk</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content" style="margin-top: -40px">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Table -->
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header float-left">
                                    <div>
                                        <h4>Info Kendaraan</h4>
                                        <div class="float-right">

                                            <div>
                                                @if(Auth::user()->role_id == 2)
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#staticModal">
                                                    Perbaiki Sekarang
                                                </button>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="modal fade" id="staticModal" tabindex="-1" role="dialog"
                                                     aria-labelledby="staticModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticModalLabel">
                                                                    Peringatan</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Apakah anda yakin akan melakukan perbaikan?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel
                                                                </button>

                                                                <a href="{{ route('perbaikiSekarang',['plat_nomor' => $kendaraan->plat_nomor]) }}">
                                                                    <button type="button" class="btn btn-primary">
                                                                        Confirm
                                                                    </button>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                   href="#pills-home" role="tab" aria-controls="pills-home"
                                                   aria-selected="true">Informasi Umum</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                   href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                   aria-selected="false">Onderdil</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                                   href="#pills-contact" role="tab" aria-controls="pills-contact"
                                                   aria-selected="false">Riwayat Perbaikan</a>
                                            </li>
                                        </ul>
                                        {{--informasi umum--}}
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                 aria-labelledby="pills-home-tab">
                                                <div class="col-md-8">
                                                    <div class="card">
                                                        <img class="card-img-top"
                                                             src="{{ asset('images/truk_gandeng.jpg') }}"
                                                             alt="Card image cap">
                                                        <div class="card-body">
                                                            <h2 class="card-title mb-3">{{ $kendaraan->plat_nomor }} </h2>
                                                            <p class="card-text">Jenis kendaraan
                                                                : {{ $kendaraan->getJenisKendaraan(false)->nama }} </p>
                                                            <p class="card-text">Nama supir
                                                                : {{ $kendaraan->getSupir(false)->nama }} </p>
                                                            <p class="card-text">Nomor rangka
                                                                : {{ $kendaraan->nomor_rangka }} </p>
                                                            <p class="card-text">Nomor mesin
                                                                : {{ $kendaraan->nomor_mesin }} </p>
                                                            <p class="card-text">Tanggal STNK
                                                                : {{ $kendaraan->stnk }} </p>
                                                            <p class="card-text">Tanggal pajak
                                                                : {{ $kendaraan->pajak }} </p>
                                                            <p class="card-text">Tanggal kir : {{ $kendaraan->kir}} </p>
                                                            <a href="{{ route('kendaraan.edit', [
                                                'id' => $kendaraan->plat_nomor
                                                ]) }}">
                                                                <button type="button" class="btn btn-success btn-sm"><i
                                                                            class="fa fa-edit"> Edit Kendaraan</i>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--onderdil--}}
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                 aria-labelledby="pills-profile-tab">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Nama Onderdil</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Detail</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($onderdils as $onderdil)
                                                                    <tr>
                                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                                        <td>{{ $onderdil->nama }}</td>
                                                                        <td>
                                                                            <div class="progress mb-2">
                                                                                <div class="progress-bar bg-info progress-bar-striped progress-bar-animated"
                                                                                     role="progressbar"
                                                                                     style="width: 50%"
                                                                                     aria-valuenow="50"
                                                                                     aria-valuemin="0"
                                                                                     aria-valuemax="100">50%
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                <button type="button"
                                                                                        class="btn btn-secondary btn-sm"
                                                                                        data-toggle="modal"
                                                                                        data-target="#mediumModal">
                                                                                    Detail
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal fade" id="mediumModal"
                                                                                 tabindex="-1" role="dialog"
                                                                                 aria-labelledby="mediumModalLabel"
                                                                                 aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg"
                                                                                     role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="mediumModalLabel">
                                                                                                Medium Modal</h5>
                                                                                            <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <p>Ban Merk :</p>
                                                                                            <p>Tahun :</p>
                                                                                            <p>Foto :</p>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">
                                                                                                Close
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--riwayat perbaikan--}}
                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                                 aria-labelledby="pills-contact-tab">
                                                <div class="col-md-11">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            @if($riwayat->count() > 0)
                                                                <table id="" class="table table-striped table-bordered">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Tanggal</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Tanggal</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                    class="btn btn-secondary btn-sm float-right">
                                                                                Detail
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <div class="text-center">
                                                                    <p class="alert alert-danger">Belum pernah
                                                                        mengalami perbaikan.</p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
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