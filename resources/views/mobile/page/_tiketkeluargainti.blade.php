@extends('mobile.index')
@section('konten')
@if(Session::has('alert'))
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
</div>
@foreach($KeluargaInti as $ki)
@foreach($DataWbp as $wbp)
<div class="card card-style ">
    <div class="content mb-0">
        <h3>Perkembangan Pembinaan</h3>
        <p class="font-10 color-highlight mt-n2 mb-0">Sistem Informasi Rutan Kelas I Cilodong Depok 2.0</p>
        <div class="card-top text-end ">
            <div class="me-3 color-white">
                <a href="#" class="btn text-uppercase font-400 bg-highlight rounded-sm mt-4 shadow-xl btn-m ">{{$ki->status_keluarga}}
                </a>
            </div>
        </div>
        <div class="list-group list-custom-large">
            <a href="#">
                <i class="fa fa-universal-access color-green1-dark"></i>
                <span class="font-12">Nama WBP : {{ $wbp->nama }} </span>
                <strong>No Induk Kependudukan : {{ $wbp->nik_wbp}}</strong>
            </a>
            <a href="#" height="10px">
                <i class="fa fa-id-card color-green1-dark"></i>
                <span class="font-12">Alamat WBP : </span>
                <strong>{{ $wbp->alamat_wbp }}</strong>
            </a>
            <a href="#">
                <i class="fa fa-balance-scale color-blue2-dark"></i>
                <span class="font-12">Pidana : {{ $wbp->pidana}}</span>
                <strong>Perkara : {{ $wbp->kejahatan}} </strong>
            </a>
            <a href="#">
                <i class="far fa-calendar color-blue2-dark"></i>
                <span class="font-12">Tgl Ditahan : {{ $wbp->tanggal_ditahan}}</span>
                <strong>Tgl Bebas : {{ $wbp->tanggal_ekspirasi}} </strong>
            </a>
            <a href="#">
                <i class="fa fa-clipboard-list color-red2-dark"></i>
                <span class="font-12">Kegiatan Pembinaan : {{$wbp->kegiatan_pembinaan}}</span>
            </a>
            <a href="#">
                <i class="fa fa-book color-red2-dark"></i>
                <span class="font-12">Skor Pembinaan : {{$wbp->skor_pembinaan}} Point</span>
            </a>
        </div>
        @if($wbp->skor_pembinaan<"100") <a href="#" data-menu="menu-call" class=" btn text-uppercase font-900 bg-highlight rounded-sm mb-3 shadow-xl btn-m btn-full">
            Pengajuan Hak Integrasi</a>
            @else
            @if($ki->status_integrasi=="Pending")
            <a href="#" data-menu="menu-call-3" class=" btn text-uppercase font-900 bg-highlight rounded-sm mb-3 shadow-xl btn-m btn-full">
                Pengajuan Hak Integrasi
            </a>
            @elseif($ki->status_integrasi=="Ditolak")
            <a href="#" data-menu="menu-call-2" class=" btn text-uppercase font-900 bg-highlight rounded-sm mb-3 shadow-xl btn-m btn-full">
                Pengajuan Hak Integrasi
            </a>
            @else
            <a href="#" data-menu="menu-call-1" class=" btn text-uppercase font-900 bg-highlight rounded-sm mb-3 shadow-xl btn-m btn-full">
                Pengajuan Hak Integrasi
            </a>
            @endif
            @endif
    </div>
</div>
<div id="menu-call" class="menu menu-box-modal rounded-m mb-5" data-menu-width="350">
    <div class="menu-title">
        <h1>Notifikasi</h1>
        <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
    </div>
    <div class="content">
        <center>
            <h5>Skor Pembinaan</h5>
            <a href="#" class="btn btn-xxl mb-3 rounded-s text-uppercase shadow-s bg-highlight "><span class="badge badge-light font-24">{{$wbp->skor_pembinaan}}</span></a><br>
        </center>
        <h5 style="text-align:justify;">Maaf Anda Belum Bisa Mengajukan Hak Integrasi Warga Binaan Atas Nama {{ $wbp->nama }} Dikarenakan Skor Pembinaan Kurang Dari Standar</h5>
        <h7>Informasi Lebih Lanjut Dapat Menghubungi Admin !</h7>
    </div>
</div>
<div id="menu-call-1" class="menu menu-box-modal rounded-m mb-5" data-menu-width="350">
    <div class="menu-title">
        <h1>Notifikasi</h1>
        <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
    </div>
    <div class="content">
        <center>
            <h5>Skor Pembinaan</h5>
            <a href="#" class="btn btn-xxl mb-3 rounded-s text-uppercase shadow-s bg-highlight "><span class="badge badge-light font-24">{{$wbp->skor_pembinaan}}</span></a><br>
        </center>
        <h5 style="text-align:justify;">Selamat Anda Bisa Mengajukan Hak Integrasi Narapidana Atas Nama {{ $wbp->nama }}, Silahkan Klik Downlaod Formulir Untuk Untuk Download Formulir Hak Integrasi !</h5></br>
        <center><a href="/Apk/Pengajuan-Formulir/{{ Session::get('nik') }}" class="btn btn-m mb-3 rounded-s text-uppercase shadow-s bg-highlight "><span class="badge badge-light font-10">Download Formulir</span></a></center>
    </div>
</div>
<div id="menu-call-2" class="menu menu-box-modal rounded-m mb-5" data-menu-width="350">
    <div class="menu-title">
        <h1>Notifikasi</h1>
        <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
    </div>
    <div class="content">
        <center>
            <h5>Skor Pembinaan</h5>
            <a href="#" class="btn btn-xxl mb-3 rounded-s text-uppercase shadow-s bg-highlight "><span class="badge badge-light font-24">{{$wbp->skor_pembinaan}}</span></a><br>
        </center>
        <h5 style="text-align:justify;">Mohon Maaf Pengajuan Formulir Anda Ditolak Oleh Admin, Silahkan Hubungi Admin !!!</h5></br>
        <center><a href="/Apk/Pengajuan-Formulir/{{ Session::get('nik') }}" class="btn btn-m mb-3 rounded-s text-uppercase shadow-s bg-highlight "><span class="badge badge-light font-10">Ajukan Formulir Kembali</span></a></center>
    </div>
</div>
<div id="menu-call-3" class="menu menu-box-modal rounded-m mb-5" data-menu-width="350">
    <div class="menu-title">
        <h1>Notifikasi</h1>
        <a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
    </div>
    <div class="content">
        <center>
            <h5>Skor Pembinaan</h5>
            <a href="#" class="btn btn-xxl mb-3 rounded-s text-uppercase shadow-s bg-highlight "><span class="badge badge-light font-24">{{$wbp->skor_pembinaan}}</span></a><br>
        </center>
        <h5 style="text-align:justify;">Mohon Maaf Pengajuan Formulir Masih Pending, Silahkan Untuk Menunggu Persetujuan dari Admin</h5></br>
    </div>
</div>
@endforeach
@endforeach
</div>
<!-- end of page content-->
@endsection