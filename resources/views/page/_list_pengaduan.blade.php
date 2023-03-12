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
            <h2>History Pengaduan</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @if(Session::get('status')=="USER")
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Pengaduan</th>
                    <th>Jenis Pengaduan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 0; $tanggal=date('Y-m-d');?>
                @foreach($pengaduan as $p)
                  @if($p->nik==Session::get('nik'))
                    @foreach($users as $user)
                      @if($user->nik==$p->nik)
                      <?php $no++ ;?>
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $p->judul }}</td>
                          <td>{{ $p->jenis }}</td>
                          <td><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target=".bs-example-modal{{ $p->kode_pengaduan }}"><i class="fa fa-eye"></i> {{ $p->status_pengaduan }}</button></td>
                          <div class="modal fade bs-example-modal{{ $p->kode_pengaduan }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">===== Pengaduan Online =====</h4>
                                </div>
                              <div class="modal-body">
                                <form class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <center><h4>===== Data Pelapor =====</h4></center>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $user->nama }}" disabled>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">No Handphone</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ $user->no_hp }}" disabled>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea id="alamat" name="alamat" class="form-control" disabled>{{ $user->alamat }}</textarea>
                                  </div>
                                  </br>
                                  </br>
                                  <center><h4>===== Data Laporan Aduan =====</h4></center>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Aduan</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="judul" name="judul" class="form-control" value="{{  $p->judul  }}" disabled>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Pengaduan</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" value="{{ $p->jenis }}" disabled>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi Pengaduan</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ $p->isi_pengaduan }}</label>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Bukti Pertama</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <embed type="application/pdf" src="{{url('/image/Pengaduan/bukti_pertama/'.$p->bukti_1)}}" width="50%"></embed>
                                  </div>
                                  </br>
                                  </br>
                                  @if($p->bukti_2=="-")
                                  <p>
                                  @else
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Bukti Kedua</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <embed type="application/pdf" src="{{url('/image/Pengaduan/bukti_kedua/'.$p->bukti_2)}}" width="50%"></embed>
                                  </div>
                                  @endif
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Alasan</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ $p->alasan }}</label>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Pengaduan</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ $p->status_pengaduan }}</label>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Bukti</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ $p->status_bukti }}</label>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Alasan Bukti</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ $p->alasan_pembuktian }}</label>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">File Pembuktian</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <a href="{{ url('image/Pengaduan/File_Pembuktian'.$p->file_pembuktian) }}" download>{{ $p->file_pembuktian }}</a>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{$p->kode_pengaduan}}</label>
                                  </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                  <th>Judul Pengaduan</th>
                  <th>Jenis Pengaduan</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 0; $tanggal=date('Y-m-d');?>
              @foreach($pengaduan as $p)
                  @foreach($users as $user)
                    @if($user->nik==$p->nik)
                    <?php $no++ ;?>
                      <tr>
                        <td>{{ $no }}</td>
                          <td>{{ $p->judul }}</td>
                          <td>{{ $p->jenis }}</td>
                          <td><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target=".bs-example-modal-lg{{ $p->kode_pengaduan }}"><i class="fa fa-eye"></i> {{ $p->status_pengaduan }}</button>
                          <a href="/delete/pengaduan/{{ $p->kode_pengaduan }}" class="btn btn-info btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a></td>
                          <div class="modal fade bs-example-modal-lg{{ $p->kode_pengaduan }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">===== Pengaduan Online =====</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal form-label-left" id="updatepengaduan" action="{{ route('post.updatepengaduan') }}"  method="POST" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <center><h4>===== Data Pelapor =====</h4></center>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="nama" name="nama" class="form-control" value="{{ $user->nama }}" disabled>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">No Handphone</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ $user->no_hp }}" disabled>
                                    </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <textarea id="alamat" name="alamat" class="form-control" disabled>{{ $user->alamat }}</textarea>
                                    </div>
                                  </br>
                                  </br>
                                  <center><h4>===== Data Laporan Aduan =====</h4></center>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Aduan</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="judul" name="judul" class="form-control" value="{{  $p->judul  }}" disabled>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Pengaduan</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="jenis" name="jenis" class="form-control" value="{{ $p->jenis }}" disabled>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi Pengaduan</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">{{ $p->isi_pengaduan }}</label>
                                    </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Bukti Pertama</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <img src="{{ url('image/Pengaduan/bukti_pertama/'.$p->bukti_1) }}" width="50%">
                                  </div>
                                  </br>
                                  </br>
                                  </br>
                                  @if($p->bukti_2=="-")
                                  <p>
                                  @else
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Bukti Kedua</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <img src="{{ url('image/Pengaduan/bukti_kedua/'.$p->bukti_2) }}" width="50%">
                                  </div>
                                  @endif
                                  </br>
                                  <p>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Alasan</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea id="alasan" name="alasan" class="form-control col-md-9 col-sm-9 col-xs-12" placeholder="">{{ $p->alasan }}</textarea>
                                  </div>
                                  </br>
                                  </br>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Pengaduan</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="status_pengaduan" id="status_pengaduan" class="form-control">
                                    @if($p->status_pengaduan=='TINDAK LANJUTI')
                                    <option value="PROSES" >PROSES</option>
                                    <option value="TIDAK DITINDAK LANJUTI" >TIDAK DITINDAK LANJUTI</option>
                                    <option value="TINDAK LANJUTI" selected>TINDAK LANJUTI</option>
                                    <option value="SELESAI" >SELESAI</option>
                                    @elseif($p->status_pengaduan=='TIDAK DITINDAK LANJUTI')
                                    <option value="PROSES" >PROSES</option>
                                    <option value="TIDAK DITINDAK LANJUTI" selected>TIDAK DITINDAK LANJUTI</option>
                                    <option value="TINDAK LANJUTI" >TINDAK LANJUTI</option>
                                    <option value="SELESAI" >SELESAI</option>
                                    @elseif($p->status_pengaduan=='SELESAI')
                                    <option value="PROSES" >PROSES</option>
                                    <option value="TIDAK DITINDAK LANJUTI" >TIDAK DITINDAK LANJUTI</option>
                                    <option value="TINDAK LANJUTI" >TINDAK LANJUTI</option>
                                    <option value="SELESAI" selected>SELESAI</option>
                                    @endif
                                      <option value="PROSES" selected>PROSES</option>
                                      <option value="TIDAK DITINDAK LANJUTI" >TIDAK DITINDAK LANJUTI</option>
                                      <option value="TINDAK LANJUTI" >TINDAK LANJUTI</option>
                                      <option value="SELESAI" >SELESAI</option>
                                  </select>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Bukti</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="status_bukti" id="status_pengaduan" class="form-control">
                                    @if($p->status_pengaduan=='TIDAK TERBUKTI')
                                      <option value="TIDAK TERBUKTI" selected>TIDAK TERBUKTI</option>
                                      <option value="TERBUKTI" >TERBUKTI</option>
                                    @elseif($p->status_pengaduan=='TERBUKTI')
                                    <option value="TIDAK TERBUKTI" >TIDAK TERBUKTI</option>
                                    <option value="TERBUKTI" selected >TINDAK LANJUTI</option>
                                    @endif
                                    <option value="TIDAK TERBUKTI" >TIDAK TERBUKTI</option>
                                    <option value="TERBUKTI" >TINDAK LANJUTI</option>
                                    <option value="-" selected >-</option>
                                  </select>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">File Pembuktian</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" id="file" name="file" class="form-control">
                                    <p><a href="{{ url('image/Pengaduan/File_Pembuktian'.$p->file_pembuktian) }}" download>{{ $p->file_pembuktian }}</a>
                                  </div>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Alasan Bukti</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea id="alasan_pembuktian" name="alasan_pembuktian" class="form-control col-md-9 col-sm-9 col-xs-12" placeholder="">{{ $p->alasan_pembuktian }}</textarea>
                                  </div>
                                  </br>
                                  </br>
                                  </br>
                                  </br>
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="kode" name="kode" class="form-control" value="{{$p->kode_pengaduan}}" readonly>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </tr>
                    @endif
                  @endforeach
              @endforeach
            </tbody>
          </table>
        @endif
      </div>
    </div>
  </div>
@endsection
