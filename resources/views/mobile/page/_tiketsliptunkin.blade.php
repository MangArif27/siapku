@extends('mobile.index')
@section('konten')
@foreach($tunkir as $t)
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
                <h1 class="mb-n1">Slip Tunkin Online</h1>
                <p class="mb-2 font-600 color-green-dark">Bulan : {{ $t->penerimaan_bulan }}-{{ $t->penerimaan_tahun }}</p>
                <p>
                    Tunjangan Kinerja Pokok : Rp. Rp. {{number_format($t->tunker),0,".","."}}</br>
                    A. Potongan</br>
                    &nbsp;&nbsp;&nbsp;1. Potongan Dharma Wanita : Rp. {{number_format($t->potongan_dw),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;2. Potongan Koperasi : Rp. {{number_format($t->potongan_koperasi),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;3. Dana Sosial : Rp. {{number_format($t->dana_sosial),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;4. Sumbangan Olahraga : Rp. {{number_format($t->sumbangan_olahraga),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;5. Potongan Bank BTN : Rp. {{number_format($t->potongan_bank),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;6. Potongan Absen : Rp. {{number_format($t->potongan_absen),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;7.Potongan Jurnal : Rp. {{number_format($t->potongan_jurnal),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;<b>Jumlah Potongan : Rp. {{number_format($t->potongan_dw + $t->potongan_koperasi + $t->dana_sosial + $t-> potongan_absen + $t->sumbangan_olahraga + $t->potongan_bank + $t->potongan_absen + $t->potongan_jurnal),0,".","."}}</b></br>
                    B. Tunjangan Kinerja Bersih : Rp. {{number_format($t->tunker-($t->potongan_dw + $t->potongan_koperasi + $t->dana_sosial + $t->potongan_absen + $t->sumbangan_olahraga + $t->potongan_bank + $t->potongan_absen + $t->potongan_jurnal)),0,".","."}}
                </p>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection