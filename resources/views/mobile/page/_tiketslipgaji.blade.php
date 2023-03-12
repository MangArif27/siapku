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
                    A. Potongan</br>
                    &nbsp;&nbsp;&nbsp;1. Potongan Dharma Wanita : Rp. {{number_format($p->potongan_dw),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;2. Potongan BRI : Rp. {{number_format($p->potongan_bank),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;3. Potongan Koperasi : Rp. {{number_format($p->potongan_koperasi),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;4. Dana Sosial : Rp. {{number_format($p->dana_sosial),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;5. Sumbangan Olahraga : Rp. {{number_format($p->sumbangan_olahraga),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;6. Rumah Dinas : Rp. {{number_format($p->rumah_dinas),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;7. Potongan Bank Bank : Rp. {{number_format($p->potongan_bank2),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;8. Palang Merah Indonesia : Rp. {{number_format($p->pmi),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;9. Harkop : Rp. {{number_format($p->harkop),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;10. Administrasi Bank : Rp. {{number_format($p->adm_bank),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;<b>Jumlah Potongan : Rp. {{number_format($p->potongan_dw + $p->potongan_bank + $p->potongan_koperasi + $p->dana_sosial + $p->sumbangan_olahraga + $p->rumah_dinas + $p->potongan_bank2 + $p->pmi + $p->harkop + $p->adm_bank),0,".","."}}</b></br>
                    B. Gaji Bersih : Rp. {{number_format($p->gaji_pokok-($p->potongan_dw + $p->potongan_bank + $p->potongan_koperasi + $p->dana_sosial + $p->sumbangan_olahraga + $p->rumah_dinas + $p->potongan_bank2 + $p->pmi + $p->harkop + $p->adm_bank)),0,".","."}}
                </p>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection