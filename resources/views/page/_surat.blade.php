@extends('master')
@section('konten')
  <div class="right_col" role="main">
    @include('page.partials._tiles')
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
            {{-- notifikasi sukses --}}
            @if ($sukses = Session::get('gagal'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $sukses }}</strong>
            </div>
            @endif
            <h2>Riwayat Penomoran Surat Lapas Kelas IIB Ciamis</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Generate Nomor</button></li>
              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Formulir Nomor Surat</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal form-label-left" action="{{ route('post.surat') }}"  method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">No Identitas</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="nik" name="nik" class="form-control" readonly value="{{Session::get('nik')}}">
                      </div>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Surat</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="date" id="tgl_surat" name="tgl_surat" class="form-control" format="YYYY-mm-dd" required>
                      </div>
                      </br>
                      </br>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Surat</label>
                        <div class="col-md-3 col-sm-9 col-xs-12">
                          <select name="category" id="category" class="form-control">
                            <option value="">------</option>
                            @foreach($kode_surat as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-3 col-sm-9 col-xs-12">
                          <select name="subcategory" id="subcategory" class="form-control">
                            <option value="">------</option>
                          </select>
                        </div>
                        <div class="col-md-3 col-sm-9 col-xs-12">
                          <select name="bagcategory" id="bagcategory" class="form-control">
                            <option value="">------</option>
                          </select>
                        </div>
                        <script type="text/javascript">
                            jQuery(document).ready(function ()
                            {
                                    jQuery('select[name="category"]').on('change',function(){
                                       var countryID = jQuery(this).val();
                                       if(countryID)
                                       {
                                          jQuery.ajax({
                                             url : 'dropdownlist/getstates/' +countryID,
                                             type : "GET",
                                             dataType : "json",
                                             success:function(data)
                                             {
                                                console.log(data);
                                                jQuery('select[name="subcategory"]').empty();
                                                jQuery.each(data, function(key,value){
                                                   $('select[name="subcategory"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                });
                                             }
                                          });
                                       }
                                       else
                                       {
                                          $('select[name="subcategory"]').empty();
                                       }
                                    });
                            });
                        </script>
                        <script type="text/javascript">
                            jQuery(document).ready(function ()
                            {
                                    jQuery('select[name="subcategory"]').on('change',function(){
                                       var countryID = jQuery(this).val();
                                       if(countryID)
                                       {
                                          jQuery.ajax({
                                             url : 'dropdownlist/getstates/kode/' +countryID,
                                             type : "GET",
                                             dataType : "json",
                                             success:function(data)
                                             {
                                                console.log(data);
                                                jQuery('select[name="bagcategory"]').empty();
                                                jQuery.each(data, function(key,value){
                                                   $('select[name="bagcategory"]').append('<option value="'+ key +'">'+ value +'</option>');
                                                });
                                             }
                                          });
                                       }
                                       else
                                       {
                                          $('select[name="subcategory"]').empty();
                                       }
                                    });
                            });
                        </script>
                      </br>
                      </br>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="perihal" name="perihal" class="form-control">
                      </div>
                      </br>
                      </br>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Diberikan Kepada</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" id="surat_kpd" name="surat_kpd" class="form-control">
                      </div>
                      </br>
                      </br>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Surat</th>
                  <th>Surat Dari</th>
                  <th>Nomor Surat</th>
                  <th>Perihal</th>
                  <th>Diberikan Kepada</th>
                  <th>Nama Operator</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
              @if(Session::get('status')=="ADMIN" || Session::get('status')=="ADMIN SURAT")
                @foreach($surat_no = DB::table('nomor_surat')->get() as $surat)
                  
                
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $surat->tgl_surat}}</td>
                      @foreach($detail = DB::table('detail_user')->where('no_identitas',$surat->no_identitas)->get() as $seksi)
                      <td>{{ $seksi->sub_seksi}}</td>
                      @endforeach
                      <td>{{ $surat->no_surat_full}}</td>
                      <td>{{ $surat->perihal}}</td>
                      <td>{{ $surat->surat_kpd}}</td>
                          @foreach($user = DB::table('users')->where('nik',$surat->no_identitas)->get() as $users)
                      <td>{{ $users->nama}}</td>
                      @endforeach
                    </tr>
                        
                      
                    @endforeach
              @else
                @foreach($surat_no = DB::table('nomor_surat')->where('no_identitas',Session::get('nik'))->get() as $surat)
                  @foreach($detail = DB::table('detail_user')->where('no_identitas',Session::get('nik'))->get() as $seksi)
                    @foreach($user = DB::table('users')->where('nik',Session::get('nik'))->get() as $users)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $surat->tgl_surat}}</td>
                  <td>{{ $seksi->sub_seksi}}</td>
                  <td>{{ $surat->no_surat_full}}</td>
                  <td>{{ $surat->perihal}}</td>
                  <td>{{ $surat->surat_kpd}}</td>
                  <td>{{ $users->nama}}</td>
                </tr>
                    @endforeach
                  @endforeach
                @endforeach
              @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
