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
    <div class="card card-style bg-orange-light">
        <div class="content ml-2 mr-2">
            <div class="d-flex">
                <div>
                    <img src="{{ url('image/Photo/'.Session::get('photo')) }}" class="rounded-circle" width="80">
                </div>
                <div class="flex-grow-1 ml-2">
                    <p class="ps-3 mb-2 ">
                    <h6>{{ Session::get('anama') }}</h6>
                    No Identitas : {{ Session::get('nik') }}<br>
                    Alamat : {{ Session::get('alamat') }}
                    </p>
                </div>
            </div>
        </div>
        @foreach($kunjungan as $ku)
        @if($ku->nik==Session::get('nik'))
        @if($user = DB::table('users')->where('nik',Session::get('nik'))->first())
        <div class="card card-style ">
            <div class="content mb-0">
                <h3>{{$ku->keperluan}}</h3>
                <p class="font-10 color-highlight mt-n2 mb-0">Sistem Informasi Rutan Kelas I Depok Cilodong</p>
                <div class="card-top text-end ">
                    <div class="me-3 color-white">
                        <a href="#" class="btn text-uppercase font-400 bg-highlight rounded-sm mt-4 shadow-xl btn-m ">Status
                            : {{$ku->status}}
                        </a>
                    </div>
                </div>
                @if($ku->keperluan=="Kunjungan Tatap Muka")
                <div class="list-group list-custom-large mb-2">
                    <a href="#">
                        <i class="far fa-calendar color-blue2-dark"></i>
                        <span class="font-10">Tanggal : {{ $ku->tanggal_kunjungan}}</span>
                        <strong>Waktu : {{ $ku->sesi}}</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-map-marker-alt color-red2-dark"></i>
                        <span class="font-10">Lokasi : Rutan Kelas I Depok</span>
                        <strong>Tempat : Ruang Kunjungan</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-id-card color-green1-dark"></i>
                        <span class="font-10">Nama Pengunjung : {{ $user->nama }}</span>
                        <strong>No Identitas : {{ $ku->nik}}</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-universal-access color-green1-dark"></i>
                        <span class="font-10">Nama WBP : {{ $ku->nama_wbp }}</span>
                    </a>
                </div>
                @elseif($ku->keperluan=="Penitipan Barang")
                <div class="list-group list-custom-large mb-2">
                    <a href="#">
                        <i class="far fa-calendar color-blue2-dark"></i>
                        <span class="font-10">Tanggal : {{ $ku->tanggal_kunjungan}}</span>
                        <strong>Waktu : {{ $ku->sesi}}</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-map-marker-alt color-red2-dark"></i>
                        <span class="font-10">Lokasi : Rutan Kelas I Depok</span>
                        <strong>Tempat : Ruang Kunjungan</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-id-card color-green1-dark"></i>
                        <span class="font-10">Nama Pengunjung : {{ $user->nama }}</span>
                        <strong>No Identitas : {{ $ku->nik}}</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-universal-access color-green1-dark"></i>
                        <span class="font-10">Nama WBP : {{ $ku->nama_wbp }}</span>
                    </a>

                    @endif
                </div>
                @else
                <div class="list-group list-custom-large mb-2">
                    <a href="#">
                        <i class="far fa-calendar color-blue2-dark"></i>
                        <span class="font-10">Tanggal : {{ $ku->tanggal_kunjungan}}</span>
                        <strong>Waktu : {{ $ku->sesi}}</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-map-marker-alt color-red2-dark"></i>
                        <span class="font-10">Lokasi : Kediaman Masing-Masing </span>
                        <strong>No Handphone/Wa : {{ $user->no_hp}}</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-id-card color-green1-dark"></i>
                        <span class="font-10">Nama Pengunjung : {{ $user->nama }}</span>
                        <strong>No Identitas : {{ $ku->nik}}</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-universal-access color-green1-dark"></i>
                        <span class="font-10">Nama WBP : {{ $ku->nama_wbp }}</span>
                    </a>
                </div>
                @endif
                <a href="#" class="btn text-uppercase font-900 bg-highlight rounded-sm mb-3 shadow-xl btn-m btn-full">Kode
                    Booking : {{$ku->kode_booking}}
                </a>
                @if($ku->keperluan="Penitipan Barang")
                @if($ku->foto=="-")
                <h3>Barang Belum Diterima !!</h3>
                @else
                <h3>Serah Terima :</h3>
                <img src="{{ url('backup_restore/restore/serhterima/'.$ku->foto )}}" class="mb-3">
                @endif
                @endif
            </div>
        </div>

        @endif
        @endforeach
    </div>
</div>
<!-- end of page content-->
@endsection