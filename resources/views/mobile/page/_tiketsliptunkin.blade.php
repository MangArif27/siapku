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
                    &nbsp;&nbsp;&nbsp;1. Potongan Atribut : Rp. {{number_format($t->potongan_atribut),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;2. Potongan Arisan DWP : Rp. {{number_format($t->potongan_arisan_dwp),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;3. Potongan Arisan Pipas : Rp. {{number_format($t->potongan_arisan_pipas),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;4. Potongan Bank BJB : Rp. {{number_format($t->potongan_bjb),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;5. Potongan Simpanan Wajib : Rp. {{number_format($t->potongan_simpanan_wajib),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;6. Potongan Koperasi : Rp. {{number_format($t->potongan_koperasi),0,".","."}}</br>
                    &nbsp;&nbsp;&nbsp;<b>Jumlah Potongan : Rp. {{number_format($t->potongan_atribut + $t->potongan_koperasi + $t->potongan_arisan_dwp + $t->potongan_arisan_pipas + $t->potongan_bjb + $t->potongan_simpanan_wajib),0,".","."}}</b></br>
                    B. Tunjangan Kinerja Bersih : Rp. {{number_format($t->tunker-($t->potongan_atribut + $t->potongan_koperasi + $t->potongan_arisan_dwp + $t->potongan_arisan_pipas + $t->potongan_bjb + $t->potongan_simpanan_wajib)),0,".","."}}
                </p>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endsection