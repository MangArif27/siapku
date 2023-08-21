<?php
$url = "counter_pegawai";
header("Refresh:5; $url");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Si Ratu Cilok</title>
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
                        <img class="img-responsive avatar-view" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Logo_of_the_Ministry_of_Law_and_Human_Rights_of_the_Republic_of_Indonesia.svg/1876px-Logo_of_the_Ministry_of_Law_and_Human_Rights_of_the_Republic_of_Indonesia.svg.png" width="40px">
                    </td>
                    <td style="font-size: 6pt;">
                        <center>
                            <p>KEMENTERIAN HUKUM DAN HAM REPUBLIK INDONESIA</p>
                            <p>KANTOR WILAYAH JAWA BARAT</p>
                            <b>RUMAH TAHANAN NEGARA KELAS I DEPOK</b>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 4pt;">
                        <center>
                            <p>Jl. M. Nasir, Cilodong, Kec. Cilodong, Kota Depok, Jawa Barat</p>
                            <p>Telp:- Web:http://rutandepok.kemenkumham.go.id</p>
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
                    <td>&nbsp;&nbsp;&nbsp; 2. TUNJANGAN TAMBAHAN </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Tunjangan Suami/Istri </td>
                    <td>: Rp. {{number_format($p->tunjangan_pasangan),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Tunjangan Anak </td>
                    <td>: Rp. {{number_format($p->tunjangan_anak),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Tunjangan Umum </td>
                    <td>: Rp. {{number_format($p->tunjangan_umum),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Tunjangan TA. Umum </td>
                    <td>: Rp. {{number_format($p->tunjangan_ta_umum),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Tunjangan Papua</td>
                    <td>: Rp. {{number_format($p->tunjangan_papua),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Tunjangan Terpencil </td>
                    <td>: Rp. {{number_format($p->tunjangan_terpencil),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g. Tunjangan Struktur </td>
                    <td>: Rp. {{number_format($p->tunjangan_struktur),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; h. Tunjangan Fungsi </td>
                    <td>: Rp. {{number_format($p->tunjangan_fungsi),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; i. Tunjangan Lain </td>
                    <td>: Rp. {{number_format($p->tunjangan_lain),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; j. Tunjangan Beras </td>
                    <td>: Rp. {{number_format($p->tunjangan_beras),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 3. JUMLAH TUNJANGAN TAMBAHAN </td>
                    <td>: Rp.
                        {{number_format($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +$p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 4. POTONGAN </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. IWP </td>
                    <td>: Rp. {{number_format($p->iwp),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. BPJS </td>
                    <td>: Rp. {{number_format($p->bpjs),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Sewa Rumah </td>
                    <td>: Rp. {{number_format($p->sewa_rumah),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Tunggakan </td>
                    <td>: Rp. {{number_format($p->tunggakan),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Utang</td>
                    <td>: Rp. {{number_format($p->utang),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Potongan Lain </td>
                    <td>: Rp. {{number_format($p->potongan_lain),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g. Taperum </td>
                    <td>: Rp. {{number_format($p->taperum),0,".","."}}</td>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 5. JUMLAH POTONGAN </td>
                    <td>: Rp.
                        {{number_format($p->iwp + $p->bpjs + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 6. GAJI BERSIH </td>
                    <td>: Rp.
                        {{number_format($p->gaji_pokok + ($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +$p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras)-($p->potongan_dw + $p->potongan_bank + $p->potongan_koperasi + $p->dana_sosial + $p->sumbangan_olahraga + $p->rumah_dinas + $p->potongan_bank2 + $p->pmi + $p->harkop + $p->adm_bank)),0,".","."}}
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
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Potongan Atribut</td>
                    <td>: Rp. {{number_format($t->potongan_atribut),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Potongan Arisan DWP </td>
                    <td>: Rp. {{number_format($t->potongan_arisan_dwp),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Potongan Arisan PIPAS </td>
                    <td>: Rp. {{number_format($t->potongan_arisan_pipas),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Potongan Bank BJB </td>
                    <td>: Rp. {{number_format($t->potongan_bjb),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Potongan Simpanan Wajib </td>
                    <td>: Rp. {{number_format($t->potongan_simpanan_wajib),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Potongan Koperasi </td>
                    <td>: Rp. {{number_format($t->potongan_koperasi),0,".","."}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 3. JUMLAH POTONGAN </td>
                    <td>: Rp.
                        {{number_format($p->iwp + $p->bpjs + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp; 4. TUNKER BERSIH </td>
                    <td>: Rp.
                        {{number_format($t->tunker-($t->potongan_atribut + $t->potongan_koperasi + $t->potongan_arisan_dwp + $t->potongan_arisan_pipas + $t->potongan_bjb + $t->potongan_simpanan_wajib)),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td></br>================================</td>
                    <td></br>============</td>
                </tr>
            </table>
            <table style="width:164%; border-spacing:0;" border="0">
                <tr>
                    <td>*Catatan : Data slip gaji dan tunjangan kinerja ini diinput oleh Bendahara Rutan Kelas I Depok </td>
                </tr>
                <tr>
                    </br>
                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('siratucilokrutandepok.com/cek_slip/'.$p->kode, 'qrcode')}}" }} height="100px">
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