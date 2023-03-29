@foreach(DB::table('data_aplikasi')->where('no',
"1")->get() as $data_apk)
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Galery Hasil Karya Warga Binaan Pemasyarakatan {{$data_apk->nama_upt}}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    @foreach ($galery as $galery)
                    <div class="col-md-55 col-sm-3">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="{{ url('image/Galery/'.$galery->file) }}" alt="{{$galery->nama_barang}}" />
                                <div class="mask">
                                    <p>{{$galery->nama_barang}}</p>
                                    <div class="tools tools-bottom">
                                        <a href="{{$galery->link}}"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p>{{$galery->nama_barang}} / Rp. Rp.
                                    {{number_format($galery->harga,2,".",",")}} :
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class=" x_panel">
            <div class="x_title">
                <h2>Kegiatan Warga Binaan Pemasyarakatan {{$data_apk->nama_upt}}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    @foreach ($kepribadian as $kepribadian)
                    <div class="col-md-55 col-sm-3">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <a href="{{$kepribadian->link}}"><img style="width: 100%; display: block;" src="{{ url('image/Galery/'.$kepribadian->image) }}" alt="{{$kepribadian->nama_kegiatan}}" />
                                    <div class="mask">
                                        <p>{{$kepribadian->nama_kegiatan}}</p>
                                        <div class="tools tools-bottom">
                                            <a href="{{$kepribadian->link}}"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                            </div>
                            <div class="caption">
                                <p>{{$kepribadian->deskripsi}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- /page content -->