@extends('master')
@section('konten')
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Histori Pendaftaran Tamu Dinas Rutan Kelas I Depok</h2>
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
                            <?php $no = 0;
                            $tanggal = date('Y-m-d'); ?>
                            @foreach($tamu as $tamu)
                            @foreach($user = DB::table('users')->where('nik',$tamu->nik)->get() as $users)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $users->nama }}</td>
                                <td>{{ $tamu->tanggal }}</td>
                                <td>{{ $tamu->keperluan }}</td>
                                <td>{{ $tamu->kode_booking }}</td>
                                <td><button type="button" class="btn btn-xs {{ $tamu->button }}" data-toggle="modal" data-target=".bs-example-modal-lg{{ $tamu->kode_booking }}"><i class="fa fa-eye"></i> {{ $tamu->status }}</button></td>
                                <div class="modal fade bs-example-modal-lg{{ $tamu->kode_booking }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Formulir Tamu Dinas</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left" action="" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
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
                                                        <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ Session::get('no_hp') }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Keperluan
                                                        Bertamu</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="hubungan" name="keperluan" class="form-control" value="{{ $tamu->keperluan }}" disabled>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
                                                        Kunjungan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="tanggal" name="tanggal" class="form-control" value="{{ $tamu->tanggal }}" disabled>
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
                                                        <input type="text" id="kode" name="kode" class="form-control" value="{{ $tamu->kode_booking }}" readonly>
                                                        </br>
                                                    </div>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alasan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="kode" name="alasan" maxlength="50" class="form-control" value="{{ $tamu->alasan }}">
                                                        </br>
                                                    </div>
                                                    <embed type="application/pdf" src="{{url('/backup_restore/restore/surat/'.$tamu->surat)}}" width="570" height="500"></embed>
                                                    </br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            </div>
        </div>
    </div>
    @endsection