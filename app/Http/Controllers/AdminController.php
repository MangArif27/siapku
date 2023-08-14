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
use App\tamu;
use App\tunkir;
use App\pendaftaran;
use App\pengaduan;
use App\kunjungan;
use App\postinformasi;
use App\ModelUser;
use PDF;
use Intervention\Image\Facades\Image;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Stevebauman\Location\Facades\Location;
use App\Imports\DataWBP;
use App\Imports\upload_gaji;
use App\Imports\upload_tunkir;
use DateTime;
use phpDocumentor\Reflection\Location as ReflectionLocation;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
  /*
    Controller Page
    */
  public function home()
  {
    /*$slide = DB::table('slide')->get();
    $galery = DB::table('galery')->get();
    $kepribadian = DB::table('kepribadian')->get();
    return view('/_home', ['slide' => $slide, 'galery' => $galery, 'kepribadian' => $kepribadian]);*/
    $tanggal = [];
    $total_belanja = [];
    $target = [];
    $deviasi = [];
    $SearchData = DB::table('keuangan')->get();
    foreach ($SearchData as $SearchTanggal) {
      $tanggal[] = $SearchTanggal->tanggal;
      $total_belanja[] = $SearchTanggal->total_belanja;
      $target[] = $SearchTanggal->target;
      $deviasi[] = $SearchTanggal->deviasi;
    }
    if (!Session::get('login')) {
      return view('page._landing_page', ['tanggal' => $tanggal, 'total_belanja' => $total_belanja, 'target' => $target, 'deviasi' => $deviasi]);
    } else {
      return view('/_home');
    }
  }
  public function kunjungan()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/public/_layanan_kunjungan', ['informasi' => $informasi]);
  }
  public function integrasi()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/public/_layanan_integrasi', ['informasi' => $informasi]);
  }
  public function remisi()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/public/_layanan_remisi', ['informasi' => $informasi]);
  }
  //Controller Admin
  public function data_wbp()
  {
    $data_wbp = DB::table('data_wbp')->get();
    return view('/page/_data_wbp', ['data_wbp' => $data_wbp]);
  }
  public function postupdatewbp(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      if ($request->status == "ONLINE") {
        $level = "btn-success";
      } elseif ($request->status == "OFFLINE") {
        $level = "btn-danger";
      } else {
        $level = "btn-warning";
      }
      DB::table('data_wbp')->where('no_induk', $request->no_induk)->update([
        'nama' => $request->nama,
        'kamar' => $request->kamar,
        'kejahatan' => $request->kejahatan,
        'status_wbp' => $request->status_wbp,
        'nik_wbp' => $request->nik,
        'pidana' => $request->pidana,
        'tanggal_ditahan' => $request->tgl_ditahan,
        'tanggal_ekspirasi' => $request->tgl_ekspirasi,
        'kegiatan_pembinaan' => $request->pembinaan,
        'skor_pembinaan' => $request->skor_pembinaan,
        'status' => $request->status,
        'button' => $level,
      ]);
      return redirect('/data_wbp');
    }
  }
  public function data_user()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $users = DB::table('users')->get();
      return view('/page/_data_user', ['users' => $users]);
    }
  }
  public function deleteuser($nik)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $delete = DB::table('users')->where('nik', $nik)->first();
      File::delete('image/Photo/' . $delete->photo);
      File::delete('image/Scan_ktp/' . $delete->scan_ktp);
      DB::table('sub_menu')->where('no_identitas', $nik)->delete();
      DB::table('menu')->where('no_identitas', $nik)->delete();
      DB::table('users')->where('nik', $nik)->delete();
      return redirect('/data_pengunjung');
    }
  }
  public function postupdateakun(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      if ($request->status == "ADMIN" || $request->status == "ADMIN PEGAWAI" || $request->status == "ADMIN KUNJUNGAN") {
        $level = "btn-success";
      } elseif ($request->status == "COUNTER PEGAWAI" || $request->status == "COUNTER") {
        $level = "btn-primary";
      } elseif ($request->status == "PEGAWAI" || $request->status == "USER") {
        $level = "btn-warning";
      } else {
        $level = "btn-danger";
      }
      DB::table('pegawai_ruangan')->where('nik', $request->nik)->update([
        'id_ruangan' => $request->ruangan,
      ]);

      DB::table('users')->where('nik', $request->nik)->update([
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
        'status' => $request->status,
        'level' => $level,
      ]);
      DB::table('sub_menu')->where('no_identitas', $request->nik)->update([
        'user' => $request->user,
        'wbp' => $request->wbp,
        'keluarga' => $request->keluarga,
        'penitipan_barang' => $request->penitipan_barang,
        'kunjungan' => $request->kunjungan,
        'video_call' => $request->video_call,
        'tamu_dinas' => $request->tamu_dinas,
        'integrasi' => $request->integrasi,
        'remisi' => $request->remisi,
        'izin_alasan_penting' => $request->iap,
        'layanan_slip' => $request->layanan_slip,
        'layanan_download_slip' => $request->layanan_download_slip,
        'karis' => $request->karis,
        'pengamanan' => 2,
        'visi_misi' => $request->visi_misi,
        'struktur_organisasi' => $request->struktur_organisasi,
        'hotline' => $request->hotline,
        'layanan_pengaduan' => $request->layanan_pengaduan,
        'surat' => $request->surat_ijin,
        'surat_1' => $request->surat_1,
        'surat_2' => $request->surat_2,
        'surat_3' => $request->surat_3,
        'print_surat' => 2,
        'sikawan' => $request->sikawan,
        'form_pengaduan' => $request->form_pengaduan,
        'list_pengaduan' => $request->list_pengaduan,
        'pos_pam' => 2,
        'lap_pam' => 2,
        'pagu' => $request->gaji,
        'gaji' => $request->gaji,
        'tunkin' => $request->tunkin,
        'print_slip' => $request->print_slip,
        'daftar_barang' => $request->daftar_barang,
        'daftar_ruangan' => $request->daftar_ruangan,
        'slide' => $request->slide,
        'galery' => $request->galery,
        'master_dokumen' => $request->master_dokumen,
        'backup_data' => $request->backup_data,
        'about' => $request->about,

      ]);
      DB::table('menu')->where('no_identitas', $request->nik)->update([
        'home' => $request->home,
        'data' => $request->data,
        'informasi' => $request->informasi,
        'layanan_kunjungan' => $request->layanan_kunjungan,
        'layanan_pengaduan' => $request->layanan_pengaduan,
        'gaji_tunkin' => $request->gaji_tunkin,
        'pengamanan' => 2,
        'inventory' => $request->inventory,
        'pengaturan' => $request->pengaturan,
      ]);
      Session::flash('sukses', 'Data Pengguna Berhasil di Update !');
      return redirect('/data_pengunjung');
    }
  }
  public function data_keluarga_inti()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $keluarga_inti = DB::table('keluarga_inti')->get();
      return view('/page/_data_keluarga_inti', ['keluarga_inti' => $keluarga_inti]);
    }
  }
  public function postupdatekeluarga(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      if ($request->status_integrasi == "Pending") {
        $status_integrasi = "Pending";
      } elseif ($request->status_integrasi == "Ditolak") {
        $status_integrasi = "Ditolak";
      } elseif ($request->status_integrasi == "Disetujui") {
        $status_integrasi = "Disetujui";
      } else {
        $status_integrasi = "";
      }
      DB::table('keluarga_inti')->where('nik', $request->nik_keluarga)->update([
        'status' => $request->status_keluarga,
        'status_integrasi' => $status_integrasi,
      ]);
      Session::flash('alert', 'Selamat Update Data Keluarga Inti Berhasil !!');
      return redirect('data_keluarga');
    }
  }
  public function informasi_kunjungan()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_kunjungan', ['informasi' => $informasi]);
  }
  public function postkunjungan(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Layanan Kunjungan")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/informasi_kunjungan');
    }
  }
  public function informasi_integrasi()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_integrasi', ['informasi' => $informasi]);
  }
  public function postintegrasi(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Layanan Integrasi")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/informasi_integrasi');
    }
  }
  public function IAP()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_izin_alasan_penting', ['informasi' => $informasi]);
  }
  public function postIAP(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Izin Alasan Penting")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/izin_alasan_penting');
    }
  }
  public function informasi_remisi()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_remisi', ['informasi' => $informasi]);
  }
  public function postremisi(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Layanan Remisi")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/informasi_remisi');
    }
  }
  public function about()
  {
    $informasi = DB::table('informasi')->get();
    $aplikasi = DB::table('data_aplikasi')->get();
    return view('/page/_about', ['informasi' => $informasi, 'aplikasi' => $aplikasi]);
  }
  public function postabout(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      /*DB::table('informasi')->where('informasi', "Tentang Aplikasi")->update([
        'isi_informasi' => $request->konten,
      ]);*/
      $isi_pesan = $request->isi_pesan;
      DB::table('data_aplikasi')->where('nama_aplikasi', $request->nama_aplikasi)->update([
        'nama_upt' => $request->nama_upt,
        'alamat_upt' => $request->alamat_upt,
        'nama_admin' => $request->nama_admin,
        'wa_admin' => $request->wa_admin,
        'email_admin' => $request->email_admin,
        'wa_toko' => $request->wa_toko,
        'jumlah_wbp' => $request->jumlah_wbp,
        'jumlah_pagu' => $request->jumlah_pagu,
        'pesan' => $request->pesan,
        'isi_pesan' => $isi_pesan,
      ]);
      return redirect('/about');
    }
  }
  public function informasislip()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_slip', ['informasi' => $informasi]);
  }
  public function postinformasislip(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Layanan Slip")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Informasi-Slip');
    }
  }
  public function informasidownloadslip()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_download_slip', ['informasi' => $informasi]);
  }
  public function postinformasidownloadslip(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Layanan Download Slip")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Informasi-Download-Slip');
    }
  }
  public function informasipengaduan()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_pengaduan', ['informasi' => $informasi]);
  }
  public function postinformasipengaduan(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Layanan Pengaduan")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Informasi-Pengaduan');
    }
  }
  public function hotline()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_hotline', ['informasi' => $informasi]);
  }
  public function posthotline(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Hotline")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Hotline');
    }
  }
  public function videocall()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_video_call', ['informasi' => $informasi]);
  }
  public function postvideocall(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Video Call")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Video-Call');
    }
  }
  public function tamudinas()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_tamu_dinas', ['informasi' => $informasi]);
  }
  public function posttamudinas(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Tamu Dinas")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Tamu-Dinas');
    }
  }
  public function penitipanbarang()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_penitipan_barang', ['informasi' => $informasi]);
  }
  public function postpenitipanbarang(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Penitipan Barang")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Penitipan-Barang');
    }
  }
  public function informasisurvey()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_survey', ['informasi' => $informasi]);
  }
  public function postinformasisurvey(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Layanan Survey")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Informasi-Survey');
    }
  }
  public function informasikaris()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_karis', ['informasi' => $informasi]);
  }
  public function postinformasikaris(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Layanan Kartu Istri/Suami")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Informasi-Karis');
    }
  }
  public function informasipengamanan()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_informasi_pengamanan', ['informasi' => $informasi]);
  }
  public function postinformasipengamanan(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Layanan Laporan Pengaman")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Informasi-Pensiun');
    }
  }
  public function visi_misi()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_visi_misi', ['informasi' => $informasi]);
  }
  public function postvisi_misi(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Visi Misi")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Visi-Misi');
    }
  }
  public function struktur_organisasi()
  {
    $informasi = DB::table('informasi')->get();
    return view('/page/_struktur_organisasi', ['informasi' => $informasi]);
  }
  public function poststruktur_organisasi(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('informasi')->where('informasi', "Struktur Organisasi")->update([
        'isi_informasi' => $request->konten,
      ]);
      return redirect('/Struktur-Organisasi');
    }
  }
  public function slide()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $slide = DB::table('slide')->get();
      return view('/page/_slide', ['slide' => $slide]);
    }
  }
  public function postslide(Request $request)
  {
    // Proses Uplode Image
    $slide = $request->file('slide');
    $nama_slide = time() . "_" . $slide->getClientOriginalExtension();
    $uplode_slide = public_path('image/Slide');
    $img = Image::make($slide->path());
    $img->resize(2300, 1000)->save($uplode_slide . '/' . $nama_slide);
    $data =  new slide();
    $data->image = $nama_slide;
    // Proses Save
    $data->save();
    return redirect('/slide');
  }
  public function deleteslide($image)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $delete = slide::where('image', $image)->first();
      File::delete('image/Slide/' . $delete->image);

      slide::where('image', $image)->delete();
      return redirect('/slide');
    }
  }
  public function pembinaan_kemandirian()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $galery = DB::table('galery')->get();
      return view('/page/_pembinaan_kemandirian', ['galery' => $galery]);
    }
  }
  public function postpembinaan_kemandirian(Request $request)
  {
    // Proses Uplode Image
    $galery = $request->file('file_barang');
    $nama_galery = time() . "jpg";
    $uplode_galery = 'image/Galery';
    $img = Image::make($galery->path());
    $img->resize(500, 500)->save($uplode_galery . '/' . $nama_galery);
    $data =  new galery();
    $data->link = $request->link;
    $data->nama_barang = $request->nama_barang;
    $data->harga = $request->harga_barang;
    $data->file = $nama_galery;
    // Proses Save
    $data->save();
    return redirect('/Pembinaan-Kemandirian');
  }
  public function deletekemandirian($kode)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $delete = galery::where('id', $kode)->first();
      File::delete('image/Galery/' . $delete->image);

      galery::where('id', $kode)->delete();
      return redirect('/Pembinaan-Kemandirian');
    }
  }
  public function pembinaan_kepribadian()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $kepribadian = DB::table('kepribadian')->get();
      return view('/page/_pembinaan_kepribadian', ['kepribadian' => $kepribadian]);
    }
  }
  public function postpembinaan_kepribadian(Request $request)
  {
    // Proses Uplode Image
    $galery = $request->file('image');
    $nama_galery = $request->nama_kegiatan . "jpg";
    $uplode_galery = 'image/Galery';
    $img = Image::make($galery->path());
    $img->resize(500, 500)->save($uplode_galery . '/' . $nama_galery);
    $data =  new kepribadian();
    $data->nama_kegiatan = $request->nama_kegiatan;
    $data->deskripsi = $request->deskripsi;
    $data->link = $request->link;
    $data->image = $nama_galery;
    // Proses Save
    $data->save();
    return redirect('/Pembinaan-Kepribadian');
  }
  public function deletekepribadian($image)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $delete = kepribadian::where('image', $image)->first();
      File::delete('image/Galery/' . $delete->image);

      kepribadian::where('image', $image)->delete();
      return redirect('/Pembinaan-kepribadian');
    }
  }
  public function dokumen()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $dokumen = DB::table('dokumen')->get();
      return view('/page/_master_dokumen', ['dokumen' => $dokumen]);
    }
  }
  public function postdokumen(Request $request)
  {
    // Proses Uplode Image
    $file = $request->file('file');
    $nama_file = time() . "_" . $file->getClientOriginalName();
    $uplode_file = 'backup_restore/restore/dokumen';
    $file->move($uplode_file, $nama_file);
    $data =  new dokumen();
    $data->nama_file = $request->nama_file;
    $data->link = $nama_file;
    // Proses Save
    $data->save();
    return redirect('/master-dokumen');
  }
  public function deletedokumen($link)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $delete = dokumen::where('nama_file', $link)->first();
      File::delete('backup_restore/restore/dokumen/' . $delete->link);

      dokumen::where('nama_file', $link)->delete();
      return redirect('/master-dokumen');
    }
  }
  public function backup_restore()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $backup = DB::table('backup')->get();
      return view('/page/_backup_restore', ['backup' => $backup]);
    }
  }
  public function postuploadwbp(Request $request)
  {
    DB::table('data_wbp')->truncate();
    $this->validate($request, [
      'file' => 'required|mimes:csv,xls,xlsx'
    ]);
    $file = $request->file('file');
    $nama_file = time() . $file->getClientOriginalName();
    $path = 'backup_restore/restore/wbp/';
    $file->move($path, $nama_file);
    Excel::import(new DataWBP(), public_path('/backup_restore/restore/wbp/' . $nama_file));
    DB::table('backup')->insert([
      'file_backup' => $nama_file,
      'status_file' => "Upload",
      'tabel' => "Data WBP",
      'tanggal_backup' => date('Y-m-d'),
    ]);
    Session::flash('sukses', 'Data WBP Berhasil Diimport!');
    return redirect('/data_wbp');
  }
  public function deleterestorewbp($file_backup)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $delete = backup::where('file_backup', $file_backup)->first();
      File::delete('backup_restore/restore/wbp/' . $delete->file_backup);

      backup::where('file_backup', $file_backup)->delete();
      return redirect('/backup');
    }
  }
  public function deleterestoregaji($file_backup)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $delete = backup::where('file_backup', $file_backup)->first();
      File::delete('backup_restore/restore/gaji/' . $delete->file_backup);

      backup::where('file_backup', $file_backup)->delete();
      return redirect('/backup');
    }
  }
  public function deleterestoretunkir($file_backup)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $delete = backup::where('file_backup', $file_backup)->first();
      File::delete('backup_restore/restore/tunkir/' . $delete->file_backup);

      backup::where('file_backup', $file_backup)->delete();
      return redirect('/backup');
    }
  }
  public function pendaftaran_kunjungan()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $data_wbp = DB::table('data_wbp')->get();
      $user = DB::table('users')->get();
      return view('/page/_pendaftaran_kunjungan', ['data_wbp' => $data_wbp], ['users' => $user]);
    }
  }
  public function sikawan()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $date = date("Y-m-d");
      $sikawan = DB::table('waktu_kujungan')->where('tanggal_kunjungan', $date)->orderBy('id', 'DESC')->get();
      return view('/page/_sikawan', ['sikawan' => $sikawan]);
    }
  }
  public function postinputsikawan(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $date = date("Y-m-d");
      DB::table('waktu_kujungan')->insert([
        'nama_wbp' => $request->nama_wbp,
        'kamar_wbp' => $request->kamar_wbp,
        'waktu' => $request->waktu,
        'tanggal_kunjungan' => $date,
        'status' => "Belum Dimulai"
      ]);
      return redirect('/sikawan')->with('sukses', 'Data Kunjungan Berhasil Disimpan');
    }
  }
  public function postupdatesikawan($id)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $date = date("Y-m-d H:i:s");
      $time = date("H:i:s");
      $cari = DB::table('waktu_kujungan')->where('id', $id)->first();
      $WaktuKunjungan = date("Y-m-d H:i:s", strtotime("$cari->waktu minutes", strtotime($time)));
      DB::table('waktu_kujungan')->where('id', $id)->update([
        'waktu_mulai' => $date,
        'waktu_selesai' => $WaktuKunjungan,
        'status' => "Belum Selesai"
      ]);
      return redirect('/sikawan')->with('sukses', 'Data Kunjungan Berhasil Disimpan');
    }
  }
  public function pendaftaran($no_induk)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $data = BackupWBP::where('no_induk', $no_induk)->first();
      if ($data) {
        $data_wbp = BackupWBP::where('no_induk', $no_induk)->get();
        $user = DB::table('users')->get();
        return view('/page/_pendaftaran', ['data_wbp' => $data_wbp], ['users' => $user]);
      } else {
        return redirect($no_induk);
      }
    }
  }
  public function postdaftarkunjungan(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $nik = $request->nik_pengunjung;
      $tanggal = $request->tanggal;
      $wbp = $request->no_induk_wbp;
      $dtanggal = pendaftaran::where('tanggal_kunjungan', $tanggal)->count();
      if ($dtanggal > 30) {
        Session::flash('gagal', 'Kuota Pendaftar Sudah Melebihi 30 Pendaftar Perhari, Silahkan Daftar Dihari Yang Lain !!!');
        return redirect('/pendaftaran_kunjungan');
      } else {
        $data = pendaftaran::where('no_induk', $wbp)->Where('nik', $nik)->Where('tanggal_kunjungan', $tanggal)->first();
        if ($data) {
          Session::flash('gagal', 'Maaf Anda Tidak Bisa Daftar Dengan WBP Di Hari Yang Sama !!!');
          return redirect('/pendaftaran_kunjungan');
        } else {
          //jumlah panjang karakter angka dan huruf.
          $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $acak = substr(str_shuffle($permitted_chars), 0, 6);
          $count = count(array($request->nik_pengikut)) - 1;
          for ($i = 0; $i < $count; $i++) {
            $insert_p = new Kunjungan();
            $insert_p->tanggal_kunjungan = $tanggal;
            $insert_p->no_induk = $wbp;
            $insert_p->nik = $nik;
            $insert_p->nik_pengikut = $request->nik_pengikut[$i];
            $insert_p->nama = $request->nama_pengikut[$i];
            $insert_p->alamat = $request->alamat_pengikut[$i];
            $insert_p->save();
          }
        }
        $insert = new pendaftaran();
        $insert->tanggal_kunjungan = $tanggal;
        $insert->no_induk = $wbp;
        $insert->nik = $nik;
        $insert->status_keluarga = $request->hubungan;
        $insert->kode_booking = $acak;
        $insert->status = "PROSES";
        $insert->button = "btn-warning";
        // Proses Save
        $insert->save();
        $tanggal = date('Y-m-d');
        Session::flash('sukses', 'Selamat Anda Berhasil Mendaftar Silahkan Datang Pada Tanggal Yang Telah Ditentukan !!!');
        return redirect('/surat_ijin');
      }
    }
  }
  public function pengaduan()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $user = DB::table('users')->get();
      return view('/page/_pengaduan', ['users' => $user]);
    }
  }
  public function inputpengaduan(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $acak = substr(str_shuffle($permitted_chars), 0, 6);
      $tanggal = date('Y-m-d');
      $bukti_pertama = $request->file('bukti_pertama');
      if (empty($bukti_pertama)) {
        $nama_bukti_1 = "-";
      } else {
        $nama_bukti_1 = time() . "_" . $bukti_pertama->getClientOriginalName();
        $uplode_bukti_1 = 'image/Pengaduan/bukti_pertama';
        $bukti_pertama->move($uplode_bukti_1, $nama_bukti_1);
      }
      $bukti_kedua = $request->file('bukti_kedua');
      if (empty($bukti_kedua)) {
        $nama_bukti_2 = "-";
      } else {
        $nama_bukti_2 = time() . "_" . $bukti_kedua->getClientOriginalName();
        $uplode_bukti_2 = 'image/Pengaduan/bukti_kedua';
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
      $tanggal = date('Y-m-d');
      Session::flash('sukses', 'Pengaduan Anda Berhasil Terkirim !!!');
      return redirect('/history_pengaduan');
    }
  }
  public function updatepengaduan(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $file_pembuktian = $request->file('file');
      if (empty($file_pembuktian)) {
        $nama_file_pembuktian = "-";
      } else {
        $nama_file_pembuktian = time() . $request->file('file')->getClientOriginalName();
        $file_pembuktian_upload = 'image/Pengaduan/File_Pembuktian/';
        $file_pembuktian->move($file_pembuktian_upload, $nama_file_pembuktian);
      }
      DB::table('pengaduan')->where('kode_pengaduan', $request->kode)->update([
        'alasan' => $request->alasan,
        'status_pengaduan' => $request->status_pengaduan,
        'status_bukti' => $request->status_bukti,
        'file_pembuktian' => $nama_file_pembuktian,
        'alasan_pembuktian' => $request->alasan_pembuktian
      ]);
      Session::flash('sukses', 'Anda Berhasil Mengupdate Pengaduan !!!');
      $user = DB::table('users')->get();
      $pengaduan = DB::table('pengaduan')->get();
      return view('/page/_list_pengaduan', ['users' => $user], ['pengaduan' => $pengaduan]);
    }
  }
  public function historypengaduan()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $user = DB::table('users')->get();
      $pengaduan = DB::table('pengaduan')->get();
      return view('/page/_list_pengaduan', ['users' => $user], ['pengaduan' => $pengaduan]);
    }
  }
  public function deletepengaduan($pengaduan)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $delete = DB::table('pengaduan')->where('kode_pengaduan', $pengaduan)->first();
      File::delete('image/Pengaduan/bukti_pertama/' . $delete->bukti_1);
      File::delete('image/Pengaduan/bukti_kedua/' . $delete->bukti_2);

      DB::table('pengaduan')->where('kode_pengaduan', $pengaduan)->delete();
      return redirect('/history_pengaduan');
    }
  }
  //End Controller Admin

  //Controller Print
  public function surat_ijin()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $kunjungan = DB::table('kunjungan')->where('keperluan', 'Kunjungan Tatap Muka')->get();
      return view('/page/_surat_ijin', ['kunjungan' => $kunjungan]);
    }
  }
  public function HistoryPenitipanBarang()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $kunjungan = DB::table('kunjungan')->where('keperluan', 'Penitipan Barang')->get();
      return view('/page/_penitipan_barang', ['kunjungan' => $kunjungan]);
    }
  }
  public function HistoryVideoCall()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $kunjungan = DB::table('kunjungan')->where('keperluan', 'Video Call')->get();
      return view('/page/_video_call', ['kunjungan' => $kunjungan]);
    }
  }
  public function HistoryTamuDinas()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $tamu = DB::table('tamu')->get();
      return view('/page/_tamu_dinas', ['tamu' => $tamu]);
    }
  }
  public function counter()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $kunjungan = DB::table('kunjungan')->get();
      $slide = DB::table('slide')->get();
      return redirect('/page/_counter', ['kunjungan' => $kunjungan], ['slide' => $slide]);
    }
  }
  public function postcounteradmin(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      if ($request->layanan == "penitipan barang") {
        if ($request->status == "PROSES") {
          if (isEmpty($request->file('serahterima1'))) {
            $fileijin1 = $request->file('serahterima1');
            $nama_suratijin1 = $fileijin1->getClientOriginalName();
            $uplode_suratijin1 = 'backup_restore/restore/serhterima/';
            $fileijin1->move($uplode_suratijin1, $nama_suratijin1);
            $status = "DIKIRIM";
            $kode = $request->kode;
            $print = pendaftaran::where('kode_booking', $kode)->first();
            $print->foto_in = $nama_suratijin1;
            $print->status = $status;
            $print->button = "btn-succes";
            $print->save();
          } else {
            $nama_suratijin1 = "-";
            $status = "DIKIRIM";
            $kode = $request->kode;
            $print = pendaftaran::where('kode_booking', $kode)->first();
            $print->foto_in = $nama_suratijin1;
            $print->status = $status;
            $print->button = "btn-succes";
            $print->save();
          }
          return redirect('/History-Penitipan-Barang')->with('sukses', 'Data Kunjungan Berhasil Di Update');
        } else if ($request->status == "DIKIRIM") {
          if (isEmpty($request->file('serahterima'))) {
            $fileijin = $request->file('serahterima');
            $nama_suratijin = $fileijin->getClientOriginalName();
            $uplode_suratijin = 'backup_restore/restore/serhterima/';
            $fileijin->move($uplode_suratijin, $nama_suratijin);
            $status = "SELESAI";
            $kode = $request->kode;
            $print = pendaftaran::where('kode_booking', $kode)->first();
            $print->foto = $nama_suratijin;
            $print->status = $status;
            $print->button = "btn-succes";
            $print->save();
          } else {
            $nama_suratijin = "-";
            $status = "DIKIRIM";
            $kode = $request->kode;
            $print = pendaftaran::where('kode_booking', $kode)->first();
            $print->foto = $nama_suratijin;
            $print->status = $status;
            $print->button = "btn-succes";
            $print->save();
          }
          return redirect('/History-Penitipan-Barang')->with('sukses', 'Data Kunjungan Berhasil Di Update');
        } else if ($request->status == "SELESAI") {
          $status = "SELESAI";
          $kode = $request->kode;
          if (empty($request->file('serahterima1'))) {
            $nama_suratijin1 = $request->namafile_1;
          } else {
            $fileijin1 = $request->file('serahterima1');
            $nama_suratijin1 = $fileijin1->getClientOriginalName();
            $uplode_suratijin1 = 'backup_restore/restore/serhterima/';
            $fileijin1->move($uplode_suratijin1, $nama_suratijin1);
          }
          if (empty($request->file('serahterima'))) {
            $nama_suratijin = $request->namafile;
          } else {
            $fileijin = $request->file('serahterima');
            $nama_suratijin = $fileijin->getClientOriginalName();
            $uplode_suratijin = 'backup_restore/restore/serhterima/';
            $fileijin->move($uplode_suratijin, $nama_suratijin);
          }
          $print = pendaftaran::where('kode_booking', $kode)->first();
          $print->foto_in = $nama_suratijin1;
          $print->foto = $nama_suratijin;
          $print->status = $status;
          $print->button = "btn-succes";
          $print->save();
          return redirect('/History-Penitipan-Barang')->with('sukses', 'Data Kunjungan Berhasil Di Update');
        } else {
          return redirect('/History-Penitipan-Barang')->with('sukses', 'Data Kunjungan Berhasil Di Update');
        }
      } else {
        $status = "Selesai";
        $kode = $request->kode;
        $print = pendaftaran::where('kode_booking', $kode)->first();
        $print->status = $status;
        $print->button = "btn-succes";
        $print->save();
      }
      return redirect('/surat_ijin')->with('sukses', 'Data Kunjungan Berhasil Di Update');
    }
  }
  public function postupdatetamudinas(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $kode = $request->kode;
      $status = $request->status;
      $alasan = $request->alasan;
      if ($status == "PROSES") {
        $btn = "btn-warning";
      } else if ($status == "TIDAK DI IJINKAN") {
        $btn = "btn-danger";
      } else {
        $btn = "btn-success";
      }
      $print = tamu::where('kode_booking', $kode)->first();
      $print->status = $status;
      $print->alasan = $alasan;
      $print->button = $btn;
      $print->save();

      return redirect('/History-Tamu-Dinas');
    }
  }
  public function postcounterkunjungan(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $kode = $request->kode;
      $print = pendaftaran::where('kode_booking', $kode)->first();
      $print->status = "SELESAI";
      $print->button = "btn-succes";
      $print->save();
      $tanggal = date('Y-m-d');
      $cari = DB::table('ratings')->where('tanggal', $tanggal)->where('jenis_layanan', "Layanan ATM Kunjungan")->first();
      if ($cari) {
        if ($request->ratings == 1) {
          $sangat_buruk = $cari->sangat_buruk + 1;
          DB::table('ratings')->where('tanggal', $tanggal)->where('jenis_layanan', "Layanan ATM Kunjungan")->update([
            'sangat_buruk' => $sangat_buruk,
          ]);
        } else if ($request->ratings == 2) {
          $buruk = $cari->buruk + 1;
          DB::table('ratings')->where('tanggal', $tanggal)->where('jenis_layanan', "Layanan ATM Kunjungan")->update([
            'buruk' => $buruk,
          ]);
        } else if ($request->ratings == 3) {
          $kurang = $cari->kurang + 1;
          DB::table('ratings')->where('tanggal', $tanggal)->where('jenis_layanan', "Layanan ATM Kunjungan")->update([
            'kurang' => $kurang,
          ]);
        } else if ($request->ratings == 4) {
          $cukup = $cari->cukup + 1;
          DB::table('ratings')->where('tanggal', $tanggal)->where('jenis_layanan', "Layanan ATM Kunjungan")->update([
            'cukup' => $cukup,
          ]);
        } else if ($request->ratings == 5) {
          $baik = $cari->baik + 1;
          DB::table('ratings')->where('tanggal', $tanggal)->where('jenis_layanan', "Layanan ATM Kunjungan")->update([
            'baik' => $baik,
          ]);
        } else if ($request->ratings == 6) {
          $sangat_baik = $cari->sangat_baik + 1;
          DB::table('ratings')->where('tanggal', $tanggal)->where('jenis_layanan', "Layanan ATM Kunjungan")->update([
            'sangat_baik' => $sangat_baik,
          ]);
        }
      } else {
        if ($request->ratings == 1) {
          $sangat_buruk = 1;
          DB::table('ratings')->insert([
            'jenis_layanan' => "Layanan ATM Kunjungan",
            'kurang' => 0,
            'sangat_buruk' => 1,
            'cukup' => 0,
            'buruk' => 0,
            'baik' => 0,
            'sangat_baik' => 0,
            'tanggal' => $tanggal,
          ]);
        } else if ($request->ratings == 2) {
          $buruk = 1;
          DB::table('ratings')->insert([
            'jenis_layanan' => "Layanan ATM Kunjungan",
            'kurang' => 0,
            'sangat_buruk' => 0,
            'cukup' => 0,
            'buruk' => 1,
            'baik' => 0,
            'sangat_baik' => 0,
            'tanggal' => $tanggal,
          ]);
        } else if ($request->ratings == 3) {
          $kurang = 1;
          DB::table('ratings')->insert([
            'jenis_layanan' => "Layanan ATM Kunjungan",
            'kurang' => 1,
            'sangat_buruk' => 0,
            'cukup' => 0,
            'buruk' => 0,
            'baik' => 0,
            'sangat_baik' => 0,
            'tanggal' => $tanggal,
          ]);
        } else if ($request->ratings == 4) {
          $cukup = 1;
          DB::table('ratings')->insert([
            'jenis_layanan' => "Layanan ATM Kunjungan",
            'kurang' => 0,
            'sangat_buruk' => 0,
            'cukup' => 1,
            'buruk' => 0,
            'baik' => 0,
            'sangat_baik' => 0,
            'tanggal' => $tanggal,
          ]);
        } else if ($request->ratings == 5) {
          $baik = 1;
          DB::table('ratings')->insert([
            'jenis_layanan' => "Layanan ATM Kunjungan",
            'kurang' => 0,
            'sangat_buruk' => 0,
            'cukup' => 0,
            'buruk' => 0,
            'baik' => 1,
            'sangat_baik' => 0,
            'tanggal' => $tanggal,
          ]);
        } else if ($request->ratings == 6) {
          $sangat_baik = 1;
          DB::table('ratings')->insert([
            'jenis_layanan' => "Layanan ATM Kunjungan",
            'kurang' => 0,
            'sangat_buruk' => 0,
            'cukup' => 0,
            'buruk' => 0,
            'baik' => 0,
            'sangat_baik' => 1,
            'tanggal' => $tanggal,
          ]);
        }
      }
      return view('/page/_ticket', ['kunjungan' => $print]);
    }
  }
  //End Controller Print

  //Start PEGAWAI
  public function realisasipagu()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $keuangan = DB::table('keuangan')->get();
      return view('/page/_realisasi_pagu', ['keuangan' => $keuangan]);
    }
  }
  public function insertrealisasi(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $datetimenow = date('Y-m-d H:i:s');
      DB::table('keuangan')->insert([
        'tanggal' => $request->tanggal,
        'realisasi_pagu' => $request->realisasi_pagu,
        'total_belanja' => $request->total_belanja,
        'target' => $request->target,
        'deviasi' => $request->deviasi,
        'created_at' => $datetimenow,
        'updated_at' => $datetimenow,
      ]);
      return redirect('/Realisasi-Pagu');
    }
  }
  public function updaterealisasi(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $datetimenow = date('Y-m-d H:i:s');
      DB::table('keuangan')->where('id', $request->id)->update([
        'tanggal' => $request->tanggal,
        'realisasi_pagu' => $request->realisasi_pagu,
        'total_belanja' => $request->total_belanja,
        'target' => $request->target,
        'deviasi' => $request->deviasi,
        'updated_at' => $datetimenow,
      ]);
      return redirect('/Realisasi-Pagu');
    }
  }
  public function deleterealisasi($id)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('keuangan')->where('id', $id)->delete();
      return redirect('/Realisasi-Pagu');
    }
  }
  public function riwayatgaji()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $gaji = DB::table('data_gaji')->get();
      return view('/page/_riwayat_gaji', ['gaji' => $gaji]);
    }
  }
  public function deletegaji($kode)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('data_gaji')->where('kode', $kode)->delete();

      return redirect('/Riwayat_Gaji');
    }
  }
  public function riwayattunkir()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $tunkir = DB::table('data_tunkir')->get();
      return view('/page/_riwayat_tunkir', ['tunkir' => $tunkir]);
    }
  }
  public function deletetunkin($kode)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('data_tunkir')->where('kode', $kode)->delete();

      return redirect('/Riwayat_Tunkir');
    }
  }
  public function uploadgaji(Request $request)
  {
    $this->validate($request, [
      'file' => 'required|mimes:csv,xls,xlsx'
    ]);
    $file = $request->file('file');
    $nama_file = time() . $file->getClientOriginalName();
    $path = 'backup_restore/restore/gaji/';
    $file->move($path, $nama_file);
    Excel::import(new upload_gaji(), public_path('backup_restore/restore/gaji/' . $nama_file));
    DB::table('backup')->insert([
      'file_backup' => $nama_file,
      'status_file' => "Upload",
      'tabel' => "Data Gaji",
      'tanggal_backup' => date('Y-m-d'),
    ]);
    Session::flash('sukses', 'Data Gaji Berhasil Diimport!');
    return redirect('/Riwayat_Gaji');
  }
  public function uploadtunkir(Request $request)
  {
    $this->validate($request, [
      'file' => 'required|mimes:csv,xls,xlsx'
    ]);
    $file = $request->file('file');
    $nama_file = time() . $file->getClientOriginalName();
    $path = 'backup_restore/restore/tunkir/';
    $file->move($path, $nama_file);
    Excel::import(new upload_tunkir(), public_path('backup_restore/restore/tunkir/' . $nama_file));
    DB::table('backup')->insert([
      'file_backup' => $nama_file,
      'status_file' => "Upload",
      'tabel' => "Data Tunkin",
      'tanggal_backup' => date('Y-m-d'),
    ]);
    Session::flash('sukses', 'Data Tunjangan Kinerja Berhasil Diimport!');
    return redirect('/Riwayat_Tunkir');
  }
  public function postcounterpegawai(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $nip = $request->nip;
      $gaji = gaji::where('kode', $nip)->get();
      $tunkir = tunkir::where('kode', $nip)->get();
      return view('/page/_slip_gaji_tunkir', ['gaji' => $gaji, 'tunkir' => $tunkir]);
    }
  }
  public function counterpegawai()
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $slide = DB::table('slide')->get();
      return view('/page/_counter_pegawai', ['slide' => $slide]);
    }
  }
  public function cetakslipgaji($kode)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $gaji = gaji::where('kode', 'like', "%" . $kode . "%")->get();
      $pdf = PDF::loadview('/page/_slip_pdf_gaji', ['gaji' => $gaji])->setPaper('B5', 'Potrait');
      return $pdf->Download("Slip Gaji Tunkin.pdf");
    }
  }
  public function cetaksliptunkin($kode)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      $tunkir = tunkir::where('kode', 'like', "%" . $kode . "%")->get();
      $pdf = PDF::loadview('/page/_slip_pdf_tunkin', ['tunkir' => $tunkir])->setPaper('B5', 'Potrait');
      return $pdf->Download("Slip Gaji Tunkin.pdf");
    }
  }

  public function cekslip($kode)
  {
    $cek = gaji::where('kode', $kode)->first();
    if ($cek) {
      $gaji = gaji::where('kode', 'like', "%" . $kode . "%")->get();
      $tunkir = tunkir::where('kode', 'like', "%" . $kode . "%")->get();
      return view('/page/_cek_slip', ['gaji' => $gaji, 'tunkir' => $tunkir]);
    } else {
      return redirect('/login')->with('alert', 'Maaf Barcode Anda Tidak Sesuai !');
    }
  }
  public function updategaji(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('data_gaji')->where('kode', $request->kode)->update([
        'nip' => $request->no_induk,
        'rekening_gaji' => $request->rekening,
        'nama_rekening' => $request->nama_rekening,
        'gaji_pokok' => $request->gaji_pokok,
        'tunjangan_pasangan' => $request->tunjangan_pasangan,
        'tunjangan_anak' => $request->tunjangan_anak,
        'tunjangan_umum' => $request->tunjangan_umum,
        'tunjangan_ta_umum' => $request->tunjangan_ta_umum,
        'tunjangan_papua' => $request->tunjangan_papua,
        'tunjangan_terpencil' => $request->tunjangan_terpencil,
        'tunjangan_struktur' => $request->tunjangan_struktur,
        'tunjangan_lain' => $request->tunjangan_lain,
        'tunjangan_fungsi' => $request->tunjangan_fungsi,
        'tunjangan_beras' => $request->tunjangan_beras,
        'iwp' => $request->iwp,
        'bpjs' => $request->bpjs,
        'sewa_rumah' => $request->sewa_rumah,
        'tunggakan' => $request->tunggakan,
        'utang' => $request->utang,
        'potongan_lain' => $request->potongan_lain,
        'potongan_pph' => $request->potongan_pph,
        'taperum' => $request->taperum,
      ]);
      return redirect('/Riwayat_Gaji');
    }
  }
  public function updatetunkir(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('data_tunkir')->where('kode', $request->kode)->update([
        'nip' => $request->no_induk,
        'rekening_tunkir' => $request->rekening,
        'nama_rekening' => $request->nama_rekening,
        'tunker' => $request->tunker,
        'potongan_atribut' => $request->potongan_atribut,
        'potongan_koperasi' => $request->potongan_koperasi,
        'potongan_arisan_dwp' => $request->potongan_arisan_dwp,
        'potongan_arisan_pipas' => $request->potongan_arisan_pipas,
        'potongan_bjb' => $request->potongan_bjb,
        'potongan_simpanan_wajib' => $request->potongan_simpanan_wajib,
      ]);
      return redirect('/Riwayat_Tunkir');
    }
  }
  public function insertgaji(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('data_gaji')->insert([
        'nip' => $request->no_induk,
        'rekening_gaji' => $request->rekening,
        'nama_rekening' => $request->nama_rekening,
        'gaji_pokok' => $request->gaji_pokok,
        'penerimaan_bulan' => $request->bulan,
        'penerimaan_tahun' => $request->tahun,
        'tunjangan_pasangan' => $request->tunjangan_pasangan,
        'tunjangan_anak' => $request->tunjangan_anak,
        'tunjangan_umum' => $request->tunjangan_umum,
        'tunjangan_ta_umum' => $request->tunjangan_ta_umum,
        'tunjangan_papua' => $request->tunjangan_papua,
        'tunjangan_terpencil' => $request->tunjangan_terpencil,
        'tunjangan_struktur' => $request->tunjangan_struktur,
        'tunjangan_lain' => $request->tunjangan_lain,
        'tunjangan_fungsi' => $request->tunjangan_fungsi,
        'tunjangan_beras' => $request->tunjangan_beras,
        'iwp' => $request->iwp,
        'bpjs' => $request->bpjs,
        'sewa_rumah' => $request->sewa_rumah,
        'tunggakan' => $request->tunggakan,
        'utang' => $request->utang,
        'potongan_lain' => $request->potongan_lain,
        'potongan_pph' => $request->potongan_pph,
        'taperum' => $request->taperum,
        'kode' => $request->kode,
      ]);
      return redirect('/Riwayat_Gaji');
    }
  }
  public function inserttunkir(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('data_tunkir')->insert([
        'nip' => $request->no_induk,
        'rekening_tunkir' => $request->rekening,
        'nama_rekening' => $request->nama_rekening,
        'tunker' => $request->tunker,
        'penerimaan_bulan' => $request->bulan,
        'penerimaan_tahun' => $request->tahun,
        'potongan_atribut' => $request->potongan_atribut,
        'potongan_koperasi' => $request->potongan_koperasi,
        'potongan_arisan_dwp' => $request->potongan_arisan_dwp,
        'potongan_arisan_pipas' => $request->potongan_arisan_pipas,
        'potongan_bjb' => $request->potongan_bjb,
        'potongan_simpanan_wajib' => $request->potongan_simpanan_wajib,
        'kode' => $request->kode,
      ]);
      return redirect('/Riwayat_Tunkir');
    }
  }
  public function updateuser(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('users')->where('nik', $request->nik)->update([
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
      ]);
      $data = DB::table('detail_user')->where('no_identitas', $request->nik)->first();
      if ($data) {
        DB::table('detail_user')->where('no_identitas', $request->nik)->update([
          'seksi' => $request->seksi,
          'sub_seksi' => $request->sub,
        ]);
      } else {
        DB::table('detail_user')->insert([
          'no_identitas' => $request->nik,
          'seksi' => $request->seksi,
          'sub_seksi' => $request->sub,
        ]);
      }
      return redirect('/data_pengunjung');
    }
  }
  public function updateakunpribadi(Request $request)
  {
    if (!Session::get('login')) {
      return redirect('/login')->with('alert', 'Kamu harus login dulu');
    } else {
      DB::table('users')->where('nik', $request->nik)->update([
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'email' => $request->email,
      ]);
      return redirect('/');
    }
  }
  public function sub_seksi($id)
  {
    $states = DB::table('seksi')->where('seksi', $id)->pluck("sub_seksi", "kode_sub");
    return json_encode($states);
  }

  //End Pegawai

  // surat
  public function surat()
  {
    $kode_surat = DB::table('kode_surat')->pluck("ket_bidang", "kode_bidang");
    return view('/page/_surat', compact('kode_surat'));
  }
  public function generate_nomor(Request $request)
  {
    $date = date('Y-m-d');
    $Y = date('Y');
    $tahun_baru = $Y . "-01-01";
    if ($request->tgl_surat > $date) {
      return redirect('Surat')->with('gagal', 'Maaf Tanggal Harus Sama dengan Hari Ini !');
    } else if ($request->tgl_surat == $date) {
      if ($request->tgl_surat == $tahun_baru) {
        $nomor_surat = 1;
        $no_surat = "W.PAS.PAS." . $request->bagcategory . "-" . $nomor_surat;
        DB::table('nomor_surat')->insert([
          'no_identitas' => $request->nik,
          'tgl_surat' => $request->tgl_surat,
          'no_surat' => $nomor_surat,
          'no_surat_full' => $no_surat,
          'perihal' => $request->perihal,
          'surat_kpd' => $request->surat_kpd,
        ]);
      } else {
        $data_no = DB::table('nomor_surat')->max('no_surat');
        $nomor_surat = $data_no + 1;
        $no_surat = "W.PAS.PAS." . $request->bagcategory . "-" . $nomor_surat;
        DB::table('nomor_surat')->insert([
          'no_identitas' => $request->nik,
          'tgl_surat' => $request->tgl_surat,
          'no_surat' => $nomor_surat,
          'no_surat_full' => $no_surat,
          'perihal' => $request->perihal,
          'surat_kpd' => $request->surat_kpd,
        ]);
      }
    } else {
      $data_no = DB::table('nomor_surat')->where('tgl_surat', $request->tgl_surat)->max('no_surat');
      $nomor_surat = $data_no . "a";
      $no_surat = "W11.PAS.PAS11." . $request->bagcategory . "-" . $nomor_surat;
      DB::table('nomor_surat')->insert([
        'no_identitas' => $request->nik,
        'tgl_surat' => $request->tgl_surat,
        'no_surat' => $nomor_surat,
        'no_surat_full' => $no_surat,
        'perihal' => $request->perihal,
        'surat_kpd' => $request->surat_kpd,
      ]);
    }
    return redirect('Surat')->with('sukses', 'Selamat Anda Berhasil Generate Nomor Surat ');
  }
  public function kode_bag($id)
  {
    $states = DB::table('kode_surat_bag')->where('kode_bidang', $id)->pluck("ket_bag", "kode_bag");
    return json_encode($states);
  }
  public function kode_sub($id)
  {
    $states = DB::table('kode_surat_sub')->where('kode_bag', $id)->pluck("ket_sub", "kode_sub");
    return json_encode($states);
  }
  //endSurat

  //Reset Password
  public function reset(Request $request)
  {
    $cek = ModelUser::where('email', $request->email)->where('nik', $request->nik)->first();
    if ($cek) {
      $link = $cek->token;
      $nama = $cek->nama;
      $email = $request->email;
      $kirim = Mail::to($email)->send(new ResetPassword($nama, $link));
      return redirect('/reseter')->with('alert', 'Selamat Anda Berhasil Reset Silahkan, Cek Di Spam Email Anda!!!');
    } else {
      return redirect('/reseter')->with('alert', 'Maaf NIK dan Email Anda Tidak Sesuai !');
    }
  }
  public function reseter()
  {
    return view('partials/_reset');
  }
  public function resetpassword($token)
  {
    $cek = ModelUser::where('remember_token', $token)->first();
    if ($cek) {
      $user = ModelUser::where('remember_token', $token)->get();
      return view('partials/_reset_password', ['users' => $user]);
    } else {
      return redirect('/reseter')->with('alert', 'Maaf Token Anda Tidak Sesuai !');
    }
  }
  public function resetupdate(Request $request)
  {
    DB::table('users')->where('remember_token', $request->token)->where('nik', $request->nik)->where('email', $request->email)->update([
      'password' => bcrypt($request->password)
    ]);
    return redirect('/login')->with('alert', 'Selamat Anda Berhasil Merubah Password!!!');
  }
  public function search()
  {
    return view('search');
  }
  public function galery()
  {
    $media = DB::table('media')->get();
    return view('page._galery', ['media' => $media]);
  }
  public function postgalery(Request $request)
  {
    DB::table('media')->insert([
      'judul' => $request->nama_kegiatan,
      'image' => "-",
      'link' => $request->link,
    ]);
    return redirect('/galery');
  }
  public function deletegalery($kode)
  {
    DB::table('media')->where('id', $kode)->delete();
    return redirect('/galery');
  }
  public function pospengamanan()
  {
    $pospam = DB::table('pos_pengamanan')->get();
    return view('page._pos_pengamanan', ['pospam' => $pospam]);
  }
  public function insertpospengamanan(Request $request)
  {
    DB::table('pos_pengamanan')->insert([
      'nama_pos' => $request->nama_pos,
      'encrypt_pos' => csrf_token($request->nama_pos),
      'updated_at' => date('Y-m-d:H:i:s'),
      'created_at' => date('Y-m-d:H:i:s'),
    ]);
    return redirect('/Pos-Pengamanan');
  }
  public function deletepospengamanan($kode)
  {
    DB::table('pos_pengamanan')->where('id', $kode)->delete();
    return redirect('/Pos-Pengamanan');
  }
  public function laporanpospengamanan()
  {
    $lappam = DB::table('lap_pengamanan')->get();
    return view('page._laporan_pengamanan', ['lappam' => $lappam]);
  }
}
