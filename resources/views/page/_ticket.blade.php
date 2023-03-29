<?php

$url = "/counter";

header("Refresh:5; $url");



?>

<!DOCTYPE html>

<html>



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/images/SmartPAs.png') }}" type="image/ico" />



    <title>SI Ratu Cilok</title>

    <style type="text/css">
        body {

            font: 11px Arial, Helvetica, sans-serif;

            background: white;

        }



        table {

            font: 11px Arial, Helvetica, sans-serif;

        }



        table tr td {

            font-size: 10px !important;

            vertical-align: top;

        }



        table tr td.label {

            width: 120px;

        }



        table.header tr td b {

            font-size: 12px;

            font-weight: bold;

        }



        table.header tr td img {

            width: 75px;

        }



        .kunjunganCetak {

            width: 450px;

            overflow: hidden;

            padding: 2px;

        }



        #header-surat-izin {

            text-align: right;

            width: 330px;

            margin-left: auto;

            margin-right: 0px;

            margin-top: 10px;

            margin-bottom: 10px;

            font-weight: bold;

            font-size: 13px;

            float: left;

        }



        #perkaraKunjungan {}



        #perkaraKunjungan img {

            width: 150px;

        }



        #perkaraKunjungan td {

            vertical-align: top;

        }



        #perkaraKunjungan td.label {

            width: 100px;

        }



        table.barang {

            border-top: 1px solid #000;

            border-left: 1px solid #000;

            width: 100%;

        }



        table.barang tr td {

            border-bottom: 1px solid #000;

            border-right: 1px solid #000;

            padding: 2px;

        }



        .no_antrian {

            min-width: 100px;

            height: 18px;

            float: right;

            padding: 2px 5px 5px 5px;

            border: solid 1px blue;

            text-align: center;

            font-size: 13px;

            color: blue;

        }



        .no_antrian span {

            font-size: 18px !important;

            font-weight: bold;

        }



        .antrian_con {

            width: 120px;

            height: 18px;

            float: left;

            text-align: center;

            font-size: 13px;

            font-weight: bold;

        }



        .antrian_aja {

            float: left;

            padding: 7px 3px 3px 3px;

        }



        .no_aja {

            border: solid 1px black;

            padding: 7px 3px 3px 3px;

            float: left;

        }
    </style>

    <style type="text/css" media="print">
        #cetak {

            display: none;

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



<body onLoad="">

    <div class="kunjunganCetak">

        <h1 class="title"></h1>

        <div style="width:auto">

            <table>

                <tr>

                    <td align="right">&nbsp;</td>

                </tr>

            </table>



            <table class="header">

                <tr>

                    <td rowspan="4">

                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Logo_of_the_Ministry_of_Law_and_Human_Rights_of_the_Republic_of_Indonesia.svg/1876px-Logo_of_the_Ministry_of_Law_and_Human_Rights_of_the_Republic_of_Indonesia.svg.png" width='70px'>

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
            </table>

            @foreach($kunjungan as $ticket)

            @endforeach

            <div id="header-surat-izin">

                <u>Surat Ijin {{$kunjungan->keperluan}}</u>

            </div>

            <table id="biodataPengunjung">

                @foreach($user = DB::table('users')->where('nik',$kunjungan->nik)->get() as $users)

                <tr>

                    <td class="label">No Identitas/NIK</td>

                    <td width="5">:</td>

                    <td>{{ $users->nik }}</td>

                    <td rowspan="5">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{ url('image/Photo/'.$users->photo) }}" style="width:50px" /></td>

                </tr>

                <tr>

                    <td class="label">Nama Pengunjung</td>

                    <td width="5">:</td>

                    <td>{{ $users->nama}}</td>

                </tr>

                <tr>

                    <td class="label">Jenis Kelamin</td>

                    <td width="5">:</td>

                    <td>{{ $users->jenis_kelamin}}</td>

                </tr>

                <tr>

                    <td class="label" valign="top">Alamat</td>

                    <td width="5px" valign="top">:</td>

                    <td>{{ $users->alamat}}</td>

                </tr>

                <tr>

                    <td width="124">No. Telepon</td>

                    <td width="7">:</td>

                    <td colspan="2">{{ $users->no_hp}}</td>

                </tr>

                <tr>

                    <td width="124">Jenis Layanana</td>

                    <td width="7">:</td>

                    <td colspan="2">{{ $kunjungan->keperluan}}</td>

                </tr>
                <tr>

                    <td width="124">Sesi Kunjungan</td>

                    <td width="7">:</td>

                    <td colspan="2">{{ $kunjungan->sesi}}</td>

                </tr>

                @endforeach

                <tr>
                    @if($kunjungan->keperluan=="Penitipan Barang")
                    <td class="label" valign="top"><b>Barang Titipan</b></td>
                    @else
                    <td class="label" valign="top"><b>Pengikut</b></td>
                    @endif
                    <td width="5" colspan="2" valign="top">:</td>

                </tr>

                <tr>

                    <td colspan="3">

                        <table class="barang" cellpadding="0" cellspacing="0">

                            @if($kunjungan->keperluan=="Penitipan Barang")

                            <tr>

                                <td>No.</td>

                                <td>Jenis Barang</td>

                                <td>Nama Barang</td>

                            </tr>

                            @else

                            <tr>

                                <td>No.</td>

                                <td>No Identitas</td>

                                <td>Nama Pengikut</td>

                            </tr>

                            @endif

                            <?php $tanggal = date('Y-m-d');
                            $no = 1;; ?>

                            @foreach($pengikut =

                            DB::table('pengikut')->where('kode',$kunjungan->kode_booking)->get()

                            as $pengikuts)

                            <tr>

                                <td>{{ $no++ }}</td>

                                <td>{{ $pengikuts->nik_pengikut}}</td>

                                <td>{{ $pengikuts->nama}}</td>

                            </tr>

                            @endforeach

                        </table>

                    </td>

                </tr>

            </table>

            <br />

            <table id="perkaraKunjungan">

                <tr>

                    <td colspan="4">Warga Binaan yang dikunjungi :</td>

                </tr>

                @foreach($data_wbp = DB::table('data_wbp')->where('no_induk',$kunjungan->no_induk)->get() as $wbp)

                <tr>

                    <td class="label">Nama</td>

                    <td width="5">:</td>

                    <td>{{ $wbp->nama}}</td>

                </tr>

                <tr>

                    <td class="label">Perkara </td>

                    <td width="5">:</td>

                    <td>{{ $wbp->kejahatan}}</td>

                </tr>

                <tr>

                    <td class="label">Blok / Kamar Hunian</td>

                    <td width="5">:</td>

                    <td>{{$wbp->kamar }}</td>

                </tr>

                @endforeach

            </table>

            <br />

            <table>

                <tr>

                    <td width="685" align="right"><span class="style1" style="padding-right:50px;">, Karawang

                            <?php echo $date = date('Y-M-d'); ?></span></td>

                </tr>

            </table>

            <table>

                <tr>

                    <td width="348" align="left"><span class="style1">Pengunjung <p></span></td>

                    <td width="337" align="center"><span class="style1"><img src="data:image/png;base64,{{DNS2D::getBarcodePNG($kunjungan->kode_booking, 'qrcode')}}" }} height="120">

                    </td>

                </tr>

            </table>

            <table>

                <tr>

                    <td width="348" align="left"><span class="style1">({{ $users->nama}})</span></td>

                    <td width="337" align="center"><span class="style1">(Petugas Layanan Kunjungan) </span></td>

                </tr>

            </table>

            <br /><br />

            <table>

                <tr>

                    <td style="color:#FF0000;">* Kunjungan Tidak Dipungut Biaya</td>

                </tr>

                <tr>

                    <td style="color:#FF0000;">* Apabila anda ada keluhan terhadap pelayanan kunjungan Silahkan SMS 08

                    </td>

                </tr>

            </table>

        </div>

    </div>

    <script>
        window.onload = function() {

            window.print();

        }
    </script>

</body>



</html>