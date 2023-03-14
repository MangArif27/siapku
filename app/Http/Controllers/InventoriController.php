<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InventoriController extends Controller
{
    public function daftarbarang()
    {
        $daftar_barang = DB::table('daftar_barang')->get();
        $penempatan_barang = DB::table('penempatan_barang')->get();
        return view('page._daftar_barang', ['daftar_barang' => $daftar_barang, 'penempatan_barang' => $penempatan_barang]);
    }
    function inputdatabarang(Request $request)
    {
        if ($request->nama_barang == "Baru") {
            if (empty($request->nama_barang1) || empty($request->kode)) {
                Session::flash('sukses', 'Isi Field Yang Diberikan Tanda Bintang !');
                return redirect('Daftar-Barang');
            } else {
                DB::table('daftar_barang')->insert([
                    'nama_barang' => $request->nama_barang1,
                    'merk' => $request->merk,
                    'kode_barang' => $request->kode,
                    'tahun_perolehan' => $request->tahun,
                    'jumlah' => $request->jumlah,
                    'penguasaan' => $request->pengusaan,
                    'keterangan' => "Rutan Kelas I Depok",
                ]);
                $cek = DB::table('daftar_barang')->where('nama_barang', $request->nama_barang1)->where('merk', $request->merk)->where('tahun_perolehan', $request->tahun)->where('jumlah', $request->jumlah)->first();
                for ($x = 1; $x <= $request->jumlah; $x++) {
                    DB::table('penempatan_barang')->insert([
                        'id' => $cek->id,
                        'nama_barang' => $request->nama_barang1,
                        'merk' => $request->merk,
                        'kode_barang' => $request->kode,
                        'tahun_perolehan' => $request->tahun,
                        'no_urut' => $x,
                        'penguasaan' => $request->pengusaan,
                        'keterangan' => "Rutan Kelas I Depok",
                        'ruangan' => "1",
                    ]);
                }
                DB::table('kategori')->insert([
                    'nama_barang' => $request->nama_barang1,
                    'kode_barang' => $request->kode,
                ]);
            }
        } else {
            $cek = DB::table('kategori')->where('id', $request->nama_barang)->first();
            DB::table('daftar_barang')->insert([
                'nama_barang' => $cek->nama_barang,
                'merk' => $request->merk,
                'kode_barang' => $cek->kode_barang,
                'tahun_perolehan' => $request->tahun,
                'jumlah' => $request->jumlah,
                'penguasaan' => $request->pengusaan,
                'keterangan' => "Rutan Kelas I Depok",
            ]);
            $cekk = DB::table('daftar_barang')->where('nama_barang', $cek->nama_barang)->where('merk', $request->merk)->where('tahun_perolehan', $request->tahun)->where('jumlah', $request->jumlah)->first();
            for ($x = 1; $x <= $request->jumlah; $x++) {
                DB::table('penempatan_barang')->insert([
                    'id' => $cekk->id,
                    'nama_barang' => $cek->nama_barang,
                    'merk' => $request->merk,
                    'kode_barang' => $cek->kode_barang,
                    'tahun_perolehan' => $request->tahun,
                    'no_urut' => $x,
                    'penguasaan' => $request->pengusaan,
                    'keterangan' => "Rutan Kelas I Depok",
                    'ruangan' => "1",
                ]);
            }
        }
        return redirect('Daftar-Barang');
    }
    function updatedatabarang(Request $request)
    {
        for ($x = 0; $x < count($request->no_urut); $x++) {
            DB::table('penempatan_barang')->where('id', $request->id)->where('no_urut', $request->no_urut[$x])->update([
                'ruangan' => $request->ruangan[$x],
            ]);
        }
        Session::flash('sukses', 'Selamat Update Data Barang Berhasil !');
        return redirect('Daftar-Barang');
    }
    public function cetakbarang($id)
    {
        $daftar_barang = DB::table('daftar_barang')->where('id', $id)->get();
        return view('page._cetak_barcode_barang', ['daftar_barang' => $daftar_barang]);
    }
    public function daftarruangan()
    {
        $daftar_ruangan = DB::table('daftar_ruangan')->get();
        $penempatan_barang = DB::table('penempatan_barang')->get();
        return view('page._daftar_ruangan', ['daftar_ruangan' => $daftar_ruangan, 'penempatan_barang' => $penempatan_barang]);
    }
    function inputdataruangan(Request $request)
    {
        $cek = DB::table('daftar_ruangan')->first();
        if ($cek->kode_ruangan == $request->kode_ruangan) {
            Session::flash('sukses', 'Maaf Ruangan Yang Anda Input Sudah Ada !');
            return redirect('Daftar-Ruangan');
        } else {
            DB::table('daftar_ruangan')->insert([
                'nama_ruangan' => $request->nama_ruangan,
                'kode_ruangan' => $request->kode_ruangan,
            ]);
            Session::flash('sukses', 'Selamat Anda Berhasil Input Ruangan !');
            return redirect('Daftar-Ruangan');
        }
    }
    public function cetakbarangruangan($id)
    {
        $daftar_barang = DB::table('daftar_ruangan')->where('id', $id)->get();
        return view('page._cetak_barcode_ruangan', ['daftar_barang' => $daftar_barang]);
    }
}
