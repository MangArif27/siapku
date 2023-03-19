@extends('master')
@section('konten')
<div class="right_col" role="main">
    @include('page.partials._tiles')
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Formulir Kunjungan Lapas Kelas IIA Karawang</h2>
                    <div class="clearfix"></div>
                </div>
                <?php $no = 0;$tanggal=date('Y-m-d');?>
                @foreach($data_wbp as $p)
                <?php $no++ ;?>
                <form id="daftar" class="form-horizontal form-label-left" action="{{ route('post.daftar.kunjungan') }}"
                    method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <center>
                        <h4>===== Data Warga Binaan Pemasyarakatan =====</h4>
                    </center>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" id="no_induk_wbp" name="no_induk_wbp" class="form-control"
                            value="{{ $p->no_induk }}" readonly>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ $p->nama }}" disabled>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kejahatan</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="kejahatan" name="kejahatan" class="form-control"
                            value="{{ $p->kejahatan }}" disabled>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status WBP</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="status_wbp" id="status_wbp" class="form-control" disabled>
                            @if($p->status_wbp=='TAHANAN')
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
                    @foreach($users as $user)
                    @if($user->nik==Session::get('nik'))
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" id="nik_pengunjung" name="nik_pengunjung" class="form-control"
                            value="{{ $user->nik }}" readonly>
                        <input type="text" id="nama_pengunjung" name="nama_pengunjung" class="form-control"
                            value="{{ $user->nama }}" disabled>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control"
                            value="{{ $user->jenis_kelamin }}" disabled>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="date" id="tanggal" name="tanggal" class="form-control" min="{{ $tanggal }}"
                            format="YYYY-mm-dd" required>
                    </div>
                    </br>
                    </br>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Hubungan</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="hubungan" class="form-control">
                            <option value="Teman">Teman</option>
                            <option value="Ayah">Ayah</option>
                            <option value="Ibu">Ibu</option>
                            <option value="Kakak">Kakak</option>
                            <option value="Anak">Anak</option>
                            <option value="Adik">Adik</option>
                            <option value="Suami">Suami</option>
                            <option value="Istri">Istri</option>
                            <option value="Kakek">Kakek</option>
                            <option value="Nenek">Nenek</option>
                            <option value="Paman">Paman</option>
                            <option value="Bibi">Bibi</option>
                            <option value="Menantu">Menantu</option>
                            <option value="Cucu">Cucu</option>
                        </select>
                    </div>
                    </br>
                    </br>
                    @endif
                    @endforeach
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