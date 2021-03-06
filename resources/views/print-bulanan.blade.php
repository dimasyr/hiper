<html>

<head>
    <title>Riwayat Perbaikan/bulan</title>
    <style>
        .garis {
            border-bottom-style: dashed;
            border-bottom: 1px dashed #cccccc;
            margin-top: 20px;
            margin-bottom: 30px
        }

        .bordered td, 
        .bordered th {
            border: 1px solid black;
        }

        th {
            font-size: 9pt;
            vertical-align: middle;
        }


        .subhead td {
            font-size: 16px;
        }

        @media print {
            #ttd {
                position: fixed;
                bottom: 0.5cm;
            }
        }

        @font-face {
            font-family: MyriadPro-Regular;
            src: url("font/MyriadPro-Regular.otf");

        }

        @font-face {
            font-family: MyriadPro-Cond;
            src: url("font/MyriadPro-Cond.otf");

        }

        ol,
        li {
            font-family: MyriadPro-Regular;
        }

        #head-title {
            font-family: MyriadPro-Regular;
            font-weight: bold;
        }

        #head-big {
            font-family: MyriadPro-Cond;
            font-weight: bold;
            font-size: 16pt;
            padding-top: 30px;
        }

        #container td {
            font-family: MyriadPro-Regular;
        }

        #font1 td {
            font-size: 8pt;
        }

        #font2 td {
            font-size: 9pt;
        }

        #font3 td {
            font-size: 10pt;
        }

        #font4 td {
            font-size: 11pt;
        }

        .headermk td {
            font-weight: bold;
            background-color: #999;
            text-align: center
        }

        .small td {
            font-size: 9pt;
        }

        .identitas td {
            font-size: 10pt;
        }

        .ttd td {
            font-size: 12pt;
        }

        .header td {
            padding: 0px 10px 0px 10px
        }

        .ttd tr td {
            padding: 0 30px;
            font-size: 14px;
            font-family: MyriadPro-Regular;
        }

        tr {
            vertical-align: top;
            font-size: 14px;
            font-family: MyriadPro-Regular;
        }

        body {
            margin-left: 30px;
            margin-right: 30px;
        }

    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body><br>

    <div id="atas" align="center">
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="4" width="700">
            <tbody>
                <tr>
                    <td width="396" colspan="18" style="padding:0 0 0 0">
                        <table style="border-bottom:4px solid black; margin-bottom:5px; border-left: 1px" cellspacing="0"
                            cellpadding="0" width="100%">
                            <tbody>
                                <tr>
                                    <td style="padding-right:10px"></td>
                                    <td style="padding:0px 10px 0px 10px;">
                                        <div align="center" id="head-big">RIWAYAT PERBAIKAN</div>
                                    </td>
                                    <td valign="bottom" >
                                        <table class="identitas" cellspacing="2" cellpadding="2">
                                            <tbody>
                                                <tr>
                                                    <td>Bulan/Tahun</td>
                                                    <td>:</td>
                                                    <td>{{ $bulan }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr class="bordered" id="font2" style="height: 29px;">
                    <th style="height: 29px; text-align: center; padding: auto">No</th>
                    <th style="width: 60px; height: 29px; text-align: center;">Tanggal</th>
                    <th style="width: 87px; height: 29px; text-align: center;">Plat Nomor</th>
                    <th style="width: 70px; height: 29px; text-align: center;">Onderdil</th>
                    <th style="width: 87px; height: 29px; text-align: center;">Nomor Seri</th>
                    <th style="width: 90px; height: 29px; text-align: center;">Merk</th>
                    <th style="height: 29px; text-align: center;">Masa Berlaku (bln)</th>
                    <th style="width: 90px; height: 29px; text-align: center;">Tempat Beli</th>
                    <th style="height: 29px; text-align: center;">Banyak</th>
                    <th style="width: 90px; height: 29px; text-align: center;">Harga</th>
                </tr>
                @foreach($permintaans as $permintaan)
                <tr class="bordered" id="font1">
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td style="width: 60px; text-align: center;">{{ $permintaan->tanggal }}</td>
                    <td style="width: 87px; text-align: center;">{{ $permintaan->kendaraan_id }}</td>
                    <td style="width: 90px;">
                        @foreach($permintaan->getOnderdilKendaraan(false) as $onderdilkendaraan)
                            {{ $onderdilkendaraan->getOnderdil(false)->nama }} <br>
                        @endforeach
                    </td>
                    <td style="width: 90px; text-align: center;">
                        @foreach($permintaan->getOnderdilKendaraan(false) as $onderdilkendaraan)
                            {{ $onderdilkendaraan->nomor_seri}} <br>
                        @endforeach
                    </td>
                    <td style="width: 90px; text-align: center;">
                        @foreach($permintaan->getOnderdilKendaraan(false) as $onderdilkendaraan)
                            {{ $onderdilkendaraan->merk }} <br>
                        @endforeach
                    </td>
                    <td style="text-align: center;">
                        @foreach($permintaan->getOnderdilKendaraan(false) as $onderdilkendaraan)
                            {{ $onderdilkendaraan->masa_berlaku }} <br>
                        @endforeach
                    </td>
                    <td style="width: 90px; text-align: center;">
                        @foreach($permintaan->getOnderdilKendaraan(false) as $onderdilkendaraan)
                            {{ $onderdilkendaraan->tempat_pembelian }} <br>
                        @endforeach
                    </td>
                    <td style="text-align: center;">
                        @foreach($permintaan->getOnderdilKendaraan(false) as $onderdilkendaraan)
                            {{ $onderdilkendaraan->jumlah }} <br>
                        @endforeach
                    </td>
                    <td style="width: 90px; text-align: right;">
                        @foreach($permintaan->getOnderdilKendaraan(false) as $onderdilkendaraan)
                            {{ number_format(($onderdilkendaraan->harga*$onderdilkendaraan->jumlah),0,',','.') }} <br>
                        @endforeach
                    </td>
                </tr>
                @endforeach
                <tr class="bordered" style="height: 29px;">
                    <td colspan="9" style="width: 70px; height: 29px; text-align: center; font-weight: bold;">Total</td>
                    <td style="padding-right: 7px; width: 90px; height: 29px; text-align: right; font-weight: bold; font-size: 8pt;">
                        {{ number_format($total,0,',','.') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
