@extends('layout.parent')

@section('title', 'Hiper')

@section('content')
    <!-- Content -->
    <div class="content" style="margin-left: -280px; margin-top: -15px; width: auto;">
    @include('layouts.alert')
    <!-- Animated -->
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <form action="{{ route('permintaan.update', [ 'id' => $permintaan->id ]) }}" method="post" name="form_perbaikan"
                      id="form_perbaikan"
                      class="form-horizontal">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">

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
                                                    @if($truk->plat_nomor == $permintaan->kendaraan_id)
                                                    selected
                                                    @endif>{{ $truk->plat_nomor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col col-md-1"></div>
                                <div class="col col-md-2"><label class=" form-control-label">Tanggal</label>
                                </div>
                                <div class="col-3 col-md-3"><input type="text" autocomplete="off"
                                                                   value="{{ $permintaan->tanggal }}"
                                                                   name="tanggal" class="form-control tanggal">
                                    <small class="form-text text-muted alert-danger">
                                        @if($errors->has('tanggal'))
                                            {{ $errors->first('tanggal') }}
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label class=" form-control-label">Teknisi</label></div>
                                <div class="col-3 col-md-3">
                                    <select name="teknisi_id" id="form_teknisi_dalam" class="form-control">
                                        @foreach($teknisis as $teknisi)
                                            <option value="{{ $teknisi->id}}"
                                                    @if($teknisi->id == $permintaan->teknisi_id))
                                                    selected @endif>{{ $teknisi->nama}}</option>
                                        @endforeach
                                    </select>
                                    <input id="form_teknisi_luar" type="text" name="teknisi_luar" class="form-control">
                                </div>
                                <div class="col col-md-1"></div>
                                <div class="col col-md-2"><label class=" form-control-label">Supir</label></div>
                                <div class="col-3 col-md-3">
                                    <select name="supir_id" id="supir_id" class="form-control">
                                        @foreach($supirs as $supir)
                                            <option value="{{ $supir->id}}"
                                                    @if($supir->id == $permintaan->supir_id)
                                                    selected
                                                    @endif>{{ $supir->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="operator_id" value="{{ Auth::user()->id }}">
                            </div>
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <filedset id="radio_teknisi_luar">
                                        <input type="radio" name="radio_teknisi_luar" value="dalam"> Dalam
                                        <input type="radio" name="radio_teknisi_luar" value="luar"> Luar
                                    </filedset>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card"
                                     style="margin-left: -30px; margin-right: -30px; margin-bottom: -10px;">
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
                                                <th scope="col">Harga satuan(Rp)</th>
                                                <th scope="col">
                                                    <button type="button" class="btn btn-sm btn-success" name="add"
                                                            id="add">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody id="dynamic_field">
                                            @if(!session()->has('jumlah'))
                                            @foreach($onderdilkendaraans as $onderdilkendaraan)
                                                <tr id="row{{ $loop->iteration }}" class="dynamic-added">
                                                    <th style="width: 200px;">
                                                        <select name="onderdil_id[]" class="form-control">
                                                            @foreach($onderdils as $onderdil)
                                                                <option value="{{ $onderdil->id}}"
                                                                        @if($onderdil->id == $onderdilkendaraan->onderdil_id))
                                                                        selected @endif>{{ $onderdil->nama}}</option>
                                                            @endforeach
                                                        </select>
                                                    </th>
                                                    <td>
                                                        <input class="form-control" type="text" name="nomor_seri[]"
                                                               value="{{ $onderdilkendaraan->nomor_seri }}">
                                                        <small class="form-text text-muted alert-danger">
                                                            @if($errors->has('nomor_seri.'.$loop->iteration))
                                                                {{ $errors->first('nomor_seri.'.$loop->iteration) }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <input style="width: 80px;" class="form-control" type="text"
                                                               name="ukuran[]"
                                                               value="{{ $onderdilkendaraan->ukuran }}">
                                                        <small class="form-text text-muted alert-danger">
                                                            @if($errors->has('ukuran.'.$loop->iteration))
                                                                {{ $errors->first('ukuran.'.$loop->iteration) }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" name="merk[]"
                                                               value="{{ $onderdilkendaraan->merk }}">
                                                        <small class="form-text text-muted alert-danger">
                                                            @if($errors->has('merk.'.$loop->iteration))
                                                                {{ $errors->first('merk.'.$loop->iteration) }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <input style="text-align: right;" class="form-control"
                                                               type="text"
                                                               name="masa_berlaku[]"
                                                               value="{{ $onderdilkendaraan->masa_berlaku }}">
                                                        <small class="form-text text-muted alert-danger">
                                                            @if($errors->has('masa_berlaku.'.$loop->iteration))
                                                                {{ $errors->first('masa_berlaku.'.$loop->iteration) }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                               name="tempat_pembelian[]"
                                                               value="{{ $onderdilkendaraan->tempat_pembelian }}">
                                                        <small class="form-text text-muted alert-danger">
                                                            @if($errors->has('tempat_pembelian.'.$loop->iteration))
                                                                {{ $errors->first('tempat_pembelian.'.$loop->iteration) }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <input style="text-align: right;" class="form-control"
                                                               type="text"
                                                               name="jumlah[]"
                                                               value="{{ $onderdilkendaraan->jumlah }}">
                                                        <small class="form-text text-muted alert-danger">
                                                            @if($errors->has('jumlah.'.$loop->iteration))
                                                                {{ $errors->first('jumlah.'.$loop->iteration) }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <input style="text-align: right;" class="form-control"
                                                               type="text"
                                                               name="harga[]"
                                                               value="{{ $onderdilkendaraan->harga }}">
                                                        <small class="form-text text-muted alert-danger">
                                                            @if($errors->has('harga.'.$loop->iteration))
                                                                {{ $errors->first('harga.'.$loop->iteration) }}
                                                            @endif
                                                        </small>
                                                    </td>
                                                    @if($loop->iteration != 1)
                                                        <td>
                                                            <button type="button" name="remove"
                                                                    id="{{ $loop->iteration }}"
                                                                    class="btn btn-sm btn-danger btn_remove"><i
                                                                        class="fa fa-close"></i></button>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach

                                            {{--{{ $jumlah }}--}}
                                            @elseif(session()->has('jumlah'))
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
                                                            <input style="width: 80px;" class="form-control" type="text"
                                                                   name="ukuran[]"
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
                                                            <input style="text-align: right;" class="form-control"
                                                                   type="text"
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
                                                            <input style="text-align: right;" class="form-control"
                                                                   type="text"
                                                                   name="jumlah[]"
                                                                   value="{{ old('jumlah.'.$i) }}">
                                                            <small class="form-text text-muted alert-danger">
                                                                @if($errors->has('jumlah.'.$i))
                                                                    {{ $errors->first('jumlah.'.$i) }}
                                                                @endif
                                                            </small>
                                                        </td>
                                                        <td>
                                                            <input style="text-align: right;" class="form-control"
                                                                   type="text"
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
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Edit</button>
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

            $('#form_teknisi_luar').hide();

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

            //radiobutton event
            $('input[type=radio][name=radio_teknisi_luar]').change(function () {
                if ($(this).val() == 'dalam') {
                    $('#form_teknisi_dalam').show();
                    $('#form_teknisi_luar').hide();
                } else if ($(this).val() == 'luar') {
                    $('#form_teknisi_dalam').hide();
                    $('#form_teknisi_luar').show();
                }
            });

        });
    </script>
@endpush