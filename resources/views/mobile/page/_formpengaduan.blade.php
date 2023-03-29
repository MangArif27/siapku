@extends('mobile.index')
@section('konten')
@if(empty(Session::get('alert')))
@else
<div id="menu-welcome-modal" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s menu-active" data-menu-width="310" data-menu-height="350" data-menu-effect="menu-over" data-menu-select="page-components" style="display: block; height: 350px; width: 310px;">
    <!-- add data-cookie-activate above to auto-activate the menu on cookie detection -->
    <div class="boxed-text-xl mt-4">
        <h1 class="mb-3"><i class="fa fa-bullhorn color-red2-dark fa-3x"></i></h1>
        <h2 class="font-700 mb-n1">Notifikasi !</h2>
        <p class="color-highlight">Sistem Informasi Rutan Kelas I Depok Cilodong</p>
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
    <form action="{{ route('post.formpengaduan') }}" enctype="multipart/form-data" id="FormKunjungan" method="POST">
        {{ csrf_field() }}
        <div class="card card-style">
            <div class="content mb-0">
                <h3>Form Pengaduan Rutan Kelas I Depok</h3>
                <p>
                    Sistem Informasi Rutan Kelas I Depok Cilodong
                </p>
                <input class="form-control" name="nik" hidden type="number" value="{{Session::get('nik')}}" readonly>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <input type="text" id="form7a" name="judul" placeholder="Judul Laporan"></input>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Judul Laporan</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <textarea id="form7a" name="isi" placeholder="Isi Laporan"></textarea>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Isi Laporan</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <select class="mb-3 form-control form-select" id="topic" name="jenis" required>
                        <option>~ Topik Pengaduan ~</option>
                        <option value="Pungutan Liar">Pungutan Liar</option>
                        <option value="Layanan Hak">Layanan Hak WBP</option>
                        <option value="Layanan Kunjungan">Layanan Publik</option>
                    </select>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Topik Pengaduan</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="file-data input-style has-borders no-icon pb-4">
                    <input type="file" id="file-upload" name="bukti_pertama" class="upload-file bg-highlight shadow-s rounded-s" accept="image/*">
                    <p class="upload-file-text color-white">File Image ~ Bukti </p>
                </div>
                <div class="list-group list-large upload-file-data disabled">
                    <img id="image-data" src="images/empty.png">
                    <a href="#" class="border-0">
                        <i class="fa font-14 fa-info-circle color-blue-dark"></i>
                        <span>File Name</span>
                        <strong class="upload-file-name">JS Populated</strong>
                    </a>
                </div>
                </br>
            </div>
        </div>
    </form>
    <div class="mt-0">
        <div class="content mb-0">
            <div class="row pt-3 mb-3">
                <div class="col-6 text-start">
                    <button type="submit" form="FormKunjungan" class="btn btn-l btn-full mb-0 rounded-xl text-uppercase font-700 shadow-s bg-blue-light">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection