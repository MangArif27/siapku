@extends('master')
@section('konten')
<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <center><h2> Slide Pengumuman</h2></center>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>File</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php $no = 0;?>
            @foreach($slide as $slide)
            <?php $no++ ;?>
            <tbody>
              <tr>
                <td>{{ $no }}</td>
                <td><img src="{{ url('image/Slide/'.$slide->image) }}" width="50%"> </td>
                <td><a href="/delete/slide/{{ $slide->image }}" class="btn btn-info btn-xs btn-danger"> <i class="fa fa-trash"></i> Hapus</a></td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="col-sm-12">
      <form action="{{ route('post.slide') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group col-sm-5 navbar-right">
          <input type="file" name="slide" id="slide" class="form-control">
          <span class="input-group-btn">
            <button type="submit"  class="btn btn-primary "><i class="fa fa-upload"></i> Tambah</button></span>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection
