@extends('mobile.index')
@section('konten')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<div class="page-content">
    <div class="card card-style">
        <div class="content ml-2 mr-2">
            <div class="d-flex">
                <div>
                    <img src="images/pictures/15t.jpg" class="rounded-circle" width="80">
                </div>
                <div class="flex-grow-1 ml-2">
                    <p class="ps-3 mb-2 ">
                    <h6>Muarif Zamzam Nur</h6>
                    No Identitas : 123456789<br>
                    Alamat : Jl. Cigayam Dusun Sukamulya Rt. 004 Rw. 002 Desa. Sukasari Kec. Banjarsari Kab. Ciamis
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php $no = 0;
    $tanggal = date('Y-m-d'); ?>
    <form action="{{ route('post.formdaftarkunjungan') }}" enctype="multipart/form-data" id="FormKunjungan"
        method="POST">
        {{ csrf_field() }}
        <div class="card card-style">
            <div class="content mb-0">
                <h3>Form Pendaftaran Kunjungan</h3>
                <p>
                    Sistem Informasi Rutan Kelas I Depok Cilodong
                </p>

                <div class="input-style has-borders has-icon mb-4">
                    <i class="fa fa-user"></i>
                    <select class="cari form-control mb-6" name="nama_wbp">
                    </select>
                    <label for="form5" class="color-highlight">Nama WBP </label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style has-borders no-icon validate-field mb-4">
                    <input type="file" class="form-control validate-name" id="form1" placeholder="Name">
                    <label for="form1" class="color-highlight">File Surat Ijin Tahanan</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style has-borders has-icon mb-4">
                    <input type="date" name="tanggal" min="{{$tanggal}}" format="YYYY-mm-dd"
                        class="form-control validate-text" id="form6" placeholder="Pilih Tanggal Kunjungan">
                    <label for="form6" class="color-highlight">Pilih Tanggal</label>
                    <i class="fa fa-check disabled valid me-4 pe-3 font-12 color-green-dark"></i>
                    <i class="fa fa-check disabled invalid me-4 pe-3 font-12 color-red-dark"></i>
                </div>
                <div class="input-style has-borders no-icon validate-field mb-4">
                    <input type="email" class="form-control validate-text" id="form2" placeholder="Email">
                    <label for="form2" class="color-highlight">Email</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>

                <div class="input-style has-borders no-icon validate-field mb-4">
                    <input type="password" class="form-control validate-text" id="form3" placeholder="Password">
                    <label for="form3" class="color-highlight">Password</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>

                <div class="input-style has-borders no-icon validate-field mb-4">
                    <input type="url" class="form-control validate-text" id="form44" placeholder="Website">
                    <label for="form44" class="color-highlight">Website</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>

                <div class="input-style has-borders no-icon validate-field mb-4">
                    <input type="tel" class="form-control validate-text" id="form4" placeholder="Phone">
                    <label for="form4" class="color-highlight">Phone</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>

                <div class="input-style has-borders no-icon mb-4">
                    <label for="form5" class="color-highlight">Select A Value</label>
                    <select id="form5">
                        <option value="default" disabled selected>Select a Value</option>
                        <option value="iOS">iOS</option>
                        <option value="Linux">Linux</option>
                        <option value="MacOS">MacOS</option>
                        <option value="Android">Android</option>
                        <option value="Windows">Windows</option>
                    </select>
                    <span><i class="fa fa-chevron-down"></i></span>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <i class="fa fa-check disabled invalid color-red-dark"></i>
                    <em></em>
                </div>
                <div class="input-style has-borders no-icon mb-4">
                    <textarea id="form7" placeholder="Enter your message"></textarea>
                    <label for="form7" class="color-highlight">Enter your Message</label>
                    <em class="mt-n3">(required)</em>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection