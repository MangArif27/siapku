@foreach($daftar_barang as $db)
<table>
    <?php $kolom = 3;
    $i = 1;
    ?>
    @foreach(DB::table('penempatan_barang')->where('ruangan',$db->id)->get() as $pb)
    @if(($i)% $kolom==1)
    <tr>
        @endif
        <td align="center">
            <table border="2">
                <tr>
                    <td rowspan="2"><img src="data:image/png;base64,{{DNS2D::getBarcodePNG('Kode Barang :'.$pb->kode_barang.' Tahun Perolehan :'.$pb->tahun_perolehan.' Id :'.$pb->id.' No Urut :'.$pb->no_urut, 'qrcode')}}" style="background-color:rgb(255,255,255); padding:6px;"></td>
                    <td width="300px"> Kode Barang : {{$pb->kode_barang}}
                        <br> Tahun Perolehan : {{ $pb->tahun_perolehan}}
                        <br> No Urut : {{$pb->no_urut}}
                        <br> Nama Barang : {{$pb->nama_barang}}
                        <br> Merk/Tipe : {{$pb->merk}}
                    </td>
                </tr>
                <tr>
                    <td> Milik : Rutan Kelas I Depok</td>
                </tr>
            </table>
        </td>
        @if(($i) % $kolom== 0)
    </tr>
    @endif
    <?php $i++ ?>
    @endforeach
</table>
@endforeach