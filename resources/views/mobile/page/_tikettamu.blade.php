@extends('mobile.index')
@section('konten')
@if(Session::has('alert'))
<div id="menu-welcome-modal" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s menu-active" data-menu-width="310" data-menu-height="350" data-menu-effect="menu-over" data-menu-select="page-components" style="display: block; height: 350px; width: 310px;">
    <!-- add data-cookie-activate above to auto-activate the menu on cookie detection -->
    <div class="boxed-text-xl mt-4">
        <h1 class="mb-3"><i class="fa fa-bullhorn color-red2-dark fa-3x"></i></h1>
        <h2 class="font-700 mb-n1">Notifikasi !</h2>
        <p class="color-highlight">Sisten Informasi Lapas Karawang</p>
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
        @foreach($tamu as $tamu)
        @if($tamu->nik==Session::get('nik'))
        @if($user = DB::table('users')->where('nik',Session::get('nik'))->first())
        <div class="card card-style">
            <div class="content mb-0">
                <h1>Tamu Dinas</h1>
                <p class="font-10 color-highlight mt-n2 mb-0">Sistem Informasi Rutan Kelas I Depok Cilodong</p>
                <div class="card-top text-end ">
                    <div class="me-3 color-white">
                        <a href="#" class="btn text-uppercase font-400 bg-highlight rounded-sm mt-4 shadow-xl btn-m ">{{$tamu->status}}
                        </a>
                    </div>
                </div>
                <div class="list-group list-custom-large mb-1">
                    <a href="#">
                        <i class="far fa-calendar color-blue2-dark"></i>
                        <span>Tanggal : {{ $tamu->tanggal }}</span>
                        <strong>Waktu : 09:00 - 14:30 WIB</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-map-marker-alt color-red2-dark"></i>
                        <span>Lokasi : Sistem Informasi Rutan Kelas I Depok Cilodong</span>
                        <strong>Jl. M. Nasir, Cilodong, Kec. Cilodong, Kota Depok</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-id-card color-orange-dark"></i>
                        <span>Nama Tamu : {{ $user->nama }}</span>
                        <strong>No Identitas : {{ $tamu->nik}}</strong>
                    </a>
                    <a href="#">
                        <i class="fa fa-phone color-green1-dark"></i>
                        <span>No Handohone : {{ $user->no_hp }}</span>
                    </a>
                    <a href="#">
                        <i class="fa fa-universal-access color-brown-dark"></i>
                        <span>Keperluan : {{ $tamu->keperluan}}</span>
                        <strong>Alasan : {{ $tamu->alasan}}</strong>
                    </a>
                </div>
                <a href="#" class="btn text-uppercase font-900 bg-highlight rounded-sm mb-3 shadow-xl btn-m btn-full">Kode
                    Booking : {{$tamu->kode_booking}}
                </a>
            </div>
        </div>
        @endif
        @endif
        @endforeach
    </div>
</div>
<!-- end of page content-->
@endsection