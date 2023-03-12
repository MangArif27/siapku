@extends('master')
@section('konten')
<div class="right_col" role="main">
    @include('page.partials._tiles')
    <!-- top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Pengguna Aplikasi </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th>Nama</th>

                                <th>Jenis Kelamin</th>

                                <th>Alamat</th>

                                <th>No Handphone</th>

                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $no = 0;

                            $jenis_kelamin    = array('LAKI-LAKI', 'PEREMPUAN');

                            ?>

                            @foreach($users as $p)

                            <?php $no++; ?>

                            <tr>

                                <td>{{ $no }}</td>

                                <td>{{ $p->nama }}</td>

                                <td>{{ $p->jenis_kelamin }}</td>

                                <td>{{ $p->alamat }}</td>

                                <td>{{ $p->no_hp }}</td>

                                <td><button type="button" class="btn btn-xs {{ $p->level }}" data-toggle="modal" data-target=".bs-example-modal-lg{{ $p->nik }}"><i class="fa fa-edit"></i>
                                        {{ $p->status }}</button>
                                    <a href="/delete/user/{{ $p->nik }}" class="btn btn-info btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                                </td>

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

@foreach($users as $p)

<div class="modal fade bs-example-modal-lg{{ $p->nik }}" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="myModalLabel">Data Pengguna : {{ $p->nama }}</h4>

            </div>

            <div class="modal-body">

                @if(Session::get('status')=="ADMIN" || Session::get('status')=="ADMIN PEGAWAI")

                <form class="form-horizontal form-label-left" action="{{ route('post.update.akun') }}" method="POST" enctype="multipart/form-data">

                    @else

                    <form class="form-horizontal form-label-left" action="{{ route('post.update.user') }}" method="POST" enctype="multipart/form-data">

                        @endif

                        {{ csrf_field() }}

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No Induk</label>

                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <input type="text" class="form-control" id="nik" name="nik" readonly value="{{ $p->nik }}">

                        </div>

                        </br>

                        </br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>

                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <input type="text" id="nama" name="nama" class="form-control" value="{{ $p->nama }}">

                        </div>

                        </br>

                        </br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>

                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">

                                <option>~ Jenis Kelamin ~</option>

                                @if($p->jenis_kelamin=='Laki-Laki')

                                <option value="Laki-Laki" selected>LAKI-LAKI</option>

                                <option value="Perempuan">PEREMPUAN</option>

                                @else($p->jenis_kelamin=='Perempuan')

                                <option value="Laki-Laki">LAKI-LAKI</option>

                                <option value="Perempuan" selected>PEREMPUAN</option>

                                @endif

                            </select>

                        </div>

                        </br>

                        </br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>

                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <textarea class="form-control" id="alamat" name="alamat">{{ $p->alamat}}</textarea>

                        </div>

                        </br>

                        </br>

                        </br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No Handphone</label>

                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <input type="number" id="no_hp" name="no_hp" class="form-control" value="{{ $p->no_hp }}">

                        </div>

                        </br>

                        </br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>

                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <input type="email" id="email" name="email" class="form-control" value="{{ $p->email }}">

                        </div>

                        </br>

                        </br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Scan Identitas</label>

                        <div class="profile_img">

                            <div id="crop-avatar">

                                <img class="img-responsive avatar-view" src="{{ url('image/Scan_ktp/'.$p->scan_ktp) }}" width="75%">

                            </div>

                        </div>

                        </br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>

                        <div class="profile_img">

                            <div id="crop-avatar">

                                <img class="img-responsive avatar-view" src="{{ url('image/Photo/'.$p->photo) }}" width="75%">

                            </div>

                        </div>

                        </br>

                        @if(Session::get('status')=="ADMIN" || Session::get('status')=="ADMIN PEGAWAI")
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status User</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="status" id="status" class="form-control">
                                <option>~ Status User ~</option>
                                @if($p->status=='ADMIN')
                                <option value="ADMIN" selected>ADMIN</option>
                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PEGAWAI">PEGAWAI</option>
                                @elseif($p->status=='ADMIN PEGAWAI')
                                <option value="ADMIN">ADMIN</option>
                                <option value="ADMIN PEGAWAI" selected>ADMIN PEGAWAI</option>
                                <option value="USER">USER</option>
                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PEGAWAI">PEGAWAI</option>
                                @elseif($p->status=='COUNTER PEGAWAI')
                                <option value="ADMIN">ADMIN</option>
                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                                <option value="USER">USER</option>
                                <option value="COUNTER PEGAWAI" selected>COUNTER PEGAWAI</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PEGAWAI">PEGAWAI</option>
                                @elseif($p->status=='PENDING')
                                <option value="ADMIN">ADMIN</option>
                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                                <option value="USER">USER</option>
                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                                <option value="PENDING" selected>PENDING</option>
                                <option value="PEGAWAI">PEGAWAI</option>
                                @elseif($p->status=='PEGAWAI')
                                <option value="ADMIN">ADMIN</option>
                                <option value="ADMIN PEGAWAI">ADMIN PEGAWAI</option>
                                <option value="USER">USER</option>
                                <option value="COUNTER PEGAWAI">COUNTER PEGAWAI</option>
                                <option value="PENDING" selected>PENDING</option>
                                <option value="PEGAWAI" selected>PEGAWAI</option> @endif
                            </select>
                        </div>
                        @endif
                        </br>
                        </br>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary">Save changes</button>

            </div>

            </form>

        </div>

    </div>

</div>

@endforeach

<script type="text/javascript">
    jQuery(document).ready(function()

        {

            jQuery('select[name="seksi"]').on('change', function() {

                var countryID = jQuery(this).val();

                if (countryID)

                {

                    jQuery.ajax({

                        url: 'unit_kerja/sub_seksi/' + countryID,

                        type: "GET",

                        dataType: "json",

                        success: function(data)

                        {

                            console.log(data);

                            jQuery('select[name="sub"]').empty();

                            jQuery.each(data, function(key, value) {

                                $('select[name="sub"]').append('<option value="' + key + '">' +
                                    value + '</option>');

                            });

                        }

                    });

                } else

                {

                    $('select[name="sub"]').empty();

                }

            });

        });
</script>

@endsection