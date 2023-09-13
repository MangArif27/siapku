<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Reset Password Akun</title>
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
            height: 250mm;
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
    <div id="wrapper">
        <div id="invoice_head">
            <table style="border-spacing:0;">
                <tr>
                    <td rowspan="2">
                        <img src="https://www.kemenkumham.go.id/images/jux_portfolio_pro/logo_fix.png" width='70px'>
                    </td>
                    <table width="150%">
                        <tr>
                            <td style="font-size: 12pt;">
                                <center>KEMENTERIAN HUKUM DAN HAM REPUBLIK INDONESIA</center>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 12pt;">
                                <center>KANTOR WILAYAH JAWA BARAT</center>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 12pt;">
                                <center><b>RUMAH TAHANANAN NEGARA KELAS I DEPOK</b></center>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 7pt;width:320%;">
                                <center>Jl. M. Nasir, Cilodong, Kec. Cilodong, Kota Depok, Jawa Barat
                                    Telp:- Web:http://rutandepok.kemenkumham.go.id</center>
                            </td>
                        </tr>
                    </table>
                </tr>
            </table>
            <table style="font-size: 12pt;border-spacing:0;" border="0">
                </br>
                <tr>
                    <td style="font-size: 12pt;">
                        <center><b>KONFIRMASI PERMINTAAN RESET PASSWORD</b></center>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">Yth &nbsp; : {{$nama}}</td>
                </tr>
                <tr>
                    <td style="font-size: 11pt;">Baru-baru ini Anda meminta kami untuk melakukan reset password, silakan
                        <a href="http://siratucilokrutandepok.com/resetpassword/{!!$link!!}">Klik Disini</a> ini untuk
                        mengisi password baru anda.</br>
                        Jika ada pertanyaan lebih lanjut, silahkan menghubungi:<b> </b></br>
                        Terima kasih telah mengajukan permohonan pembuatan pengguna di Aplikasi Permohonan Pendaftaran
                        Ciptaan Secara Elektronik.</br>
                        </br>
                        </br>
                        Tim Pengembang Si Ratu Cilok @MitraDigitalPersada</br>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>