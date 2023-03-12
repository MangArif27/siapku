@if(Session::get('status')=="ADMIN" || Session::get('status')=="ADMIN SURAT" || Session::get('status')=="ADMIN PEGAWAI"
|| Session::get('status')=="ADMIN KUNJUNGAN" || Session::get('status')=="COUNTER" || Session::get('status')=="COUNTER
PEGAWAI" || Session::get('status')=="PEMANGGILAN")
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ url('image/Photo/'.Session::get('photo')) }}" alt="">{{Session::get('nama')}}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-s"> Profile</a></li>
                        <li><a href="about"></i> About </a></li>
                        <li><a href="logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
@else
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
        </nav>
    </div>
</div>
@endif