@extends('mobile.index')
@section('konten')
<div class="page-content">
    @foreach($gaji as $p)
    @foreach($tunkin as $t)
    @if($t->kode == $p->kode)
    <div class="card card-style bg-16" data-card-height="130">
        <div class="content card-top text-start">
            <div class="d-flex">
                <div>
                    <a href="#" data-menu="menu-success-2-{{$p->kode}}"><img src="data:image/png;base64,{{DNS2D::getBarcodePNG($p->kode, 'qrcode')}}" style="background-color:rgb(255,255,255); padding:4px;" width="90"></a>
                </div>
                <p class="text-white" style="padding-left: 6px;">
                    Penerimaan Bulan : {{ $p->penerimaan_bulan }}-{{ $p->penerimaan_tahun}}</br>
                    Penerimaan Gaji Bersih : Rp. {{number_format($p->gaji_pokok-($p->potongan_dw + $p->potongan_bank + $p->potongan_koperasi + $p->dana_sosial + $p->sumbangan_olahraga + $p->rumah_dinas + $p->potongan_bank2 + $p->pmi + $p->harkop + $p->adm_bank)),0,".","."}}</br>
                    Penerimaan Tunkin Bersih : Rp. {{number_format($t->tunker-($t->potongan_dw + $t->potongan_koperasi + $t->dana_sosial + $t-> potongan_absen + $t->sumbangan_olahraga + $t->potongan_bank + $t->potongan_absen + $t->potongan_jurnal)),0,".","."}}</br>
                </p>
                <div class="card-bottom text-end ">
                    <div class="me-3 color-white">
                        <a href="/Apk/Ticket/Slip/Gaji/{{$p->kode}}" class="btn btn-xxs rounded-m text-uppercase font-700 shadow-s bg-yellow-light">Lihat Gaji</a>
                        <a href="/Apk/Ticket/Slip/Tunkin/{{$p->kode}}" class="btn btn-xxs rounded-m text-uppercase font-700 shadow-s bg-green-light">Lihat Tunkin</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-overlay bg-black opacity-75"></div>
    </div>
    @endif
    @endforeach
    @endforeach
</div>
@foreach($gaji as $p)
@foreach($tunkin as $t)
@if($t->kode == $p->kode)
<div id="menu-success-2-{{$p->kode}}" class="menu menu-box-modal bg-green-dark rounded-m text-center" data-menu-height="310" data-menu-width="350">
    <h4 class=" mt-2 font-700 color-white">Qr Code Slip Gaji & Tunkin </h4>
    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($p->kode, 'qrcode')}}" style="background-color:rgb(255,255,255); padding:6px;" class="" width="65%">
    <h4 class=" mt-2 font-700 color-white">Bulan {{ $p->penerimaan_bulan }}-{{ $p->penerimaan_tahun}}</h4>
</div>
@endif
@endforeach
@endforeach
@endsection