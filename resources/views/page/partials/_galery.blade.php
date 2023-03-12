@foreach(DB::table('data_aplikasi')->where('no',
"1")->get() as $data_apk)
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Penyerapan Anggaran {{$data_apk->nama_upt}}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <canvas id="lineChart" height="130px"></canvas>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- /page content -->