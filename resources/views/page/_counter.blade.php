@extends('master')
@section('konten')
<div class="right_col" role="main" style="background-color:#2a3f54;">
  <!-- top tiles -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel" style="background-color:#2a3f54;">
        <div class="x_content">
          <div class="col-md-12">
            {{-- notifikasi form validasi --}}
            @if ($errors->has('file'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('file') }}</strong>
            </span>
            @endif

            {{-- notifikasi sukses --}}
            @if ($sukses = Session::get('sukses'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $sukses }}</strong>
            </div>
            @endif
            <div class="col-middle">
              <div class="text-center text-center">
                <div class="mid_center">
                  @if(Session::get('status')=="ADMIN")
                  <form class="form-horizontal form-label-left" action="{{ route('post.counter.admin') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-xs-12 form-group pull-right top_search">
                      <div class="input-group">
                        <input type="text" name="kode" id="kode" required class="form-control" placeholder="Scan Qr Code Anda .... !">
                        <span class="input-group-btn">
                          <button class="btn btn-primary" type="submit">Cari !</button>
                        </span>
                      </div>
                    </div>
                  </form>
                  @else
                  <form class="form-horizontal form-label-left" action="{{ route('counter.kunjungan') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-xs-12 form-group pull-right top_search">
                      <div class="input-group">
                        <input type="text" name="kode" id="kode" required class="form-control" placeholder="Scan Qr Code Anda .... !">
                        <span class="input-group-btn">
                          <button class="btn btn-primary" type="submit">Cari !</button>
                        </span>
                      </div>
                    </div>
                  </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <div class="tile-stats">
                  @foreach ($slide as $slide)
                  <img class="mySlides" src="{{ url('image/Slide/'.$slide->image) }}" width="100%" height="200px">
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /top tiles -->

</div>
@endsection