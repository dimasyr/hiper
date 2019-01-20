@extends('layout.parent')

@section('title', 'Hiper')

@section('user-all')

    <!-- Content -->
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Data User</h1>
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
                                    <strong class="card-title">Daftar User</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th class="serial">No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($users as $user)
                                            <tr>
                                                <td class="serial">{{ $loop->iteration }}</td>
                                                <td>{{ $user->nama}}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->getRole(false)->nama }}</td>
                                                <td>
                                                    <a href="{{ route('detailTruck', [
                                                'plat_nomor' => $user->id
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
                                    {{ $users->links() }}
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
