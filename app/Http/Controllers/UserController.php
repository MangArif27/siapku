<?php

namespace App\Http\Controllers;

use App\ModelUser;
use App\regitrasiimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
  public function login()
  {
    return view('/partials/_login');
  }

  public function postlogin(Request $request)
  {

    $nik = $request->nik;
    $password = $request->password;

    $data = ModelUser::where('nik', $nik)->first();
    if ($data) { //apakah email tersebut ada atau tidak
      if (Hash::check($password, $data->password)) {
        if ($data->status == "PENDING") {
          return redirect('/login')->with('alert', 'Akun Anda Belum Di Setujui Oleh Admin !');
        } else if ($data->status == "USER") {
          return redirect('/login')->with('alert', 'Silahkan Login Melalui Aplikasi SILACI di Playstore !');
        } else if ($data->status == "PEGAWAI") {
          return redirect('/login')->with('alert', 'Silahkan Login Melalui Aplikasi SILACI di Playstore !');
        } else {
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
          return redirect('/');
        }
      } else {
        return redirect('/login')->with('alert', 'Password atau No Identitas, Salah !');
      }
    } else {
      return redirect('/login')->with('alert', 'Password atau No Identitas, Salah !');
    }
  }

  public function logout()
  {
    Session::flush();
    return redirect('/login')->with('alert', 'Kamu sudah logout');
  }

  public function register()
  {
    return view('/partials/_login');
  }

  public function postregister(Request $request)
  {
    $nik = $request->nik;
    $data = ModelUser::where('nik', $nik)->first();
    if ($data) {
      return redirect('/login')->with('alert', 'Maaf No Identitas Sudah Terdaftar Silahkan Login Ulang !!!!');
    } else {
      // Proses Uplode Image
      $photo = $request->file('photo');
      $scan_ktp = $request->file('ktp');
      $nama_photo = time() . "_" . $photo->getClientOriginalName();
      $nama_ktp = time() . "_" . $scan_ktp->getClientOriginalName();
      $uplode_photo = 'image/Photo';
      $uplode_scan_ktp = 'image/Scan_ktp';
      $photo->move($uplode_photo, $nama_photo);
      $scan_ktp->move($uplode_scan_ktp, $nama_ktp);

      $data =  new ModelUser();
      $data->nik = $request->nik;
      $data->nama = $request->nama;
      $data->jenis_kelamin = $request->jenis_kelamin;
      $data->alamat = $request->alamat;
      $data->no_hp = $request->no_hp;
      $data->email = $request->email;
      $data->password = bcrypt($request->password);
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
        'about' => 2,
        'hotline' => 2,
        'layanan_slip' => 2,
        'layanan_download_slip' => 2,
        'survey' => 2,
        'karis' => 2,
        'pensiun' => 2,
        'visi_misi' => 2,
        'struktur_organisasi' => 2,
        'print_surat' => 2,
        'pos_pam' => 2,
        'lap_pam' => 2,
        'print_slip' => 2,
        'r_gaji' => 2,
        'r_tunkin' => 2,
        'slide' => 2,
        'master_dokumen' => 2,
        'backup_data' => 2,
      ]);
      DB::table('menu')->insert([
        'no_identitas' => $request->nik,
        'home' => 2,
        'data' => 2,
        'informasi' => 2,
        'gaji_tunkin' => 2,
        'pengaturan' => 2,
        'pengamanan' => 2,
      ]);
      return redirect('/login')->with('alert', 'Kamu berhasil Register');
    }
  }
}
