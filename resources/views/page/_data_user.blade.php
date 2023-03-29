@extends('master')
@section('konten')
<div class="right_col" role="main">
    @include('page.partials._tiles')
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Pengguna Aplikasi </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No Handphone</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            $jenis_kelamin    = array('LAKI-LAKI', 'PEREMPUAN');
                            ?>
                            @foreach($users as $p)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->jenis_kelamin }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->no_hp }}</td>
                                <td><button type="button" class="btn btn-xs {{ $p->level }}" data-toggle="modal" data-target=".bs-example-modal-lg{{ $p->nik }}"><i class="fa fa-edit"></i>
                                        {{ $p->status }}</button>
                                    <a href="/delete/user/{{ $p->nik }}" class="btn btn-info btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                                </td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
</div>
@foreach($users as $p)
<div class="modal fade bs-example-modal-lg{{ $p->nik }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Data Pengguna : {{ $p->nama }}</h4>
            </div>
            <div class="modal-body">
                @if(Session::get('status')=="ADMIN" || Session::get('status')=="ADMIN PEGAWAI")
                <form class="form-horizontal form-label-left" action="{{ route('post.update.akun') }}" method="POST" enctype="multipart/form-data">
                    @else
                    <form class="form-horizontal form-label-left" action="{{ route('post.update.user') }}" method="POST" enctype="multipart/form-data">
                        @endif
                        {{ csrf_field() }}
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No Induk</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" id="nik" name="nik" readonly value="{{ $p->nik }}">
                        </div>
                        </br>
                        </br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="nama" name="nama" class="form-control" value="{{ $p->nama }}">
                        </div>
                        </br>
                        </br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option>~ Jenis Kelamin ~</option>
                                @if($p->jenis_kelamin=='Laki-Laki')
                                <option value="Laki-Laki" selected>LAKI-LAKI</option>
                                <option value="Perempuan">PEREMPUAN</option>
                                @else($p->jenis_kelamin=='Perempuan')
                                <option value="Laki-Laki">LAKI-LAKI</option>
                                <option value="Perempuan" selected>PEREMPUAN</option>
                                @endif
                            </select>
                        </div>
                        </br>
                        </br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control" id="alamat" name="alamat">{{ $p->alamat}}</textarea>
                        </div></br></br></br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No Handphone</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" id="no_hp" name="no_hp" class="form-control" value="{{ $p->no_hp }}">
                        </div></br></br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="email" id="email" name="email" class="form-control" value="{{ $p->email }}">
                        </div></br></br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Scan Identitas</label>
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <img class="img-responsive avatar-view" src="{{ url('image/Scan_ktp/'.$p->scan_ktp) }}" width="75%">
                            </div>
                        </div>
                        </br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <img class="img-responsive avatar-view" src="{{ url('image/Photo/'.$p->photo) }}" width="75%">
                            </div>
                        </div>
                        </br>
                        @if(Session::get('status')=="ADMIN" || Session::get('status')=="ADMIN PEGAWAI")
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status User</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="status" id="status" class="form-control">
                                <option>~ Status User ~</option>
                                @if($p->status=='ADMIN')
                                <option value="ADMIN" selected>ADMIN</option>
                                <option value="ADMIN SURAT">ADMIN SURAT</option>
                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                                <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                                <option value="USER">USER</option>
                                <option value="COUNTER">COUNTER</option>
                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PEMANGGILAN">PEMANGGILAN</option>
                                <option value="PEGAWAI">PEGAWAI</option>
                                @elseif($p->status=='ADMIN PEGAWAI')
                                <option value="ADMIN">ADMIN</option>
                                <option value="ADMIN SURAT">ADMIN SURAT</option>
                                <option value="ADMIN PEGAWAI" selected>ADMIN PEGAWAI</option>
                                <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                                <option value="USER">USER</option>
                                <option value="COUNTER">COUNTER</option>
                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PEMANGGILAN">PEMANGGILAN</option>
                                <option value="PEGAWAI">PEGAWAI</option>
                                @elseif($p->status=='ADMIN SURAT')
                                <option value="ADMIN">ADMIN</option>
                                <option value="ADMIN SURAT" selected>ADMIN SURAT</option>
                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                                <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                                <option value="USER">USER</option>
                                <option value="COUNTER">COUNTER</option>
                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PEMANGGILAN">PEMANGGILAN</option>
                                <option value="PEGAWAI">PEGAWAI</option>
                                @elseif($p->status=='USER')
                                <option value="ADMIN">ADMIN</option>
                                <option value="ADMIN SURAT">ADMIN SURAT</option>
                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                                <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                                <option value="USER" selected>USER</option>
                                <option value="COUNTER">COUNTER</option>
                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PEMANGGILAN">PEMANGGILAN</option>
                                <option value="PEGAWAI">PEGAWAI</option>
                                @elseif($p->status=='COUNTER')
                                <option value="ADMIN">ADMIN</option>
                                <option value="ADMIN SURAT">ADMIN SURAT</option>
                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                                <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                                <option value="USER">USER</option>
                                <option value="COUNTER" selected>COUNTER</option>
                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PEMANGGILAN">PEMANGGILAN</option>
                                <option value="PEGAWAI">PEGAWAI</option>
                                @elseif($p->status=='COUNTER PEGAWAI')
                                <option value="ADMIN">ADMIN</option>
                                <option value="ADMIN SURAT">ADMIN SURAT</option>
                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                                <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                                <option value="USER">USER</option>
                                <option value="COUNTER">COUNTER</option>
                                <option value="COUNTER PEGAWAI" selected>COUNTER PEGAWAI</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PEMANGGILAN">PEMANGGILAN</option>
                                <option value="PEGAWAI">PEGAWAI</option>
                                @elseif($p->status=='PENDING')
                                <option value="ADMIN">ADMIN</option>
                                <option value="ADMIN SURAT">ADMIN SURAT</option>
                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                                <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                                <option value="USER">USER</option>
                                <option value="COUNTER">COUNTER</option>



                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>



                                <option value="PENDING" selected>PENDING</option>



                                <option value="PEMANGGILAN">PEMANGGILAN</option>



                                <option value="PEGAWAI">PEGAWAI</option>



                                @elseif($p->status=='PEMANGGILAN')



                                <option value="ADMIN">ADMIN</option>



                                <option value="ADMIN SURAT">ADMIN SURAT</option>



                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>



                                <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>



                                <option value="USER">USER</option>



                                <option value="COUNTER">COUNTER</option>



                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>



                                <option value="PENDING">PENDING</option>



                                <option value="PEMANGGILAN" selected>PEMANGGILAN</option>



                                <option value="PEGAWAI">PEGAWAI</option>



                                @elseif($p->status=='PEGAWAI')



                                <option value="ADMIN">ADMIN</option>



                                <option value="ADMIN SURAT">ADMIN SURAT</option>



                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>



                                <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>



                                <option value="USER">USER</option>



                                <option value="COUNTER">COUNTER</option>



                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>



                                <option value="PENDING">PENDING</option>



                                <option value="PEMANGGILAN">PEMANGGILAN</option>



                                <option value="PEGAWAI" selected>PEGAWAI</option>

                                @elseif($p->status=='ADMIN KUNJUNGAN')



                                <option value="ADMIN">ADMIN</option>



                                <option value="ADMIN SURAT">ADMIN SURAT</option>



                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>



                                <option value="ADMIN KUNJUNGAN" selected>ADMIN KUNJUNGAN</option>



                                <option value="USER">USER</option>



                                <option value="COUNTER">COUNTER</option>



                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>



                                <option value="PENDING">PENDING</option>



                                <option value="PEMANGGILAN">PEMANGGILAN</option>



                                <option value="PEGAWAI">PEGAWAI</option>





                                @endif



                            </select>



                        </div>



                        @endif



                        </br>

                        </br>

                        <label class="control-label col-md-9 col-sm-9 col-xs-12">MANAGEMENT MENU</label>



                        <div class="col-md-12 col-sm-12 col-xs-12">



                            <table id="datatable" class="table table-striped table-bordered">



                                <thead>



                                    <tr>



                                        <th>Menu</th>



                                        <th>Sub Menu</th>



                                    </tr>



                                </thead>



                                @foreach($m=DB::table('menu')->where('no_identitas',$p->nik)->get() as $menu)



                                @foreach($sm=DB::table('sub_menu')->where('no_identitas',$p->nik)->get() as $submenu)



                                <tbody>



                                    <tr>



                                        <th><label class="col-md-8 col-sm-8 col-xs-12">Home </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="home" id="home">



                                                    @if($menu->home=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                        </th>



                                        <th>



                                        </th>



                                    </tr>



                                    <tr>



                                        <th><label class="col-md-8 col-sm-8 col-xs-12">Data Induk</label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="data" id="data">



                                                    @if($menu->data=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                        </th>



                                        <th><label class="col-md-8 col-sm-8 col-xs-12">Data User </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="user" id="user">



                                                    @if($submenu->user=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Data WBP </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="wbp" id="wbp">



                                                    @if($submenu->wbp=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>



                                            </br>



                                        </th>



                                    </tr>



                                    <tr>



                                        <th><label class="col-md-8 col-sm-8 col-xs-12">Layanan Informasi </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="informasi" id="informasi">



                                                    @if($menu->informasi=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                        </th>



                                        <th><label class="col-md-8 col-sm-8 col-xs-12">Ly. Kunjungan </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="kunjungan" id="kunjungan">



                                                    @if($submenu->kunjungan=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>



                                            <label class="col-md-8 col-sm-8 col-xs-12">Ly. Integrasi </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="integrasi" id="integrasi">



                                                    @if($submenu->integrasi=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>



                                            <label class="col-md-8 col-sm-8 col-xs-12">Ly. Remisi </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="remisi" id="remisi">



                                                    @if($submenu->remisi=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Ly. Tamu Dinas </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="tamu_dinas" id="tamu_dinas">



                                                    @if($submenu->tamu_dinas=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Ly. Izin Luar Biasa </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="izin_alasan_penting" id="izin_alasan_penting">



                                                    @if($submenu->izin_alasan_penting=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Ly. Penitipan Barang </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="penitipan_barang" id="penitipan_barang">



                                                    @if($submenu->penitipan_barang=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Ly. Video Call </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="video_call" id="video_call">



                                                    @if($submenu->video_call=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Hotline</label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="hotline" id="hotline">



                                                    @if($submenu->hotline=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <!--<label class="col-md-8 col-sm-8 col-xs-12">Ly. Slip </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="layanan_slip" id="layanan_slip">



                                                    @if($submenu->layanan_slip=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Ly. Slip Download </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="layanan_download_slip" id="layanan_download_slip">



                                                    @if($submenu->layanan_download_slip=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Ly. Karis</label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="karis" id="karis">



                                                    @if($submenu->karis=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>-->

                                            <label class="col-md-8 col-sm-8 col-xs-12">Lap. Pengamanan</label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="pensiun" id="pensiun">



                                                    @if($submenu->pensiun=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Visi & Misi</label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="visi_misi" id="visi_misi">



                                                    @if($submenu->visi_misi=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Struktur Organisasi </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="struktur_organisasi" id="struktur_organisasi">



                                                    @if($submenu->struktur_organisasi=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <label class="col-md-8 col-sm-8 col-xs-12">Ly. Pengaduan </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="layanan_pengaduan" id="layanan_pengaduan">



                                                    @if($submenu->layanan_pengaduan=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>

                                            <!--<label class="col-md-8 col-sm-8 col-xs-12">Ly. Survey </label>



                                            <div class="col-md-3 col-sm-3 col-xs-12">



                                                <select name="survey" id="survey">



                                                    @if($submenu->survey=='1')



                                                    <option value="1" selected>Tampil</option>



                                                    <option value="2">Tidak</option>



                                                    @else



                                                    <option value="1">Tampil</option>



                                                    <option value="2" selected>Tidak</option>



                                                    @endif



                                                </select>



                                            </div>



                                            </br>-->



                        </div>



                        </th>



                        </tr>

                        <tr>

                            <th><label class="col-md-8 col-sm-8 col-xs-12">Layanan Kunjungan</label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="layanan_kunjungan" id="galery">



                                        @if($menu->layanan_kunjungan=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                            </th>



                            <th><label class="col-md-8 col-sm-8 col-xs-12">History Pendaftaran </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="history_pendaftaran" id="kemandirian">



                                        @if($submenu->surat=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>

                                </br>



                                <label class="col-md-8 col-sm-8 col-xs-12">Counter Kunjungan</label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="surat_ijin" id="kepribadian">



                                        @if($submenu->print_surat=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                            </th>



                        </tr>

                        <tr>



                            <th><label class="col-md-8 col-sm-8 col-xs-12">Pengaduan </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="layanan_pengaduan" id="layanan_pengaduan">



                                        @if($menu->layanan_pengaduan=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                            </th>



                            <th><label class="col-md-8 col-sm-8 col-xs-12">Form Pengaduan </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="form_pengaduan" id="form_pengaduan">



                                        @if($submenu->form_pengaduan=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>

                                </br>



                                <label class="col-md-8 col-sm-8 col-xs-12">List Pengaduan </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="list_pengaduan" id="list_pengaduan">



                                        @if($submenu->list_pengaduan=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                            </th>



                        </tr>

                        <tr>



                            <th><label class="col-md-8 col-sm-8 col-xs-12">Berita & Toko </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="pembinaan" id="pembinaan">



                                        @if($menu->pembinaan=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                            </th>



                            <th><label class="col-md-8 col-sm-8 col-xs-12">Berita </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="kemandirian" id="kemandirian">



                                        @if($submenu->kemandirian=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                                </br>



                                <label class="col-md-8 col-sm-8 col-xs-12">Toko </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="kepribadian" id="kepribadian">



                                        @if($submenu->list_pengaduan=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                            </th>



                        </tr>

                        <tr>



                            <th><label class="col-md-8 col-sm-8 col-xs-12">Layanan Pengamanan </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="pengamanan" id="pengamanan">



                                        @if($menu->pengamanan=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                            </th>



                            <th><label class="col-md-8 col-sm-8 col-xs-12">Pos Pengamanan</label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="pos_pam" id="pos_pam">



                                        @if($submenu->pos_pam=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                                </br>



                                <label class="col-md-8 col-sm-8 col-xs-12">Laporan Pengamanan</label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="lap_pam" id="lap_pam">



                                        @if($submenu->lap_pam=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>

                                </br>

                            </th>



                        </tr>

                        <tr>



                            <th><label class="col-md-8 col-sm-8 col-xs-12"> Pengaturan </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="pengaturan" id="pembinaan">



                                        @if($menu->pengaturan=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                            </th>



                            <th><label class="col-md-8 col-sm-8 col-xs-12">Slide </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="slide" id="kemandirian">



                                        @if($submenu->slide=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>



                                </div>



                                </br>



                                <label class="col-md-8 col-sm-8 col-xs-12">Backup Data </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="backup_data" id="kepribadian">



                                        @if($submenu->backup_data=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>

                                </div>

                                </br>

                                <label class="col-md-8 col-sm-8 col-xs-12">Pusat Berkas </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="master_berkas" id="kepribadian">



                                        @if($submenu->master_dokumen=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>

                                </div>

                                </br>

                                <label class="col-md-8 col-sm-8 col-xs-12">About </label>



                                <div class="col-md-3 col-sm-3 col-xs-12">



                                    <select name="about" id="about">



                                        @if($submenu->about=='1')



                                        <option value="1" selected>Tampil</option>



                                        <option value="2">Tidak</option>



                                        @else



                                        <option value="1">Tampil</option>



                                        <option value="2" selected>Tidak</option>



                                        @endif



                                    </select>





                                </div>



                            </th>



                        </tr>



                        </tbody>



                        @endforeach



                        @endforeach



                        </table>



            </div>



            </br>



            </br>



        </div>



        <div class="modal-footer">



            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>



            <button type="submit" class="btn btn-primary">Save changes</button>



        </div>



        </form>



    </div>



</div>



</div>



@endforeach



<script type="text/javascript">
    jQuery(document).ready(function()



        {



            jQuery('select[name="seksi"]').on('change', function() {



                var countryID = jQuery(this).val();



                if (countryID)



                {



                    jQuery.ajax({



                        url: 'unit_kerja/sub_seksi/' + countryID,



                        type: "GET",



                        dataType: "json",



                        success: function(data)



                        {



                            console.log(data);



                            jQuery('select[name="sub"]').empty();



                            jQuery.each(data, function(key, value) {



                                $('select[name="sub"]').append('<option value="' + key + '">' +

                                    value + '</option>');



                            });



                        }



                    });



                } else



                {



                    $('select[name="sub"]').empty();



                }



            });



        });
</script>



@endsection