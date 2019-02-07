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
            src: url("/font/MyriadPro-Regular.otf");

        }

        @font-face {
            font-family: MyriadPro-Cond;
            src: url("/font/MyriadPro-Cond.otf");

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
            font-size: 21pt;
            padding-top: 30;
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
                                        <div align="center" id="head-big">FORM PERBAIKAN KENDARAAN</div>
                                    </td>
                                    <td valign="top">
                                        <table class="identitas" cellspacing="2" cellpadding="2">
                                            <tbody>
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td>:</td>
                                                    <td>placeholder</td>
                                                </tr>
                                                <tr>
                                                    <td>Nopol</td>
                                                    <td>:</td>
                                                    <td>placeholder</td>
                                                </tr>
                                                <tr>
                                                    <td>Sopir</td>
                                                    <td>:</td>
                                                    <td>placeholder</td>
                                                </tr>
                                                <tr>
                                                    <td>Teknisi</td>
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

                <tr class="bordered" style="height: 29px;">
                    <td style="width: 90px; height: 29px; text-align: center;">Tanggal</td>
                    <td style="width: 396px; height: 29px; text-align: center;">Item Perbaikan</td>
                    <td style="width: 87px; height: 29px; text-align: center;">Jumlah Item</td>
                    <td rowspan="1" style="width: 191px; height: 29px; text-align: center;">Biaya</td>
                    <td rowspan="4" style="width: 192px; height: 29px; text-align: center;">Keterangan</td>
                </tr>
                <tr class="bordered" style="height: 175px;">
                    <td style="width: 90px; height: 175px;">&nbsp;</td>
                    <td style="width: 396px; height: 175px;">&nbsp;</td>
                    <td style="width: 87px; height: 175px;">&nbsp;</td>
                </tr>
                <tr class="bordered" style="height: 10px;">
                    <td colspan="3" style="width: 90px; height: 10px;">Persetujuan :</td>
                </tr>
                <tr class="bordered" style="height: 79px;">
                    <td style="width: 90px; height: 79px; padding-left: 30">Operator</td>
                    <td style="width: 396px; height: 79px; text-align: center;">Teknisi</td>
                    <td style="width: 87px; height: 79px; padding-right: 30">Sopir</td>
                </tr>
                <tr class="bordered" style="height: 20px;">
                    <td colspan="3" style="width: 90px; height: 20px; text-align: center; padding-top: 10">Total :</td>
                    <td style="width: 191px; height: 20px;">&nbsp;</td>
                    <td style="width: 191px; height: 20px;">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
