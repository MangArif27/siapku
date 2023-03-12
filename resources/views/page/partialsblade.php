            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Galery Hasil Karya Warga Binaan Pemasyarakatan Lapas Kelas IIB Ciamis</h2>
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
                                  @foreach(DB::table('data_aplikasi')->where('nama_aplikasi', "SILACI")->get() as $data_apk)
                                <a href="https://wa.me/+62{!!$data_apk->wa_toko!!}?text=Saya%20tertarik%20dengan%20{{$galery->nama_barang}}%20Anda%20yang%20dijual%20dengan%20kode%20{{ $galery->kode }}"><i class="fa fa-link"></i></a>
                                    @endforeach
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>{{$galery->nama_barang}} / Rp. Rp. {{number_format($galery->harga,2,".",",")}} / Kode Barang : {{ $galery->kode }}</p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    </div>
                  </div>
                </div>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kegiatan Warga Binaan Pemasyarakatan Lapas Kelas IIB Ciamis</h2>
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
        <!-- /page content -->
