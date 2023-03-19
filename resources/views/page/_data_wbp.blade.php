@extends('master')
@section('konten')
<div class="right_col" role="main">
    @include('page.partials._tiles')
    <!-- top tiles -->
    @if(Session::get('status')=="ADMIN")
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Warga Binaan Pemasyarakatan</h2>
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
                <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#myModal"><i
                        class="fa fa-upload"></i> Upload</button></span>
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
                            <?php $no = 0;?>
                            @foreach($data_wbp as $p)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->kamar }}</td>
                                <td>{{ $p->kejahatan }}</td>
                                <td><button type="button" class="btn btn-xs {{ $p->button }}" data-toggle="modal"
                                        data-target=".bs-example-modal-lg{{ $p->no_induk }}"><i class="fa fa-edit"></i>
                                        {{ $p->status }}</button></td>
                                <div class="modal fade bs-example-modal-lg{{ $p->no_induk }}" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Data Warga Binaan
                                                    Pemasyarakatan : {{ $p->nama }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left"
                                                    action="{{ route('post.update.wbp') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No
                                                        Induk</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" class="form-control" id="no_induk"
                                                            name="no_induk" readonly value="{{ $p->no_induk }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="nama" name="nama" class="form-control"
                                                            value="{{ $p->nama }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Blok &
                                                        Kamar </label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <input type="text" id="kamar" name="kamar" class="form-control"
                                                            value="{{ $p->kamar }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label
                                                        class="control-label col-md-3 col-sm-3 col-xs-12">Kejahatan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan"
                                                            class="form-control" value="{{ $p->kejahatan }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                                                        WBP</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="status_wbp" id="status_wbp" class="form-control">
                                                            <option>~ Status WBP ~</option>
                                                            @if($p->status_wbp=='TAHANAN')
                                                            <option value="TAHANAN" selected>TAHANAN</option>
                                                            <option value="NARAPIDANA">NARAPIDANA</option>
                                                            @else
                                                            <option value="TAHANAN">TAHANAN</option>
                                                            <option value="NARAPIDANA" selected>NARAPIDANA</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                                                        WBP</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="status" id="status" class="form-control">
                                                            <option>~ Status ~</option>
                                                            @if($p->status=='ONLINE')
                                                            <option value="ONLINE" selected>ONLINE</option>
                                                            <option value="OFFLINE">OFFLINE</option>
                                                            <option value="SIDANG">SIDANG</option>
                                                            @elseif($p->status=='OFFLINE')
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
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @elseif(Session::get('status')=="USER")
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data WBP Lapas Kelas IIB Ciamis</h2>
                    <div class="clearfix"></div>
                </div>
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
                            <?php $no = 0;?>
                            @foreach($data_wbp as $p)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->blok }} {{ $p->kamar }}</td>
                                <td>{{ $p->kejahatan }}</td>
                                <td><a href="pendaftaran/{{ $p->no_induk }}"><button
                                            class="btn btn-info btn-xs {{ $p->button }}"><i class="fa fa-edit"></i>
                                            {{ $p->status_wbp }}</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data WBP Lapas Kelas IIB Ciamis</h2>
                    <div class="clearfix"></div>
                </div>
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
                            <?php $no = 0;?>
                            @foreach($data_wbp as $p)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->blok }} {{ $p->kamar }}</td>
                                <td>{{ $p->kejahatan }}</td>
                                <td><button type="button" class="btn btn-info btn-xs {{ $p->button }}"
                                        data-toggle="modal" data-target=".bs-example-modal-lg{{ $p->no_induk }}"><i
                                            class="fa fa-edit"></i> {{ $p->status_wbp }}</button>
                                </td>
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
@endif
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
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