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
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h4>Info Kendaraan</h4>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-2 ml-4">
                                            @if(Auth::user()->role_id == 2)
                                                <button type="button" class="btn btn-success btn-sm "
                                                        data-toggle="modal"
                                                        data-target="#staticModal">
                                                    <i class="menu-icon fa fa-wrench"></i> Perbaiki
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <div>
                                            {{--modal--}}
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
                                               href="#pills-home"
                                               role="tab" aria-controls="pills-home" aria-selected="true">Informasi
                                                Umum</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                               href="#pills-profile"
                                               role="tab" aria-controls="pills-profile"
                                               aria-selected="false">Onderdil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                               href="#pills-contact"
                                               role="tab" aria-controls="pills-contact" aria-selected="false">Riwayat
                                                Perbaikan</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">

                                        {{--informasi umum--}}
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
                                                            : @if(($kendaraan->getSupir(false)->nama ?? 'kosong') == 'kosong')
                                                                <em> @endif{{ $kendaraan->getSupir(false)->nama ?? 'Belum ada supir'}} @if(($kendaraan->getSupir(false)->nama ?? 'kosong') == 'kosong') </em> @endif
                                                        </p>
                                                        <p class="card-text">Nomor rangka
                                                            : {{ $kendaraan->nomor_rangka }} </p>
                                                        <p class="card-text">Nomor mesin
                                                            : {{ $kendaraan->nomor_mesin }} </p>
                                                        <p class="card-text">Tanggal STNK
                                                            : {{
                                                            formatDate(\Carbon\Carbon::parse($kendaraan->stnk),false,false)
                                                            }} </p>
                                                        <p class="card-text">Tanggal pajak
                                                            : {{ formatDate(\Carbon\Carbon::parse($kendaraan->pajak),
                                                            false, false) }} </p>
                                                        <p class="card-text">Tanggal kir : {{
                                                            formatDate(\Carbon\Carbon::parse($kendaraan->kir),false,false)
                                                            }} </p>
                                                        <a href="{{ route('kendaraan.edit', [
                                                'id' => $kendaraan->plat_nomor
                                                ]) }}">
                                                            @if(Auth::user()->role_id == 1)
                                                                <button type="button" class="btn btn-success btn-sm"><i
                                                                            class="fa fa-edit"> Edit Kendaraan</i>
                                                                </button>
                                                            @endif
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
                                                                <th scope="col">Status Penggunaan</th>
                                                                <th scope="col">Detail</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($onderdils as $onderdil)
                                                                <tr>
                                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                                    <td>{{ $onderdil->nama }}</td>
                                                                    <td>
                                                                        @if($kendaraan->getStatusOnderdil($onderdil->id)['status']
                                                                        != null)
                                                                            <div class="progress mb-2">
                                                                                <div class="text-dark font-weight-bold progress-bar bg-info progress-bar-striped progress-bar-animated"
                                                                                     role="progressbar"
                                                                                     style="width: {{ number_format($kendaraan->getStatusOnderdil($onderdil->id)['status'],2) }}%"
                                                                                     aria-valuenow="{{ number_format($kendaraan->getStatusOnderdil($onderdil->id)['status'],2) }}"
                                                                                     aria-valuemin="0"
                                                                                     aria-valuemax="100">{{
                                                                                number_format($kendaraan->getStatusOnderdil($onderdil->id)['status'],2)
                                                                                }}
                                                                                    %
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <em>Belum pernah perbaikan</em>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($kendaraan->getStatusOnderdil($onderdil->id)['status']
                                                                        != null)
                                                                            <div>
                                                                                {{--detail button--}}
                                                                                <button type="button"
                                                                                        class="btn btn-secondary btn-sm"
                                                                                        data-toggle="modal"
                                                                                        data-target="#mediumModal{{ $loop->iteration }}">
                                                                                    Detail
                                                                                </button>
                                                                            </div>

                                                                            {{--modal detail button--}}
                                                                            <div class="table-responsive-md modal fade"
                                                                                 id="mediumModal{{ $loop->iteration }}"
                                                                                 tabindex="-1" role="dialog"
                                                                                 aria-labelledby="mediumModalLabel"
                                                                                 aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg"
                                                                                     role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="mediumModalLabel">
                                                                                                Detail Onderdil</h5>
                                                                                            <button type="button"
                                                                                                    class="close"
                                                                                                    data-dismiss="modal"
                                                                                                    aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <p>No. Seri
                                                                                                :
                                                                                                {{$kendaraan->getStatusOnderdil($onderdil->id)['onderdilKendaraan']->nomor_seri}}</p>
                                                                                            <p>Merk
                                                                                                :
                                                                                                {{$kendaraan->getStatusOnderdil($onderdil->id)['onderdilKendaraan']->merk}}</p>
                                                                                            <p>Masa Berlaku
                                                                                                :
                                                                                                {{$kendaraan->getStatusOnderdil($onderdil->id)['onderdilKendaraan']->masa_berlaku}}
                                                                                                tahun</p>
                                                                                            <p>Tempat beli
                                                                                                :
                                                                                                {{$kendaraan->getStatusOnderdil($onderdil->id)['onderdilKendaraan']->tempat_pembelian}}</p>
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
                                                                            {{--end modal detail button--}}
                                                                        @endif
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
                                                                @foreach($riwayat as $permintaan)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{
                                                                        formatDate(\Carbon\Carbon::parse($permintaan->tanggal),false,false)
                                                                        }}</td>
                                                                        <td>
                                                                            <a href="{{ route('info.riwayat',['id' => $permintaan->id]) }}">
                                                                                <button type="button"
                                                                                        class="btn btn-info btn-sm float-right">
                                                                                    Detail
                                                                                </button>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
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
