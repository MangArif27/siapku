@extends('mobile.index')
@section('konten')
@if(Session::has('alert'))
<div id="menu-welcome-modal" class="menu menu-box-modal menu-box-round-medium menu-box-detached rounded-s menu-active" data-menu-width="310" data-menu-height="350" data-menu-effect="menu-over" data-menu-select="page-components" style="display: block; height: 350px; width: 310px;">
    <!-- add data-cookie-activate above to auto-activate the menu on cookie detection -->
    <div class="boxed-text-xl mt-4">
        <h1 class="mb-3"><i class="fa fa-bullhorn color-red2-dark fa-3x"></i></h1>
        <h2 class="font-700 mb-n1">Notifikasi !</h2>
        <p class="color-highlight">Sistem Informasi Rutan Kelas I Depok Cilodong</p>
        <p>
            {{Session::get('alert')}}
        </p>
        <!-- add hide-cookie to the class to delete the cookie-->
        <a href="#" class="close-menu btn btn-m btn-center-xl rounded-xs shadow-m bg-highlight text-uppercase font-900">Tutup
            Notifikasi</a>
    </div>
</div>
@endif
<div class="page-content">
    <div class="card card-style">
        <div class="content ml-2 mr-2">
            <div class="d-flex">
                <div>
                    <img src="{{url('image/Photo/'.Session::get('photo'))}}" class="rounded-circle" width="80px" height="80px">
                </div>
                <div class="flex-grow-1 ml-2">
                    <p class="ps-3 mb-2 ">
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;{{Session::get('nama')}}</h6>
                    &nbsp;&nbsp;&nbsp;&nbsp;No Identitas : {{Session::get('nik')}}<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Alamat : {{Session::get('alamat')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @foreach($pengaduan as $ku)
    <div class="card card-style">
        <div class="content mb-0">
            <h1>Layanan Pengaduan</h1>
            <div class="card-top text-end ">
                <div class="me-3 color-white">
                    <a href="#" class="btn text-uppercase font-400 bg-highlight rounded-sm mt-4 shadow-xl btn-m ">{{ $ku->status_pengaduan }}
                    </a>
                </div>
            </div>
            <p class="font-10 color-highlight mt-n1 mb-0">Sistem Informasi Rutan Kelas I Cilodong Depok 2.0</p>
            <div class="list-group list-custom-large mb-2">
                <a href="#">
                    <i class="fa fa-id-card color-orange-dark"></i>
                    <span>Nama Pelapor : {{ Session::get('nama') }}</span>
                    <strong>No Identitas : {{ Session::get('nik') }}</strong>
                </a>
                <a href="#">
                    <i class="fa fa-bullhorn color-blue2-dark"></i>
                    <span>Judul : {{ $ku->judul }}</span>
                    <strong>Jenis: {{ $ku->jenis }}</strong>
                </a>
                <a href="#">
                    <i class="fa fa-paperclip color-red2-dark"></i>
                    <span>Isi Pengaduan : {{ $ku->isi_pengaduan}}</span>
                </a>
                @if($ku->bukti_1 =="-")
                @else
                <form action="/Apk/Download/Berkas/{{$ku->bukti_1}}" method="GET" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="text" name="link" value="/image/Pengaduan/bukti_pertama/{{$ku->bukti_1}}" hidden>
                    <a href="#">
                        <i class=" fa fa-file color-green1-dark"></i>
                        <span>Bukti Pertama : </span>
                        <strong>Silahkan Download di Samping <i class="fa fa-arrow-right color-green1-dark"></i></strong>
                    </a>
                    <button class="badge bg-blue-dark">Download</button>
                </form>
                @endif
                @if($ku->file_pembuktian =="-")
                <a href="#">
                    <i class="fa fa-file-pdf color-blue2-dark"></i>
                    <span>Balasan : {{ $ku->alasan}}</span>
                    <strong>File Balasan : <i class="fa fa-arrow-right color-green1-dark"></i></strong>
                    <span class="badge bg-blue2-dark">Belum Tampil</span>
                </a>
                @else
                <form action="/Apk/Download/Berkas/{{$ku->file_pembuktian}}" method="GET" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="text" name="link" value="/image/Pengaduan/File_Pembuktian/{{$ku->file_pembuktian}}" hidden>
                    <a href="#">
                        <i class=" fa fa-file color-blue1-dark"></i>
                        <span>Balasan : File Balasan :<i class="fa fa-arrow-right color-green1-dark"></i></span>
                        <strong>{{ $ku->alasan}}</strong>
                    </a>
                    <button class="badge bg-blue-dark">Download</button>
                </form>
                @endif
            </div>
            <a href="#" class="btn text-uppercase font-900 bg-highlight rounded-sm mb-3 shadow-xl btn-m btn-full">Kode
                Booking : {{$ku->kode_pengaduan}}
            </a>
        </div>
    </div>
    @endforeach
</div>
</div>
<!-- end of page content-->
@endsection