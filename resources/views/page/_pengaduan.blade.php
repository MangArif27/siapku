@extends('master')
@section('konten')
<div class="right_col" role="main">
    @include('page.partials._tiles')
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Formulir Pengaduan Lapas Kelas IIA Karawang</h2>
                    <div class="clearfix"></div>
                </div>
                <?php $no = 0;$tanggal=date('Y-m-d');?>
                <?php $no++ ;?>
                <form id="daftar" class="form-horizontal form-label-left" action="/pengaduan/update" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @foreach($users as $user)
                    @if($user->nik==Session::get('nik'))
                    <center>
                        <h4>===== Data Pengguna Pengaduan =====</h4>
                    </center>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No Identitas</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="nik" name="nik" class="form-control" value="{{ $user->nik }}" readonly>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ $user->nama }}"
                            disabled>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea id="alamat" name="alamat" class="form-control" placeholder=""
                            disabled>{{ $user->alamat }}</textarea>
                    </div>
                    </br>
                    </br>
                    </br>
                    <center>
                        <h4>===== Isi/Subjek Pengaduan =====</h4>
                    </center>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Pengaduan</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="judul" name="judul" class="form-control" required>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Pengaduan</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="jenis" class="form-control" required>
                            <option> ~ Pilih Jenis Pengaduan ~</option>
                            <option value="Pungutan Liar">Pungutan Liar</option>
                            <option value="Kualitas Layanan">Kualitas Layanan</option>
                            <option value="Integrasi PB/CB/CMB">Integrasi PB/CB/CMB</option>
                            <option value="Layanan Hak">Layanan Hak</option>
                        </select>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Isi Pengaduan</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea id="alamat" name="isi" class="form-control" placeholder=""></textarea>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bukti Pertama <span
                            class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="file" id="bukti" name="bukti_pertama" required="required"
                            class="form-control col-md-7 col-xs-12">
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bukti Kedua <span
                            class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="file" id="bukti" name="bukti_kedua" class="form-control col-md-7 col-xs-12">
                    </div>
                    </br>
                    </br>
                    @endif
                    @endforeach
                    </br>
                    </br>
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Sebelum Meneruskan, Bagaimana Penilaian
                                        Anda Terhadap Layanan Aplikasi Ini ???</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="rating-box">
                                        <center>
                                            <div class="ratings">
                                                <span class="fa fa-star-o"></span>
                                                <span class="fa fa-star-o"></span>
                                                <span class="fa fa-star-o"></span>
                                                <span class="fa fa-star-o"></span>
                                                <span class="fa fa-star-o"></span>
                                                <span class="fa fa-star-o"></span>
                                            </div>
                                            <input type="hidden" id="rating-value" name="ratings">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <center><button type="submit" data-toggle="modal" data-target=".bs-example-modal-lg"
                        class="btn btn-round btn-success"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>

    <!-- /top tiles -->

</div>
@endsection