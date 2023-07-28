@extends('master')
@section('konten')
<div class="right_col" role="main">
    @include('page.partials._tiles')
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    {{-- notifikasi form validasi --}}
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
                    <h2>Realisasi Pagu Rutan Kelas I Depok</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lgtambah"><i class="fa fa-plus"></i> Tambah Realisasi</button>
                        </li>
                        <div class="modal fade bs-example-modal-lgtambah" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Tambah Realisasi Pagu</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" id="Realisasi" action="{{route('post.insert.realisasi')}}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tanggal Realisasi</label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input type="date" name="tanggal" class="form-control" placehorder="Tanggal Realisasi" required>
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Realisasi Pagu</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" class="form-control" id="total_belanja" name="realisasi_pagu">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Total Belanja (%)</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" class="form-control" id="total_belanja" name="total_belanja" required>
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Target (%)
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" id="target" name="target" class="form-control" required>
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Deviasi (%)</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" id="deviasi" name="deviasi" class="form-control" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                                        <button type="submit" form="Realisasi" class="btn btn-primary"><i class="fa fa-save"></i>
                                            Simpan</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Realisasi Pagu</th>
                                <th>Total Belanja</th>
                                <th>Target</th>
                                <th>Deviasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            $date = date('Y'); ?>
                            @foreach($keuangan as $p)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $p->tanggal}}</td>
                                <td>{{ $p->pagu}}</td>
                                <td>{{ $p->realisasi_pagu}}</td>
                                <td>{{ $p->total_belanja }} %</td>
                                <td>{{ $p->target}} %</td>
                                <td>{{$p->deviasi }} %</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg-s{{ $p->id }}"><i class="fa fa-pencil"></i>
                                        Edit</button>
                                    <a href="/delete/realisasi/{{ $p->id }}" class="btn btn-info btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                                </td>
                                <div class="modal fade bs-example-modal-lg-s{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Realisasi Pagu
                                                    {{ $p->tanggal }}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left" id="RealisasiUpdate{{$p->id}}" action="{{route('post.update.realisasi')}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tanggal Realisasi</label>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <input type="date" name="tanggal" class="form-control" value="{{$p->tanggal}}">
                                                    </div>
                                                    <input type="text" name="id" hidden value="{{$p->id}}">
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Realisasi Pagu</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" class="form-control" id="total_belanja" name="realisasi_pagu" value="{{$p->realisasi_pagu}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Total Belanja (%)</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" class="form-control" id="total_belanja" name="total_belanja" value="{{$p->total_belanja}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Target (%)
                                                    </label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="target" name="target" class="form-control" value="{{$p->target}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Deviasi (%)</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="deviasi" name="deviasi" class="form-control" value="{{$p->deviasi}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                </form>
                                            </div>
                                            </br>
                                            </br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                                                <button type="submit" form="RealisasiUpdate{{$p->id}}" class="btn btn-primary"><i class="fa fa-save"></i>
                                                    Simpan</button>
                                            </div>

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
</div>
@endsection