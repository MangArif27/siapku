@extends('mobile.index')
@section('konten')
@foreach($gaji as $p)
@if($user = DB::table('users')->where('nik',Session::get('nik'))->first())
<div class="page-content">
    <div class="card card-style bg-green-light">
        <div class="content ml-2 mr-2">
            <div class="d-flex">
                <div>
                    <img src="{{ url('image/Photo/'.$user->photo) }}" class="rounded-circle" width="80">
                </div>
                <div class="flex-grow-1 ml-2">
                    <p class="ps-3 mb-2 ">
                    <h6>{{ $user->nama }}</h6>
                    No Identitas : {{ $user->nik }}<br>
                    Alamat : {{ $user->alamat }}
                    </p>
                </div>
            </div>
        </div>
        <div class="card card-style ">
            <div class="content">
                <h1 class="mb-n1">Slip Gaji Online</h1>
                <p class="mb-2 font-600 color-green-dark">Bulan : {{ $p->penerimaan_bulan }}-{{ $p->penerimaan_tahun }}</p>
                <p>
                    Gaji Pokok : Rp. {{number_format($p->gaji_pokok),0,".","."}}</br>
                    A. Tunjangan Tambahan
                    &nbsp;&nbsp;&nbsp;1. Tunjangan Suami/Istri : Rp. {{number_format($p->tunjangan_pasangan),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;2. Tunjangan Anak : Rp. {{number_format($p->tunjangan_anak),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;3. Tunjangan Umum : Rp. {{number_format($p->tunjangan_umum),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;4. Tunjangan Ta. Umum : Rp. {{number_format($p->tunjangan_ta_umum),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;5. Tunjangan Papua : Rp. {{number_format($p->tunjangan_papua),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;6. Tunjangan Terpencil : Rp. {{number_format($p->tunjangan_terpencil),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;7. Tunjangan Struktur : Rp. {{number_format($p->tunjangan_struktur),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;8. Tunjangan Fungsi : Rp. {{number_format($p->tunjangan_fungsi),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;9. Tunjangan Lain : Rp. {{number_format($p->tunjangan_lain),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;10. Tunjangan Beras : Rp. {{number_format($p->tunjangan_beras),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;<b>Jumlah Tunjangan : Rp. {{number_format($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +$p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras),0,".","."}}</b></br>
                    B. Potongan</br>
                    &nbsp;&nbsp;&nbsp;1. IWP : Rp. {{number_format($p->iwp),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;2. BPJS : Rp. {{number_format($p->bpjs),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;3. Sewa Rumah : Rp. {{number_format($p->sewa_rumah),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;4. Tunggakan : Rp. {{number_format($p->tunggakan),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;5. Utang : Rp. {{number_format($p->utang),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;6. Potongan Lain : Rp. {{number_format($p->potongan_lain),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;7. Taperum : Rp. {{number_format($p->taperum),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;8. Potongan Pph : Rp. {{number_format($p->potongan_pph),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;<b>Jumlah Potongan : Rp. {{number_format($p->iwp + $p->bpjs + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum + $p->potongan_pph),0,".","."}}</b></br>
                    C. Gaji Bersih : Rp. {{number_format($p->gaji_pokok + ($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +$p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras)-($p->iwp + $p->bpjs + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum + $p->potongan_pph)),0,".","."}}
                </p>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection