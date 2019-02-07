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
            font-size: 22pt;
            padding-top: 30;
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
                                        <div align="center" id="head-big">RIWAYAT PERBAIKAN (PLAT NOMOR)</div>
                                    </td>
                                    <td valign="bottom">
                                        <table class="identitas" cellspacing="2" cellpadding="2">
                                            <tbody>
                                                <tr>
                                                    <td>Bulan/Tahun</td>
                                                    <td>:</td>
                                                    <td>placeholder</td>
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
                    <td style="height: 29px; text-align: center;">No</td>
                    <td style="width: 60px height: 29px; text-align: center;">Tanggal</td>
                    <td style="width: 87px; height: 29px; text-align: center;">Plat Nomor</td>
                    <td style="width: 70px; height: 29px; text-align: center;">Onderdil</td>
                    <td style="width: 87px; height: 29px; text-align: center;">Nomor Seri</td>
                    <td style="width: 90px; height: 29px; text-align: center;">Merk</td>
                    <td style="height: 29px; text-align: center;">Masa Berlaku</td>
                    <td style="width: 90px; height: 29px; text-align: center;">Tempat Beli</td>
                    <td style="height: 29px; text-align: center;">Banyak</td>
                    <td style="width: 90px; height: 29px; text-align: center;">Harga</td>
                </tr>
                <tr class="bordered" id="font1">
                    <td style="text-align: center;">1</td>
                    <td style="width: 60px; text-align: center;">10-04-2019</td>
                    <td style="width: 87px; text-align: center;">L 1234 L</td>
                    <td style="width: 90px; text-align: center;">Oli</td>
                    <td style="width: 90px; text-align: center;">123</td>
                    <td style="width: 90px; text-align: center;">Sakura</td>
                    <td style="text-align: center;">1</td>
                    <td style="width: 90px; text-align: center;">Joyo</td>
                    <td style="text-align: center;">1</td>
                    <td style="width: 90px; text-align: center;">10000</td>
                </tr>
                <tr class="bordered" style="height: 29px;">
                    <td colspan="9" style="width: 70px; height: 29px; text-align: center;">Total</td>
                    <td style="width: 90px; height: 29px; text-align: center;"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
