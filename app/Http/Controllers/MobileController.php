<?php

namespace App\Http\Controllers;

use File;
use App\slide;
use App\galery;
use App\dokumen;
use App\kepribadian;
use App\BackupWBP;
use App\Backup;
use App\gaji;
use App\tunkir;
use App\pendaftaran;
use App\tamu;
use App\pengaduan;
use App\Kunjungan;
use App\postinformasi;
use App\ModelUser;
use App\AutoWBP;
use PDF;

use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataWBP;
use App\Imports\upload_gaji;
use App\Imports\upload_tunkir;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\Else_;

class MobileController extends Controller
{
  public function home()
  {
    $tanggall = date('Y-m-d', strtotime('+1 days'));
    $tanggal = date('Y-m-d');
    $slide = DB::table('slide')->get();
    return view('mobile.page._home', ['slide' => $slide]);
  }
  //Proses User Login Logout and Buat Akun
  public function login()
  {
    return view('mobile.page._login');
  }
  public function postlogin(Request $request)
  {

    $nik = $request->NoIdentitas;
    $password = $request->password;

    $data = DB::table('users')->where('nik', $nik)->first();
    if ($data) { //apakah email tersebut ada atau tidak
      if (Hash::check($password, $data->password)) {
        if ($data->status == "USER" || $data->status == "PEGAWAI") {
          Session::put('nama', $data->nama);
          Session::put('nik', $data->nik);
          Session::put('jenis_kelamin', $data->jenis_kelamin);
          Session::put('alamat', $data->alamat);
          Session::put('no_hp', $data->no_hp);
          Session::put('email', $data->email);
          Session::put('scan_ktp', $data->scan_ktp);
          Session::put('photo', $data->photo);
          Session::put('status', $data->status);
          Session::put('login', TRUE);
          return redirect('/Apk/Index');
        } else if ($data->status == "ADMIN KUNJUNGAN" || $data->status == "COUNTER PEGAWAI" || $data->status == "PEMANGGILAN" || $data->status == "ADMIN" || $data->status == "ADMIN PEGAWAI" || $data->status == "ADMIN SURAT") {
          return redirect('/Apk/login')->with('alert', 'Akun anda hanya bisa dibuka di aplikasi berbasis web !');
        } else {
          return redirect('/Apk/login')->with('alert', 'Akun Anda Belum Di Setujui Oleh Admin !');
        }
      } else {
        return redirect('/Apk/login')->with('alert', 'Password atau No Identitas, Salah !');
      }
    } else {
      return redirect('/Apk/login')->with('alert', 'Password atau No Identitas, Tidak Ditemukan!');
    }
  }
  public function registrasimobile(Request $request)
  {
    $nik = $request->nik;
    $data = ModelUser::where('nik', $nik)->first();
    if ($data) {
      return redirect('/login')->with('alert', 'Maaf No Identitas Sudah Terdaftar Silahkan Registrasi dengan Identitas Lain !!!!');
    } else {
      // Proses Uplode Image
      $photo = $request->file('PhotoDiri');
      $scan_ktp = $request->file('PhotoIdentitas');
      $nama_photo = $photo->getClientOriginalName();
      $nama_ktp = $scan_ktp->getClientOriginalName();
      $uplode_photo = 'image/Photo';
      $uplode_scan_ktp = 'image/Scan_ktp';
      $photo->move($uplode_photo, $nama_photo);
      $scan_ktp->move($uplode_scan_ktp, $nama_ktp);

      $data =  new ModelUser();
      $data->nik = $request->nik;
      $data->nama = $request->nama;
      $data->jenis_kelamin = $request->jk;
      $data->alamat = $request->Alamat;
      $data->no_hp = $request->NoHandphone;
      $data->email = $request->Email;
      $data->password = bcrypt($request->RegistrasiPassword);
      $data->photo = $nama_photo;
      $data->level = "btn-danger";
      $data->status = "PENDING";
      $data->remember_token = csrf_token();
      $data->scan_ktp = $nama_ktp;
      // Proses Save
      $data->save();
      DB::table('sub_menu')->insert([
        'no_identitas' => $request->nik,
        'user' => 2,
        'wbp' => 2,
        'kunjungan' => 2,
        'integrasi' => 2,
        'remisi' => 2,
        'izin_alasan_penting' => 2,
        'about' => 2,
        'penitipan_barang' => 2,
        'video_call' => 2,
        'hotline' => 2,
        'layanan_slip' => 2,
        'layanan_download_slip' => 2,
        'layanan_pengaduan' => 2,
        'survey' => 2,
        'karis' => 2,
        'pensiun' => 2,
        'visi_misi' => 2,
        'struktur_organisasi' => 2,
        'tamu_dinas' => 2,
        'surat' => 2,
        'print_surat' => 2,
        'form_pengaduan' => 2,
        'list_pengaduan' => 2,
        'r_gaji' => 2,
        'r_tunkin' => 2,
        'print_slip' => 2,
        'kemandirian' => 2,
        'kepribadian' => 2,
        'slide' => 2,
        'master_dokumen' => 2,
        'backup_data' => 2,
      ]);
      DB::table('menu')->insert([
        'no_identitas' => $request->nik,
        'home' => 2,
        'data' => 2,
        'informasi' => 2,
        'layanan_kunjungan' => 2,
        'layanan_pengaduan' => 2,
        'pengaturan' => 2,
        'pembinaan' => 2,
        'surat' => 2,
        'gaji_tunkin' => 2,
      ]);
      return redirect('/Apk/login')->with('alert', 'Selamat Kamu Berhasil Registrasi, Selanjutnya Menunggu Persetujuan Admin !!');
    }
  }
  public function registrasi()
  {
    return view('mobile.page._register');
  }
  public function lupapassword()
  {
    return view('mobile.page._reset');
  }
  public function reset(Request $request)
  {
    $cek = ModelUser::where('email', $request->email)->where('nik', $request->nik)->first();
    if ($cek) {
      $link = $cek->remember_token;
      $nama = $cek->nama;
      $email = $request->email;
      $kirim = Mail::to($email)->send(new ResetPassword($link, $nama));
      Session::flash('gagal', 'Silahkan Cek Link Di Email Anda !!!');
      return view('/mobile.page._login');
    } else {
      Session::flash('gagal', 'Maaf Nomor Identitas dan Email Anda Tidak Sesuai !!!');
      return view('/mobile.page._reset');
    }
  }
  public function logout()
  {
    Session::flush();
    return redirect('/Apk/login')->with('alert', 'Selamat Anda Berhasil LogOut !');
  }
  public function loginn()
  {
    return redirect('/Apk/login')->with('alert', 'Silahkan Masukan Nomor Identitas dan Password !');
  }
  public function settings()
  {
    return view('mobile.page._setting');
  }
  public function privacy()
  {
    return view('mobile.page._privacypolice');
  }
  public function updatepassword()
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      return view('mobile.page._updatepassword');
    }
  }
  public function prosesupdatepassword(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $password = $request->oldpassword;
      $data = DB::table('users')->where('nik', $request->NoIdentitas)->first();
      if ($data) { //apakah email tersebut ada atau tidak
        if (Hash::check($password, $data->password)) {
          DB::table('users')->where('nik', $request->NoIdentitas)->update(['password' => bcrypt($request->newpassword), 'email' => $request->Email]);
          return redirect('/Apk/Update-Password')->with('alert', 'Selamat Anda Berhasil Merubah Password !!!');
        } else {
          return redirect('/Apk/Update-Password')->with('alert', 'Maaf Password Lama Anda Salah !!!');
        }
      } else {
        return redirect('/Apk/Update-Password')->with('alert', 'Maaf Anda Gagal Merubah Password !!!');
      }
    }
  }
  public function profile()
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      return view('mobile.page._profile');
    }
  }
  public function informasi()
  {
    $informasi = DB::table('informasi')->get();
    return view('mobile.page._informasi', ['informasi' => $informasi]);
  }
  public function formdaftarkunjungan()
  {
    /*if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else { */
    $datawbp = DB::table('data_wbp')->get();
    $user = DB::table('users')->get();
    return view('mobile.page._formdaftarkunjungan', ['datawbp' => $datawbp], ['users' => $user])->with('gagal', 'Selamat Datang Di Pendaftaran Kunjungan !!');
    /*}*/
  }
  public function autocomplete(Request $request)
  {
    if ($request->has('q')) {
      $cari = $request->q;
      $data = DB::table('data_wbp')->select('nama')->where('nama', 'LIKE', '%' . $cari . '%')->get();
      return response()->json($data);
    }
  }
  public function postformdaftarkunjungan(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $nik = $request->NoIdentitas;
      $tanggal = $request->tanggal;
      $keperluan = $request->keperluan;
      $wbp = $request->nama_wbp;
      $dtanggal = DB::table('kunjungan')->where('tanggal_kunjungan', $tanggal)->count();
      if ($dtanggal > 30) {
        return redirect('/Apk/layanan-kunjungan')->with('alert', 'Kuota Pendaftar Sudah Melebihi 30 Pendaftar Perhari, Silahkan Daftar Dihari Yang Lain !!!');
      } else {
        $data = DB::table('data_wbp')->where('nama', $wbp)->first();
        if ($data->status == "SIDANG") {
          return redirect('/Apk/layanan-kunjungan')->with('alert', 'Maaf Warga Binaan yang dimaksud sedang melaksanakan Sidang, sehingga tidak bisa dilaksanakan kunjungan !!!');
        } else if ($data->status == "OFFLINE") {
          return redirect('/Apk/layanan-kunjungan')->with('alert', 'Maaf Warga Binaan yang dimaksud sedang tidak bisa dikunjungi !!!');
        } else {
          $data = DB::table('kunjungan')->where('no_induk', $wbp)->Where('nik', $nik)->Where('tanggal_kunjungan', $tanggal)->first();
          if ($data) {
            return redirect('/Apk/layanan-kunjungan')->with('alert', 'Maaf Anda Tidak Bisa Daftar Dengan WBP Di Hari Yang Sama !!!');
          } else {
            $data = DB::table('data_wbp')->where('nama', $wbp)->first();
            if ($data->status_wbp == "TAHANAN") {
              if (empty($request->file('fileijin'))) {
                return redirect('/Apk/layanan-kunjungan')->with('alert', 'WBP yang dituju masih status tahanan, silahkan isi Surat Ijin Bagi Tahanan !!');
              } else {
                $fileijin = $request->file('fileijin');
                $nama_suratijin = $fileijin->getClientOriginalName();
                $uplode_suratijin = 'backup_restore/restore/surat/';
                $fileijin->move($uplode_suratijin, $nama_suratijin);
                //jumlah panjang karakter angka dan huruf.
                $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $acak = substr(str_shuffle($permitted_chars), 0, 6);
                $data = DB::table('data_wbp')->where('nama', 'like', '%' . $wbp . '%')->first();
                $NoIndukWbp = $data->no_induk;
                $insert = new pendaftaran();
                $insert->tanggal_kunjungan = $tanggal;
                $insert->no_induk = $NoIndukWbp;
                $insert->nik = $nik;
                $insert->surat_ijin = $nama_suratijin;
                $insert->status_keluarga = $request->hubungan;
                $insert->keperluan = $keperluan;
                $insert->sesi = $request->sesi;
                $insert->kode_booking = $acak;
                $insert->status = "PROSES";
                $insert->alasan =  "-";
                $insert->button = "btn-warning";
                // Proses Save
                $insert->save();
                if ($keperluan == "Penitipan Barang") {
                  $jumlah = $request->jumlahbarang;
                  if ($jumlah == "Tidak Ada") {
                    return redirect('/Apk/Ticket/Kunjungan/' . $acak)->with('alert', 'Selamat anda berhasil mendaftar, silahkan berikan informasi tiket kunjungan kepada petugas !!');
                  } else {
                    for ($i = 0; $i < $jumlah; $i++) {
                      $insert_p = new Kunjungan();
                      $insert_p->tanggal_kunjungan = $tanggal;
                      $insert_p->no_induk = $NoIndukWbp;
                      $insert_p->nik = $nik;
                      $insert_p->kode = $acak;
                      $insert_p->nik_pengikut = $request->JenisBarang[$i];
                      $insert_p->nama = $request->NamaBarang[$i];
                      $insert_p->save();
                    }
                  }
                } else {

                  $jumlah = $request->jumlahorang;
                  if ($jumlah == "Tidak Ada") {
                    return redirect('/Apk/Ticket/Kunjungan/' . $acak)->with('alert', 'Selamat anda berhasil mendaftar, silahkan berikan informasi tiket kunjungan kepada petugas !!');
                  } else {
                    for ($i = 0; $i < $jumlah; $i++) {
                      $insert_p = new Kunjungan();
                      $insert_p->tanggal_kunjungan = $tanggal;
                      $insert_p->no_induk = $NoIndukWbp;
                      $insert_p->nik = $nik;
                      $insert_p->kode = $acak;
                      $insert_p->nik_pengikut = $request->NoIndukPengikut[$i];
                      $insert_p->nama = $request->Pengikut[$i];
                      $insert_p->save();
                    }
                  }
                }

                return redirect('/Apk/Ticket/Kunjungan/' . $acak)->with('alert', 'Selamat anda berhasil mendaftar, silahkan berikan informasi tiket kunjungan kepada petugas !!');
              }
            } else {
              //jumlah panjang karakter angka dan huruf.
              $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $acak = substr(str_shuffle($permitted_chars), 0, 6);
              $data = DB::table('data_wbp')->where('nama', 'like', '%' . $wbp . '%')->first();
              $NoIndukWbp = $data->no_induk;
              $insert = new pendaftaran();
              $insert->tanggal_kunjungan = $tanggal;
              $insert->no_induk = $NoIndukWbp;
              $insert->nik = $nik;
              $insert->surat_ijin = "-";
              $insert->status_keluarga = $request->hubungan;
              $insert->keperluan = $keperluan;
              $insert->sesi = $request->sesi;
              $insert->kode_booking = $acak;
              $insert->status = "PROSES";
              $insert->alasan =  "-";
              $insert->button = "btn-warning";
              // Proses Save
              $insert->save();
              if ($keperluan == "Penitipan Barang") {
                $jumlah = $request->jumlahbarang;
                if ($jumlah == "Tidak Ada") {
                  return redirect('/Apk/Ticket/Kunjungan/' . $acak)->with('alert', 'Selamat anda berhasil mendaftar, silahkan berikan informasi tiket kunjungan kepada petugas !!');
                } else {
                  for ($i = 0; $i < $jumlah; $i++) {
                    $insert_p = new Kunjungan();
                    $insert_p->tanggal_kunjungan = $tanggal;
                    $insert_p->no_induk = $NoIndukWbp;
                    $insert_p->nik = $nik;
                    $insert_p->kode = $acak;
                    $insert_p->nik_pengikut = $request->JenisBarang[$i];
                    $insert_p->nama = $request->NamaBarang[$i];
                    $insert_p->save();
                  }
                }
              } else {

                $jumlah = $request->jumlahorang;
                if ($jumlah == "Tidak Ada") {
                  return redirect('/Apk/Ticket/Kunjungan/' . $acak)->with('alert', 'Selamat anda berhasil mendaftar, silahkan berikan informasi tiket kunjungan kepada petugas !!');
                } else {
                  for ($i = 0; $i < $jumlah; $i++) {
                    $insert_p = new Kunjungan();
                    $insert_p->tanggal_kunjungan = $tanggal;
                    $insert_p->no_induk = $NoIndukWbp;
                    $insert_p->nik = $nik;
                    $insert_p->kode = $acak;
                    $insert_p->nik_pengikut = $request->NoIndukPengikut[$i];
                    $insert_p->nama = $request->Pengikut[$i];
                    $insert_p->save();
                  }
                }
              }
              return redirect('/Apk/Ticket/Kunjungan/' . $acak)->with('alert', 'Selamat anda berhasil mendaftar, silahkan berikan informasi tiket kunjungan kepada petugas !!');
            }
          }
        }
      }
    }
  }
  public function history($no_induk)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $pengaduan = DB::table('pengaduan')->where('nik', $no_induk)->orderBy('id', 'DESC')->paginate(5);
      $kunjungan = DB::table('kunjungan')->where('nik', $no_induk)->orderBy('id', 'DESC')->paginate(5);
      return view('mobile.page._history', ['pengaduan' => $pengaduan], ['kunjungan' => $kunjungan]);
    }
  }
  public function historyy()
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $pengaduan = DB::table('pengaduan')->where('nik', $no_induk)->paginate(5);
      $kunjungan = DB::table('kunjungan')->where('nik', $no_induk)->paginate(5);
      return view('mobile.page._history', ['pengaduan' => $pengaduan], ['kunjungan' => $kunjungan]);
    }
  }
  public function ticketkunjungan($kode_booking)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $kunjungan = DB::table('kunjungan')->where('kode_booking', $kode_booking)->get();
      $datawbp = DB::table('data_wbp')->get();
      return view('mobile.page._tiketkunjungan', ['datawbp' => $datawbp], ['kunjungan' => $kunjungan]);
    }
  }
  public function tickettamu($kode_booking)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $tamu = DB::table('tamu')->where('kode_booking', $kode_booking)->get();
      return view('mobile.page._tikettamu', ['tamu' => $tamu]);
    }
  }
  public function layananpengaduan()
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      return view('mobile.page._formpengaduan');
    }
  }
  public function inputpengaduan(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $acak = substr(str_shuffle($permitted_chars), 0, 6);
      $tanggal = date('Y-m-d');
      $bukti_pertama = $request->file('bukti_pertama');
      if (empty($bukti_pertama)) {
        $nama_bukti_1 = "-";
      } else {
        $nama_bukti_1 = time() . "_" . $bukti_pertama->getClientOriginalName();
        $uplode_bukti_1 = 'image/Pengaduan/bukti_pertama/';
        $bukti_pertama->move($uplode_bukti_1, $nama_bukti_1);
      }
      $bukti_kedua = $request->file('bukti_kedua');
      if (empty($bukti_kedua)) {
        $nama_bukti_2 = "-";
      } else {
        $nama_bukti_2 = time() . "_" . $bukti_kedua->getClientOriginalName();
        $uplode_bukti_2 = 'image/Pengaduan/bukti_kedua/';
        $bukti_kedua->move($uplode_bukti_2, $nama_bukti_2);
      }

      $insert_p = new pengaduan();
      $insert_p->kode_pengaduan = $acak;
      $insert_p->nik = $request->nik;
      $insert_p->tanggal = $tanggal;
      $insert_p->judul = $request->judul;
      $insert_p->jenis = $request->jenis;
      $insert_p->isi_pengaduan = $request->isi;
      $insert_p->bukti_1 = $nama_bukti_1;
      $insert_p->bukti_2 = $nama_bukti_2;
      $insert_p->alasan = "-";
      $insert_p->status_pengaduan = "PROSES";
      $insert_p->status_bukti = "-";
      $insert_p->file_pembuktian = "-";
      $insert_p->alasan_pembuktian = "-";
      $insert_p->save();
      Session::flash('alert', 'Pengaduan Anda Berhasil Terkirim !!!');
      return redirect('/Apk/Ticket/Pengaduan/{$acak}');
    }
  }
  public function ticketpengaduan($kode_pengaduan)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $pengaduan = DB::table('pengaduan')->where('kode_pengaduan', $kode_pengaduan)->get();
      return view('mobile.page._tiketpengaduan', ['pengaduan' => $pengaduan]);
    }
  }
  public function slip($nik)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $gaji = DB::table('data_gaji')->where('nip', $nik)->paginate(12);
      $tunkin = DB::table('data_tunkir')->where('nip', $nik)->paginate(12);
      return view('mobile.page._slipgajitunkin', ['gaji' => $gaji], ['tunkin' => $tunkin]);
    }
  }
  public function slipp()
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $gaji = DB::table('data_gaji')->where('nip', $nik)->paginate(12);
      $tunkin = DB::table('data_tunkir')->where('nip', $nik)->paginate(12);
      return view('mobile.page._slipgajitunkin', ['gaji' => $gaji], ['tunkin' => $tunkin]);
    }
  }
  public function slipgajitunkin()
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
    }
  }
  public function tiketslipgaji($kode)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $gaji = gaji::where('kode', 'like', "%" . $kode . "%")->get();
      return view('mobile.page._tiketslipgaji', ['gaji' => $gaji]);
    }
  }
  public function tiketsliptunkin($kode)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $tunkir = tunkir::where('kode', 'like', "%" . $kode . "%")->get();
      return view('mobile.page._tiketsliptunkin', ['tunkir' => $tunkir]);
    }
  }
  public function cetakslipgaji($kode)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $gaji = gaji::where('kode', 'like', "%" . $kode . "%")->get();
      $pdf = PDF::loadview('/page/_slip_pdf_gaji', ['gaji' => $gaji])->setPaper('B5', 'Potrait');
      return $pdf->stream();
    }
  }
  public function cetaksliptunkin($kode)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $tunkir = tunkir::where('kode', 'like', "%" . $kode . "%")->get();
      $pdf = PDF::loadview('/page/_slip_pdf_tunkin', ['tunkir' => $tunkir])->setPaper('B5', 'Potrait');
      return $pdf->Download("Slip Gaji Tunkin.pdf");
    }
  }
  public function visimisi()
  {
    $informasi = DB::table('informasi')->get();
    return view('mobile.page._visi_misi', ['informasi' => $informasi]);
  }
  public function strukturorganisasi()
  {
    $informasi = DB::table('informasi')->get();
    return view('mobile.page._struktur_organisasi', ['informasi' => $informasi]);
  }
  public function pusatberkas()
  {
    $pusatberkas = DB::table('dokumen')->get();
    return view('mobile.page._pusat_berkas', ['pusatberkas' => $pusatberkas]);
  }
  public function DonwloadDokumen(Request $request)
  {
    //PDF file is stored under project/public/download/info.pdf
    $myFile = public_path($request->link);
    return response()->download($myFile);
  }
  public function tamu()
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $user = DB::table('users')->get();
      return view('mobile.page._tamu_dinas', ['users' => $user]);
    }
  }
  public function posttamu(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      $nik = $request->NoIdentitas;
      $tanggal = $request->tanggal;
      $keperluan = $request->keperluan;
      $surat = $request->surat;
      $dtanggal = DB::table('kunjungan')->where('tanggal_kunjungan', $tanggal)->count();
      if ($dtanggal > 30) {
        Session::flash('gagal', 'Quota Pendaftaran Tamu Dinas 30 Perhari !!!');
        return redirect('/Apk/Layanan-Tamu');
      } else {
        //jumlah panjang karakter angka dan huruf.
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $acak = substr(str_shuffle($permitted_chars), 0, 6);
        $file = $request->file('surat');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $uplode_file = 'backup_restore/restore/surat/';
        $file->move($uplode_file, $nama_file);
        $insert = new tamu();
        $insert->tanggal = $tanggal;
        $insert->nik = $nik;
        $insert->keperluan = $keperluan;
        $insert->surat = $nama_file;
        $insert->kode_booking = $acak;
        $insert->alasan = "-";
        $insert->status = "PROSES";
        $insert->button = "btn-warning";
        // Proses Save
        $insert->save();
        Session::flash('alert', 'Selamat anda berhasil mendaftar !!');
        return redirect('/Apk/Layanan-Tamu');
      }
    }
  }
  public function galery()
  {
    $media = DB::table('media')->get();
    return view('mobile.page._galery', ['media' => $media]);
  }
  public function lappengamanan()
  {
    if (!Session::get('login')) {
      return redirect('/Apk/login')->with('alert', 'Mohon Maaf Anda Harus Login Terlebih Dahulu, Silahkan Masukan Nomor Identitas dan Password !');
    } else {
      return view('mobile.page._formlappengamanan');
    }
  }
  public function postlappengamanan(Request $request)
  {
    $datetime = date('Y-m-d:H:i:s');
    DB::table('lap_pengamanan')->insert([
      'nik' => $request->nik,
      'jenis_laporan' => $request->jenis,
      'isi_laporan' => $request->isi,
      'pos_pengamanan' => $request->pos,
      'created_at' => $datetime,
      'updated_at' => $datetime,
    ]);
    return view('mobile.page._formlappengamanan');
  }
  public function GetNoIndukWbp($No_Induk)
  {
    $course = DB::table('data_wbp')->where('no_induk', $No_Induk)->get();
    return response()->json($course);
  }
  public function toko()
  {
    $slide = DB::table('slide')->get();
    $galery = DB::table('galery')->get();
    return view('mobile.page._toko', ['slide' => $slide, 'galery' => $galery]);
  }
}
