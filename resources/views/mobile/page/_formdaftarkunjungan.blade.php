@extends('mobile.index')
@section('konten')
@if(empty(Session::get('alert')))
@else
<div id="menu-welcome-modal" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s menu-active" data-menu-width="310" data-menu-height="350" data-menu-effect="menu-over" data-menu-select="page-components" style="display: block; height: 350px; width: 310px;">
    <!-- add data-cookie-activate above to auto-activate the menu on cookie detection -->
    <div class="boxed-text-xl mt-4">
        <h1 class="mb-3"><i class="fa fa-bullhorn color-red2-dark fa-3x"></i></h1>
        <h2 class="font-700 mb-n1">Notifikasi !</h2>
        <p class="color-highlight">Sisten Informasi Rutan Kelas I Depok</p>
        <p>
            {{Session::get('alert')}}
        </p>
        <!-- add hide-cookie to the class to delete the cookie-->
        <a href="#" class="close-menu btn btn-m btn-center-xl rounded-xs shadow-m bg-highlight text-uppercase font-900">Tutup
            Notifikasi</a>
    </div>
</div>
@endif
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
    $(window).load(function() {
        $("#jumlahorang").change(function() {
            console.log($("#jumlahorang option:selected").val());
            if ($("#jumlahorang option:selected").val() == '1') {
                $('#NoIndukPengikut1').prop('hidden', false);
                $('#Pengikut1').prop('hidden', false);
                $('#NoIndukPengikut2').prop('hidden', true);
                $('#Pengikut2').prop('hidden', true);
                $('#NoIndukPengikut3').prop('hidden', true);
                $('#Pengikut3').prop('hidden', true);
                $('#NoIndukPengikut4').prop('hidden', true);
                $('#Pengikut4').prop('hidden', true);
                $('#NoIndukPengikut5').prop('hidden', true);
                $('#Pengikut5').prop('hidden', true);
            } else if ($("#jumlahorang option:selected").val() == '2') {
                $('#NoIndukPengikut1').prop('hidden', false);
                $('#Pengikut1').prop('hidden', false);
                $('#NoIndukPengikut2').prop('hidden', false);
                $('#Pengikut2').prop('hidden', false);
                $('#NoIndukPengikut3').prop('hidden', true);
                $('#Pengikut3').prop('hidden', true);
                $('#NoIndukPengikut4').prop('hidden', true);
                $('#Pengikut4').prop('hidden', true);
                $('#NoIndukPengikut5').prop('hidden', true);
                $('#Pengikut5').prop('hidden', true);
            } else if ($("#jumlahorang option:selected").val() == '3') {
                $('#NoIndukPengikut1').prop('hidden', false);
                $('#Pengikut1').prop('hidden', false);
                $('#NoIndukPengikut2').prop('hidden', false);
                $('#Pengikut2').prop('hidden', false);
                $('#NoIndukPengikut3').prop('hidden', false);
                $('#Pengikut3').prop('hidden', false);
                $('#NoIndukPengikut4').prop('hidden', true);
                $('#Pengikut4').prop('hidden', true);
                $('#NoIndukPengikut5').prop('hidden', true);
                $('#Pengikut5').prop('hidden', true);
            } else if ($("#jumlahorang option:selected").val() == '4') {
                $('#NoIndukPengikut1').prop('hidden', false);
                $('#Pengikut1').prop('hidden', false);
                $('#NoIndukPengikut2').prop('hidden', false);
                $('#Pengikut2').prop('hidden', false);
                $('#NoIndukPengikut3').prop('hidden', false);
                $('#Pengikut3').prop('hidden', false);
                $('#NoIndukPengikut4').prop('hidden', false);
                $('#Pengikut4').prop('hidden', false);
                $('#NoIndukPengikut5').prop('hidden', true);
                $('#Pengikut5').prop('hidden', true);
            } else if ($("#jumlahorang option:selected").val() == '5') {
                $('#NoIndukPengikut1').prop('hidden', false);
                $('#Pengikut1').prop('hidden', false);
                $('#NoIndukPengikut2').prop('hidden', false);
                $('#Pengikut2').prop('hidden', false);
                $('#NoIndukPengikut3').prop('hidden', false);
                $('#Pengikut3').prop('hidden', false);
                $('#NoIndukPengikut4').prop('hidden', false);
                $('#Pengikut4').prop('hidden', false);
                $('#NoIndukPengikut5').prop('hidden', false);
                $('#Pengikut5').prop('hidden', false);
            } else {
                $('#NoIndukPengikut1').prop('hidden', true);
                $('#Pengikut1').prop('hidden', true);
                $('#NoIndukPengikut2').prop('hidden', true);
                $('#Pengikut2').prop('hidden', true);
                $('#NoIndukPengikut3').prop('hidden', true);
                $('#Pengikut3').prop('hidden', true);
                $('#NoIndukPengikut4').prop('hidden', true);
                $('#Pengikut4').prop('hidden', true);
                $('#NoIndukPengikut5').prop('hidden', true);
                $('#Pengikut5').prop('hidden', true);
            }
        });
        $("#jumlahbarang").change(function() {
            console.log($("#jumlahbarang option:selected").val());
            if ($("#jumlahbarang option:selected").val() == '1') {
                $('#JenisBarang1').prop('hidden', false);
                $('#NamaBarang1').prop('hidden', false);
                $('#JenisBarang2').prop('hidden', true);
                $('#NamaBarang2').prop('hidden', true);
                $('#JenisBarang3').prop('hidden', true);
                $('#NamaBarang3').prop('hidden', true);
                $('#JenisBarang4').prop('hidden', true);
                $('#NamaBarang4').prop('hidden', true);
                $('#JenisBarang5').prop('hidden', true);
                $('#NamaBarang5').prop('hidden', true);
            } else if ($("#jumlahbarang option:selected").val() == '2') {
                $('#JenisBarang1').prop('hidden', false);
                $('#NamaBarang1').prop('hidden', false);
                $('#JenisBarang2').prop('hidden', false);
                $('#NamaBarang2').prop('hidden', false);
                $('#JenisBarang3').prop('hidden', true);
                $('#NamaBarang3').prop('hidden', true);
                $('#JenisBarang4').prop('hidden', true);
                $('#NamaBarang4').prop('hidden', true);
                $('#JenisBarang5').prop('hidden', true);
                $('#NamaBarang5').prop('hidden', true);
            } else if ($("#jumlahbarang option:selected").val() == '3') {
                $('#JenisBarang1').prop('hidden', false);
                $('#NamaBarang1').prop('hidden', false);
                $('#JenisBarang2').prop('hidden', false);
                $('#NamaBarang2').prop('hidden', false);
                $('#JenisBarang3').prop('hidden', false);
                $('#NamaBarang3').prop('hidden', false);
                $('#JenisBarang4').prop('hidden', true);
                $('#NamaBarang4').prop('hidden', true);
                $('#JenisBarang5').prop('hidden', true);
                $('#NamaBarang5').prop('hidden', true);
            } else if ($("#jumlahbarang option:selected").val() == '4') {
                $('#JenisBarang1').prop('hidden', false);
                $('#NamaBarang1').prop('hidden', false);
                $('#JenisBarang2').prop('hidden', false);
                $('#NamaBarang2').prop('hidden', false);
                $('#JenisBarang3').prop('hidden', false);
                $('#NamaBarang3').prop('hidden', false);
                $('#JenisBarang4').prop('hidden', false);
                $('#NamaBarang4').prop('hidden', false);
                $('#JenisBarang5').prop('hidden', true);
                $('#NamaBarang5').prop('hidden', true);
            } else if ($("#jumlahbarang option:selected").val() == '5') {
                $('#JenisBarang1').prop('hidden', false);
                $('#NamaBarang1').prop('hidden', false);
                $('#JenisBarang2').prop('hidden', false);
                $('#NamaBarang2').prop('hidden', false);
                $('#JenisBarang3').prop('hidden', false);
                $('#NamaBarang3').prop('hidden', false);
                $('#JenisBarang4').prop('hidden', false);
                $('#NamaBarang4').prop('hidden', false);
                $('#JenisBarang5').prop('hidden', false);
                $('#NamaBarang5').prop('hidden', false);
            } else {
                $('#JenisBarang1').prop('hidden', true);
                $('#NamaBarang1').prop('hidden', true);
                $('#JenisBarang2').prop('hidden', true);
                $('#NamaBarang2').prop('hidden', true);
                $('#JenisBarang3').prop('hidden', true);
                $('#NamaBarang3').prop('hidden', true);
                $('#JenisBarang4').prop('hidden', true);
                $('#NamaBarang4').prop('hidden', true);
                $('#JenisBarang5').prop('hidden', true);
                $('#NamaBarang5').prop('hidden', true);
            }
        });
    });
</script>
<script type='text/javascript'>
    $(window).load(function() {
        $("#keperluan").change(function() {
            console.log($("#keperluan option:selected").val());
            if ($("#keperluan option:selected").val() == 'Penitipan Barang') {
                $('#Keperluan1').prop('hidden', false);
                $('#Keperluan2').prop('hidden', true);
                $('#Jumlah1').prop('hidden', false);
                $('#Jumlah2').prop('hidden', true);
            } else if ($("#keperluan option:selected").val() == 'Kunjungan Tatap Muka') {
                $('#Keperluan1').prop('hidden', true);
                $('#Keperluan2').prop('hidden', false);
                $('#Jumlah1').prop('hidden', true);
                $('#Jumlah2').prop('hidden', false);
            } else {
                $('#Keperluan1').prop('hidden', true);
                $('#Keperluan2').prop('hidden', true);
                $('#Jumlah1').prop('hidden', true);
                $('#Jumlah2').prop('hidden', true);
            }
        });
    });
</script>
<div class="page-content">
    <div class="card card-style">
        <div class="content ml-2 mr-2">
            <div class="d-flex">
                <div>
                    <img src="images/pictures/15t.jpg" class="rounded-circle" width="80">
                </div>
                <div class="flex-grow-1 ml-2">
                    <p class="ps-3 mb-2 ">
                    <h6>{{Session::get('nama')}}</h6>
                    No Identitas : {{Session::get('nik')}}<br>
                    Alamat : {{Session::get('alamat')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php $no = 0;
    $tanggal = date('Y-m-d'); ?>
    <form action="{{ route('post.formdaftarkunjungan') }}" enctype="multipart/form-data" id="FormKunjungan" method="POST">
        {{ csrf_field() }}
        <div class="card card-style">
            <div class="content mb-0">
                <h3>Form Pendaftaran Kunjungan</h3>
                <p>
                    Sistem Informasi Rutan Kelas I Depok Cilodong
                </p>
                <input class="form-control" name="NoIdentitas" hidden type="number" value="{{Session::get('nik')}}">
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <input type="text" name="NamaWbp" class="form-control" id="NamaWBP" placeholder="Nama Warga Binaan Pemasyarakatan">
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Nama WBP</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="file-data input-style has-borders no-icon pb-4">
                    <input type="file" id="file-upload" name="fileijin" class="upload-file bg-highlight shadow-s rounded-s" accept="image/*">
                    <p class="upload-file-text color-white">File Image ~ Surat Ijin Berkunjung </p>
                </div>
                <div class="list-group list-large upload-file-data disabled">
                    <img id="image-data" src="images/empty.png">
                    <a href="#" class="border-0">
                        <i class="fa font-14 fa-info-circle color-blue-dark"></i>
                        <span>File Name</span>
                        <strong class="upload-file-name">JS Populated</strong>
                    </a>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <input type="date" name="tanggal" min="{{$tanggal}}" format="YYYY-mm-dd" class="form-control" id="tanggal" placeholder="Pilih Tanggal Kunjungan">
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Tanggal Berkunjung</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <select name="hubungan" class="form-control" required>
                        <option value="Teman">Teman</option>
                        <option value="Ayah">Ayah</option>
                        <option value="Ibu">Ibu</option>
                        <option value="Kakak">Kakak</option>
                        <option value="Anak">Anak</option>
                        <option value="Adik">Adik</option>
                        <option value="Suami">Suami</option>
                        <option value="Istri">Istri</option>
                        <option value="Kakek">Kakek</option>
                        <option value="Nenek">Nenek</option>
                        <option value="Paman">Paman</option>
                        <option value="Bibi">Bibi</option>
                        <option value="Menantu">Menantu</option>
                        <option value="Cucu">Cucu</option>
                    </select>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Hubungan</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <select name="keperluan" id="keperluan" class="form-control" required>
                        <option value="default" disabled selected>Pilih Jenis Layanan </option>
                        <option value="Video Call">Video Call</option>
                        <option value="Penitipan Barang">Penitipan Barang</option>
                        <option value="Kunjungan Tatap Muka">Kunjungan Tatap Muka</option>
                    </select>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Keperluan</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="Sesi" hidden>
                    <select name="sesi" id="SesiBiasa" class="form-control" required hidden>
                        <option value="default" disabled selected>Pilih Sesi Kunjungan </option>
                        <option value="Sesi I (08.00-11.30 WIB)">Sesi I (08.00-11.30 WIB)</option>
                        <option value="Sesi II (13.00-14.30 WIB)">Sesi II (13.00-14.30 WIB)</option>
                    </select>
                    <select name="sesi" id="SesiSabtu" class="form-control" required hidden>
                        <option value="default" disabled selected>Pilih Sesi Kunjungan </option>
                        <option value="Sesi I (08.00-11.30 WIB)">Sesi I (08.00-11.30 WIB)</option>
                    </select>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Sesi Kunjungan</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
            </div>
        </div>
        <div class="card card-style">
            <div class="content mb-0" id="Keperluan1" hidden>
                <h3>Daftar Penitipan Barang</h3>
                <p>
                    Maksimal 5 Jenis Barang
                </p>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <select name="jumlahbarang" id="jumlahbarang" class="form-control" required>
                        <option disabled selected value="Tidak Ada">Pilih Jumlah Barang </option>
                        <option value="Tidak Ada">Tidak Ada Barang</option>
                        <option value="1">1 Barang</option>
                        <option value="2">2 Barang</option>
                        <option value="3">3 Barang</option>
                        <option value="4">4 Barang</option>
                        <option value="5">5 Barang</option>
                    </select>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Jumlah Barang</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="JenisBarang1" hidden>
                    <input class="form-control" type="text" name="JenisBarang[]" class="form-control">
                    <label for="form4" class="color-highlight">Jenis Barang 1 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="NamaBarang1" hidden>
                    <input class="form-control" type="text" name="NamaBarang[]" class="form-control">
                    <label for="form4" class="color-highlight">Nama Barang 1 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="JenisBarang2" hidden>
                    <input class="form-control" type="text" name="JenisBarang[]" class="form-control">
                    <label for="form4" class="color-highlight">Jenis Barang 2 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="NamaBarang2" hidden>
                    <input class="form-control" type="text" name="NamaBarang[]" class="form-control">
                    <label for="form4" class="color-highlight">Nama Barang 2 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="JenisBarang3" hidden>
                    <input class="form-control" type="text" name="JenisBarang[]" class="form-control">
                    <label for="form4" class="color-highlight">Jenis Barang 3 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="NamaBarang3" hidden>
                    <input class="form-control" type="text" name="NamaBarang[]" class="form-control">
                    <label for="form4" class="color-highlight">Nama Barang 3 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="JenisBarang4" hidden>
                    <input class="form-control" type="text" name="JenisBarang[]" class="form-control">
                    <label for="form4" class="color-highlight">Jenis Barang 4 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="NamaBarang4" hidden>
                    <input class="form-control" type="text" name="NamaBarang[]" class="form-control">
                    <label for="form4" class="color-highlight">Nama Barang 4 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="JenisBarang5" hidden>
                    <input class="form-control" type="text" name="JenisBarang[]" class="form-control">
                    <label for="form4" class="color-highlight">Jenis Barang 5 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="NamaBarang5" hidden>
                    <input class="form-control" type="text" name="NamaBarang[]" class="form-control">
                    <label for="form4" class="color-highlight">Nama Barang 5 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
            </div>
            <div class="content mb-0" id="Keperluan2" hidden>
                <h3>Daftar Pengikut</h3>
                <p>
                    Maksimal 5 Pengikut
                </p>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <select name="jumlahorang" id="jumlahorang" class="form-control" required>
                        <option disabled selected value="Tidak Ada">Pilih Jumlah Pengikut </option>
                        <option value="Tidak Ada">Tidak Ada Pengikut</option>
                        <option value="1">1 Pengikut</option>
                        <option value="2">2 Pengikut</option>
                        <option value="3">3 Pengikut</option>
                        <option value="4">4 Pengikut</option>
                        <option value="5">5 Pengikut</option>
                    </select>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Jumlah Pengikut</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="NoIndukPengikut1" hidden>
                    <input class="form-control" type="text" name="NoIndukPengikut[]" class="form-control">
                    <label for="form4" class="color-highlight">No Induk Pengikut 1 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="Pengikut1" hidden>
                    <input class="form-control" type="text" name="Pengikut[]" class="form-control">
                    <label for="form4" class="color-highlight">Nama Pengikut 1 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="NoIndukPengikut2" hidden>
                    <input class="form-control" type="text" name="NoIndukPengikut[]" class="form-control">
                    <label for="form4" class="color-highlight">No Induk Pengikut 2 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="Pengikut2" hidden>
                    <input class="form-control" type="text" name="Pengikut[]" class="form-control">
                    <label for="form4" class="color-highlight">Nama Pengikut 2 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="NoIndukPengikut3" hidden>
                    <input class="form-control" type="text" name="NoIndukPengikut[]" class="form-control">
                    <label for="form4" class="color-highlight">No Induk Pengikut 3 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="Pengikut3" hidden>
                    <input class="form-control" type="text" name="Pengikut[]" class="form-control">
                    <label for="form4" class="color-highlight">Nama Pengikut 3 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="NoIndukPengikut4" hidden>
                    <input class="form-control" type="text" name="NoIndukPengikut[]" class="form-control">
                    <label for="form4" class="color-highlight">No Induk Pengikut 4 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="Pengikut4" hidden>
                    <input class="form-control" type="text" name="Pengikut[]" class="form-control">
                    <label for="form4" class="color-highlight">Nama Pengikut 4 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="NoIndukPengikut5" hidden>
                    <input class="form-control" type="text" name="NoIndukPengikut[]" class="form-control">
                    <label for="form4" class="color-highlight">No Induk Pengikut 5 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4" id="Pengikut5" hidden>
                    <input class="form-control" type="text" name="Pengikut[]" class="form-control">
                    <label for="form4" class="color-highlight">Nama Pengikut 5 :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
            </div>
        </div>
    </form>
    <div class="mt-0">
        <div class="content mb-0">
            <div class="row pt-3 mb-3">
                <div class="col-6 text-start">
                    <button type="submit" form="FormKunjungan" class="btn btn-l btn-full mb-0 rounded-xl text-uppercase font-700 shadow-s bg-blue-light">Simpan</button>
                </div>
                <div class="col-6 text-end">
                    <button onClick="document.location.reload(true)" class="btn btn-l btn-full mb-0 rounded-xl text-uppercase font-700 shadow-s bg-blue-light" style="float:right;">Reload</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection