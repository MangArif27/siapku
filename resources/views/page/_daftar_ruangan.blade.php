@extends('master')
@section('konten')
@if(Session::get('status')=="ADMIN")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
    $(window).load(function() {
        $("#nama_barang").change(function() {
            console.log($("#nama_barang option:selected").val());
            if ($("#nama_barang option:selected").val() == 'Baru') {
                $('#nama_barang1').prop('hidden', false);
                $('#nama_barang2').prop('hidden', false);
            } else {
                $('#nama_barang1').prop('hidden', true);
                $('#nama_barang2').prop('hidden', true);
            }
        });
    });
</script>
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <center>
                        <h2> Daftar Ruangan</h2>
                    </center>
                    <div class="clearfix"></div>
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
                    <button type="button" data-toggle="modal" data-target=".bs-example-modal-lg-ss" class="btn btn-primary "><i class="fa fa-upload"></i> Tambah</button></span>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Ruangan</th>
                                <th>Kode Ruangan</th>
                                <th>Jumlah Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($daftar_ruangan as $db)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$db->nama_ruangan}}</td>
                                <td>{{$db->kode_ruangan}}</td>
                                <?php $count_bg = DB::table('penempatan_barang')->where('ruangan', $db->id)->count() ?>
                                <td>{{$count_bg}}</td>
                                <td><button type="button" data-toggle="modal" data-target=".Lihat{{$db->id}}" class="btn btn-info btn-xs btn-success"><i class="fa fa-eye"></i>
                                        Lihat</button>
                                    <button type="button" data-toggle="modal" data-target=".Edit{{$db->id}}" class="btn btn-info btn-xs btn-warning"><i class="fa fa-pencil"></i>
                                        Edit</button>
                                    <button type="button" data-toggle="modal" data-target=".Delete{{$db->id}}" class="btn btn-info btn-xs btn-danger"><i class="fa fa-trash"></i>
                                        Delete</button>
                                    <a href="Print-Code-Barang/Ruangan/{{$db->id}}" class="btn btn-info btn-xs btn-primary"><i class="fa fa-print"></i>
                                        Print</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
                            <h4 class="modal-title" id="myModalLabel">Form Input Ruangan
                            </h4>
                        </div>

                        <div class="modal-body">
                            <form class="form-horizontal form-label-left" action="{{route('post.data.ruangan')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ruangan *</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="nama_ruangan" class="form-control" placeholder="Silahkan Input Nama Ruangan" required>
                                </div>
                                </br>
                                </br>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Ruangan</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="merk" name="kode_ruangan" class="form-control" placeholder="Silahkan Input Kode Ruangan" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>
                                Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($daftar_ruangan as $db)
    <div class="">
        <div class="col-sm-12">
            <div class="modal fade Lihat{{$db->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Data Ruangan {{$db->nama_ruangan}}
                            </h4>
                        </div>
                        <div class=" modal-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Nama Barang</th>
                                        <th colspan="3" style="text-align: center;">Identitas Barang</th>
                                        <th rowspan="2">Kepemilikan</th>
                                        <th rowspan="2">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th>Merk/Type</th>
                                        <th>Kode Barang</th>
                                        <th>Tahun Prlh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach(DB::table('penempatan_barang')->where('ruangan',$db->id)->get()
                                    as $pb)
                                    <tr>
                                        <td>{{ $no++}}</td>
                                        <input type="text" value="{{$pb->id}}" hidden name="id">
                                        <input type="text" value="{{$pb->no_urut}}" hidden name="no_urut[]">
                                        <td>{{$pb->nama_barang}}</td>
                                        <td>{{$pb->merk}}</td>
                                        <td>{{$pb->kode_barang}}</td>
                                        <td>{{$pb->tahun_perolehan}}</td>
                                        <td>{{$pb->penguasaan}} - {{$pb->keterangan}}</td>
                                        <td><button type="button" data-toggle="modal" data-target=".Print{{$db->id}}" class="btn btn-info btn-xs btn-primary"><i class="fa fa-print"></i>
                                                Print</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>
                                Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    @endsection