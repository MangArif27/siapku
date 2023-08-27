@extends('master')
@section('konten')
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Backup Data</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                </div>
                <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Backup</th>
                      <th>Nama File</th>
                      <th>Tabel</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0; ?>
                    @foreach($backup as $backup)
                    <?php $no++ ?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $backup->tanggal_backup }}</td>
                      <td>{{ $backup->file_backup }}</td>
                      <td>{{ $backup->tabel }}</td>
                      <td>@if($backup->tabel=="Data WBP")<a href="/backup_restore/restore/wbp/{{ $backup->file_backup }}" download class="btn btn-info btn-xs btn-success"><i class="fa fa-download"></i> Download</a>
                        <a href="/delete/restore/wbp/{{ $backup->file_backup }}" class="btn btn-info btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        @elseif($backup->tabel=="Data Gaji")<a href="/backup_restore/restore/gaji/{{ $backup->file_backup }}" download class="btn btn-info btn-xs btn-success"><i class="fa fa-download"></i> Download</a>
                        <a href="/delete/restore/gaji/{{ $backup->file_backup }}" class="btn btn-info btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        @else($backup->tabel=="Data Tunkin")<a href="/backup_restore/restore/tunkir/{{ $backup->file_backup }}" download class="btn btn-info btn-xs btn-success"><i class="fa fa-download"></i> Download</a>
                        <a href="/delete/restore/gaji/{{ $backup->file_backup }}" class="btn btn-info btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection