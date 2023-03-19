<div class="row tile_count">

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

    <span class="count_top"><i class="fa fa-user"></i> Total Pengguna</span>

    <?php $user=DB::table('users')->count(); ?>

    <div class="count">{{$user}}</div>

    <span class="count_bottom"><i class="green">==============</i></span>

  </div>

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

    <span class="count_top"><i class="fa fa-user"></i> Pengunjung Hari Ini</span>

    <?php $tanggal=date('Y-m-d');$pengunjung=DB::table('kunjungan')->where('tanggal_kunjungan',$tanggal)->count(); ?>

    <div class="count green">{{$pengunjung}}</div>

    <span class="count_bottom"><i>==============</i></span>

  </div>

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

    <span class="count_top"><i class="fa fa-user"></i> Total User Laki-Laki</span>

    <?php $user_l=DB::table('users')->where('jenis_kelamin','Laki-Laki')->count(); ?>

    <div class="count">{{$user_l}}</div>

    <span class="count_bottom"><i class="green">==============</i></span>

  </div>

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

    <span class="count_top"><i class="fa fa-user"></i> Total User Perempuan</span>

    <?php $user_p=DB::table('users')->where('jenis_kelamin','Perempuan')->count(); ?>

    <div class="count green">{{$user_p}}</div>

    <span class="count_bottom"><i>==============</i></span>

  </div>

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

    <span class="count_top"><i class="fa fa-user"></i> Total WBP</span>

    <?php $wbp=DB::table('data_wbp')->count(); ?>

    <div class="count">{{$wbp}}</div>

    <span class="count_bottom"><i class="green">==============</i></span>

  </div>

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

    <span class="count_top"><i class="fa fa-user"></i> Pengunjung Hari Esok</span>

    <?php $tanggal=date('Y-m-d',strtotime('+1 days'));$pengunjung_esok=DB::table('kunjungan')->where('tanggal_kunjungan',$tanggal)->count(); ?>

    <div class="count green">{{$pengunjung_esok}}</div>

    <span class="count_bottom"><i>==============</i></span>

  </div>

</div>

