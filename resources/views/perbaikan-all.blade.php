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
                            <h1>Data Perbaikan</h1>
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
            <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('permintaan.index') }}">
                        <button class="btn btn-sm btn-success">Semua</button>
                    </a>

                    <a href="{{ route('permintaan.index', ['tanggal' => today()->format('Y-m-d')]) }}">
                        <button class="btn btn-sm btn-info">Hari ini</button>
                    </a>
                </div>

                <div class="col-md-3">
                    <form action="{{ route('permintaan.index') }}" method="get" name="form_perbaikan"
                          id="form_perbaikan"
                          class="form-inline">

                        <label style="margin-right: 15px;">Pilih bulan</label>
                        <input style="width: 90px;" type="text" autocomplete="off" id="bulan"
                               name="bulan" class="form-control bulan" value="{{ request('bulan') }}">

                        <button type="submit" class="btn btn-info ml-1"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                @if($bulanSelected)
                    <div class="col-md-2">
                        <form action="{{ route('print.bulanan') }}" method="get" name="form_perbaikan"
                              id="form_print"
                              class="form-inline" target="_blank">

                            <input id="bulan2" type="hidden" autocomplete="off" name="bulan2">

                            <button id="btn_print" type="button" class="btn btn-info"><i class="fa fa-print"></i>
                                Print/bulan
                            </button>
                        </form>
                    </div>
                @endif
                <div class="col-md-4">
                    <form action="{{ route('permintaan.index') }}" method="get" name="form_perbaikan"
                          id="form_perbaikan"
                          class="form-inline">

                        <select name="plat_nomor" class="form-control">
                            @foreach($kendaraan as $truk)
                                <option value="{{ $truk->plat_nomor }}">{{ $truk->plat_nomor }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-info ml-1"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>


            <!-- Table -->
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Daftar Perbaikan</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th class="serial">No
                                                @if(request()->has('tanggal'))
                                                    <a href="{{ route('permintaan.index', [
                                                'sort2' => 'desc',
                                                'tanggal' => request('tanggal')
                                                ]) }}"
                                                       class="float-right"><i class="fa fa-arrow-up"></i></a>
                                                    <a href="{{ route('permintaan.index', [
                                                'sort2' => 'asc',
                                                'tanggal' => request('tanggal')
                                                ]) }}"
                                                       class="float-right"><i class="fa fa-arrow-down"></i></a>
                                                @endif
                                            </th>
                                            <th>Tanggal
                                                <a href="{{ route('permintaan.index', [
                                                'sort' => 'desc',
                                                'plat_nomor' => request('plat_nomor'),
                                                'bulan' => request('bulan'),
                                                'tanggal' => request('tanggal')
                                                ]) }}"
                                                   class="float-right"><i class="fa fa-arrow-up"></i></a>
                                                <a href="{{ route('permintaan.index', [
                                                'sort' => 'asc',
                                                'plat_nomor' => request('plat_nomor'),
                                                'bulan' => request('bulan'),
                                                'tanggal' => request('tanggal')
                                                ]) }}"
                                                   class="float-right"><i class="fa fa-arrow-down"></i></a>
                                            </th>
                                            <th>Kendaraan</th>
                                            <th>Nama Supir</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(request()->has('tanggal'))
                                            <?php $total = 0 ?>
                                            @foreach($permintaans as $permintaan)
                                                <?php $total++ ?>
                                            @endforeach
                                        @endif

                                        @foreach($permintaans as $permintaan)
                                            <tr>
                                                <td class="serial">
                                                    @if(request()->has('tanggal') && (request('sort2') == 'desc'))
                                                        {{ $total-- }}
                                                    @else
                                                        {{ $loop->iteration }}
                                                    @endif
                                                </td>
                                                <td>{{ formatDate(\Carbon\Carbon::parse($permintaan->tanggal),false,false) }}</td>
                                                <td>{{ $permintaan->kendaraan_id }}</td>
                                                <td>{{  $permintaan->getSupir(false)->nama }}</td>
                                                <td style="width: 181px;">

                                                    <a href="{{ route('print.perbaikan', [
                                                'id' => $permintaan->id
                                                ]) }}" target="_blank">
                                                        <button type="button" class="btn btn-outline-primary btn-sm"><i
                                                                    class="fa fa-print"></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('permintaan.edit',['id' => $permintaan->id]) }}">
                                                        <button type="button" class="btn btn-success btn-sm"><i
                                                                    class="fa fa-edit"></i>
                                                        </button>
                                                    </a>

                                                    <form onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?');"
                                                          action="{{ route('permintaan.destroy',[
                                                    'id' => $permintaan->id ]) }}" method="post" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-trash"></i>
                                                        </button>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{ $permintaans->links() }}
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
@push('js')
    <script>
        $(document).ready(function () {
            $('#btn_print').click(function () {
                $('#bulan2').val($('#bulan').val());
                $('#form_print').submit();
            });
        });
    </script>
@endpush