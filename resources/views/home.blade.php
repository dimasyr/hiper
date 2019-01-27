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
                            <h1>@if(Auth::user()->role_id == 2)Dashboard @else Data Kendaraan @endif</h1>
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
            @if(Auth::user()->role_id == 1)
            <a href="{{ route('kendaraan.create') }}">
                <button class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Tambah Kendaraan</button>
            </a>
            @endif
            <!-- Table -->
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Daftar Kendaraan</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered"
                                           style="width: 100%">
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
                                                <td style="width: 181px;">
                                                    @if(Auth::user()->role_id == 2)
                                                        <a href="{{ route('detailTruck', [
                                                'plat_nomor' => $data->plat_nomor
                                                ]) }}">
                                                            <button type="button" class="btn btn-primary btn-sm">Detail
                                                                Truk
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('perbaikiSekarang',['plat_nomor' => $data->plat_nomor]) }}">
                                                            <button type="button" class="btn btn-success btn-sm">
                                                                <i class="menu-icon fa fa-wrench"></i> Perbaiki
                                                            </button>
                                                        </a>
                                                </td>
                                                @else
                                                    <a href="{{ route('detailTruck', [
                                                'plat_nomor' => $data->plat_nomor
                                                ]) }}">
                                                        <button type="button" class="btn btn-primary btn-sm"><i
                                                                    class="fa fa-eye"></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('kendaraan.edit', [
                                                'id' => $data->plat_nomor
                                                ]) }}">
                                                        <button type="button" class="btn btn-success btn-sm"><i
                                                                    class="fa fa-edit"></i>
                                                        </button>
                                                    </a>

                                                    <form onclick="return confirm('Apakah anda yakin ingin menghapus user tersebut?');" action="{{ route('kendaraan.destroy',[
                                                    'id' => $data->plat_nomor ]) }}" method="post" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-trash"></i>
                                                        </button>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                    </form>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>

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
