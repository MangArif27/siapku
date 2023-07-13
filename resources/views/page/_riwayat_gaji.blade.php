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
                    <h2>Riwayat Gaji Pegawai Rutan Kelas I Depok</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Upload Gaji</button></li>
                        <li><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lgtambah"><i class="fa fa-plus"></i> Tambah Gaji</button>
                        </li>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Upload Gaji Bulanan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" action="{{ route('upload.gaji') }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Pilih File
                                                Gaji</label>
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
                                        <h4 class="modal-title" id="myModalLabel">Tambah Slip Gaji</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-label-left" action="{{route('post.insert.gaji')}}" method="POST" enctype="multipart/form-data">
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
                                                <input type="text" id="tahun" name="tahun" class="form-control" placehorder="TAHUN PENERIMAAN">
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
                                                    <option value="BJB">BJB</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <input type="text" id="rekening" name="rekening" class="form-control" placehorder="Nomor Rekening">
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
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Gaji Pokok
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="blok" name="gaji_pokok" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Suami/Istri</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_bank" name="tunjangan_pasangan" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Anak</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_koperasi" name="tunjangan_anak" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Umum</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_dw" name="tunjangan_umum" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan TA. Umum</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="arisan_dw" name="tunjangan_ta_umum" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Papua</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="simpanan_koperasi" name="tunjangan_papua" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Terpencil</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="porpasos" name="tunjangan_terpencil" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Struktur</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="porpasos" name="tunjangan_struktur" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Fungsi</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="porpasos" name="tunjangan_fungsi" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Lain</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="porpasos" name="tunjangan_lain" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Beras
                                            </label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="porpasos" name="tunjangan_beras" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan IWP</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_bank" name="iwp" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan BPJS</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_koperasi" name="bpjs" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Sewa Rumah</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="potongan_dw" name="sewa_rumah" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Tunggakan</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="arisan_dw" name="tunggakan" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Utang</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="simpanan_koperasi" name="utang" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Lain</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="porpasos" name="potongan_lain" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Taperum</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="number" id="porpasos" name="taperum" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Pph</label>
                                            <div class="col-md-5 col-sm-5 col-xs-12">
                                                <input type="text" id="porpasos" name="potongan_pph" class="form-control">
                                            </div>
                                            </br>
                                            </br>
                                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Kode Gaji</label>
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
                                <th>Bulan</th>
                                <th>No Induk Pegawai</th>
                                <th>Gaji Pokok</th>
                                <th>Potongan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            $date = date('Y'); ?>
                            @foreach($gaji as $p)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $p->penerimaan_bulan}}-{{$p->penerimaan_tahun}}</td>
                                <td>{{ $p->nip }}</td>
                                <td>Rp. {{ number_format($p->gaji_pokok,0,".",",") }}</td>
                                <td>Rp.
                                    {{number_format($p->iwp + $p->bpjs + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum),0,".","."}}
                                </td>
                                <td><button type="button" class="btn btn-info btn-xs success" data-toggle="modal" data-target=".bs-example-modal-lg{{ $p->kode }}"><i class="fa fa-eye"></i>
                                        Lihat</button> <a href="/Cetak_Pdf_Gaji/{{ $p->kode }}" type="button" class="btn btn-primary btn-xs "><i class="fa fa-download"></i> Download</a>
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg-s{{ $p->kode }}"><i class="fa fa-pencil"></i>
                                        Edit</button>
                                    <a href="/delete/gaji/{{ $p->kode }}" class="btn btn-info btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                                </td>
                                <div class="modal fade bs-example-modal-lg{{ $p->kode }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Slip Gaji Bulan
                                                    {{ $p->penerimaan_bulan }}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left" action="#" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Rekening
                                                        Bank</label>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <input type="text" id="nama" name="nama" class="form-control" readonly value="{{ $p->nama_rekening }}">
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <input type="text" id="nama" name="nama" class="form-control" readonly value="{{ $p->rekening_gaji }}">
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
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Gaji Pokok
                                                    </label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="blok" name="blok" class="form-control" readonly value="Rp. {{ number_format($p->gaji_pokok,2,".",",") }}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Suamis/Istri</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="potongan_bank" name="potongan_dw" readonly class="form-control" value="Rp. {{number_format($p->tunjangan_pasangan),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Anak</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="potongan_koperasi" name="potongan_bank" readonly class="form-control" value="Rp. {{number_format($p->tunjangan_anak),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Umum</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="potongan_dw" name="potongan_koperasi" readonly class="form-control" value="Rp. {{number_format($p->tunjangan_umum),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan TA. Umum</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="arisan_dw" name="dana_sosial" readonly class="form-control" value="Rp. {{number_format($p->tunjangan_ta_umum),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Papua</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="simpanan_koperasi" name="sumbangan_olahraga" readonly class="form-control" value="Rp. {{number_format($p->tunjangan_papua),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Terpencil</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="porpasos" name="rumah_dinas" readonly class="form-control" value="Rp. {{number_format($p->tunjangan_terpencil),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Struktur</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="porpasos" name="potongan_bank2" readonly class="form-control" value="Rp. {{number_format($p->tunjangan_struktur),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Fungsi</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="porpasos" name="pmi" readonly class="form-control" value="Rp. {{number_format($p->tunjangan_fungsi),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Lain</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="porpasos" name="harkop" readonly class="form-control" value="Rp. {{number_format($p->tunjangan_lain),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Beras
                                                        Bank</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="porpasos" name="adm_bank" readonly class="form-control" value="Rp. {{number_format($p->tunjangan_beras),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Jumlah Tunjangan</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{number_format($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +$p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan IWP</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="potongan_bank" name="potongan_dw" readonly class="form-control" value="Rp. {{number_format($p->iwp),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan BPJS</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="potongan_koperasi" name="potongan_bank" readonly class="form-control" value="Rp. {{number_format($p->bpjs),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Sewa Rumah</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="potongan_dw" name="potongan_koperasi" readonly class="form-control" value="Rp. {{number_format($p->sewa_rumah),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Tunggakan</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="arisan_dw" name="dana_sosial" readonly class="form-control" value="Rp. {{number_format($p->tunggakan),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Utang</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="simpanan_koperasi" name="sumbangan_olahraga" readonly class="form-control" value="Rp. {{number_format($p->utang),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Lain</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="porpasos" name="rumah_dinas" readonly class="form-control" value="Rp. {{number_format($p->potongan_lain),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Taperum</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="porpasos" name="potongan_bank2" readonly class="form-control" value="Rp. {{number_format($p->taperum),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Pph</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="porpasos" name="potongan_pph" readonly class="form-control" value="Rp. {{number_format($p->potongan_pph),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Jumlah Potongan</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{number_format($p->iwp + $p->bpjs + $p->potongan_pph + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Jumlah Gaji
                                                        Bersih</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{number_format($p->gaji_pokok + ($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +$p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras)-($p->iwp + $p->bpjs + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum + $p->potongan_pph)),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                </form>
                                            </div>
                                            </br>
                                            </br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bs-example-modal-lg-s{{ $p->kode }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Slip Gaji Bulan
                                                    {{ $p->penerimaan_bulan }}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left" action="{{route('post.update.gaji')}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Rekening
                                                        Bank</label>
                                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                                        <input type="text" id="nama_rekening" name="nama_rekening" class="form-control" value="{{ $p->nama_rekening }}">
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                        <input type="text" id="rekening" name="rekening" class="form-control" value="{{ $p->rekening_gaji }}">
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
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Gaji Pokok
                                                    </label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="blok" name="gaji_pokok" class="form-control" value="{{$p->gaji_pokok}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Suami/Istri</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_bank" name="tunjangan_pasangan" class="form-control" value="{{$p->tunjangan_pasangan}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Anak</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_koperasi" name="tunjangan_anak" class="form-control" value="{{$p->tunjangan_anak}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Umum</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_dw" name="tunjangan_umum" class="form-control" value="{{$p->tunjangan_umum}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan TA. Umum</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="arisan_dw" name="tunjangan_ta_umum" class="form-control" value="{{$p->tunjangan_ta_umum}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Papua</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="simpanan_koperasi" name="tunjangan_papua" class="form-control" value="{{$p->tunjangan_papua}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Terpencil</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="porpasos" name="tunjangan_terpencil" class="form-control" value="{{$p->tunjangan_terpencil}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Struktur</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="porpasos" name="tunjangan_struktur" class="form-control" value="{{$p->tunjangan_struktur}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Fungsi</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="porpasos" name="tunjangan_fungsi" class="form-control" value="{{$p->tunjangan_fungsi}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Lain</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="porpasos" name="tunjangan_lain" class="form-control" value="{{$p->tunjangan_lain}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Tunjangan Beras
                                                    </label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="porpasos" name="tunjangan_beras" class="form-control" value="{{$p->tunjangan_beras}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Jumlah Tunjangan</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" class="form-control" readonly value="Rp. {{number_format($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +$p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan IWP</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_bank" name="iwp" class="form-control" value="{{$p->iwp}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan BPJS</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_koperasi" name="bpjs" class="form-control" value="{{$p->bpjs}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Sewa Rumah</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="potongan_dw" name="sewa_rumah" class="form-control" value="{{$p->sewa_rumah}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Tunggakan</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="arisan_dw" name="tunggakan" class="form-control" value="{{$p->tunggakan}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Utang</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="simpanan_koperasi" name="utang" class="form-control" value="{{$p->utang}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Lain</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="porpasos" name="potongan_lain" class="form-control" value="{{$p->potongan_lain}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Taperum</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="number" id="porpasos" name="taperum" class="form-control" value="{{$p->taperum}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Potongan Pph</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="porpasos" name="potongan_pph" class="form-control" value="{{$p->potongan_pph}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Jumlah Potongan</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" class="form-control" readonly value="Rp. {{number_format($p->iwp + $p->potongan_pph + $p->bpjs + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <label class="control-label col-md-4 col-sm-4 col-xs-12">Jumlah Gaji
                                                        Bersih</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input type="text" id="kejahatan" name="kejahatan" class="form-control" readonly value="Rp. {{number_format($p->gaji_pokok-($p->iwp + $p->bpjs + $p->sewa_rumah + $p->tunggakan + $p->utang + $p->potongan_lain + $p->taperum + $p->potongan_pph) + ($p->tunjangan_pasangan + $p->tunjangan_anak + $p->tunjangan_umum + $p->tunjangan_ta_umum + $p->tunjangan_papua +$p->tunjangan_terpencil + $p->tunjangan_struktur + $p->tunjangan_lain + $p->tunjangan_beras)),0,".","."}}">
                                                    </div>
                                                    </br>
                                                    </br>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
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