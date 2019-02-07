@extends('layout.parent')

@section('title', 'Hiper')

@section('content')
    <!-- Content -->
    <div class="content" style="margin-left: -280px; margin-top: -15px; width: auto;">
    @include('layouts.alert')
    <!-- Animated -->
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <form action="{{ route('onderdilkendaraan.store') }}" method="post" name="form_perbaikan" id="form_perbaikan"
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
                                                    @if(isset($kendaraan_terpilih) && $truk->plat_nomor == $kendaraan_terpilih->plat_nomor || old('plat_nomor') == $truk->plat_nomor)
                                                    selected
                                                    @endif>{{ $truk->plat_nomor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col col-md-1"></div>
                                <div class="col col-md-2"><label class=" form-control-label">Tanggal</label>
                                </div>
                                <div class="col-3 col-md-3"><input type="text" autocomplete="off" value="{{ old('tanggal') }}"
                                                                   name="tanggal" class="form-control tanggal"><small class="form-text text-muted alert-danger">
                                        @if($errors->has('tanggal'))
                                            {{ $errors->first('tanggal') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Teknisi</label></div>
                                <div class="col-3 col-md-3">
                                    <select name="teknisi_id" id="teknisi_id" class="form-control">
                                        @foreach($teknisis as $teknisi)
                                            <option value="{{ $teknisi->id}}" @if($teknisi->id == old('teknisi_id')) selected @endif>{{ $teknisi->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col col-md-1"></div>
                                <div class="col col-md-2"><label class=" form-control-label">Supir</label></div>
                                <div class="col-3 col-md-3">
                                    <select name="supir_id" id="supir_id" class="form-control">
                                        @foreach($supirs as $supir)
                                            <option value="{{ $supir->id}}"
                                                    @if((isset($kendaraan_terpilih) && ($supir->id == $kendaraan_terpilih->supir_id)) || $supir->id == old('supir_id'))
                                                    selected
                                                    @endif>{{ $supir->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="operator_id" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="col-lg-12">
                                <div class="card" style="margin-left: -30px; margin-right: -30px; margin-bottom: -10px;">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Onderdil</th>
                                                <th scope="col">No. Seri</th>
                                                <th scope="col">Ukuran</th>
                                                <th scope="col">Merk</th>
                                                <th scope="col">Masa berlaku</th>
                                                <th scope="col">Tempat beli</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">Harga (Rp)</th>
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
                                                            <option value="{{ $onderdil->id}}"
                                                                    @if($onderdil->id == old('onderdil_id.0')) selected @endif>{{ $onderdil->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </th>
                                                <td>
                                                    <input class="form-control" type="text" name="nomor_seri[]"
                                                           value="{{ old('nomor_seri.0') }}">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('nomor_seri.0'))
                                                            {{ $errors->first('nomor_seri.0') }}
                                                        @endif
                                                    </small>
                                                </td>
                                                <td>
                                                    <input style="width: 80px;" class="form-control" type="text" name="ukuran[]"
                                                           value="{{ old('ukuran.0') }}">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('ukuran.0'))
                                                            {{ $errors->first('ukuran.0') }}
                                                        @endif
                                                    </small>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="merk[]"
                                                           value="{{ old('merk.0') }}">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('merk.0'))
                                                            {{ $errors->first('merk.0') }}
                                                        @endif
                                                    </small>
                                                </td>
                                                <td style="width: 70px;">
                                                    <input style="text-align: right;" class="form-control" type="text" name="masa_berlaku[]"
                                                           value="{{ old('masa_berlaku.0') }}">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('masa_berlaku.0'))
                                                            {{ $errors->first('masa_berlaku.0') }}
                                                        @endif
                                                    </small>
                                                </td>
                                                <td>
                                                    <input class="form-control" type="text" name="tempat_pembelian[]"
                                                           value="{{ old('tempat_pembelian.0') }}">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('tempat_pembelian.0'))
                                                            {{ $errors->first('tempat_pembelian.0') }}
                                                        @endif
                                                    </small>
                                                </td>
                                                <td style="width: 70px;">
                                                    <input style="text-align: right;" class="form-control" type="text" name="jumlah[]"
                                                           value="{{ old('jumlah.0') }}">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('jumlah.0'))
                                                            {{ $errors->first('jumlah.0') }}
                                                        @endif
                                                    </small>
                                                </td>
                                                <td>
                                                    <input style="text-align: right;" class="form-control" type="text" name="harga[]"
                                                           value="{{ old('harga.0') }}">
                                                    <small class="form-text text-muted alert-danger">
                                                        @if($errors->has('harga.0'))
                                                            {{ $errors->first('harga.0') }}
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
                                                                    <option value="{{ $onderdil->id}}"
                                                                            @if($onderdil->id == old('onderdil_id.'.$i)) selected @endif>{{ $onderdil->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </th>
                                                        <td>
                                                            <input class="form-control" type="text" name="nomor_seri[]"
                                                                   value="{{ old('nomor_seri.'.$i) }}">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('nomor_seri.'.$i))
                                                                    {{ $errors->first('nomor_seri.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <input style="width: 80px;" class="form-control" type="text" name="ukuran[]"
                                                                   value="{{ old('ukuran.'.$i) }}">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('ukuran.'.$i))
                                                                    {{ $errors->first('ukuran.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text" name="merk[]"
                                                                   value="{{ old('merk.'.$i) }}">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('merk.'.$i))
                                                                    {{ $errors->first('merk.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <input style="text-align: right;" class="form-control" type="text"
                                                                   name="masa_berlaku[]"
                                                                   value="{{ old('masa_berlaku.'.$i) }}">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('masa_berlaku.'.$i))
                                                                    {{ $errors->first('masa_berlaku.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" type="text"
                                                                   name="tempat_pembelian[]"
                                                                   value="{{ old('tempat_pembelian.'.$i) }}">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('tempat_pembelian.'.$i))
                                                                    {{ $errors->first('tempat_pembelian.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <input style="text-align: right;" class="form-control" type="text"
                                                                   name="jumlah[]"
                                                                   value="{{ old('jumlah.'.$i) }}">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('jumlah.'.$i))
                                                                    {{ $errors->first('jumlah.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <input style="text-align: right;" class="form-control" type="text"
                                                                   name="harga[]"
                                                                   value="{{ old('harga.'.$i) }}">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('harga.'.$i))
                                                                    {{ $errors->first('harga.'.$i) }}
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

        });
    </script>
@endpush