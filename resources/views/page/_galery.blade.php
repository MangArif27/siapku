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
                        <h2> Galery Lapas Kelas IIA Karawang</h2>
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
                                <th>Nama Kegiatan</th>
                                <th>Link Media</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $no = 0;?>
                        @foreach($media as $md)
                        <?php $no++ ;?>
                        <tbody>
                            <tr>
                                <th>{{ $no }}</th>
                                <th>{{$md->judul}}</th>
                                <th>{{$md->link}}</th>
                                <th><a href="delete/galery/{{ $md->id }}" class="btn btn-info btn-xs btn-danger"> <i
                                            class="fa fa-trash"></i> Hapus</a>
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
                            <h4 class="modal-title" id="myModalLabel">Input Galery/Media Lapas Kelas IIA Karawang</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal form-label-left" action="{{route('post.media')}}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kegiatan</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="form-control">
                                </div>
                                </br>
                                </br>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Link Berita</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="harga_barang" name="link" class="form-control">
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