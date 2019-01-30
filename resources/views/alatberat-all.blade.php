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
                            <h1>Data Alat Berat</h1>
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
            <a href="{{ route('alatberat.create') }}">
                <button class="btn btn-info btn-smlogincont"><i class="fa fa-plus"></i> Tambah Alat Berat</button>
            </a>
            <!-- Table -->
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Daftar Alat Berat</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered"
                                           style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th>Nama</th>
                                            <th>Tahun</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($alatberats as $alatberat)
                                            <tr>
                                                <td class="serial">{{ $loop->iteration }}</td>
                                                <td>{{ $alatberat->nama }}</td>
                                                <td>{{ $alatberat->tahun }}</td>
                                                <td>
                                                    <a href="{{ route('alatberat.edit', [
                                                'id' => $alatberat->id
                                                ]) }}">
                                                        <button type="button" class="btn btn-success btn-sm"><i
                                                                    class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <form onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?');"
                                                          action="{{ route('alatberat.destroy',[ 'id' => $alatberat->id]) }}"
                                                          method="post"
                                                          class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-trash"></i>
                                                        </button>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                    </form>
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