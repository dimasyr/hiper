<html>

<head>
    <title>Perbaikan Kendaraan</title>
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
            vertical-align: middle;
        }

        .head {
            font-size: 10px;
        }

        .table {
            border-collapse: collapse;
            border: 1px solid black;
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

        .headermk td {
            font-weight: bold;
            background-color: #999;
            text-align: center
        }

        .tablemk {
            border: 1px solid #000;
            border-collapse: collapse
        }

        .tablenilai {
            border-collapse: collapse;
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

        #title {
            font-weight: bold;
            font-size: 15pt;
            text-align: center;
            margin-bottom: 20px;
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

        .abu {
            background-color: #cccccc
        }

        .z {
            padding: 0px 5px 0px 5px
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
    <table style="border-collapse:collapse" cellspacing="0" cellpadding="4" width="500">
        <tbody>
        <tr>
            <td width="396" colspan="18" style="padding:0 0 0 0">
                <table style="border-bottom:3px solid black; margin-bottom:5px; border-left: 1px" cellspacing="0"
                       cellpadding="0"
                       width="100%">
                    <tbody>
                    <tr>
                        <td style="padding-right:10px"></td>
                        <td style="padding:0px 10px 0px 10px;">
                            <div align="center" id="head-big">FORM PERBAIKAN KENDARAAN</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table>
                    <tr>
                        <td>No. Pol</td>
                        <td>: {{ $permintaan->kendaraan_id }}</td>
                    </tr>
                    <tr>
                        <td>Supir</td>
                        <td>: {{ $permintaan->getSupir(false)->nama }}</td>
                    </tr>
                    <tr>
                        <td>Teknisi</td>
                        <td>:
                            @if(empty($permintaan->teknisi_luar))
                                {{ $permintaan->getTeknisi(false)->nama }}
                            @else
                                {{ $permintaan->teknisi_luar }}
                            @endif
                        </td>
                    </tr>
                </table>
                <br>
            </td>
        </tr>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="4" width="700">
            <tr class="bordered" style="height: 29px; font-weight: bold">
                <th style="width: 90px; height: 29px; text-align: center;">Tanggal</th>
                <th style="width: 396px; height: 29px; text-align: center;">Item Perbaikan</th>
                <th style="width: 87px; height: 29px; text-align: center;">Jumlah Item</th>
                <th style="width: 191px; height: 29px; text-align: center;">Est. Biaya</th>
                <th style="width: 192px; height: 29px; text-align: center;">Keterangan</th>
            </tr>
            <tr class="bordered">
                <td>{{ $permintaan->tanggal }}</td>
                <td>
                    @foreach($onderdilkendaraans as $onderdilkendaraan)
                        {{ $onderdilkendaraan->getOnderdil(false)->nama }} <br>
                    @endforeach
                </td>
                <td style="text-align: center">
                    @foreach($onderdilkendaraans as $onderdilkendaraan)
                        {{ $onderdilkendaraan->jumlah }} <br>
                    @endforeach
                </td>
                <td style="text-align: right">
                    @foreach($onderdilkendaraans as $onderdilkendaraan)
                        {{ number_format(($onderdilkendaraan->harga * $onderdilkendaraan->jumlah),0,",",".") }} <br>
                    @endforeach
                </td>
                <td></td>
            </tr>
            <tr style="font-weight: bold" class="bordered">
                <td colspan="3" style="text-align: center;">Total Estimasi Biaya</td>
                <td colspan="2" style="text-align: center;">{{ number_format($total,0,',','.') }}</td>
            </tr>
        </table>
        <br>
        <table style="border-collapse:collapse" cellspacing="0" cellpadding="4" width="500">
            <tr>
                <td colspan="3">Persetujuan :</td>
            </tr>
            <tr class="bordered" style="height: 100px; text-align: center">
                <td>
                    <span style="text-decoration: underline;">Operator</span> <br><br><br><br>
                    <span style="text-decoration: none;">
                        {{ $permintaan->getOperator(false)->nama }}
                    </span>
                </td>
                <td>
                    <span style="text-decoration: underline;">Teknisi</span> <br><br><br><br>
                    <span style="text-decoration: none;">
                    @if(empty($permintaan->teknisi_luar))
                        {{ $permintaan->getTeknisi(false)->nama }}
                    @else
                        {{ $permintaan->teknisi_luar }}
                    @endif
                    </span>
                </td>
                <td>
                    <span style="text-decoration: underline;">Sopir</span> <br><br><br><br>
                    <span style="text-decoration: none;">
                        {{ $permintaan->getSupir(false)->nama }}
                    </span>
                </td>
            </tr>
        </table>
        </tbody>
    </table>
</div>
</body>

</html>