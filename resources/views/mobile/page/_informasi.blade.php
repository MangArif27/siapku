@extends('mobile.index')
@section('konten')
<div class="page-content">
    <div class="card card-style pb-4">
        <div class="content mb-0">
            <h4 class="font-700">Layanan Informasi </h4>
            <p>
                Pada halaman ini menampilkan informasi yang tersedia pada Aplikasi Si Ratu Cilok ini.
            </p>
        </div>
    </div>
    @if(Session::get('status')=="USER" || Session::get('status')!="PEGAWAI")
    <div class="card card-style pb-4">
        <div class="content mb-0">
            <h4 class="font-700">Layanan Informasi Kunjungan</h4>
        </div>
        <div class="accordion mt-0" id="accordion-1">
            <div class="card card-style shadow-0 bg-highlight mb-1">
                <button class="btn accordion-btn  color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse1">
                    <i class="fa fa-users me-2"></i>
                    Bagaimana Cara Berkunjung ?
                    <i class="fa fa-plus font-10 accordion-icon"></i>
                </button>
                <div id="collapse1" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Layanan Kunjungan')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="card card-style shadow-0 bg-highlight mb-1">
                <button class="btn accordion-btn  color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse2">
                    <i class="fa fa-gift me-2"></i>
                    Bagaimana Cara Penitipan Barang ?
                    <i class="fa fa-plus font-10 accordion-icon"></i>
                </button>
                <div id="collapse2" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Penitipan Barang')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="card card-style shadow-0 bg-highlight mb-1">
                <button class="btn accordion-btn  color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse3">
                    <i class="fa fa-video me-2"></i>
                    Bagaimana Cara Video Call dengan WBP ?
                    <i class="fa fa-plus font-10 accordion-icon"></i>
                </button>
                <div id="collapse3" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Video Call')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="card card-style shadow-0 bg-highlight mb-1">
                <button class="btn accordion-btn  color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse4">
                    <i class="fa fa-video me-2"></i>
                    Bagaimana Cara Bertamu secara Dinas ?
                    <i class="fa fa-plus font-10 accordion-icon"></i>
                </button>
                <div id="collapse4" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Tamu Dinas')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-style pb-4">
        <div class="content mb-0">
            <h4 class="font-700">Layanan Hak Warga Binaan</h4>
        </div>
        <div class="accordion mt-0" id="accordion-1">
            <div class="card card-style shadow-0 bg-red-dark mb-1">
                <button class="btn accordion-btn color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse5">
                    <i class="fa fa-child me-2"></i>
                    Bagaimana Cara Pengajuan Hak Integrasi ?
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse5" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Layanan Integrasi')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="card card-style shadow-0 bg-red-dark mb-1">
                <button class="btn accordion-btn color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse6">
                    <i class="fa fa-briefcase me-2"></i>
                    Bagaimana Cara Mendapatkan Remisi ?
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse6" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Layanan Remisi')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="card card-style shadow-0 bg-red-dark mb-1">
                <button class="btn accordion-btn color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse7">
                    <i class="fa fa-child me-2"></i>
                    Bagaimana Cara Izin Luar Biasa ?
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse7" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Izin Alasan Penting')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif(Session::get('status')=="PEGAWAI")
    <div class="card card-style pb-4">
        <div class="content mb-0">
            <h4 class="font-700">Layanan Pegawai</h4>
        </div>
        <div class="accordion mt-0" id="accordion-1">
            <div class="card card-style shadow-0 bg-green-dark mb-1">
                <button class="btn accordion-btn color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse9">
                    <i class="fa fa-bullhorn me-2"></i>
                    Bagaimana Cara Laporan Pengamanan ?
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse9" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Layanan Pengamanan')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="card card-style shadow-0 bg-green-dark mb-1">
                <button class="btn accordion-btn color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse10">
                    <i class="fa fa-money-bill-alt me-2"></i>
                    Bagaimana Cara Informasi Slip Gaji ?
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse10" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Layanan Slip')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="card card-style shadow-0 bg-green-dark mb-1">
                <button class="btn accordion-btn color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse11">
                    <i class="fa fa-file me-2"></i>
                    Bagaimana Cara Download Slip Gaji ?
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse11" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Layanan Download Slip')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="card card-style shadow-0 bg-green-dark mb-1">
                <button class="btn accordion-btn color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse12">
                    <i class="fa fa-address-card me-2"></i>
                    Bagaimana Mendapatkan Karis/Karsu ?
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse12" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Layanan Kartu Istri/Suami')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="card card-style shadow-0 bg-green-dark mb-1">
                <button class="btn accordion-btn color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse13">
                    <i class="fa fa-unlink me-2"></i>
                    Bagaimana Mendapatkan SK Pensiun ?
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse13" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Layanan Pensiun Pegawai')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="card card-style pb-4">
        <div class="content mb-0">
            <h4 class="font-700">Call Center</h4>
        </div>
        <div class="accordion mt-0" id="accordion-1">
            <div class="card card-style shadow-0 bg-brown-dark mb-1">
                <button class="btn accordion-btn color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse14">
                    <i class="fa fa-bullhorn me-2"></i>
                    Bagaimana Cara Pengaduan ?
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse14" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Layanan Pengaduan')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
            <div class="card card-style shadow-0 bg-brown-dark mb-1">
                <button class="btn accordion-btn color-white no-effect" data-bs-toggle="collapse" data-bs-target="#collapse15">
                    <i class="fa fa-phone me-2"></i>
                    Hotline Rutan Kelas I Depok ?
                    <i class="fa fa-chevron-down font-10 accordion-icon"></i>
                </button>
                <div id="collapse15" class="collapse bg-theme" data-bs-parent="#accordion-2">
                    <div class="pt-3 pb-3">
                        <p class="mb-0">@foreach($informasi as $info)
                            @if($info->informasi=='Hotline')
                            {!! $info->isi_informasi !!}
                            @endif
                            @endforeach</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection