<div class="row tile_count">

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

    <span class="count_top green"><i class="fa fa-user"></i> Total Pengguna</span>

    <?php $user = DB::table('users')->count(); ?>

    <div class="count">{{$user}}</div>

    <span class="count_bottom"><i class="green">==============</i></span>

  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

    <span class="count_top green"><i class="fa fa-user"></i> Total Pegawai</span>

    <?php $user_l = DB::table('users')->where('status', 'PEGAWAI')->count(); ?>

    <div class="count">{{$user_l}}</div>

    <span class="count_bottom"><i class="green">==============</i></span>

  </div>

  <div class="col-md-2 col-sm-2 col-xs-4 tile_stats_count">

    <span class="count_top green"><i class="fa fa-user"></i> Total Masyarakat</span>

    <?php $user_p = DB::table('users')->where('status', 'user')->count(); ?>

    <div class="count">{{$user_p}}</div>

    <span class="count_bottom"><i class="green">==============</i></span>

  </div>

  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">

    <span class="count_top green"><i class="fa fa-user"></i> Total WBP</span>

    @foreach( DB::table('data_aplikasi')->get() as $wbp)

    <div class="count">{{$wbp->jumlah_wbp}}</div>
    @endforeach

    <span class="count_bottom"><i class="green">==============</i></span>

  </div>

  <div class="col-md-4 col-sm-12 col-xs-12 tile_stats_count">

    <span class="count_top green"><i class="fa fa-money"></i> Pagu Rutan Kelas I Depok</span>

    @foreach( DB::table('data_aplikasi')->get() as $pagu)

    <div class="count" style="font-size: 37px;">Rp. {{number_format($pagu->jumlah_pagu),0,".","."}}</div>
    @endforeach
    <span class="count_bottom"><i class="green">========================================================</i></span>

  </div>

</div>