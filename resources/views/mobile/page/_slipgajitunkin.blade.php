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
                    Penerimaan Gaji Bersih : Rp. {{number_format($p->gaji_pokok + ($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +$p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras)-($p->iwp + $p->bpjs + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum + $p->potongan_pph)),0,".","."}}</br>
                    Penerimaan Tunkin Bersih : Rp. {{number_format($t->tunker-($t->potongan_atribut + $t->potongan_koperasi + $t->potongan_arisan_dwp + $t->potongan_arisan_pipas + $t->potongan_bjb + $t->potongan_simpanan_wajib)),0,".","."}}</br>
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
<div id="menu-success-2-{{$p->kode}}" class="menu menu-box-modal bg-green-dark rounded-m text-center" data-menu-height="325" data-menu-width="350">
    <h4 class=" mt-2 font-700 color-white">Qr Code Slip Gaji & Tunkin </h4>
    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($p->kode, 'qrcode')}}" style="background-color:rgb(255,255,255); padding:6px;" class="" width="65%">
    <h4 class=" mt-2 font-700 color-white">Bulan {{ $p->penerimaan_bulan }}-{{ $p->penerimaan_tahun}}</h4>
    <h4 class=" mt-2 font-700 color-white">Kode {{$p->kode}}</h4>
</div>
@endif
@endforeach
@endforeach
@endsection