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
                        <h2> Daftar Barang </h2>
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
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>Merk/Type</th>
                                <th>Tahun Perolehan</th>
                                <th>Kepemilikan</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?> @foreach($daftar_barang as $db) <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{$db->nama_barang}}</td>
                                <td>{{$db->kode_barang}}</td>
                                <td>{{$db->merk}}</td>
                                <td>{{$db->tahun_perolehan}}</td>
                                <td>{{$db->penguasaan}}</td>
                                <td>{{$db->jumlah}}</td>
                                <td><button type="button" data-toggle="modal" data-target=".Lihat{{$db->id}}" class="btn btn-info btn-xs btn-success"><i class="fa fa-eye"></i>
                                        Lihat</button>
                                    <button type="button" data-toggle="modal" data-target=".Edit{{$db->id}}" class="btn btn-info btn-xs btn-warning"><i class="fa fa-pencil"></i>
                                        Edit</button>
                                    <button type="button" data-toggle="modal" data-target=".Delete{{$db->id}}" class="btn btn-info btn-xs btn-danger"><i class="fa fa-trash"></i>
                                        Delete</button>
                                    <a href="Print-Code-Barang/{{$db->id}}" class="btn btn-info btn-xs btn-primary"><i class="fa fa-print"></i>
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
                            <h4 class="modal-title" id="myModalLabel">Form Input Data Barang
                            </h4>
                        </div>

                        <div class="modal-body">
                            <form class="form-horizontal form-label-left" action="{{route('post.data.barang')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang *</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="select2_single form-control" name="nama_barang" id="nama_barang" tabindex="-1" required='required'>
                                        <option value=""> Pilih Nama Barang </option>
                                        <option value="Baru">Input Baru</option>
                                        @foreach(DB::table('kategori')->get() as $kg)
                                        <option value="{{$kg->id}}">{{$kg->nama_barang}} - {{$kg->kode_barang}}</option>
                                        @endforeach
                                    </select>
                                    <div id="nama_barang1" hidden>
                                        <input type="text" name="nama_barang1" class="form-control" placeholder="Silahkan Input Nama Barang">
                                        </br>
                                    </div>
                                </div>
                                </br>
                                </br>
                                <div id="nama_barang2" hidden>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang *</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="kode" name="kode" class="form-control">
                                    </div>
                                    </br>
                                    </br>
                                </div>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Merk/Type</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="merk" name="merk" class="form-control">
                                </div>
                                </br>
                                </br>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Perolehan</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="tahun" name="tahun" class="form-control">
                                </div>
                                </br>
                                </br>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="number" id="merk" name="jumlah" class="form-control">
                                </div>
                                </br>
                                </br>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kepemilikan</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="merk" name="pengusaan" class="form-control">
                                </div>
                                </br>
                                </br>
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
    @foreach($daftar_barang as $db)
    <div class="">
        <div class="col-sm-12">
            <div class="modal fade Lihat{{$db->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Data Barang {{$db->nama_barang}} - {{$db->merk}}
                            </h4>
                        </div>
                        <div class=" modal-body">
                            <table id="datatable-keytable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Merk/Type</th>
                                        <th>Tahun Perolehan</th>
                                        <th>Kepemilikan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach(DB::table('penempatan_barang')->where('id',$db->id)->get()
                                    as $pb)
                                    <tr>
                                        <td>{{ $no++}}</td>
                                        <input type="text" value="{{$pb->id}}" hidden name="id">
                                        <input type="text" value="{{$pb->no_urut}}" hidden name="no_urut[]">
                                        <td>{{$pb->merk}}</td>
                                        <td>{{$pb->tahun_perolehan}}</td>
                                        <td> <select class="select2_single form-control" readonly id="nama_barang" tabindex="-1" required='required'>
                                                @foreach(DB::table('daftar_ruangan')->where('id',$pb->ruangan)->get() as $kg)
                                                <option value="{{$kg->id}}">{{$kg->nama_ruangan}} -
                                                    {{$kg->kode_ruangan}}
                                                </option>
                                                @endforeach
                                            </select></td>
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
    @foreach($daftar_barang as $db)
    <div class="">
        <div class="col-sm-12">
            <div class="modal fade Edit{{$db->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Data Barang {{$db->nama_barang}} - {{$db->merk}}
                            </h4>
                        </div>
                        <form class="form-horizontal form-label-left" action="{{route('update.data.barang')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class=" modal-body">
                                <table id="datatable-keytable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Merk/Type</th>
                                            <th>Tahun Perolehan</th>
                                            <th>Kepemilikan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach(DB::table('penempatan_barang')->where('id',$db->id)->get()
                                        as $pb)
                                        <tr>
                                            <td>{{ $no++}}</td>
                                            <input type="text" value="{{$pb->id}}" hidden name="id">
                                            <input type="text" value="{{$pb->no_urut}}" hidden name="no_urut[]">
                                            <td>{{$pb->merk}}</td>
                                            <td>{{$pb->tahun_perolehan}}</td>
                                            <td> <select class="select2_single form-control" name="ruangan[]" id="nama_barang" tabindex="-1" required='required'>
                                                    @foreach(DB::table('daftar_ruangan')->where('id',$pb->ruangan)->get() as $kg)
                                                    <option value="{{$kg->id}}">{{$kg->nama_ruangan}} -
                                                        {{$kg->kode_ruangan}}
                                                    </option>
                                                    @endforeach
                                                    @foreach(DB::table('daftar_ruangan')->get() as $kg)
                                                    @if($pb->ruangan==$kg->id)
                                                    <option value="{{$kg->id}}" hidden>{{$kg->nama_ruangan}} -
                                                        {{$kg->kode_ruangan}}
                                                    </option>
                                                    @else
                                                    <option value="{{$kg->id}}">{{$kg->nama_ruangan}} -
                                                        {{$kg->kode_ruangan}}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                </select></td>
                                            <td><button type="button" data-toggle="modal" data-target=".Delete{{$db->id}}" class="btn btn-info btn-xs btn-danger"><i class="fa fa-trash"></i>
                                                    Delete</button>
                                                <button type="button" data-toggle="modal" data-target=".Print{{$db->id}}" class="btn btn-info btn-xs btn-primary"><i class="fa fa-print"></i>
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
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                    Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    @endsection