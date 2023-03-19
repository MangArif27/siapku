@extends('master')
@section('konten')
@if(Session::get('status')=="ADMIN")
  <div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tentang Aplikasi</h2>
          <ul class="nav navbar-right panel_toolbox">
			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
		    </ul>
          <div class="clearfix"></div>
        </div>
          <div class="x_content">
            <form action="{{ route('post.about') }}" method="POST" class="form-horizontal form-label-left">
              {{ csrf_field() }}
              @foreach($aplikasi as $apk)
                <div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Aplikasi <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" name="nama_aplikasi" value="{{ $apk->nama_aplikasi }}" required="required" class="form-control" readonly>
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Unit Pelaksana Teknis <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" name="nama_upt" value="{{ $apk->nama_upt }}" required="required" class="form-control ">
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Alamat Unit Pelaksana Teknis <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" name="alamat_upt" required="required" class="form-control " value="{{ $apk->alamat_upt }}">
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Administrator <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 ">
						<input type="text" id="first-name" name="nama_admin" required="required" class="form-control " value="{{ $apk->nama_admin }}">
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No Whatsapp Admin <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 ">
						<input type="number" id="first-name" name="wa_admin" required="required" class="form-control " value="{{ $apk->wa_admin }}">
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email Administrator <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 ">
						<input type="email" id="first-name" name="email_admin" required="required" class="form-control " value="{{ $apk->email_admin }}">
					</div>
				</div>
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">No Whatsapp Toko <span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 ">
						<input type="number" id="first-name" name="wa_toko" required="required" class="form-control " value="{{ $apk->wa_toko }}">
					</div>
				</div>
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pesan Dashboard <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 ">
            <select name="pesan" id="pesan" class="form-control">
              <option>~ Pesan Dasboard ~</option>
                @if($apk->pesan=='1')
                  <option value="1" selected>Aktif</option>
                  <option value="2">Tidak Aktif</option>
                @else($apk->pesan=='2')
                  <option value="1">Aktif</option>
                  <option value="2" selected>Tidak Aktif</option>
                @endif
            </select>
          </div>
        </div>
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Isi Pesan Dasboard <span class="required">*</span></label>
          <div class="col-md-9 col-sm-12 ">
              <textarea class="form-control" name="isi_pesan" rows="10" cols="50">{{ $apk->isi_pesan }}</textarea>
          </div>
        </div>
        <div class="item form-group">
          <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tentang Aplikasi <span class="required">*</span></label>
          <div class="col-md-9 col-sm-12 ">
            @foreach($informasi as $info)
              @if($info->informasi=='Tentang Aplikasi')
              <textarea id="konten1" class="form-control" name="konten" rows="10" cols="50">{{ $info->isi_informasi }}</textarea>
              @endif
              @endforeach
          </div>
        </div>
			@endforeach
                <button type="submit" value="Submit" class="btn btn-success">Simpan</button>
            </form>
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
            <center><h2>Tentang Aplikasi</h2></center>
            <div class="clearfix"></div>
          </div>
          @foreach($informasi as $info)
            @if($info->informasi=='Tentang Aplikasi')
            {!! $info->isi_informasi !!}
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endif
@endsection
