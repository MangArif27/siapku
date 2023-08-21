<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache,no-store,must-revalidate" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="expires" content="0" />
	<title>Silaci</title>
	<link rel="icon" href="{{ asset('assets/images/SmartPAs.png') }}" type="image/ico" />
	<style>
		center,
		td {
			font-weight: 10px;
			font-family: 'RobotoRegular', 'Helvetica Neue', Helvetica, sans-serif;
		}
	</style>
</head>

<body>
	<br />
	<center>
		Sistem Slip Gaji Dan Tunjangan Online
		<br /> Kementerian Hukum dan Hak Asasi Manusia
		<br /> Kantor Wilayah Jawa Barat
		<br /> Rumah Tahanan Kelas I Depok
		<br />Menyatakan Bahwa:
		@foreach($gaji as $p)
		@foreach($tunkir as $t)
		@foreach($user = DB::table('users')->where('nik',$p->nip)->get() as $users)
		<table>
			<tr>
				<td>Nama </td>
				<td>:</td>
				<td> {{$users->nama}}</td>
			</tr>
			<tr>
				<td>Nip </td>
				<td>:</td>
				<td> {{$p->nip}}</td>
			</tr>
			<tr>
				<td>Slip Gaji/Tunker Bulan</td>
				<td>:</td>
				<td> {{$p->penerimaan_bulan}} {{$p->penerimaan_tahun}}/{{$t->penerimaan_bulan}} {{$t->penerimaan_tahun}}</td>
			</tr>
			<tr>
				<td>Pendapatan Gaji Bersih</td>
				<td>:</td>
				<td> Rp. {{number_format($p->gaji_pokok-($p->potongan_bank+$p->potongan_dw+$p->arisan_dw+$p->simpanan_koperasi+$p->porpasos)),0,".","."}}</td>
			</tr>
			<tr>
				<td>Pendapatan Tunkir Bersih</td>
				<td>:</td>
				<td> Rp. {{number_format($t->tunker-($t->potongan_bank+$t->potongan_koperasi+$t->potongan_absen+$t->reject_gaji)),0,".","."}}</td>
			</tr>
		</table>
		@endforeach
		@endforeach
		@endforeach
		Adalah benar dan tercatat dalam database Kami.<br />
		Untuk memastikan bahwa surat tersebut benar, pastikan bahwa URL pada browser Anda adalah <b>https://siratucilokrutandepok.com</b>
	</center>
</body>

</html>