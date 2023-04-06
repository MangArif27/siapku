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
                    <h2>Riwayat Tunjangan Kinerja Pegawai Rutan Kelas I Depok</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Upload Tunkir</button>
                        </li>
                        <li><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lgtambah"><i class="fa fa-plus"></i> Tambah
                                Tunkir</button></li>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Upload Tunjangan Kinerja Bulanan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" action="{{ route('upload.tunkir') }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Pilih File
                                                Tunkir</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="file" id="file" name="file" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade bs-example-modal-lgtambah" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Tambah Slip Tunjangan Kinerja</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" action="{{route('post.insert.tunkir')}}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Gaji Bulan</label>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <select name="bulan" class="form-control" required>
                                                    <option disabled selected> ~ Bulan ~</option>
                                                    <option value="JANUARI">JANUARI</option>
                                                    <option value="FEBRUARI">FEBRUARI</option>
                                                    <option value="MARET">MARET</option>
                                                    <option value="APRIL">APRIL</option>
                                                    <option value="MEI">MEI</option>
                                                    <option value="JUNI">JUNI</option>
                                                    <option value="JULI">JULI</option>
                                                    <option value="AGUSTUS">AGUSTUS</option>
                                                    <option value="SEPTEMBER">SEPTEMBER</option>
                                                    <option value="OKTOBER">OKTOBER</option>
                                                    <option value="NOVEMBER">NOVEMBER</option>
                                                    <option value="DESEMBER">DESEMBER</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input type="number" id="tahun" name="tahun" class="form-control" placehorder="TAHUN PENERIMAAN">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Rekening
                                                Bank</label>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <select name="nama_rekening" class="form-control" required>
                                                    <option disabled selected> ~ Bank ~</option>
                                                    <option value="BNI">BNI</option>
                                                    <option value="BRI">BRI</option>
                                                    <option value="BTPN">BTPN</option>
                                                    <option value="MANDIRI">MANDIRI</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input type="number" id="rekening" name="rekening" class="form-control" placehorder="Nomor Rekening">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">No Induk
                                                Pegawai</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" class="form-control" id="no_induk" name="no_induk">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Kinerja
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="tunker" name="tunker" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Dharma
                                                Wanita</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_dw" name="potongan_dw" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                Koperasi</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_koperasi" name="potongan_koperasi" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Dana Sosial</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="dana_sosial" name="dana_sosial" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Sumbangan
                                                Olahraga</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="sumbangan_olahraga" name="sumbangan_olahraga" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Bank
                                                BTN</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_bank" name="potongan_bank" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                Absen</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_absen" name="potongan_absen" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                Jurnal</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_jurnal" name="potongan_jurnal" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Kode Tunkin</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" id="kode" name="kode" class="form-control">
                                            </div>
                                    </div>
                                    </br>
                                    </br>
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
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan Penerimaan</th>
                                <th>No Induk Pegawai</th>
                                <th>Tunjangan Kinerja</th>
                                <th>Potongan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            $date = date('Y'); ?>
                            @foreach($tunkir as $p)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $p->penerimaan_bulan}}-{{$p->penerimaan_tahun}}</td>
                                <td>{{ $p->nip }}</td>
                                <td>Rp. {{ number_format($p->tunker,2,".",",") }}</td>
                                <td>Rp.
                                    {{ number_format($p->potongan_dw + $p->potongan_koperasi + $p->dana_sosial + $p->potongan_absen + $p->sumbangan_olahraga + $p->potongan_bank + $p->potongan_absen + $p->potongan_jurnal,2,".",",")}}
                                </td>
                                <td><button type="button" class="btn btn-info btn-xs success" data-toggle="modal" data-target=".bs-example-modal-lg{{ $p->kode }}"><i class="fa fa-eye"></i>
                                        Lihat</button> <a href="/Cetak_Pdf_Tunkin/{{ $p->kode }}" type="button" class="btn btn-info btn-xs primary"><i class="fa fa-download"></i> Download</a>
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg-s{{ $p->kode }}"><i class="fa fa-pencil"></i>
                                        Edit</button>
                                    <a href="/delete/tunkin/{{ $p->kode }}" class="btn btn-info btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                                </td>
                                <div class="modal fade bs-example-modal-lg{{ $p->kode }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Slip Tunjangan Kinerja Bulan
                                                    {{ $p->penerimaan_bulan }}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left" action="#" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Rekening
                                                        Bank</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="nama" name="nama" class="form-control" readonly value="{{ $p->nama_rekening }} / {{ $p->rekening_tunkir }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">No Induk
                                                        Pegawai</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" class="form-control" id="no_induk" name="no_induk" readonly value="{{ $p->nip }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    @if($users=DB::table('users')->where('nik',$p->nip)->first())
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Nama</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="nama" name="nama" class="form-control" readonly value="{{ $users->nama }}">
                                                    </div>
                                                    @endif
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan
                                                        Kinerja </label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="blok" name="blok" class="form-control" readonly value="Rp. {{ number_format($p->tunker,2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Dharma
                                                        Wanita</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{ number_format($p->potongan_dw,2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                        Koperasi</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{ number_format($p->potongan_koperasi,2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Dana
                                                        Sosial</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{ number_format($p->dana_sosial,2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Sumbangan
                                                        Olahraga</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{ number_format($p->sumbangan_olahraga,2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                        Bank BTN</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{ number_format($p->potongan_bank ,2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                        Absen</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{ number_format($p->potongan_absen,2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                        Jurnal</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{ number_format($p->potongan_jurnal,2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Jumlah
                                                        Tunker Bersih</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{ number_format($p->tunker - ($p->potongan_dw + $p->potongan_koperasi + $p->dana_sosial + $p->potongan_absen + $p->sumbangan_olahraga + $p->potongan_bank + $p->potongan_absen + $p->potongan_jurnal),2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                            </div>
                                            </br>
                                            </br>
                                            </br>
                                            </br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bs-example-modal-lg-s{{ $p->kode }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Slip Tunjangan Kinerja Bulan
                                                    {{ $p->penerimaan_bulan }}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left" action="{{route('post.update.tunkir')}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Rekening
                                                        Bank</label>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <input type="text" id="nama" name="nama_rekening" class="form-control" value="{{ $p->nama_rekening }} ">
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <input type="text" id="nama" name="rekening" class="form-control" value="{{ $p->rekening_tunkir }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">No Induk
                                                        Pegawai</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" class="form-control" id="no_induk" name="no_induk" value="{{ $p->nip }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    @if($users=DB::table('users')->where('nik',$p->nip)->first())
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Nama</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="nama" name="nama" class="form-control" readonly value="{{ $users->nama }}">
                                                    </div>
                                                    @endif
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan
                                                        Kinerja </label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="tunker" name="tunker" class="form-control" value="{{ $p->tunker}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Dharma
                                                        Wanita</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_dw" name="potongan_dw" class="form-control" value="{{$p->potongan_dw}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                        Koperasi</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_koperasi" name="potongan_koperasi" class="form-control" value="{{$p->potongan_koperasi}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Dana
                                                        Sosial</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id=dana_sosial" name="dana_sosial" class="form-control" value="{{$p->dana_sosial}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Sumbangan
                                                        Olahraga</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="sumbangan_olahraga" name="sumbangan_olahraga" class="form-control" value="{{$p->sumbangan_olahraga}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                        Bank BTN</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_bank" name="potongan_bank" class="form-control" value="{{$p->potongan_bank}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                        Absen</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_absen" name="potongan_absen" class="form-control" value="{{ $p->potongan_absen}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan
                                                        Jurnal</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_jurnal" name="potongan_jurnal" class="form-control" value="{{ $p->potongan_jurnal}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Jumlah
                                                        Tunker Bersih</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{ number_format($p->tunker - ($p->potongan_dw + $p->potongan_koperasi + $p->dana_sosial + $p->potongan_absen + $p->sumbangan_olahraga + $p->potongan_bank + $p->potongan_absen + $p->potongan_jurnal),2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input type="hidden" id="kode" name="kode" class="form-control" value="{{$p->kode}}">
                                                    </div>
                                            </div>
                                            </br>
                                            </br>
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