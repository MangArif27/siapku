@extends('master')

@section('konten')

<div class="right_col" role="main">

    @include('page.partials._tiles')

    <!-- top tiles -->

    {{-- notifikasi form validasi --}}

    @if ($errors->has('file'))

    <span class="invalid-feedback" role="alert">

        <strong>{{ $errors->first('file') }}</strong>

    </span>

    @endif



    {{-- notifikasi gagal --}}

    @if ($sukses = Session::get('gagal'))

    <div class="alert alert-danger alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $sukses }}</strong>

    </div>

    @endif



    {{-- notifikasi Success --}}

    @if ($sukses = Session::get('sukses'))

    <div class="alert alert-danger alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $sukses }}</strong>

    </div>

    @endif

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

                <div class="x_title">

                    <h2>Pendaftaran Kunjungan Lapas Kelas IIA Karawang</h2>

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

                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 0; $tanggal=date('Y-m-d');?>

                            @foreach($data_wbp as $p)

                            <?php $no++ ;?>

                            <tr>

                                <td>{{ $no }}</td>

                                <td>{{ $p->nama }}</td>

                                <td>{{ $p->blok }} {{ $p->kamar }}</td>

                                <td>{{ $p->kejahatan }}</td>

                                <td><a href="/pendaftaran/{{ $p->no_induk }}" type="button"
                                        class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Pilih</a></td>

                            </tr>

                        </tbody>

                        @endforeach

                    </table>

                </div>

            </div>

        </div>

    </div>

    @endsection