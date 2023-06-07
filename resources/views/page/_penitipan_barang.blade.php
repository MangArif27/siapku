@extends('master')
@section('konten')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Histori Pendaftaran Penitipan Barang Rutan Kelas I Depok</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_title">
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
                                <th>Nama WBP</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Hubungan</th>
                                <th>Jenis Layanan</th>
                                <th>Kode Booking</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            $tanggal = date('Y-m-d'); ?>
                            @foreach($kunjungan as $kunjungan)
                            @foreach($user = DB::table('users')->where('nik',$kunjungan->nik)->get() as $users)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $kunjungan->nama_wbp }}</td>
                                <td>{{ $kunjungan->tanggal_kunjungan }}</td>
                                <td>{{ $kunjungan->status_keluarga }}</td>
                                <td>{{ $kunjungan->keperluan }}</td>
                                <td>{{ $kunjungan->kode_booking }}</td>
                                <td><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target=".bs-example-modal-lg{{ $kunjungan->kode_booking }}"><i class="fa fa-eye"></i> {{ $kunjungan->status }}</button></td>
                                <div class="modal fade bs-example-modal-lg{{ $kunjungan->kode_booking }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Formulir Kunjungan :
                                                    {{ $kunjungan->nama_wbp }}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left" action="{{ route('post.counter.admin') }}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <center>
                                                        <h4>===== Data Warga Binaan Pemasyarakatan =====</h4>
                                                    </center>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="nama" name="nama" class="form-control" value="{{ $kunjungan->nama_wbp }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <center>
                                                        <h4>===== Data Pengunjung =====</h4>
                                                    </center>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No Identitas</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="Identitas" name="Identitas" class="form-control" value="{{ $users->nik }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="nama_pengunjung" name="nama_pengunjung" class="form-control" value="{{ $users->nama }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis
                                                        Kelamin</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">

                                                        <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="{{ $users->jenis_kelamin }}" disabled>

                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No
                                                        Handphone</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ $users->no_hp }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $users->alamat }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                                                        Hubungan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="hubungan" name="hubungan" class="form-control" value="{{ $kunjungan->status_keluarga }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis
                                                        Layanan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="hubungan" name="hubungan" class="form-control" value="{{ $kunjungan->keperluan }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
                                                        Kunjungan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="tanggal" name="tanggal" class="form-control" value="{{ $kunjungan->tanggal_kunjungan }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode
                                                        Booking</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="kode" name="kode" class="form-control" value="{{ $kunjungan->kode_booking }}" readonly>
                                                        <input type="text" name="status" class="form-control" value="{{ $kunjungan->status }}" style="visibility: hidden;">
                                                    </div>
                                                    <center>
                                                        @if($kunjungan->keperluan=="Kunjungan Tatap Muka")
                                                        <h4>===== Data Pengikut =====</h4>
                                                        @elseif($kunjungan->keperluan=="Penitipan Barang")
                                                        <h4>===== Data Barang=====</h4>
                                                        @endif
                                                    </center>
                                                    <?php $nop = 1; ?>
                                                    @foreach(DB::table('pengikut')->where('kode',$kunjungan->kode_booking)->get()
                                                    as $pengikut)
                                                    @if($kunjungan->keperluan=="Kunjungan Tatap Muka")
                                                    <label class="control-label col-md-12 col-sm-12 col-xs-12">Data
                                                        Pengikut {{$nop++}}</label>
                                                    @elseif($kunjungan->keperluan=="Penitipan Barang")
                                                    <label class="control-label col-md-12 col-sm-12 col-xs-12">Data
                                                        Barang {{$nop++}}</label>
                                                    @endif
                                                    @if($kunjungan->keperluan=="Kunjungan Tatap Muka")
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No Induk
                                                        Pengikut</label>
                                                    @elseif($kunjungan->keperluan=="Penitipan Barang")
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis
                                                        Barang</label>
                                                    @endif
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="nik_pengikut" name="nik_pengikut[]" class="form-control" value="{{ $pengikut->nik_pengikut }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    @if($kunjungan->keperluan=="Kunjungan Tatap Muka")
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama
                                                    </label>
                                                    @elseif($kunjungan->keperluan=="Penitipan Barang")
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang
                                                    </label>
                                                    @endif
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="nama_pengikut[]" name="nama_pengikut[]" class="form-control" value="{{ $pengikut->nama}}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    @if($kunjungan->keperluan=="Penitipan Barang")
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto Serah Terima Petugas :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="layanan" name="layanan" value="penitipan barang" hidden>
                                                        @if($kunjungan->foto_in=="-")
                                                        <input type="file" id="serahterima1" name="serahterima1" class="form-control">
                                                        @else
                                                        <embed type="application/pdf" src="{{url('backup_restore/restore/serhterima/'.$kunjungan->foto_in)}}" width="400" height="400"></embed>
                                                        @endif
                                                        </br>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto Serah Terima WBP :</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        @if($kunjungan->foto=="-")
                                                        <input type="file" id="serahterima" name="serahterima" class="form-control">
                                                        @else
                                                        <embed type="application/pdf" src="{{url('backup_restore/restore/serhterima/'.$kunjungan->foto)}}" width="400" height="400"></embed>
                                                        @endif
                                                        </br>
                                                    </div>
                                                    @endif
                                                    </br>
                                                    </br>
                                                    @endforeach
                                                    @if($kunjungan->surat_ijin=="-")
                                                    @else
                                                    <embed type="application/pdf" src="{{url('/backup_restore/restore/surat/'.$kunjungan->surat_ijin)}}" width="570" height="500"></embed>
                                                    </br>
                                                    </br>
                                                    @endif
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        @if($kunjungan->status !="DIIJINKAN")
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        @else
                                                        <button type="submit" class="btn btn-primary">Cetak</button>
                                                        @endif
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection