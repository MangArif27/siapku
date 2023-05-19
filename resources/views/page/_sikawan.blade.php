@extends('master')
@section('konten')
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sistem Ketepatan Waktu Kunjungan</h2>
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
                <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i> Tambah</button></span>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Blok/Kamar</th>
                                <th>Kasus/Kejahatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            <?php $no++; ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button type="button" class="btn btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i>
                                    </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Import Data WBP</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('post.upload_wbp') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group col-sm-12 navbar-right">
                        <input type="file" name="file" id="file" required="required" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary "><i class="fa fa-upload"></i>
                                Tambah</button></span>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection