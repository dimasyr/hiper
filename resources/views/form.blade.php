@extends('layout.parent')

@section('title', 'Hiper')

@section('content')
    @include('layouts.alert')
    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>


    <div class="alert alert-success print-success-msg" style="display:none">
        <ul></ul>
    </div>
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <form action="{{ route('proses.perbaikan') }}" method="post" name="form_perbaikan" id="form_perbaikan"
                      class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Perbaikan</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Plat Nomor</label></div>
                                <div class="col-3 col-md-3">
                                    <select name="plat_nomor" id="plat_nomor" class="form-control">
                                        @foreach($kendaraan as $truk)
                                            <option value="{{ $truk->plat_nomor }}"
                                                    @if(isset($kendaraan_terpilih) && $truk->plat_nomor == $kendaraan_terpilih->plat_nomor)
                                                    selected
                                                    @endif>{{ $truk->plat_nomor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col col-md-1"></div>
                                <div class="col col-md-2"><label class=" form-control-label">Tanggal</label>
                                </div>
                                <div class="col-3 col-md-3"><input type="text" id=""
                                                                   name="" placeholder="<?php
                                    $tgl = date('l, d-m-Y');
                                    echo formatDate(\Carbon\Carbon::parse($tgl), true, false);
                                    ?>" class="form-control tanggal"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Teknisi</label></div>
                                <div class="col-3 col-md-3">
                                    <select name="teknisi_id" id="teknisi_id" class="form-control">
                                        @foreach($teknisis as $teknisi)
                                            <option value="{{ $teknisi->id}}">{{ $teknisi->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col col-md-1"></div>
                                <div class="col col-md-2"><label class=" form-control-label">Supir</label></div>
                                <div class="col-3 col-md-3">
                                    <select name="supir_id" id="supir_id" class="form-control">
                                        @foreach($supirs as $supir)
                                            <option value="{{ $supir->id}}"
                                                    @if(isset($kendaraan_terpilih) && $supir->id== $kendaraan_terpilih->supir_id)
                                                    selected
                                                    @endif>{{ $supir->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="operator_id" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Onderdil</th>
                                                <th scope="col">No. Seri</th>
                                                <th scope="col">Merk</th>
                                                <th scope="col">Masa berlaku (tahun)</th>
                                                <th scope="col">Tempat beli</th>
                                                <th scope="col">
                                                    <button type="button" class="btn btn-sm btn-success" name="add"
                                                            id="add">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody id="dynamic_field">
                                            <tr>
                                                <th style="width: 200px;">
                                                    <select name="onderdil_id[]" class="form-control">
                                                        @foreach($onderdils as $onderdil)
                                                            <option value="{{ $onderdil->id}}">{{ $onderdil->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </th>
                                                <td>
                                                    <input class="form-control" type="text" name="nomor_seri[]">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('nomor_seri.0'))
                                                            {{ $errors->first('nomor_seri.0') }}
                                                        @endif
                                                    </small>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="merk[]">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('merk.0'))
                                                            {{ $errors->first('merk.0') }}
                                                        @endif
                                                    </small>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="masa_berlaku[]">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('masa_berlaku.0'))
                                                            {{ $errors->first('masa_berlaku.0') }}
                                                        @endif
                                                    </small>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="tempat_pembelian[]">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('tempat_pembelian.0'))
                                                            {{ $errors->first('tempat_pembelian.0') }}
                                                        @endif
                                                    </small>
                                                </td>
                                            </tr>
                                            {{--{{ $jumlah }}--}}
                                            @if(session()->has('jumlah'))
                                                @for($i = 1 ; $i < session('jumlah') ; $i++)
                                                    <tr id="row{{ $i }}" class="dynamic-added">
                                                        <th style="width: 200px;">
                                                            <select name="onderdil_id[]" class="form-control">
                                                                @foreach($onderdils as $onderdil)
                                                                    <option value="{{ $onderdil->id}}">{{ $onderdil->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </th>
                                                        <td>
                                                            <input class="form-control" type="text" name="nomor_seri[]">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('nomor_seri.'.$i))
                                                                    {{ $errors->first('nomor_seri.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text" name="merk[]">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('merk.'.$i))
                                                                    {{ $errors->first('merk.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   name="masa_berlaku[]">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('masa_berlaku.'.$i))
                                                                    {{ $errors->first('masa_berlaku.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   name="tempat_pembelian[]">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('tempat_pembelian.'.$i))
                                                                    {{ $errors->first('tempat_pembelian.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <button type="button" name="remove" id="{{ $i }}"
                                                                    class="btn btn-sm btn-danger btn_remove"><i
                                                                        class="fa fa-close"></i></button>
                                                        </td>
                                                    </tr>
                                                @endfor
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>

@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var postURL = "<?php echo url('proses.perbaikan'); ?>";
            var i = 1;

            /*
            menambah field input onderdil
             */
            $('#add').click(function () {
                i++;
                $('#dynamic_field').append(
                    '<tr id="row' + i + '" class="dynamic-added">' + $('tbody').find('tr').clone()[0].innerHTML + '<td><button type="button" name="remove" id="' + i + '" class="btn btn-sm btn-danger btn_remove"><i class="fa fa-close"></i></button></td>' + '</tr>'
                );
            });

            /*
            menghapus field input onderdil
             */
            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // $('#submit').click(function () {
            //     $.ajax({
            //         url: postURL,
            //         method: "POST",
            //         data: $('#form_perbaikan').serialize(),
            //         type: 'json',
            //         success: function (data) {
            //             if (data.error) {
            //                 printErrorMsg(data.error);
            //             } else {
            //                 i = 1;
            //                 $('.dynamic-added').remove();
            //                 $('#form_perbaikan')[0].reset();
            //                 $(".print-success-msg").find("ul").html('');
            //                 $(".print-success-msg").css('display', 'block');
            //                 $(".print-error-msg").css('display', 'none');
            //                 $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
            //             }
            //         }
            //     });
            // });

            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $(".print-success-msg").css('display', 'none');
                $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    </script>
@endpush