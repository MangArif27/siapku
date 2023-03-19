@extends('master')
@section('konten')
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <center>
                        <h2> Rekap Jurnal Lapas Kelas IIA Karawang</h2>
                    </center>
                    <div class="clearfix"></div>
                    <a href="Download-Rekap-Jurnal"><button type="button" class="btn btn-primary "><i class="fa fa-file-excel-o"></i> Export
                            Excel</button></a>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal </th>
                                <th>Nama Petugas</th>
                                <th>Isi Jurnal</th>
                                <th>Judul Laporan</th>
                                <th>Jam Mulai</th>
                                <th>Jam Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach($jurnal as $jn)
                            <?php $no++; ?>
                            <tr>
                                <th>{{ $no }}</th>
                                <th>{{$jn->date}}</th>
                                @foreach(DB::table('users')->where('nik',$jn->nik)->get() as $user)
                                <th>{{$user->nama}}</th>
                                @endforeach
                                <th>{{$jn->jurnal}}</th>
                                <th>{{$jn->judul_jurnal}}</th>
                                <th>{{$jn->start_time}}</th>
                                <th>{{$jn->end_time}}</th>
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