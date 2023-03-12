@extends('master')
@section('konten')
<div class="right_col" role="main">
    @include('page.partials._tiles')
    <!-- top tiles -->
    {{-- notifikasi form validasi --}}
    @if ($errors->has('file'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('file') }}</strong>
    </span>
    @endif

    {{-- notifikasi gagal --}}
    @if ($sukses = Session::get('Gagal'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $sukses }}</strong>
    </div>
    @endif

    {{-- notifikasi Success --}}
    @if ($sukses = Session::get('sukses'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $sukses }}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Histori Pendaftaran Kunjungan Lapas Kelas IIA Karawang</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if(Session::get('status')=="USER")
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama WBP</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Hubungan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; $tanggal=date('Y-m-d');?>
                            @foreach($kunjungan as $kunjungan)
                            @if($kunjungan->nik==Session::get('nik'))
                            @foreach($data_wbp as $wbp)
                            @if($wbp->no_induk==$kunjungan->no_induk)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $wbp->nama }}</td>
                                <td>{{ $kunjungan->tanggal_kunjungan }}</td>
                                <td>{{ $kunjungan->status_keluarga }}</td>
                                <td><button type="button" class="btn btn-xs btn-success" data-toggle="modal"
                                        data-target=".bs-example-modal-lg{{ $kunjungan->kode_booking }}"><i
                                            class="fa fa-eye"></i> {{ $kunjungan->status }}</button></td>
                                <div class="modal fade bs-example-modal-lg{{ $kunjungan->kode_booking }}" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Formulir Kunjungan :
                                                    {{ $wbp->nama }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left"
                                                    action="{{ route('post.counter.admin') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <center>
                                                        <h4>===== Data Warga Binaan Pemasyarakatan =====</h4>
                                                    </center>
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="nama" name="nama" class="form-control"
                                                            value="{{ $wbp->nama }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-12">Kejahatan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan"
                                                            class="form-control" value="{{ $wbp->kejahatan }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                                                        WBP</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="status_wbp" id="status_wbp" class="form-control"
                                                            disabled>
                                                            @if($wbp->status_wbp=='TAHANAN')
                                                            <option value="TAHANAN" selected>TAHANAN</option>
                                                            @else
                                                            <option value="NARAPIDANA" selected>NARAPIDANA</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <center>
                                                        <h4>===== Data Pengunjung =====</h4>
                                                    </center>
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="nama_pengunjung" name="nama_pengunjung"
                                                            class="form-control" value="{{ Session::get('nama') }}"
                                                            disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis
                                                        Kelamin</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="jenis_kelamin" name="jenis_kelamin"
                                                            class="form-control"
                                                            value="{{ Session::get('jenis_kelamin') }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                                                        Hubungan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="hubungan" name="hubungan"
                                                            class="form-control"
                                                            value="{{ $kunjungan->status_keluarga }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
                                                        Kunjungan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="tanggal" name="tanggal"
                                                            class="form-control"
                                                            value="{{ $kunjungan->tanggal_kunjungan }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode
                                                        Booking</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <label
                                                            class="control-label col-md-3 col-sm-3 col-xs-12">{{ $kunjungan->kode_booking }}</label>
                                                        </br>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    @elseif(Session::get('status')=="ADMIN" || Session::get('status')=="ADMIN KUNJUNGAN")
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
                            <?php $no = 0; $tanggal=date('Y-m-d');?>
                            @foreach($kunjungan as $kunjungan)
                            @foreach($user = DB::table('users')->where('nik',$kunjungan->nik)->get() as $users)
                            @foreach($data_wbp = DB::table('data_wbp')->where('no_induk',$kunjungan->no_induk)->get() as
                            $wbp)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $wbp->nama }}</td>
                                <td>{{ $kunjungan->tanggal_kunjungan }}</td>
                                <td>{{ $kunjungan->status_keluarga }}</td>
                                <td>{{ $kunjungan->keperluan }}</td>
                                <td>{{ $kunjungan->kode_booking }}</td>
                                <td><button type="button" class="btn btn-xs btn-success" data-toggle="modal"
                                        data-target=".bs-example-modal-lg{{ $kunjungan->kode_booking }}"><i
                                            class="fa fa-eye"></i> {{ $kunjungan->status }}</button></td>
                                <div class="modal fade bs-example-modal-lg{{ $kunjungan->kode_booking }}" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Formulir Kunjungan :
                                                    {{ $wbp->nama }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left"
                                                    action="{{ route('post.counter.admin') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <center>
                                                        <h4>===== Data Warga Binaan Pemasyarakatan =====</h4>
                                                    </center>
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="nama" name="nama" class="form-control"
                                                            value="{{ $wbp->nama }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-12">Kejahatan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan"
                                                            class="form-control" value="{{ $wbp->kejahatan }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                                                        WBP</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="status_wbp" id="status_wbp" class="form-control"
                                                            disabled>
                                                            @if($wbp->status_wbp=='TAHANAN')
                                                            <option value="TAHANAN" selected>TAHANAN</option>
                                                            @else
                                                            <option value="NARAPIDANA" selected>NARAPIDANA</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <center>
                                                        <h4>===== Data Pengunjung =====</h4>
                                                    </center>
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="nama_pengunjung" name="nama_pengunjung"
                                                            class="form-control" value="{{ $users->nama }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis
                                                        Kelamin</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="jenis_kelamin" name="jenis_kelamin"
                                                            class="form-control" value="{{ $users->jenis_kelamin }}"
                                                            disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No
                                                        Handphone</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="no_hp" name="no_hp" class="form-control"
                                                            value="{{ Session::get('no_hp') }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                                                        Hubungan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="hubungan" name="hubungan"
                                                            class="form-control"
                                                            value="{{ $kunjungan->status_keluarga }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis
                                                        Layanan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="hubungan" name="hubungan"
                                                            class="form-control" value="{{ $kunjungan->keperluan }}"
                                                            disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
                                                        Kunjungan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="tanggal" name="tanggal"
                                                            class="form-control"
                                                            value="{{ $kunjungan->tanggal_kunjungan }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode
                                                        Booking</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="kode" name="kode" class="form-control"
                                                            value="{{ $kunjungan->kode_booking }}" readonly>
                                                        </br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Selesai</button>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                </div>
                </tr>
                @endforeach
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Histori Pendaftaran Tamu Dinas Lapas Kelas IIA Karawang</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-fixed-header" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>Tanggal Kunjungan</th>
                            <th>Keperluan Bertamu</th>
                            <th>Kode Booking</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; $tanggal=date('Y-m-d');?>
                        @foreach($tamu as $tamu)
                        @foreach($user = DB::table('users')->where('nik',$tamu->nik)->get() as $users)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $users->nama }}</td>
                            <td>{{ $tamu->tanggal }}</td>
                            <td>{{ $tamu->keperluan }}</td>
                            <td>{{ $tamu->kode_booking }}</td>
                            <td><button type="button" class="btn btn-xs {{ $tamu->button }}" data-toggle="modal"
                                    data-target=".bs-example-modal-lg{{ $tamu->kode_booking }}"><i
                                        class="fa fa-eye"></i> {{ $tamu->status }}</button></td>
                            <div class="modal fade bs-example-modal-lg{{ $tamu->kode_booking }}" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Formulir Tamu Dinas</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal form-label-left"
                                                action="{{ route('post.tamu.dinas') }}" method="POST"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="nama_pengunjung" name="nama_pengunjung"
                                                        class="form-control" value="{{ $users->nama }}" disabled>
                                                </div>
                                                </br>
                                                </br>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis
                                                    Kelamin</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="jenis_kelamin" name="jenis_kelamin"
                                                        class="form-control" value="{{ $users->jenis_kelamin }}"
                                                        disabled>
                                                </div>
                                                </br>
                                                </br>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">No
                                                    Handphone</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="no_hp" name="no_hp" class="form-control"
                                                        value="{{ Session::get('no_hp') }}" disabled>
                                                </div>
                                                </br>
                                                </br>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Keperluan
                                                    Bertamu</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="hubungan" name="keperluan"
                                                        class="form-control" value="{{ $tamu->keperluan }}" disabled>
                                                </div>
                                                </br>
                                                </br>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
                                                    Kunjungan</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="tanggal" name="tanggal" class="form-control"
                                                        value="{{ $tamu->tanggal }}" disabled>
                                                </div>
                                                </br>
                                                </br>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                                                    Persetujuan</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select name="status" id="status" class="form-control">
                                                        @if($tamu->status=="PROSES")
                                                        <option value="PROSES" selected>PROSES</option>
                                                        <option value="DI IJINKAN">DI IJINKAN</option>
                                                        <option value="TIDAK DI IJINKAN">TIDAK DI IJINKAN</option>
                                                        @elseif($tamu->status=="DI IJINKAN")
                                                        <option value="PROSES">PROSES</option>
                                                        <option value="DI IJINKAN" selected>DI IJINKAN</option>
                                                        <option value="TIDAK DI IJINKAN">TIDAK DI IJINKAN</option>
                                                        @else
                                                        <option value="PROSES">PROSES</option>
                                                        <option value="DI IJINKAN">DI IJINKAN</option>
                                                        <option value="TIDAK DI IJINKAN" selected>TIDAK DI IJINKAN
                                                        </option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode
                                                    Booking</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="kode" name="kode" class="form-control"
                                                        value="{{ $tamu->kode_booking }}" readonly>
                                                    </br>
                                                </div>
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alasan</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" id="kode" name="alasan" class="form-control"
                                                        value="{{ $tamu->alasan }}">
                                                    </br>
                                                </div>
                                                <embed type="application/pdf"
                                                    src="{{url('/backup_restore/restore/surat/'.$tamu->surat)}}"
                                                    width="570" height="500"></embed>
                                                </br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Selesai</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection