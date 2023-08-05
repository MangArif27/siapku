@if(Session::get('status')=="ADMIN" || Session::get('status')=="ADMIN SURAT" || Session::get('status')=="ADMIN PEGAWAI"
|| Session::get('status')=="ADMIN KUNJUNGAN" || Session::get('status')=="COUNTER" || Session::get('status')=="COUNTER
PEGAWAI" || Session::get('status')=="PEMANGGILAN")
@include('partials._profile')
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Dashboard</h3>
        <ul class="nav side-menu">
            @foreach($m=DB::table('menu')->where('no_identitas',Session::get('nik'))->get() as $menu)
            @foreach($sm=DB::table('sub_menu')->where('no_identitas',Session::get('nik'))->get() as $submenu)
            @if($menu->home==1)
            <li><a href="/"><i class="fa fa-home"></i> Home </a></li>
            @else
            @endif
            @if($menu->data==1)
            <li><a><i class="fa fa-users"></i> Data Induk <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <!--@if($submenu->wbp==1)
                    <li><a href="data_wbp">Data WBP</a></li>
                    @else
                    @endif -->
                    @if($submenu->user==1)
                    <li><a href="data_pengunjung">Data User</a></li>
                    @else
                    @endif
                    <!-- @if($submenu->user==1)
                    <li><a href="data_keluarga">Data Keluarga</a></li>
                    @else
                    @endif-->
                </ul>
            </li>
            @else
            @endif
            @if($menu->informasi==1)
            <li><a><i class="fa fa-desktop"></i> Layanan Informasi <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @if($submenu->penitipan_barang==1 || $submenu->kunjungan==1 || $submenu->video_call==1 ||
                    $submenu->tamu_dinas==1)
                    <li><a> Layanan Kunjungan <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if($submenu->penitipan_barang==1)
                            <li><a href="Penitipan-Barang">Penitipan Barang</a></li>
                            @else
                            @endif
                            @if($submenu->kunjungan==1)
                            <li><a href="informasi_kunjungan">Kunjungan</a></li>
                            @else
                            @endif
                            @if($submenu->video_call==1)
                            <li><a href="Video-Call">Video Call</a></li>
                            @else
                            @endif
                            @if($submenu->tamu_dinas==1)
                            <li><a href="Tamu-Dinas">Tamu Dinas</a></li>
                            @else
                            @endif
                        </ul>
                    </li>
                    @else
                    @endif
                    @if($submenu->integrasi==1 || $submenu->remisi==1 || $submenu->izin_alasan_penting==1)
                    <li><a> Layanan Hak <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if($submenu->integrasi==1)
                            <li><a href="informasi_integrasi">Integrasi PB/CB/CMB/CMK</a></li>
                            @else
                            @endif
                            @if($submenu->remisi==1)
                            <li><a href="informasi_remisi">Remisi</a></li>
                            @else
                            @endif
                            @if($submenu->izin_alasan_penting==1)
                            <li><a href="izin_alasan_penting">Izin Luar Biasa</a></li>
                            @else
                            @endif
                        </ul>
                    </li>
                    @else
                    @endif
                    @if($submenu->layanan_slip==1 || $submenu->layanan_download_slip==1 || $submenu->karis==1)
                    <li><a> Layanan Pegawai <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if($submenu->layanan_slip==1)
                            <li><a href="Informasi-Slip">Informasi Slip Gaji</a></li>
                            @else
                            @endif
                            @if($submenu->layanan_download_slip==1)
                            <li><a href="Informasi-Download-Slip">Informasi Download Slip Gaji</a></li>
                            @else
                            @endif
                            @if($submenu->karis==1)
                            <li><a href="Informasi-Karis">Informasi Karis</a></li>
                            @else
                            @endif
                            @if($submenu->pengamanan==1)
                            <li><a href="Informasi-Pengamanan">Lap. Pengamanan</a></li>
                            @else
                            @endif
                        </ul>
                    </li>
                    @else
                    @endif
                    @if($submenu->visi_misi==1 || $submenu->struktur_organisasi==1)
                    <li><a> Layanan Tugas & Fungsi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if($submenu->visi_misi==1)
                            <li><a href="Visi-Misi">Informasi Visi Misi</a></li>
                            @else
                            @endif
                            @if($submenu->struktur_organisasi==1)
                            <li><a href="Struktur-Organisasi">Struktur Organisasi</a></li>
                            @else
                            @endif
                        </ul>
                    </li>
                    @else
                    @endif
                    @if($submenu->hotline==1 || $submenu->layanan_pengaduan==1)
                    <li><a> Layanan Contact Person <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if($submenu->hotline==1)
                            <li><a href="Hotline">Hotline</a></li>
                            @else
                            @endif
                            @if($submenu->layanan_pengaduan==1)
                            <li><a href="Informasi-Pengaduan">Informasi Pengaduan</a></li>
                            @else
                            @endif
                        </ul>
                    </li>
                    @else
                    @endif
                </ul>
            </li>
            @else
            @endif
            @if($menu->layanan_kunjungan==1)
            <li><a><i class="fa fa-book"></i>Layanan Kunjungan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @if($submenu->surat==1)
                    <li><a href="surat_ijin"> Kunjungan Tatap Muka</a></li>
                    @else
                    @endif
                    @if($submenu->surat_1==1)
                    <li><a href="History-Penitipan-Barang"> Penitipan Barang </a></li>
                    @else
                    @endif
                    @if($submenu->surat_2==1)
                    <li><a href="History-Video-Call"> Video Call </a></li>
                    @else
                    @endif
                    @if($submenu->surat_3==1)
                    <li><a href="History-Tamu-Dinas"> Tamu Dinas </a></li>
                    @else
                    @endif
                    <!--@if($submenu->print_surat==1)
                    <li><a href="counter"> Counter Kunjungan </a></li>
                    @else
                    @endif-->
                    @if($submenu->sikawan==1)
                    <li><a href="sikawan"> Sikawan </a></li>
                    @else
                    @endif
                </ul>
            </li>
            @else
            @endif
            @if($menu->layanan_pengaduan==1)
            <li><a><i class="fa fa-bullhorn"></i> Layanan Pengaduan<span class="fa fa-chevron-down"></a>
                <ul class="nav child_menu">
                    @if($submenu->list_pengaduan==1)
                    <li><a href="history_pengaduan"> History Pengaduan</a></li>
                    @else
                    @endif
                </ul>
            </li>
            @else
            @endif
            @if($menu->gaji_tunkin==1)
            <li><a><i class="fa fa-money"></i> Keuangan<span class="fa fa-chevron-down"></a>
                <ul class="nav child_menu">
                    @if($submenu->pagu==1)
                    <li><a href="Realisasi-Pagu">Realisasi Pagu</a></li>
                    @else
                    @endif
                    @if($submenu->gaji==1)
                    <li><a href="Riwayat_Gaji">Riwayat Gaji</a></li>
                    @else
                    @endif
                    @if($submenu->tunkin==1)
                    <li><a href="Riwayat_Tunkir"> Riwayat Tunkir</a></li>
                    @else
                    @endif
                    @if($submenu->print_slip==1)
                    <li><a href="counter_pegawai"> Counter Gaji</a></li>
                    @else
                    @endif
                </ul>
            </li>
            @else
            @endif
            @if($menu->pengamanan==1)
            <li><a><i class="fa fa-shield"></i> Pengamanan <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    @if($submenu->pos_pam==1)
                    <li><a href="Pos-Pengamanan">Pos Pengamanan</a></li>
                    @else
                    @endif
                    @if($submenu->lap_pam==1)
                    <li><a href="Laporan-Pos-Pengamanan">Laporan Pengamanan</a></li>
                    @else
                    @endif
                </ul>
            </li>
            @else
            @endif
            @if($menu->inventory==1)
            <li><a><i class="fa fa-camera"></i> Management Inventory <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @if($submenu->daftar_barang==1)
                    <li><a href="Daftar-Barang"> Daftar Barang</a></li>
                    @else
                    @endif
                    @if($submenu->daftar_ruangan==1)
                    <li><a href="Daftar-Ruangan"> Daftar Ruangan </a></li>
                    @else
                    @endif
                </ul>
            </li>
            @else
            @endif
            @if($menu->pengaturan==1)
            <li><a><i class="fa fa-gears"></i> Pengaturan<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @if($submenu->slide==1)
                    <li><a href="slide"></i> Slide </a></li>
                    @else
                    @endif
                    @if($submenu->galery==1)
                    <li><a href="galery"></i> Galeri </a></li>
                    @else
                    @endif
                    @if($submenu->backup_data==1)
                    <li><a href="backup"> Backup Data </a></li>
                    @else
                    @endif
                    @if($submenu->master_dokumen==1)
                    <li><a href="master-dokumen"> Master Berkas </a></li>
                    @else
                    @endif
                    @if($submenu->about==1)
                    <li><a href="about">Tentang Aplikasi</a></li>
                    @else
                    @endif
                </ul>
            </li>
            @else
            @endif
            @endforeach
            @endforeach
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
            <li><a><i class="fa fa-desktop"></i> Layanan Informasi <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a> Layanan Kunjungan <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="Penitipan-Barang">Penitipan Barang</a></li>
                            <li><a href="informasi_kunjungan">Kunjungan</a></li>
                            <li><a href="Video-Call">Video Call</a></li>
                            <li><a href="Tamu-Dinas">Tamu Dinas</a></li>
                        </ul>
                    </li>
                    <li><a> Layanan Hak <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="informasi_integrasi">Integrasi PB/CB/CMB/CMK</a></li>
                            <li><a href="informasi_remisi">Remisi</a></li>
                            <li><a href="izin_alasan_penting">Izin Luar Biasa</a></li>
                        </ul>
                    </li>
                    <li><a> Layanan Pegawai <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="Informasi-Slip">Informasi Slip Gaji</a></li>
                            <li><a href="Informasi-Download-Slip">Informasi Download Slip Gaji</a></li>
                            <li><a href="Informasi-Karis">Informasi Karis</a></li>
                            <li><a href="Informasi-Pengamanan">Lap. Pengamanan</a></li>
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
                            <li><a href="Informasi-Pengaduan">Informasi Pengaduan</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="about"><i class="fa fa-gears"></i> About </a></li>
            <li><a href="login"><i class="fa fa-sign-in"></i> Log In </a></li>
        </ul>
    </div>
</div>
@endif