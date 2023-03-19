@extends('master')
@section('konten')
@if(Session::get('status')=="ADMIN")
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <center>
                        <h2> Berita Lapas Kelas IIA Karawang</h2>
                    </center>

                    <div class="clearfix"></div>
                    <button type="button" data-toggle="modal" data-target=".bs-example-modal-lg-ss"
                        class="btn btn-primary "><i class="fa fa-upload"></i> Tambah</button></span>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Nama Kegiatan</th>
                                <th>Deskripsi Singkat</th>
                                <th>Link Berita</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $no = 0;?>
                        @foreach($kepribadian as $kepribadian)
                        <?php $no++ ;?>
                        <tbody>
                            <tr>
                                <th>{{ $no }}</th>
                                <th><img src="{{ url('image/Galery/'.$kepribadian->image) }}" width="100%"> </th>
                                <th>{{$kepribadian->nama_kegiatan}}</th>
                                <th>{{$kepribadian->deskripsi}}</th>
                                <th>{{$kepribadian->link}}</th>
                                <th><a href="delete/Pembinaan-Kepribadian/{{ $kepribadian->image }}"
                                        class="btn btn-info btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                                </th>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="col-sm-12">
            <div class="modal fade bs-example-modal-lg-ss" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Input Kegiatan WBP Lapas Kelas IIA Karawang</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal form-label-left" action="{{route('post.kepribadian')}}"
                                method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kegiatan</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="form-control">
                                </div>
                                </br>
                                </br>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Deksripsi Singkat</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="deskripsi"
                                        placeholder="Masukan Deksripsi Singkat Berita"></textarea>
                                </div>
                                </br>
                                </br>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Link Berita</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="harga_barang" name="link" class="form-control">
                                </div>
                                </br>
                                </br>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" id="file_barang" name="image" class="form-control">
                                </div>
                                </br>
                                </br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                            class="fa fa-remove"></i> Close</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                        Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endsection