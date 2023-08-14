@extends('mobile.index')
@section('konten')
<div class="page-content">
    <div class="card card-style">
        <div class="content ml-2 mr-2">
            <div class="d-flex">
                <div>
                    <img src="{{url('image/Photo/'.Session::get('photo'))}}" class="rounded-circle" width="80px" height="80px">
                </div>
                <div class="flex-grow-1 ml-2">
                    <p class="ps-3 mb-2 ">
                    <h6>&nbsp;&nbsp;&nbsp;&nbsp;{{Session::get('nama')}}</h6>
                    &nbsp;&nbsp;&nbsp;&nbsp;No Identitas : {{Session::get('nik')}}<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Alamat : {{Session::get('alamat')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-style rounded-m pb-4">
        <div class="card contact-form">
            <div class="content">
                <h1>Profile</h1>
                <p>
                    Sistem Informasi Rutan Kelas I Cilodong Depok 2.0
                </p>
            </div>
            <div class="content">
                <form action="{{ route('post.update.profile') }} " method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-field form-name">
                        <label class="contactNameField color-theme" for="contactNameField">No Induk Kependudukan:<span>(required)</span></label>
                        <input type="text" name="NIKProfile" value="{{Session::get('nik')}}" readonly class="round-small" id="contactNameField" />
                    </div>
                    <div class="form-field form-name">
                        <label class="contactNameField color-theme" for="contactNameField">Name:<span>(required)</span></label>
                        <input type="text" name="NamaProfile" required value="{{Session::get('nama')}}" class="round-small" id="contactNameField" />
                    </div>
                    <div class="form-field form-name">
                        <label class="contactEmailField color-theme" for="contactEmailField">jenis Kelamin:<span>(required)</span></label>
                        <select name="JenisKelaminProfile" required class="form-control validate-name" style="font-size: small;">
                            <option value="default" disabled selected>Pilih Jenis Kelamin</option>
                            @if(Session::get('jenis_kelamin')=="Laki-Laki")
                            <option value="Laki-Laki" selected>Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            @else
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan" selected>Perempuan</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-field form-text">
                        <label class="contactMessageTextarea color-theme" for="contactMessageTextarea">Alamat:<span>(required)</span></label>
                        <textarea name="AlamatProfile" class="round-small" id="contactMessageTextarea">{{Session::get('alamat')}}</textarea>
                    </div>
                    <div class="form-field form-name">
                        <label class="contactNameField color-theme" for="contactNameField">No Hp/Wa:<span>(required)</span></label>
                        <input type="text" name="NoHpProfile" required value="{{Session::get('no_hp')}}" class="round-small" id="contactNameField" />
                    </div>
                    <div class="form-field form-email">
                        <label class="contactEmailField color-theme" for="contactEmailField">Email:<span>(required)</span></label>
                        <input type="text" name="EmailProfile" value="{{Session::get('email')}}" class="round-small" id="contactEmailField" />
                    </div>
                    <div class="form-field form-name">
                        <label class="contactNameField color-theme" for="contactNameField">Password:<span>(required)</span></label>
                        <input type="password" name="PasswordProfile" required value="{{Session::get('password')}}" class="round-small" id="inputPassword" />
                        <span onclick="myFunction()" class="badge bg-highlight">View/Hide</span>
                        <script>
                            function myFunction() {
                                var x = document.getElementById("inputPassword");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>
                    </div>
                    <div class="form-field form-name">
                        <label class="contactNameField color-theme" for="contactNameField">Photo:<span>(required)</span></label>
                        <input type="file" name="PhotoProfile" class="round-small" id="contactNameField" />
                        <input type="text" name="Photo" value="{{Session::get('photo')}}" hidden />
                    </div>
                    <div class="form-button">
                        <button type="submit" class="btn bg-highlight text-uppercase font-900 btn-m btn-full rounded-sm  shadow-xl">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection