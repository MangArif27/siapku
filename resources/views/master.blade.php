<!DOCTYPE html>

<html lang="en">

@include('partials._head')



<body class="nav-md ">

  <div class="container body">

    <div class="main_container">

      <div class="col-md-3 left_col">

        <div class="left_col scroll-view">



          @include('partials._sidebar_menu')

          <!-- /sidebar menu -->

        </div>

      </div>

      <!-- top navigation -->

      @include('partials._top_navigation')

      <div class="modal fade bs-example-modal-lg-s" tabindex="-1" role="dialog" aria-hidden="true">

                    <div class="modal-dialog">

                      <div class="modal-content">

                        <div class="modal-header">

                          <h4 class="modal-title" id="myModalLabel">Profile Pengguna : {{ Session::get('nama') }}</h4>

                        </div>

                        <div class="modal-body">

                          <form class="form-horizontal form-label-left" action="{{ route('update.akun') }}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">No Induk</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">

                              <input type="text" class="form-control" id="nik" name="nik" readonly value="{{ Session::get('nik') }}">

                            </div>

                          </br>

                          </br>

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">

                              <input type="text" id="nama" name="nama" required="required" class="form-control" value="{{ Session::get('nama') }}">

                            </div>

                          </br>

                          </br>

                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>

                          <div class="col-md-9 col-sm-9 col-xs-12">

                            <input type="text" id="jenis_kelamin" name="jenis_kelamin" required="required" class="form-control"  value="{{ Session::get('jenis_kelamin') }}">

                          </div>

                          </br>

                          </br>

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">

                              <textarea class="form-control" id="alamat" required="required" name="alamat">{{ Session::get('alamat') }}</textarea>

                            </div>

                          </br>

                          </br>

                          </br>

                            <label class="control-label col-md-3 col-sm-3 col-xs-12">No Handphone</label>

                            <div class="col-md-9 col-sm-9 col-xs-12">

                              <input type="text" id="no_hp" name="no_hp" required="required" class="form-control" value="{{ Session::get('no_hp') }}">

                            </div>

                          </br>

                          </br>

                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>

                          <div class="col-md-9 col-sm-9 col-xs-12">

                            <input type="email" id="email" name="email" class="form-control" required="required" value="{{ Session::get('email') }}">

                          </div>

                          </br>

                          </br>

                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Ganti Password </label>

                          <div class="col-md-9 col-sm-9 col-xs-12">

                            <a href="/reseter"><button type="button" class="btn btn-primary">Klik Disini</button></a>

                          </div>

                          </br>

                          </br>

                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Scan Identitas</label>

                            <div class="profile_img">

                              <div id="crop-avatar">

                                <img class="img-responsive avatar-view" src="{{ url('image/Scan_Ktp/'.Session::get('scan_ktp')) }}" width="75%">

                              </div>

                            </div>

                          </br>

                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>

                            <div class="profile_img">

                              <div id="crop-avatar">

                                <img class="img-responsive avatar-view" src="{{ url('image/Photo/'.Session::get('photo')) }}" width="75%">

                              </div>

                            </div>

                          </div>

                      <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary">Save changes</button>

                      </div>

                      </form>

                    </div>

                  </div>

                </div>

      <!-- /top navigation -->



      <!-- page content -->

      @yield('konten')

      <!-- /page content -->



      <!-- footer content -->

      @include('partials._footer')

      <!-- /footer content -->



    </div>

  </div>



@include('partials._script')



</body>

</html>
