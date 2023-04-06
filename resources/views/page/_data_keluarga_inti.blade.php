@extends('master')
@section('konten')
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Keluarga Inti Warga Binaan</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Hubungan</th>
                                <th>Nama WBP</th>
                                <th>Kasus/Kejahatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach($keluarga_inti as $ki)
                            <?php $no++; ?>
                            @foreach(DB::table('data_wbp')->get() as $wbp)
                            @if($wbp->no_induk==$ki->no_induk)
                            @foreach(DB::table('users')->get() as $user)
                            @if($user->nik==$ki->nik)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $ki->status_keluarga}}</td>
                                <td>{{ $wbp->nama }}</td>
                                <td>{{ $wbp->kejahatan }}</td>
                                <td><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target=".bs-example-modal-lg{{ $ki->id }}"><i class="fa fa-edit"></i>
                                        {{ $ki->status }}</button>
                                    <div class="modal fade bs-example-modal-lg{{ $ki->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel">Data Keluarga Inti WBP atas nama: {{ $wbp->nama }}</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal form-label-left" id="DataKeluarga{{ $ki->id }}" action="{{ route('post.update.keluarga') }}" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <label class="control-label col-md-6 col-sm-6 col-xs-12" style="text-align: left;">A. Data Keluarga</label>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">B. Data WBP</label>
                                                        </br>
                                                        </br>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">NIK Keluarga</label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="text" class="form-control" id="nik" name="nik_keluarga" readonly value="{{ $user->nik }}">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">No Identitas WBP</label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="text" class="form-control" id="no_identitas" name="no_identitas" readonly value="{{ $wbp->nik_wbp }}">
                                                        </div>
                                                        </br>
                                                        </br>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Nama Keluarga</label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="text" id="nama" name="nama_keluarga" class="form-control" value="{{ $user->nama }}" readonly>
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Nama WBP</label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="text" id="kamar" name="nama_wbp" class="form-control" value="{{ $wbp->nama }}" readonly>
                                                        </div>
                                                        </br>
                                                        </br>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Hubungan</label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="text" id="kejahatan" name="khubungan" class="form-control" value="{{ $ki->status_keluarga}}" readonly>
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">NIK WBP </label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="text" id="kejahatan" name="nik_wbp" class="form-control" value="{{ $wbp->nik_wbp }}" readonly>
                                                        </div>
                                                        </br>
                                                        </br>
                                                        <label class="control-label col-md-6 col-sm-6 col-xs-12" style="text-align: left;">C. Data Pembinaan Warga Binaan Pemasyarakatan</label>
                                                        </br>
                                                        </br>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Pembinaan </label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="text" id="kejahatan" name="pembinaan" class="form-control" value="{{ $wbp->kegiatan_pembinaan}}" readonly>
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Skor Pembinaan </label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="text" id="kejahatan" name="skor_pembinaan" class="form-control" value="{{ $wbp->skor_pembinaan }}" readonly>
                                                        </div>
                                                        </br>
                                                        </br>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Tgl Ditahan </label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="date" id="kejahatan" name="tgl_ditahan" class="form-control" value="{{ $wbp->tanggal_ditahan}}" readonly>
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Pidana </label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="date" id="kejahatan" name="tgl_ekspirasi" class="form-control" value="{{ $wbp->tanggal_ekspirasi }}" readonly>
                                                        </div>
                                                        </br>
                                                        </br>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Status
                                                            WBP</label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <select name="status_wbp" id="status_wbp" class="form-control" readonly>
                                                                <option>~ Status WBP ~</option>
                                                                @if($wbp->status_wbp=='TAHANAN')
                                                                <option value="TAHANAN" selected>TAHANAN</option>
                                                                <option value="NARAPIDANA">NARAPIDANA</option>
                                                                @else
                                                                <option value="TAHANAN">TAHANAN</option>
                                                                <option value="NARAPIDANA" selected>NARAPIDANA</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Status Kunjungan</label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <select name="status" id="status" class="form-control" readonly>
                                                                <option>~ Status ~</option>
                                                                @if($wbp->status=='ONLINE')
                                                                <option value="ONLINE" selected>ONLINE</option>
                                                                <option value="OFFLINE">OFFLINE</option>
                                                                <option value="SIDANG">SIDANG</option>
                                                                @elseif($wbp->status=='OFFLINE')
                                                                <option value="ONLINE">ONLINE</option>
                                                                <option value="OFFLINE" selected>OFFLINE</option>
                                                                <option value="SIDANG">SIDANG</option>
                                                                @else
                                                                <option value="ONLINE">ONLINE</option>
                                                                <option value="OFFLINE">OFFLINE</option>
                                                                <option value="SIDANG" selected>SIDANG</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        </br>
                                                        </br>
                                                        <label class="control-label col-md-6 col-sm-6 col-xs-12" style="text-align: left;">D. Data Pengajuan Hak Keluarga Inti dan Integrasi</label>
                                                        </br>
                                                        </br>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Status Keluarga Inti</label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <select name="status_keluarga" id="status_keluarga" class="form-control">
                                                                <option>~ Status Keluarga Inti ~</option>
                                                                @if($ki->status=='Pending')
                                                                <option value="Pending" selected>Pending</option>
                                                                <option value="Disetujui">Disetujui</option>
                                                                <option value="Ditolak">Ditolak</option>
                                                                @elseif($ki->status=='Ditolak')
                                                                <option value="Pending">Pending</option>
                                                                <option value="Disetujui">Disetujui</option>
                                                                <option value="Ditolak" selected>Ditolak</option>
                                                                @else
                                                                <option value="Pending">Pending</option>
                                                                <option value="Disetujui" selected>Disetujui</option>
                                                                <option value="Ditolak">Ditolak</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @if($ki->status_integrasi != NULL)
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Pengajuan Integrasi</label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <select name="status_integrasi" id="status" class="form-control">
                                                                <option>~ Status ~</option>
                                                                @if($ki->status_integrasi=='Pending')
                                                                <option value="Pending" selected>Pending</option>
                                                                <option value="Disetujui">Disetujui</option>
                                                                <option value="Ditolak">Ditolak</option>
                                                                @elseif($ki->status_integrasi=='Ditolak')
                                                                <option value="Pending">Pending</option>
                                                                <option value="Disetujui">Disetujui</option>
                                                                <option value="Ditolak" selected>Ditolak</option>
                                                                @else
                                                                <option value="Pending">Pending</option>
                                                                <option value="Disetujui" selected>Disetujui</option>
                                                                <option value="Ditolak">Ditolak</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @else
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" style="text-align: left;">Pengajuan Integrasi</label>
                                                        <label class="control-label col-md-4 col-sm-4 col-xs-12" style="text-align: left;">Belum Terdapat Pengajuan Formulir</label>
                                                        @endif
                                                        <center><embed type="application/pdf" src="{{url('/backup_restore/restore/surat/'.$ki->scan_kk)}}" width="570" height="500"></embed></center>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    </br>
                                                    </br>
                                                    <button type="submit" form="DataKeluarga{{ $ki->id }}" class="btn btn-primary">Save changes</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->

</div>
@endsection