@extends('mobile.index')
@section('konten')
<div class="page-content">

    <div class="card card-style">
        <div class="content">
            <h4>Pusat Berkas</h4>
            <p>
                Pada halaman ini merupakan tempat untuk mengunduh berkas/formulir untuk mendapatkan hak-hak pada
                Rutan Kelas I Depok.
            </p>
        </div>

        <div class="accordion" id="accordion-1">
            @foreach($pusatberkas as $ku)
            <div class="mb-0">
                <form action="/Apk/Download/Berkas/{{ $ku->link }}" id="Download{{ $ku->id }}" method="GET">
                    {{ csrf_field() }}
                    <input type="text" name="link" value="/backup_restore/restore/dokumen/{{ $ku->link }}" hidden>
                </form>
                <button class="btn accordion-btn no-effect color-theme" type=" submit" form="Download{{ $ku->id }}">
                    <i class="fa fa-file color-red-dark me-2"></i>
                    {{ $ku->nama_file }}
                    <i class="fa fa-down font-10 accordion-icon"></i>
                </button>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection