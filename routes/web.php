<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route Master
*/

Route::get('/clear-cache', function () {
    Artisan::call('optimize');
    return "Cache is cleared";
});
Route::get('/', 'AdminController@home');
/*
Route Page Index
*/
Route::get('data_wbp', 'AdminController@data_wbp');
Route::post('data_wbp', 'AdminController@postupdatewbp')->name('post.update.wbp');
Route::post('Upload', 'AdminController@postuploadwbp')->name('post.upload_wbp');
Route::get('data_pengunjung', 'AdminController@data_user');
Route::post('data_pengunjung', 'AdminController@postupdateakun')->name('post.update.akun');
Route::get('delete/user/{nik}', 'AdminController@deleteuser');
Route::get('informasi_kunjungan', 'AdminController@informasi_kunjungan');
Route::post('informasi_kunjungan', 'AdminController@postkunjungan')->name('post.kunjungan');
Route::get('about', 'AdminController@about');
Route::post('about', 'AdminController@postabout')->name('post.about');
Route::get('informasi_integrasi', 'AdminController@informasi_integrasi');
Route::post('informasi_integrasi', 'AdminController@postintegrasi')->name('post.integrasi');
Route::get('informasi_remisi', 'AdminController@informasi_remisi');
Route::post('informasi_remisi', 'AdminController@postremisi')->name('post.remisi');
Route::get('izin_alasan_penting', 'AdminController@IAP');
Route::post('izin_alasan_penting', 'AdminController@postIAP')->name('post.IAP');
Route::get('Informasi-Slip', 'AdminController@informasislip');
Route::post('Informasi-Slip', 'AdminController@postinformasislip')->name('post.informasislip');
Route::get('Informasi-Download-Slip', 'AdminController@informasidownloadslip');
Route::post('Informasi-Download-Slip', 'AdminController@postinformasidownloadslip')->name('post.informasidownloadslip');
Route::get('Hotline', 'AdminController@hotline');
Route::post('Hotline', 'AdminController@posthotline')->name('post.hotline');
Route::get('Video-Call', 'AdminController@videocall');
Route::post('Video-Call', 'AdminController@postvideocall')->name('post.videocall');
Route::get('Tamu-Dinas', 'AdminController@tamudinas');
Route::post('Tamu-Dinas', 'AdminController@posttamudinas')->name('post.tamudinas');
Route::get('Penitipan-Barang', 'AdminController@penitipanbarang');
Route::post('Penitipan-Barang', 'AdminController@postpenitipanbarang')->name('post.penitipanbarang');
Route::get('Informasi-Pengaduan', 'AdminController@informasipengaduan');
Route::post('Informasi-Pengaduan', 'AdminController@postinformasipengaduan')->name('post.informasipengaduan');
Route::get('delete/pengaduan/{pengaduan}', 'AdminController@deletepengaduan');
Route::get('Informasi-Survey', 'AdminController@informasisurvey');
Route::post('Informasi-Survey', 'AdminController@postinformasisurvey')->name('post.survey');
Route::get('Informasi-Karis', 'AdminController@informasikaris');
Route::post('Informasi-Karis', 'AdminController@postinformasikaris')->name('post.karis');
Route::get('Informasi-Pensiun', 'AdminController@informasipensiun');
Route::post('Informasi-Pensiun', 'AdminController@postinformasipensiun')->name('post.pensiun');
Route::get('Visi-Misi', 'AdminController@visi_misi');
Route::post('Visi-Misi', 'AdminController@postvisi_misi')->name('post.visi_misi');
Route::get('Struktur-Organisasi', 'AdminController@struktur_organisasi');
Route::post('Struktur-Organisasi', 'AdminController@poststruktur_organisasi')->name('post.struktur_organisasi');
Route::get('slide', 'AdminController@slide');
Route::post('slide', 'AdminController@postslide')->name('post.slide');
Route::get('delete/slide/{image}', 'AdminController@deleteslide');
Route::get('backup', 'AdminController@backup_restore');
Route::get('delete/restore/wbp/{file_backup}', 'AdminController@deleterestorewbp');
Route::get('delete/restore/gaji/{file_backup}', 'AdminController@deleterestoregaji');
Route::get('delete/restore/tunkir/{file_backup}', 'AdminController@deleterestoretunkir');
Route::get('profile', 'AdminController@profile');
Route::get('Riwayat_Gaji', 'AdminController@riwayatgaji');
Route::get('Riwayat_Tunkir', 'AdminController@riwayattunkir');
Route::post('Riwayat_Gaji', 'AdminController@uploadgaji')->name('upload.gaji');
Route::post('Riwayat_Tunkir', 'AdminController@uploadtunkir')->name('upload.tunkir');
Route::get('counter_pegawai', 'AdminController@counterpegawai');
Route::post('counter_pegawai', 'AdminController@postcounterpegawai')->name('post.counter.pegawai');
Route::get('Cetak_Pdf_Gaji/{kode}', 'AdminController@cetakslipgaji');
Route::get('Cetak_Pdf_Tunkin/{kode}', 'AdminController@cetaksliptunkin');
Route::get('cek_slip/{kode}', 'AdminController@cekslip');
Route::post('Update_Gaji', 'AdminController@updategaji')->name('post.update.gaji');
Route::post('Update_Tunkir', 'AdminController@updatetunkir')->name('post.update.tunkir');
Route::post('Insert_Gaji', 'AdminController@insertgaji')->name('post.insert.gaji');
Route::post('Insert_Tunkir', 'AdminController@inserttunkir')->name('post.insert.tunkir');
Route::post('Update_User', 'AdminController@updateuser')->name('post.update.user');
Route::post('Update_Akun', 'AdminController@updateakunpribadi')->name('update.akun');
Route::get('dropdownlist/getstates/{id}', 'AdminController@kode_bag')->name('kode.surat.bag');
Route::get('dropdownlist/getstates/kode/{id}', 'AdminController@kode_sub')->name('kode.surat.sub');
Route::get('unit_kerja/sub_seksi/{id}', 'AdminController@sub_seksi');
Route::get('master-dokumen', 'AdminController@dokumen');
Route::post('master-dokumen', 'AdminController@postdokumen')->name('post.dokumen');
Route::get('delete/master-dokumen/{link}', 'AdminController@deletedokumen');
Route::get('delete/gaji/{kode}', 'AdminController@deletegaji');
Route::get('delete/tunkin/{kode}', 'AdminController@deletetunkin');
Route::get('Daftar-Barang', 'InventoriController@daftarbarang');
Route::post('Daftar-Barang', 'InventoriController@inputdatabarang')->name('post.data.barang');
Route::post('Update-Daftar-Barang', 'InventoriController@updatedatabarang')->name('update.data.barang');
Route::get('Print-Code-Barang/{id}', 'InventoriController@cetakbarang');
Route::get('Daftar-Ruangan', 'InventoriController@daftarruangan');
Route::post('Daftar-Ruangan', 'InventoriController@inputdataruangan')->name('post.data.ruangan');
Route::get('Print-Code-Barang/Ruangan/{id}', 'InventoriController@cetakbarangruangan');
/*Route Login/Logout
*/
Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@postlogin')->name('post.login');
Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@postregister')->name('post.register');
Route::post('/reset', 'AdminController@reset')->name('post.reset.web');
Route::get('/reseter', 'AdminController@reseter');
Route::post('/resetpassword', 'AdminController@resetupdate')->name('post.resetupdate');
Route::get('/resetpassword/{token}', 'AdminController@resetpassword');
Route::get('/logout', 'UserController@logout');

//Moblie
Route::get('Apk/Index', 'MobileController@home');
//proses login buat akun dan signout serta lupa password
Route::get('Apk/login', 'MobileController@login');
Route::get('Apk/loginn', 'MobileController@loginn');
Route::post('Apk/login', 'MobileController@postlogin')->name('post.login.mobile');
Route::get('Apk/registrasi', 'MobileController@registrasi');
Route::post('Apk/registrasi', 'MobileController@registrasimobile')->name('post.registrasi.mobile');
Route::get('Apk/lupa-password', 'MobileController@lupapassword');
Route::post('Apk/lupa-password', 'MobileController@reset')->name('post.reset');
Route::get('Apk/logout', 'MobileController@logout');
Route::get('Apk/GetNoIndukWbp/{No_Induk}', 'MobileController@GetNoIndukWbp');
//Proses Navbar
Route::get('Apk/Profile', 'MobileController@profile');
Route::get('/Apk/Galery', 'MobileController@galery');
Route::get('/Apk/Settings', 'MobileController@settings');
Route::get('/Apk/Privacy-Police', 'MobileController@privacy');
Route::get('/Apk/Update-Password', 'MobileController@updatepassword');
Route::post('/Apk/Update-Password', 'MobileController@prosesupdatepassword')->name('post.updatepassword.mobile');
Route::get('/Apk/Informasi', 'MobileController@informasi');
Route::get('/Apk/LayananGajiTunkin/{nik}', 'MobileController@slip');
Route::get('/Apk/LayananGajiTunkin/', 'MobileController@slipp');
/*Route::get('/Apk/layanan-kunjungan/', 'MobileController@formdaftarkunjungan');
Route::get('/Apk/Autocomplete', 'MobileController@autocomplete')->name('autocomplete');
Route::post('/Apk/Pendaftaran', 'MobileController@postformdaftarkunjungan')->name('post.formdaftarkunjungan');*/
Route::get('/Apk/History/{no_induk}', 'MobileController@history');
Route::get('/Apk/History/', 'MobileController@historyy');
Route::get('/Apk/Ticket/Slip/Gaji/{kode}', 'MobileController@tiketslipgaji');
Route::get('/Apk/Ticket/Slip/Tunkin/{kode}', 'MobileController@tiketsliptunkin');
/*Route::get('/Apk/Ticket/Kunjungan/{kode_booking}', 'MobileController@ticketkunjungan');
Route::get('/Apk/Ticket/Tamu/{kode_booking}', 'MobileController@tickettamu');
Route::get('/Apk/layanan-pengaduan', 'MobileController@layananpengaduan');
Route::post('/Apk/layanan-pengaduan', 'MobileController@inputpengaduan')->name('post.formpengaduan');
Route::get('/Apk/Ticket/Pengaduan/{kode_pengaduan}', 'MobileController@ticketpengaduan');*/
Route::get('/Apk/Visi-Misi', 'MobileController@visimisi');
Route::get('/Apk/Struktur-Organisasi', 'MobileController@strukturorganisasi');
Route::get('/Apk/Pusat-Berkas', 'MobileController@pusatberkas');
Route::get('/Apk/Download/Berkas/{link}', 'MobileController@DonwloadDokumen');
/*Route::get('/Apk/Layanan-Tamu', 'MobileController@tamu');
Route::post('/Apk/Layanan-Tamu', 'MobileController@posttamu')->name('post.tamu');
Route::get('/Apk/Lap-Pengamanan', 'MobileController@lappengamanan');
Route::post('/Apk/Lap-Pengamanan', 'MobileController@postlappengamanan')->name('post.lappengamanan');*/