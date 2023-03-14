@extends('mobile.index')
@section('konten')

<div class="page-content">
    <div class="card card-style">
        <div class="content">
            <p class="mb-n1 color-highlight font-600">Rutan Kelas I Depok</p>
            <h1>Visi Misi </h1>
            <p>
                @foreach($informasi as $info)
                @if($info->informasi=="Visi Misi")
                {!! $info->isi_informasi !!}
                @endif
                @endforeach
            </p>
        </div>
    </div>

</div>
@endsection