<div class="row tile_count">
  <div class="col-md-2 col-sm-2 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Pegawai</span>
    <?php $user = DB::table('users')->where('status', "PEGAWAI")->count(); ?>
    <div class="count">{{$user}}</div>
    <span class="count_bottom"><i>==============</i></span>
  </div>
  <div class="col-md-2 col-sm-2 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total User Laki-Laki</span>
    <?php $user_l = DB::table('users')->where('jenis_kelamin', 'Laki-Laki')->where('status', "PEGAWAI")->count(); ?>
    <div class="count green">{{$user_l}}</div>
    <span class="count_bottom"><i class="green">==============</i></span>
  </div>
  <div class="col-md-2 col-sm-2 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total User Perempuan</span>
    <?php $user_p = DB::table('users')->where('jenis_kelamin', 'Perempuan')->count(); ?>
    <div class="count">{{$user_p}}</div>
    <span class="count_bottom"><i>==============</i></span>
  </div>
  <div class="col-md-2 col-sm-2 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total WBP</span>
    <?php $wbp = DB::table('data_wbp')->count(); ?>
    <div class="count">{{$wbp}}</div>
    <span class="count_bottom"><i class="green">==============</i></span>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-money"></i> DIPA Rutan Kelas I Depok</span>
    <div class="count" style="font-size: 40px;">Rp. 5.253.215.263
    </div>
    <span class="count_bottom"><i>====================================================</i></span>
  </div>
</div>