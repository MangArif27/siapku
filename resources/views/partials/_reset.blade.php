<!DOCTYPE html>
<html lang="en">
@include('partials._head')

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('post.reset.web') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h1>Reset Account</h1>
                        @if(\Session::has('alert'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>{{Session::get('alert')}}</strong>
                        </div>
                        @endif
                        <div class="form-group">
                            <input type="number" id="nik" name="nik" required="required" class="form-control col-md-9 col-sm-9 col-xs-12" placeholder="No Identitas KTP/SIM/PASPORT">
                            </br>
                        </div>
                        </br>
                        <div class="form-group">
                            <input type="email" id="email" name="email" required="required" class="form-control col-md-9 col-sm-9 col-xs-12" placeholder="Email Yang Terdaftar">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <p class="change_link">Jika Sudah Punya Akun ?
                                <a href="/login" class="to_register"> Klik Disini </a>
                            </p>
                        </div>
                        <div class="separator">
                            <p class="change_link">Belum Punya Akun ?
                                <a href="login/#signup" class="to_register"> Klik Disini </a>
                            </p>
                        </div>
                        <div class="separator">
                            <p class="change_link">Jika Ingin Kembali ?
                                <a href="/" class="to_register"> Klik Kembali </a>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><img src="{{ asset('assets/images/SMartPAs.png') }}" width="50px" alt=""></i> Rutan Kelas I Depok</h1>
                            <p>Copyright © 2019<script>
                                    new Date().getFullYear() > 2018 && document.write("-" + new Date().getFullYear());
                                </script>, IT Team Mitra Digital Perkasa</p>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>