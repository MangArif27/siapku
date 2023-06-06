@extends('master')
@section('konten')
<div class="right_col" role="main">
    @include('page.partials._tiles')
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Pengguna</h2>
                    <div class="clearfix"></div>
                    <div class="clearfix">{{-- notifikasi form validasi --}}
                        @if ($errors->has('file'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                        @endif

                        {{-- notifikasi sukses --}}
                        @if ($sukses = Session::get('sukses'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $sukses }}</strong>
                        </div>
                        @endif
                    </div>
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
                                <td><button type="button" class="btn btn-xs {{ $p->level }}" data-toggle="modal" data-target=".bs-example-modal-lg{{ $p->id }}"><i class="fa fa-edit"></i> {{ $p->status }}</button></td>
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
<div class="modal fade bs-example-modal-lg{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Data Pengguna : {{ $p->nama }}</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left" id="DataAkun{{ $p->id }}" action="{{ route('post.update.akun') }}" method="POST" enctype="multipart/form-data">
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
                            @if($p->jenis_kelamin=='LAKI-LAKI')
                            <option value="LAKI-LAKI" selected>LAKI-LAKI</option>
                            <option value="PEREMPNUAN">PEREMPUAN</option>
                            @else($p->jenis_kelamin=='PEREMPUAN')
                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                            <option value="PEREMPNUAN" selected>PEREMPUAN</option>
                            @endif
                        </select>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea class="form-control" id="alamat" name="alamat">{{ $p->alamat}}</textarea>
                    </div>
                    </br>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No Handphone</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" id="no_hp" name="no_hp" class="form-control" value="{{ $p->no_hp }}">
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="email" id="email" name="email" class="form-control" value="{{ $p->email }}">
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Scan Identitas</label>
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <img class="img-responsive avatar-view" src="{{ url('image/Scan_Ktp/'.$p->scan_ktp) }}" width="75%">
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status User</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="status" id="status" class="form-control">
                            <option>~ Status User ~</option>
                            @if($p->status=='ADMIN')
                            <option value="ADMIN" selected>ADMIN</option>
                            <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                            <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                            <option value="USER">USER</option>
                            <option value="COUNTER">COUNTER</option>
                            <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                            <option value="PENDING">PENDING</option>
                            <option value="PEGAWAI">PEGAWAI</option>
                            @elseif($p->status=='ADMIN PEGAWAI')
                            <option value="ADMIN">ADMIN</option>
                            <option value="ADMIN PEGAWAI" selected>ADMIN PEGAWAI</option>
                            <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                            <option value="USER">USER</option>
                            <option value="COUNTER">COUNTER</option>
                            <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                            <option value="PENDING">PENDING</option>
                            <option value="PEGAWAI">PEGAWAI</option>
                            @elseif($p->status=='USER')
                            <option value="ADMIN">ADMIN</option>
                            <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                            <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                            <option value="USER" selected>USER</option>
                            <option value="COUNTER">COUNTER</option>
                            <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                            <option value="PENDING">PENDING</option>
                            <option value="PEGAWAI">PEGAWAI</option>
                            @elseif($p->status=='COUNTER')
                            <option value="ADMIN">ADMIN</option>
                            <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                            <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                            <option value="USER">USER</option>
                            <option value="COUNTER" selected>COUNTER</option>
                            <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                            <option value="PENDING">PENDING</option>
                            <option value="PEGAWAI">PEGAWAI</option>
                            @elseif($p->status=='COUNTER PEGAWAI')
                            <option value="ADMIN">ADMIN</option>
                            <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                            <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                            <option value="USER">USER</option>
                            <option value="COUNTER">COUNTER</option>
                            <option value="COUNTER PEGAWAI" selected>COUNTER PEGAWAI</option>
                            <option value="PENDING">PENDING</option>
                            <option value="PEGAWAI">PEGAWAI</option>
                            @elseif($p->status=='PENDING')
                            <option value="ADMIN">ADMIN</option>
                            <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                            <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                            <option value="USER">USER</option>
                            <option value="COUNTER">COUNTER</option>
                            <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                            <option value="PENDING" selected>PENDING</option>
                            <option value="PEGAWAI">PEGAWAI</option>
                            @elseif($p->status=='PEGAWAI')
                            <option value="ADMIN">ADMIN</option>
                            <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                            <option value="ADMIN KUNJUNGAN">ADMIN KUNJUNGAN</option>
                            <option value="USER">USER</option>
                            <option value="COUNTER">COUNTER</option>
                            <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                            <option value="PENDING">PENDING</option>
                            <option value="PEGAWAI" selected>PEGAWAI</option>
                            @endif
                        </select>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ruangan Pegawai</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="ruangan" id="status" class="form-control" required>
                            <option>~ Ruangan Pegawai ~</option>
                            @foreach(DB::table('daftar_ruangan')->get() as $Ruangan)
                            @foreach(DB::table('pegawai_ruangan')->where('nik', $p->nik)->get() as $PRuangan)
                            @if($Ruangan->kode_ruangan==$PRuangan->id_ruangan)
                            <option value="{{$Ruangan->kode_ruangan}}" selected>{{$Ruangan->nama_ruangan}}</option>
                            @else
                            <option value="{{$Ruangan->kode_ruangan}}">{{$Ruangan->nama_ruangan}}</option>
                            @endif
                            @endforeach
                            @endforeach
                        </select>
                    </div>
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Home </label>
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
                                </tr>
                                <tr>
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Data </label>
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Data User </label>
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Data WBP </label>
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
                                        <label class="col-md-6 col-sm-6 col-xs-12">Keluarga Inti</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="keluarga" id="keluarga">
                                                @if($submenu->keluarga=='1')
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Informasi </label>
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Ly. Penitipan Barang </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="penitipan_barang" id="kunjungan">
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
                                        </br>
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Ly. Kunjungan </label>
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Ly. Video Call </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="video_call" id="kunjungan">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Ly. Tamu Dinas </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="tamu_dinas" id="kunjungan">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Ly. Integrasi </label>
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Ly. Remisi </label>
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Ly. Izin Alasan Penting </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="iap" id="about">
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
                                        </br>
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Ly. Slip Gaji </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="layanan_slip" id="about">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Ly. Download Slip </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="layanan_download_slip" id="about">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Ly. Kartu Istri/Suami </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="karis" id="about">
                                                @if($submenu->karis=='1')
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
                                        <label class="col-md-6 col-sm-6 col-xs-12">Visi & Misi </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="visi_misi" id="about">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Struktur Organisasi </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="struktur_organisasi" id="about">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Hotline </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="hotline" id="about">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Layanan Pengaduan </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="layanan_pengaduan" id="about">
                                                @if($submenu->layanan_pengaduan=='1')
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Kunjungan </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="layanan_kunjungan" id="layanan_kunjungan">
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Tatap Muka </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="surat_ijin" id="surat_ijin">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Penitipan Barang </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="surat_1" id="surat_1">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Video Call </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="surat_2" id="surat_2">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Tamu Dinas </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="surat_3" id="surat_3">
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
                                        </br>
                                        <!--<label class="col-md-6 col-sm-6 col-xs-12">Print Surat </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="print_surat" id="print_surat">
                                                @if($submenu->print_surat=='1')
                                                <option value="1" selected>Tampil</option>
                                                <option value="2">Tidak</option>
                                                @else
                                                <option value="1">Tampil</option>
                                                <option value="2" selected>Tidak</option>
                                                @endif
                                            </select>
                                        </div>-->
                                        <label class="col-md-6 col-sm-6 col-xs-12">Sikawan </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="sikawan" id="sikawan">
                                                @if($submenu->sikawan=='1')
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Pengaduan </label>
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Form Pengaduan </label>
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">List Pengaduan </label>
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Gaji & Tunkir </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="gaji_tunkin" id="gaji_tunkin">
                                                @if($menu->gaji_tunkin=='1')
                                                <option value="1" selected>Tampil</option>
                                                <option value="2">Tidak</option>
                                                @else
                                                <option value="1">Tampil</option>
                                                <option value="2" selected>Tidak</option>
                                                @endif
                                            </select>
                                        </div>
                                    </th>
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Riwayat Gaji</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="gaji" id="r_gaji">
                                                @if($submenu->gaji=='1')
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
                                        <label class="col-md-6 col-sm-6 col-xs-12">Riwayat Tunkin</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="tunkin" id="r_tunkin">
                                                @if($submenu->tunkin=='1')
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
                                        <label class="col-md-6 col-sm-6 col-xs-12">Print Slip</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="print_slip" id="print_slip">
                                                @if($submenu->print_slip=='1')
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Inventory </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="inventory" id="gaji_tunkin">
                                                @if($menu->inventory=='1')
                                                <option value="1" selected>Tampil</option>
                                                <option value="2">Tidak</option>
                                                @else
                                                <option value="1">Tampil</option>
                                                <option value="2" selected>Tidak</option>
                                                @endif
                                            </select>
                                        </div>
                                    </th>
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Daftar Barang</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="daftar_barang" id="r_gaji">
                                                @if($submenu->daftar_barang=='1')
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
                                        <label class="col-md-6 col-sm-6 col-xs-12">Daftar Ruangan</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="daftar_ruangan" id="r_tunkin">
                                                @if($submenu->daftar_ruangan=='1')
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
                                    <th><label class="col-md-6 col-sm-6 col-xs-12">Pengaturan </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="pengaturan" id="slide">
                                                @if($menu->pengaturan='1')
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
                                        <label class="col-md-6 col-sm-6 col-xs-12">Slide </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="slide" id="slide">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Galery </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="galery" id="slide">
                                                @if($submenu->galery=='1')
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
                                        <label class="col-md-6 col-sm-6 col-xs-12">Master Dokumen </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="master_dokumen" id="slide">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Backup & Restore </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="backup_data" id="backup_restore">
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
                                        </br>
                                        <label class="col-md-6 col-sm-6 col-xs-12">Profile Aplikasi </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <select name="about" id="slide">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="DataAkun{{ $p->id }}" class="btn btn-primary">Save</button>
            </div>

        </div>
    </div>
</div>
@endforeach
@endsection