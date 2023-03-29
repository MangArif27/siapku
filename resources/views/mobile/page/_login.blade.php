@extends('mobile.index')
@section('konten')
<div class="page-content pb-0">
    <div data-card-height="cover-full" class="card mb-0" style="background-image:url(images/pictures/ImageLogin.jpg)">
        <div class="card-center">
            <div class="text-center">
                <p class="font-600 color-highlight mb-1 font-16"></p>
                <h1 class="font-40 color-white">Sign In</h1>
            </div>
            <div class="content px-4">
                <form action="{{ route('post.login.mobile') }}" id="FormLogin" method="POST">
                    {{ csrf_field() }}
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="number" name="NoIdentitas" class="form-control validate-name" id="form1a" placeholder="No Identitas">
                        <label for="form1a" class="color-highlight">No Identitas</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style input-transparent no-borders has-icon validate-field mb-4">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" class="form-control validate-password" id="form1a" placeholder="Password">
                        <label for="form1a" class="color-highlight">Password</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                </form>
                <button type="submit" form="FormLogin" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s">Sign In</button>

                <div class="row pt-3 mb-3">
                    <div class="col-6 text-start font-11">
                        <a class="color-white opacity-50" href="page-system-forgot-2.html">Lupa Password</a>
                    </div>
                    <div class="col-6 text-end font-11">
                        <a class="color-white opacity-50" href="page-system-signup-2.html">Buat Akun</a>
                    </div>
                </div>

            </div>

        </div>
        <div class="card-overlay bg-black opacity-85"></div>
    </div>
</div>
@endsection