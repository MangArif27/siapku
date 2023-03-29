@extends('master')

@section('konten')

<div class="right_col" role="main">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

                <div class="x_title">

                    <center>

                        <h2> Laporan Pengamanan Rutan Kelas I Depok</h2>

                    </center>



                    <div class="clearfix"></div>

                    <a href="Download-Laporan-Pos-Pengamanan"><button type="button" class="btn btn-primary "><i class="fa fa-file-excel-o"></i> Export
                            Excel</button></a>

                </div>

                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Waktu</th>

                                <th>Nama Petugas</th>

                                <th>Pos Chekin</th>

                                <th>Jenis Laporan</th>

                                <th>Isi Laporan</th>

                            </tr>

                        </thead>



                        <tbody>

                            <?php $no = 0; ?>

                            @foreach($lappam as $pam)

                            <?php $no++; ?>

                            <tr>

                                <th>{{ $no }}</th>

                                <th>{{$pam->created_at}}</th>

                                @foreach(DB::table('users')->where('nik',$pam->nik)->get() as $user)

                                <th>{{$user->nama}}</th>

                                @endforeach

                                <th>{{$pam->pos_pengamanan}}</th>

                                <th>{{$pam->jenis_laporan}}</th>

                                <th>{{$pam->isi_laporan}}</th>

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