@if(Session::get('status')=="ADMIN" || Session::get('status')=="ADMIN SURAT" || Session::get('status')=="ADMIN PEGAWAI"
|| Session::get('status')=="ADMIN KUNJUNGAN" || Session::get('status')=="COUNTER" || Session::get('status')=="COUNTER
PEGAWAI" || Session::get('status')=="PEMANGGILAN")
@include('partials._profile')
<div class="clearfix"></br></div>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Dashboard</h3>
        <ul class="nav side-menu">
            <li><a href="/"><i class="fa fa-home"></i> Home </a></li>
            <li><a><i class="fa fa-users"></i> Data Induk <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="data_pengunjung">Data User</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> Layanan Informasi <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a> Layanan Pegawai <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="Informasi-Slip">Informasi Slip Gaji</a></li>
                            <li><a href="Informasi-Download-Slip">Informasi Download Slip Gaji</a></li>
                            <li><a href="Informasi-Karis">Informasi Karis</a></li>
                        </ul>
                    </li>
                    <li><a> Layanan Tugas & Fungsi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="Visi-Misi">Informasi Visi Misi</a></li>
                            <li><a href="Struktur-Organisasi">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li><a> Layanan Contact Person <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="Hotline">Hotline</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-money"></i> Gaji & Tunkin <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="Riwayat_Gaji">Riwayat Gaji</a></li>
                    <li><a href="Riwayat_Tunkir">Riwayat Tunjangan Kinerja</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-camera"></i>Management Inventory<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="Daftar-Barang">Daftar Barang </a></li>
                    <li><a href="Daftar-Ruangan">Daftar Ruangan </a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-gears"></i> Pengaturan<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="slide"></i> Slide </a></li>
                    <li><a href="backup"> Backup Data </a></li>
                    <li><a href="master-dokumen"> Master Berkas </a></li>
                    <li><a href="about">Tentang Aplikasi</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
@else
<div class="navbar nav_title" style="border: 0;">
    <center></center><a class="site_title"><img src="{{ url('assets/images/Logo_Apk.png') }}" width='90'></a></center>
</div>
<!-- /menu profile quick info -->
<br />
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Dashboard</h3>
        <ul class="nav side-menu">
            <li><a href="/"><i class="fa fa-home"></i> Home </a></li>
            </li>
            <!-- <li><a><i class="fa fa-desktop"></i> Layanan Informasi <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="informasi_kunjungan">Kunjungan</a></li>
                    <li><a href="informasi_integrasi">Integrasi PB/CB/CMB</a></li>
                    <li><a href="informasi_remisi">Remisi</a></li>
                    <li><a href="izin_alasan_penting">Izin Alasan Penting</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bullhorn"></i> Layanan Pengaduan<span class="fa fa-chevron-down"></a>
                <ul class="nav child_menu">
                    <li><a href="pengaduan">Form Pengaduan</a></li>
                    <li><a href="pengaduan">Cek Pengaduan</a></li>
                </ul>
            </li> -->
            <li><a href="about"><i class="fa fa-gears"></i> About </a></li>
            <li><a href="login"><i class="fa fa-sign-in"></i> Log In </a></li>
        </ul>
    </div>
</div>
@endif