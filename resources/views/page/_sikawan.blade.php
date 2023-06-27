@extends('master')
@section('konten')
<script src="https://code.responsivevoice.org/responsivevoice.js?key=X8IS7IC9"></script>
@foreach($sikawan as $sk)
<script type="text/javascript">
    function <?php echo "play" . "$sk->id" . "()" ?> {
        responsiveVoice.speak(
            "Kunjungan, atas nama,{{$sk->nama_wbp}}, kamar {{$sk->kamar_wbp}}, Sudah Habis, Dipersilahkan Untuk Meninggalkan Ruang Kunjungan, Terima Kasih, Atas Kunjungan Anda",
            "Indonesian Male", {
                pitch: 1,
                rate: 1,
                volume: 100
            }
        );
    }
</script>
<script>
    // Set the date we're counting down to
    var <?php echo "countDownDate" . "$sk->id" ?> = new Date("<?php echo "$sk->waktu_selesai" ?>").getTime();

    // Update the count down every 1 second
    var <?php echo "x" . "$sk->id" ?> = setInterval(function() {

        // Get today's date and time
        var <?php echo "now" . "$sk->id" ?> = new Date().getTime();

        // Find the distance between now and the count down date
        var <?php echo "distance" . "$sk->id" ?> = <?php echo "countDownDate" . "$sk->id" ?> - <?php echo "now" . "$sk->id" ?>;

        // Time calculations for days, hours, minutes and seconds
        var <?php echo "days" . "$sk->id" ?> = Math.floor(<?php echo "distance" . "$sk->id" ?> / (1000 * 60 * 60 * 24));
        var <?php echo "hours" . "$sk->id" ?> = Math.floor((<?php echo "distance" . "$sk->id" ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var <?php echo "minutes" . "$sk->id" ?> = Math.floor((<?php echo "distance" . "$sk->id" ?> % (1000 * 60 * 60)) / (1000 * 60));
        var <?php echo "seconds" . "$sk->id" ?> = Math.floor((<?php echo "distance" . "$sk->id" ?> % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo{{$sk->id}}").innerHTML = <?php echo "hours" . "$sk->id" ?> + "h " +
            <?php echo "minutes" . "$sk->id" ?> + "m " + <?php echo "seconds" . "$sk->id" ?> + "s ";

        // If the count down is over, write some text 
        if (<?php echo "distance" . "$sk->id" ?> < 0) {
            clearInterval(<?php echo "x" . "$sk->id" ?>);
            document.getElementById("demo{{$sk->id}}").style.display = "none";
            document.getElementById("Selesaitext{{$sk->id}}").innerHTML = "Selesai";
            document.getElementById("Selesai{{$sk->id}}").style.display = "block";
            document.getElementById("MyDiv{{$sk->id}}").style.display = "block";
            document.getElementById("Tambah{{$sk->id}}").style.display = "none";
        }
    }, 1000);
</script>
@endforeach
<div class="right_col" role="main">
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
        <div class="tile-stats">
            <div class="count"><img src="{{url('assets/images/Logo_Panjang.png')}}" width="70%"></div>
            <audio controls>
                <source src="{{url('assets/audio/Audio_Himbauan.mp3')}}" type="audio/mpeg">
            </audio>
            <h3>Audio Himbauan</h3>
            <p>Sistem Informasi Rutan Kelas I Cilodong Depok</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
        <div class="tile-stats">
            <div class="count"><img src="{{url('assets/images/Logo_Panjang.png')}}" width="70%"></div>
            <audio controls>
                <source src="{{url('assets/audio/Audio_10_Menit.mp3')}}" type="audio/mpeg">
            </audio>
            <h3>Himbauan 10 Menit</h3>
            <p>Sistem Informasi Rutan Kelas I Cilodong Depok</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 ">
        <div class="tile-stats">
            <div class="count"><img src="{{url('assets/images/Logo_Panjang.png')}}" width="70%"></div>
            <audio controls>
                <source src="{{url('assets/audio/Audio_Kunjungan_Selesai.mp3')}}" type="audio/mpeg">
            </audio>
            <h3>Waktu Kunjungan Selesai</h3>
            <p>Sistem Informasi Rutan Kelas I Cilodong Depok</p>
        </div>
    </div>
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
                    <h2>Sistem Ketepatan Waktu Kunjungan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i> Tambah</button></span>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Blok/Kamar</th>
                                <th>Waktu Kunjungan</th>
                                <th>Timer Kunjungan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @forelse($sikawan as $sk)
                            <?php $no++; ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$sk->nama_wbp}}</td>
                                <td>{{$sk->kamar_wbp}}</td>
                                <td>{{$sk->waktu}} Menit</td>
                                <td>
                                    <p style="display:block" id="demo{{$sk->id}}"></p>
                                    <button id="MyDiv{{$sk->id}}" onclick="<?php echo "play" . "$sk->id" . "();" ?>" style="display:none">Play</button>
                                </td>
                                <td>@if($sk->status=="Belum Dimulai")
                                    <a href="Update-Sikawan/{{$sk->id}}" id="Tambah{{$sk->id}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"> {{$sk->status}}</i></a>
                                    @else
                                    <a href="#" id="Selesai{{$sk->id}}" style="display:none;" class="btn btn-xs btn-primary"><i class="fa fa-edit">
                                            <p id="Selesaitext{{$sk->id}}"></p>
                                        </i></a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                No posts found!
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Input Data Kunjungan</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('input.waktu')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group col-sm-12 navbar-right">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Nama WBP </label>
                        <input type="text" name="nama_wbp" required="required" class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Nama Warga Binaan Pemasyarakatan">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Kamar WBP </label>
                        <input type="text" name="kamar_wbp" required="required" class="form-control col-md-8 col-sm-8 col-xs-12" placeholder="Kamar Warga Binaan Pemasyarakatan">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Waktu Kunjungan </label>
                        <select name="waktu" class="form-control col-md-8 col-sm-8 col-xs-12" required>
                            <option disabled selected> ~ Waktu ~</option>
                            <option value="15">15 Menit</option>
                            <option value="30">30 Menit</option>
                            <option value="45">45 Menit</option>
                            <option value="60">60 Menit</option>
                        </select>
                        </br>
                        </br>
                        </br>
                    </div>
            </div>
            <div class="modal-footer"><button type="submit" class="btn btn-primary "><i class="fa fa-upload"></i>
                    Tambah</button></div>
            </form>
        </div>
    </div>
</div>

@endsection