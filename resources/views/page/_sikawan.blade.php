@extends('master')
@section('konten')
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
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
                <div class="clearfix">
                    <h2>Sistem Ketepatan Waktu Kunjungan</h2>
                </div>
                <div class="x_content">
                    <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i> Tambah</button></span>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Blok/Kamar</th>
                                <th>Waktu Kunjungan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach($sikawan as $sk)
                            <?php $no++; ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$sk->nama_wbp}}</td>
                                <td>{{$sk->kamar_wbp}}</td>
                                <td>{{$sk->waktu}} Menit</td>
                                <td><button type="button" class="btn btn-xs btn-primary"><i class="fa fa-edit"> Mulai</i>
                                    </button></td>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Input Data Kunjungan</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('input.waktu')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group col-sm-12 navbar-right">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Nama WBP </label>
                        <input type="text" name="nama_wbp" required="required" class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Nama Warga Binaan Pemasyarakatan">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Kamar WBP </label>
                        <input type="text" name="kamar_wbp" required="required" class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Kamar Warga Binaan Pemasyarakatan">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Waktu Kunjungan </label>
                        <select name="waktu" class="form-control col-md-8 col-sm-8 col-xs-12" required>
                            <option disabled selected> ~ Waktu ~</option>
                            <option value="15">15 Menit</option>
                            <option value="30">30 Menit</option>
                            <option value="45">45 Menit</option>
                            <option value="60">60 Menit</option>
                        </select>
                        </br>
                        </br>
                        </br>
                    </div>
            </div>
            <div class="modal-footer"><button type="submit" class="btn btn-primary "><i class="fa fa-upload"></i>
                    Tambah</button></div>
            </form>
        </div>
    </div>
</div>
@endsection