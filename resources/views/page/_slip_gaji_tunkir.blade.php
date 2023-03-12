<?php
$url="counter_pegawai";
header("Refresh:5; $url");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Si-Klipas</title>
    <style>
    {
        margin: 0;
        padding: 0;
        font-family: arial;
        font-size: 6pt;
        color: #000;
    }

    body {
        width: 100%;
        font-family: arial;
        font-size: 6pt;
        margin: 0;
        padding: 0;
    }

    p {
        margin: 0;
        padding: 0;
        margin-left: 0px;
    }

    #wrapper {
        width: 44mm;
        margin: 0 0mm;
    }

    #main {
        float: left;
        width: 0mm;
        background: #ffffff;
        padding: 0mm;
    }

    #sidebar {
        float: right;
        width: 0mm;
        background: #ffffff;
        padding: 0mm;
    }

    .page {
        height: 100mm;
        width: 80mm;
        page-break-after: always;
    }

    table {
        /** border-left: 1px solid #fff;
            border-top: 1px solid #fff; **/
        font-family: arial;
        border-spacing: 0;
        border-collapse: collapse;

    }

    table td {
        /**border-right: 1px solid #fff;
            border-bottom: 1px solid #fff;**/
        padding: 2mm;

    }

    table.heading {
        height: 0mm;
        margin-bottom: 1px;
    }

    h1.heading {
        font-size: 6pt;
        color: #000;
        font-weight: normal;
        font-style: italic;


    }

    h2.heading {
        font-size: 6pt;
        color: #000;
        font-weight: normal;
    }

    hr {
        color: #ccc;
        background: #ccc;
    }

    #invoice_body {
        height: auto;
    }

    #invoice_body,
    #invoice_total {
        width: 100%;
    }

    #invoice_body table,
    #invoice_total table {
        width: 100%;
        /** border-left: 1px solid #ccc;
            border-top: 1px solid #ccc; **/

        border-spacing: 0;
        border-collapse: collapse;

        margin-top: 0mm;
    }

    #invoice_body table td,
    #invoice_total table td {
        font-size: 8pt;
        /** border-right: 1px solid black;
            border-bottom: 1px solid black;**/
        padding: 0 0;
        font-weight: normal;
    }

    #invoice_head table td {
        text-align: left;
        font-size: 8pt;
        /** border-right: 1px solid black;
            border-bottom: 1px solid black;**/
        padding: 0 0;
        font-weight: normal;
    }

    #invoice_body table td.mono,
    #invoice_total table td.mono {
        text-align: right;
        padding-right: 0mm;
        font-size: 6pt;
        border: 1px solid white;
        font-weight: normal;
    }

    #footer {
        width: 44mm;
        margin: 0 2mm;
        padding-bottom: 1mm;
    }

    #footer table {
        width: 100%;
        /** border-left: 1px solid #ccc;
            border-top: 1px solid #ccc; **/

        background: #eee;

        border-spacing: 0;
        border-collapse: collapse;
    }

    #footer table td {
        width: 25%;
        text-align: center;
        font-size: 8pt;
        /** border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;**/
    }
    </style>
    <script language="Javascript1.2">
    <!--
    function printpage() {
        window.print();
    }
    //
    -->
    </script>
</head>

<body>
    @foreach($gaji as $p)
    @foreach($tunkir as $t)
    @foreach($user = DB::table('users')->where('nik',$p->nip)->get() as $users)
    <div id="wrapper">
        <div id="invoice_head">
            <table style="width:170%; border-spacing:0;">
                <tr>
                    <td rowspan="4">
                        <img class="img-responsive avatar-view" src="{{ public_path('assets/images/logo_fix.png') }}"
                            width="40px">
                    </td>
                    <td style="font-size: 6pt;">
                        <center>
                            <p>KEMENTERIAN HUKUM DAN HAM REPUBLIK INDONESIA</p>
                            <p>KANTOR WILAYAH JAWA BARAT</p>
                            <b>LEMBAGA PEMASYARAKATAN KELAS IIA KARAWANG</b>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 4pt;">
                        <center>
                            <p>Jl. Surotokunto No.km 6, Kondangjaya, Kec. Karawang Tim., Karawang, Jawa Barat 41371</p>
                            <p>Telp:- Web:http://lapaskarawang.kemenkumham.go.id</p>
                        </center>
                    </td>
                </tr>
                <tr>
                </tr>
            </table>
            <table style="width:164%; border-spacing:0;" border="0">
                <tr>
                    <td style="font-size: 7pt;">==================================================</td>
                </tr>
            </table>
            <table style="width:164%; border-spacing:0;" border="0">
                </br>
                <tr>
                    <td>
                        <center><b>SLIP GAJI DAN TUNJANGAN KINERJA</b></center>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                </tr>
                <tr>
                    <td>NAMA &nbsp; : {{$users->nama}}</td>
                </tr>
                <tr>
                    <td>NIP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$p->nip}}</td>
                </tr>
                <tr>
                    <td style="font-size: 7pt;"></br>==================================================</td>
                </tr>
            </table>
            <table style="width:164%; border-spacing:0;" border="0">
                </br>
                <tr>
                    <td>A. GAJI BULAN </td>
                    <td>: {{$p->penerimaan_bulan}} {{$p->penerimaan_tahun}}</td>
                </tr>
            </table>
            <table style="width:164%; border-spacing:0;" border="0">
                </br>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 1. GAJI POKOK </td>
                    <td>: Rp. {{number_format($p->gaji_pokok),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 2. POTONGAN </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Potongan Dharma Wanita </td>
                    <td>: Rp. {{number_format($p->potongan_dw),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Potongan BRI/BSM </td>
                    <td>: Rp. {{number_format($p->potongan_bank),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Potongan Koperasi </td>
                    <td>: Rp. {{number_format($p->potongan_koperasi),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Dana Sosial </td>
                    <td>: Rp. {{number_format($p->dana_sosial),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Sumbangan Olahraga</td>
                    <td>: Rp. {{number_format($p->sumbangan_olahraga),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Rumah Dinas </td>
                    <td>: Rp. {{number_format($p->rumah_dinas),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g. Potongan Bank BTN </td>
                    <td>: Rp. {{number_format($p->potongan_bank2),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; h. Palang Merah Indonesia </td>
                    <td>: Rp. {{number_format($p->pmi),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; i. Harkop </td>
                    <td>: Rp. {{number_format($p->harkop),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; j. Administrasi Bank </td>
                    <td>: Rp. {{number_format($p->adm_bank),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 3. JUMLAH POTONGAN </td>
                    <td>: Rp.
                        {{number_format($p->potongan_dw + $p->potongan_bank + $p->potongan_koperasi + $p->dana_sosial + $p->sumbangan_olahraga + $p->rumah_dinas + $p->potongan_bank2 + $p->pmi + $p->harkop + $p->adm_bank),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 4. GAJI BERSIH </td>
                    <td>: Rp.
                        {{number_format($p->gaji_pokok-($p->potongan_dw + $p->potongan_bank + $p->potongan_koperasi + $p->dana_sosial + $p->sumbangan_olahraga + $p->rumah_dinas + $p->potongan_bank2 + $p->pmi + $p->harkop + $p->adm_bank)),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td></br>================================</td>
                    <td></br>============</td>
                </tr>
            </table>
            <table style="width:164%; border-spacing:0;" border="0">
                </br>
                <tr>
                    <td>B. TUNJANGAN KINERJA BULAN </td>
                    <td>: {{$t->penerimaan_bulan}} {{$t->penerimaan_tahun}}</td>
                </tr>
            </table>
            <table style="width:164%; border-spacing:0;" border="0">
                </br>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 1. TUNJANGAN KINERJA </td>
                    <td>: Rp. {{number_format($t->tunker),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 2. POTONGAN </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Potongan Dharma Wanita</td>
                    <td>: Rp. {{number_format($t->potongan_dw),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Potongan Koperasi </td>
                    <td>: Rp. {{number_format($t->potongan_koperasi),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Dana Sosial </td>
                    <td>: Rp. {{number_format($t->dana_sosial),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Sumbangan Olahraga </td>
                    <td>: Rp. {{number_format($t->sumbangan_olahraga),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Potongan Bank BTN </td>
                    <td>: Rp. {{number_format($t->potongan_bank),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Potongan Absen </td>
                    <td>: Rp. {{number_format($t->potongan_absen),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g. Potongan Jurnal </td>
                    <td>: Rp. {{number_format($t->potongan_jurnal),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 3. JUMLAH POTONGAN </td>
                    <td>: Rp.
                        {{number_format($t->potongan_dw + $t->potongan_koperasi + $t->dana_sosial + $t-> potongan_absen + $t->sumbangan_olahraga + $t->potongan_bank + $t->potongan_absen + $t->potongan_jurnal),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 4. TUNKER BERSIH </td>
                    <td>: Rp.
                        {{number_format($t->tunker-($t->potongan_dw + $t->potongan_koperasi + $t->dana_sosial + $t-> potongan_absen + $t->sumbangan_olahraga + $t->potongan_bank + $t->potongan_absen + $t->potongan_jurnal)),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td></br>================================</td>
                    <td></br>============</td>
                </tr>
            </table>
            <table style="width:164%; border-spacing:0;" border="0">
                <tr>
                    <td>*Catatan : Data slip gaji dan tunjangan kinerja ini diinput oleh Bendahara Lapas Kelas IIA
                        Karawang </td>
                </tr>
                <tr>
                    </br>
                    {!! QrCode::size(100)->generate($p->kode);!!}
                    </br>
                    </br>
                </tr>
            </table>
        </div>
    </div>
    @endforeach
    @endforeach
    @endforeach
</body>
<script>
window.onload = function() {
    window.print();
}
</script>

</html>