@extends('mobile.index')
@section('konten')
<div class="page-content">
    @foreach($kunjungan as $ku)
    @if($ku->nik==Session::get('nik'))
    @foreach(DB::table('data_wbp')->get() as $wbp)
    @if($wbp->no_induk==$ku->no_induk)
    <div class="card card-style bg-16" data-card-height="130">
        <div class="content card-top text-start">
            <div class="d-flex">
                <div>
                    <a href="#" data-menu="menu-success-2-{{$ku->kode_booking}}"><img src="data:image/png;base64,{{DNS2D::getBarcodePNG($ku->kode_booking, 'qrcode')}}" style="background-color:rgb(255,255,255); padding:4px;" width="90"></a>
                </div>
                <p class="text-white" style="padding-left: 6px;">
                    <span class="font-18"><b>Layanan {{$ku->keperluan}}</b></span></br>
                    <span class="color-white font-10 opacity-70 mt-1 mb-n1"><i class="far fa-calendar"></i>
                        {{$ku->tanggal_kunjungan}} <i class="ml-3 far fa-clock"></i> {{ $ku->sesi }}
                    </span></br>
                    <span class="color-white font-10 opacity-70 mt-1 mb-n1"><i class="fa fa-id-card"></i>
                        {{ $wbp->nama }}
                    </span></br>
                    <span class="color-white font-10 opacity-70 mt-1 mb-n1"><i class="fa fa-map-marker-alt"></i>
                        Lapas Kelas IIA Karawang</span>
                </p>
                <div class="card-bottom text-end mb-4">
                    <div class="me-3 color-white">
                        <a href="/Apk/Ticket/Kunjungan/{{$ku->kode_booking}}" class="bg-highlight btn btn-xs text-uppercase font-900 rounded-l font-11">
                            {{ $ku->status }}</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-overlay bg-black opacity-75"></div>
    </div>
    @endif
    @endforeach
    @endif
    @endforeach
</div>
@foreach($kunjungan as $ku)
@if($ku->nik==Session::get('nik'))
@foreach(DB::table('data_wbp')->get() as $wbp)
@if($wbp->no_induk==$ku->no_induk)
<div id="menu-success-2-{{$ku->kode_booking}}" class="menu menu-box-modal bg-orange-dark rounded-m text-center" data-menu-height="350" data-menu-width="350">
    <h4 class=" mt-2 font-700 color-white">Qr Code Tiket Kunjungan </h4>
    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($ku->kode_booking, 'qrcode')}}" style="background-color:rgb(255,255,255); padding:6px;" class="" width="80%">
    <h4 class=" mt-2 font-700 color-white">{{ $ku->kode_booking }}</h4>
</div>
@endif
@endforeach
@endif
@endforeach
@endsection