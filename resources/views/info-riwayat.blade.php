@extends('layout.parent')

@section('title', 'Hiper')

@section('content')

<!-- Content -->
        <div class="breadcrumbs"></div>
        <div class="content">
            <!-- Animated -->
               <div class="row">
                    <div class="col col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Riwayat Perbaikan</strong> (Plat Nomor)
                                <button type="submit" class="btn btn-primary btn-sm float-right">
                                    <i class="fa fa-close"></i> Kembali
                                </button>
                            </div>
                            <div class="card-body card-block">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-6"><label class=" form-control-label">Plat Nomor</label></div>
                                        <div class="col-12 col-md-6">
                                            <p class="form-control-static">Placeholder</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-6"><label class=" form-control-label">Teknisi</label></div>
                                        <div class="col-12 col-md-6">
                                            <p class="form-control-static">Placeholder</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-6"><label class=" form-control-label">Tanggal</label></div>
                                        <div class="col-12 col-md-6">
                                            <p class="form-control-static">Placeholder</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-6"><label class=" form-control-label">Supir</label></div>
                                        <div class="col-12 col-md-6">
                                            <p class="form-control-static">Placeholder</p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-6"><label class=" form-control-label">Onderdil</label></div>
                                        <div class="col-12 col-md-6">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Detail
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-6">
                        <div class="">
                            <div class="">
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                            <div class="collapse" id="collapseExample">
                                              <div class="card card-body">
                                                <div class="row form-group">
                                                    <div class="col col-md-6"><label class=" form-control-label">Nomor Seri</label></div>
                                                    <div class="col-12 col-md-6">
                                                        <p class="form-control-static">Placeholder</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-6"><label class=" form-control-label">Merk</label></div>
                                                    <div class="col-12 col-md-6">
                                                        <p class="form-control-static">Placeholder</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-6"><label class=" form-control-label">Masa Berlaku (tahun)</label></div>
                                                    <div class="col-12 col-md-6">
                                                        <p class="form-control-static">Placeholder</p>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-6"><label class=" form-control-label">Tempat Beli</label></div>
                                                    <div class="col-12 col-md-6">
                                                        <p class="form-control-static">Placeholder</p>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
               </div>     

            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>

@endsection