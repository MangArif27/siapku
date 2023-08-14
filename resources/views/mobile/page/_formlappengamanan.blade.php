@extends('mobile.index')
@section('konten')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <form action="{{ route('post.lappengamanan') }}" id="LaporanPengamanan" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card card-style">
            <div class="content mb-0">
                <h3>Laporan Pengamanan</h3>
                <p>
                    Sistem Informasi Rutan Kelas I Cilodong Depok 2.0
                </p>
                <input class="form-control" name="nik" hidden type="number" value="{{Session::get('nik')}}" readonly>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <textarea id="form7a" name="isi" placeholder="Isi Laporan"></textarea>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Isi Laporan</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="input-style input-style-always-active no-borders no-icon validate-field mb-4">
                    <select class="mb-3 form-control form-select" id="topic" name="jenis" required>
                        <option>~ Jenis Laporan ~</option>
                        <option value="Piket Komandan Jaga">Piket Komandan Jaga</option>
                        <option value="Piket Wakil Komandan Jaga">Piket Wakil Komandan Jaga</option>
                        <option value="Piket Perwira">Piket Perwira</option>
                        <option value="Piket Kontrol Malam">Piket Kontrol Malam</option>
                        <option value="Piket Anggota Jaga">Piket Anggota Jaga</option>
                    </select>
                    <label for="form1ac" class="color-theme opacity-50 text-uppercase font-700 font-10">Topik Pengaduan</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                </div>
                <div class="content">

                    <div id="reader"></div>

                    <div id="result"></div>

                </div>
                </br>
            </div>
        </div>
    </form>
    <div class="mt-0">
        <div class="content mb-0">
            <div class="row pt-3 mb-3">
                <div class="col-6 text-start">
                    <button type="submit" form="LaporanPengamanan" class="btn btn-l btn-full mb-0 rounded-xl text-uppercase font-700 shadow-s bg-blue-light">Simpan</button>
                </div>
                <div class="col-6 text-end">
                    <button onClick="document.location.reload(true)" class="btn btn-l btn-full mb-0 rounded-xl text-uppercase font-700 shadow-s bg-blue-light" style="float:right;">Reload</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function reloadpage() {
        location.reload()
    }
</script>
<script>
    const scanner = new Html5QrcodeScanner('reader', {
        // Scanner will be initialized in DOM inside element with id of 'reader'
        qrbox: {
            width: 250,
            height: 250,
        }, // Sets dimensions of scanning box (set relative to reader element width)
        fps: 20, // Frames per second to attempt a scan
    });
    scanner.render(success, error);
    // Starts scanner
    function success(result) {
        document.getElementById('result').innerHTML = `
        <h2>Sukses Scan Qr Code !</h2>
        <input type="text" value="${result}"  name="pos" hidden>
        `;
        // Prints result as a link inside result element
        scanner.clear();
        // Clears scanning instance
        document.getElementById('reader').remove();
        // Removes reader element from DOM since no longer neede
    }

    function error(err) {
        console.error(err);
        // Prints any errors to the console
    }
</script>
@endsection