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

                        <h2> Daftar Pos Chekin Pengamanan Rutan Kelas I Depok</h2>

                    </center>



                    <div class="clearfix"></div>

                    <button type="button" data-toggle="modal" data-target=".bs-example-modal-lg-ss" class="btn btn-primary "><i class="fa fa-upload"></i> Tambah</button></span>

                </div>

                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Qr Code</th>

                                <th>Nama Pos Chekin</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <?php $no = 0; ?>

                        @foreach($pospam as $pam)

                        <?php $no++; ?>

                        <tbody>

                            <tr>

                                <th>{{ $no }}</th>

                                <th><img class="float-right" style="background-color:rgb(255,255,255); padding: 3px;" src="

                                        data:image/png;base64,{{DNS2D::getBarcodePNG($pam->encrypt_pos, 'qrcode')}}" height="80"> </th>

                                <th>{{$pam->nama_pos}}</th>

                                <th><a href="delete/Pos-Pengamanan/{{ $pam->id }}" class="btn btn-info btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>

                                    <a style="padding: 3px;" href="

                                        data:image/png;base64,{{DNS2D::getBarcodePNG($pam->encrypt_pos, 'qrcode')}}" download class="btn btn-info btn-xs btn-warning"><i class="fa fa-download"></i>

                                        Download QrCode</a>

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

                            <h4 class="modal-title" id="myModalLabel">Pos Check Pengamanan Rutan Kelas I Depok</h4>

                        </div>

                        <div class="modal-body">

                            <form class="form-horizontal form-label-left" action="{{route('post.check.pam')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pos Check</label>

                                <div class="col-md-9 col-sm-9 col-xs-12">

                                    <input type="text" id="nama_pos" name="nama_pos" class="form-control">

                                </div>

                                </br>

                                </br>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>

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

</div>

@endif

@endsection