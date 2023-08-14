@extends('mobile.index')
@section('konten')
@if(empty(Session::get('alert')))
@else
<div id="menu-welcome-modal" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s menu-active" data-menu-width="310" data-menu-height="350" data-menu-effect="menu-over" data-menu-select="page-components" style="display: block; height: 350px; width: 310px;">
    <!-- add data-cookie-activate above to auto-activate the menu on cookie detection -->
    <div class="boxed-text-xl mt-4">
        <h1 class="mb-3"><i class="fa fa-bullhorn color-red2-dark fa-3x"></i></h1>
        <h2 class="font-700 mb-n1">Notifikasi !</h2>
        <p class="color-highlight">Sistem Informasi Rutan Kelas I Cilodong Depok 2.0</p>
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
<div class="page-content">
    <div class="card card-style">
        <div class="content ml-2 mr-2">
            <div class="d-flex">
                <div>
                    <img src="{{url('image/Photo/'.Session::get('photo'))}}" class="rounded-circle" width="80px" height="80px">
                </div>
                <div class="flex-grow-1 ml-2">
                    <p class="ps-3 mb-2 ">
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;{{Session::get('nama')}}</h6>
                    &nbsp;&nbsp;&nbsp;&nbsp;No Identitas : {{Session::get('nik')}}<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Alamat : {{Session::get('alamat')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php $no = 0;
    $tanggal = date('Y-m-d'); ?>
    <form action="{{ route('post.formdaftarkeluarga') }}" enctype="multipart/form-data" id="FormKunjungan" method="POST">
        {{ csrf_field() }}
        <div class="card card-style">
            <div class="content mb-0">
                <h3>Form Pendaftaran Keluarga Inti</h3>
                <p>
                    Sistem Informasi Rutan Kelas I Depok Cilodong 2.0
                </p>
                <input class="form-control" name="NoIdentitas" hidden type="number" value="{{Session::get('nik')}}">
                <select id="form5" class="cari form-control mb-6" name="nama_wbp">
                </select>
                <div class="input-style has-borders no-icon mb-4">
                    <label for="form5" class="color-highlight">Nama WBP</label>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <i class="fa fa-check disabled invalid color-red-dark"></i>
                    <em></em>
                </div>
                <div class="file-data input-style has-borders no-icon pb-4">
                    <input type="file" id="file-upload" name="fileijin" class="upload-file bg-highlight shadow-s rounded-s" accept="image/*">
                    <p class="upload-file-text color-white">File Image ~ Kartu Keluarga </p>
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
                    <input class="form-control" type="text" name="nik_wbp" class="form-control" required>
                    <label for="form4" class="color-highlight">No Induk Kependudukan WBP :</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <select name="hubungan" class="form-control" required>
                        <option disabled selected>Pilih Hubungan</option>
                        <option value="Ayah">Ayah</option>
                        <option value="Ibu">Ibu</option>
                        <option value="Kakak">Kakak</option>
                        <option value="Anak">Anak</option>
                        <option value="Adik">Adik</option>
                        <option value="Istri">Istri</option>
                    </select>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Hubungan</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
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