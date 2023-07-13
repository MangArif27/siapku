<!DOCTYPE html>
<html>

<head>
    <title>Si Ratu Cilok<tittle>
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
                    height: 400mm;
                    width: 176mm;
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
            <table style="width:350%; border-spacing:0;">
                <tr>
                    <td rowspan="2">
                        <img src="https://www.kemenkumham.go.id/images/jux_portfolio_pro/logo_fix.png" width='70px'>
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
            <table style="width:380%; border-spacing:0;" border="0">
                <tr>
                    <td style="font-size: 12pt;">===============================================================</td>
                </tr>
            </table>
            <table style="width:380%; font-size: 11pt;border-spacing:0;" border="0">
                </br>
                <tr>
                    <td style="font-size: 11pt;">
                        <center><b>SLIP GAJI DAN TUNJANGAN KINERJA</b></center>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">NAMA &nbsp; : {{$users->nama}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">NIP &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$p->nip}}</td>
                </tr>
                <tr>
                    <td style="font-size: 12pt;">===============================================================</td>
                </tr>
            </table>
            <table style="width:380%; border-spacing:0;" border="0">
                </br>
                <tr>
                    <td style="font-size: 11pt;">A. GAJI BULAN
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td style="font-size: 11pt;">: {{$p->penerimaan_bulan}} {{$p->penerimaan_tahun}}</td>
                </tr>
            </table>
            <table style="width:380%; border-spacing:0;" border="0">
                </br>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; 1. GAJI POKOK </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->gaji_pokok),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; 2. TUNJANGAN TAMBAHAN </td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Tunjangan Suami/Istri </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunjangan_pasangan),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Tunjangan Anak </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunjangan_anak),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Tunjangan Umum </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunjangan_umum),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Tunjangan TA. Umum </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunjangan_ta_umum),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Tunjangan Papua</td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunjangan_papua),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Tunjangan Terpencil </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunjangan_terpencil),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g. Tunjangan Struktur </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunjangan_struktur),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; h. Tunjangan Fungsi </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunjangan_fungsi),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; i. Tunjangan Lain </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunjangan_lain),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; j. Tunjangan Beras </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunjangan_beras),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; 3. JUMLAH TUNJANGAN TAMBAHAN </td>
                    <td style="font-size: 11pt;">: Rp.
                        {{number_format($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;" style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; 4. POTONGAN </td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. IWP </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->iwp),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. BPJS </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->bpjs),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Sewa Rumah </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->sewa_rumah),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Tunggakan </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->tunggakan),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Utang</td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->utang),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Potongan Lain </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->potongan_lain),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g. Taperum </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($p->taperum),0,".","."}}</td>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; 5. JUMLAH POTONGAN </td>
                    <td style="font-size: 11pt;">: Rp.
                        {{number_format($p->iwp + $p->bpjs + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; 6. GAJI BERSIH </td>
                    <td style="font-size: 11pt;">: Rp.
                        {{number_format($p->gaji_pokok + ($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras)-($p->potongan_dw + $p->potongan_bank + $p->potongan_koperasi + $p->dana_sosial + $p->sumbangan_olahraga + $p->rumah_dinas + $p->potongan_bank2 + $p->pmi + $p->harkop + $p->adm_bank)),0,".","."}}
                    </td>
                </tr>
            </table>
            <table style="width:380%; border-spacing:0;" border="0">
                <tr>
                    <td style="font-size: 12pt;">===============================================================</td>
                </tr>
            </table>
            <table style="width:380%; border-spacing:0;" border="0">
                </br>
                <tr>
                    <td style="font-size: 11pt;">B. TUNJANGAN KINERJA BULAN
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td style="font-size: 11pt;">: {{$t->penerimaan_bulan}} {{$t->penerimaan_tahun}}</td>
                </tr>
            </table>
            <table style="width:164%; border-spacing:0;" border="0">
                </br>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; 1. TUNJANGAN KINERJA </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($t->tunker),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; 2. POTONGAN </td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Potongan Atribut</td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($t->potongan_atribut),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Potongan Arisan DWP </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($t->potongan_arisan_dwp),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Potongan Arisan PIPAS </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($t->potongan_arisan_pipas),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d. Potongan Bank BJB </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($t->potongan_bjb),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; e. Potongan Simpanan Wajib </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($t->potongan_simpanan_wajib),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; f. Potongan Koperasi </td>
                    <td style="font-size: 11pt;">: Rp. {{number_format($t->potongan_koperasi),0,".","."}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; 3. JUMLAH POTONGAN </td>
                    <td style="font-size: 11pt;">: Rp.
                        {{number_format($t->potongan_atribut + $t->potongan_koperasi + $t->potongan_arisan_dwp + $t->potongan_arisan_pipas + $t->potongan_bjb + $t->potongan_simpanan_wajib),0,".","."}}
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; 4. TUNKER BERSIH </td>
                    <td style="font-size: 11pt;">: Rp.
                        {{number_format($t->tunker-($t->potongan_atribut + $t->potongan_koperasi + $t->potongan_arisan_dwp + $t->potongan_arisan_pipas + $t->potongan_bjb + $t->potongan_simpanan_wajib)),0,".","."}}
                    </td>
                </tr>
            </table>
            <table style="width:380%; border-spacing:0;" border="0">
                <tr>
                    <td style="font-size: 12pt;">===============================================================</td>
                </tr>
            </table>
            <table style="width:380%; border-spacing:0;" border="0">
                <tr>
                    <td style="font-size: 10pt;"> *Catatan : Data slip gaji dan tunjangan kinerja ini diinput oleh
                        Bendahara Rutan Kelas I Depok</td>
                </tr>
                <tr>
                    <td>
                        </br>
                        <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('silaci.smart-pas.com/cek_slip/'.$p->kode, 'qrcode')}}" }} height="100">
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @endforeach
    @endforeach
    @endforeach
</body>

</html>