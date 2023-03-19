@extends('master')
@section('konten')
@if(Session::get('status')=="ADMIN")
  <div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Layanan Remisi</h2>
          <div class="clearfix"></div>
        </div>
        <form action="{{ route('post.remisi') }}" method="POST">
        {{ csrf_field() }}
        @foreach($informasi as $info)
          @if($info->informasi=='Layanan Remisi')
          <textarea id="konten" class="form-control" name="konten" rows="10" cols="50">{{ $info->isi_informasi }}</textarea>
          @endif
          @endforeach
          <br />
          <div class="x_content">
          <button type="submit" value="Submit" class="btn btn-success">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@elseif(Session::get('status')=="USER")
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <center><h2> Layanan Remisi</h2></center>
            <div class="clearfix"></div>
          </div>
          @foreach($informasi as $info)
            @if($info->informasi=='Layanan Remisi')
            {!! $info->isi_informasi !!}
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
@else
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2> Layanan Remisi</h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="login"><button type="button" class="btn btn-round btn-success"><i class="fa fa-sign-in"></i> Login</button></a>
            </ul>
            <div class="clearfix"></div>
          </div>
          @foreach($informasi as $info)
            @if($info->informasi=='Layanan Remisi')
            {!! $info->isi_informasi !!}
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endif
@endsection
