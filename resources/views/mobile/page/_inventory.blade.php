@extends('mobile.index')
@section('konten')
<div class="page-content">
    @foreach($DataRuangan as $dr)
    @foreach(DB::table('penempatan_barang')->where('ruangan',$dr->id)->select('kode_barang','nama_barang')->groupBy('kode_barang','nama_barang')->get() as $db)
    <div class="card card-style bg-16" data-card-height="130">
        <div class="content card-top text-start">
            <div class="d-flex">
                <div>
                    <a href="#" data-menu="menu-success-2-{{$db->kode_barang}}"><img src="data:image/png;base64,{{DNS2D::getBarcodePNG($db->kode_barang, 'qrcode')}}" style="background-color:rgb(255,255,255); padding:4px;" width="90"></a>
                </div>
                <p class="text-white" style="padding-left: 6px;">
                    Nama Ruangan : {{ $dr->nama_ruangan }}</br>
                    Nama Barang : {{ $db->nama_barang}}</br>
                    Jumlah Barang : <?php $count_bg = DB::table('penempatan_barang')->where('ruangan', $dr->id)->where('kode_barang', $db->kode_barang)->count() ?> {{$count_bg}} Barang</br>
                    Kode Barang : {{ $db->kode_barang}}</br>
                </p>
                <div class="card-top text-end ">
                    <div class="me-3 color-white">
                        <a href="#" data-menu="menu-success-2-1-{{$db->kode_barang}}" class="btn btn-xxs rounded-m text-uppercase font-700 shadow-s bg-blue-light">Lihat Barang</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-overlay bg-black opacity-75"></div>
    </div>
    @endforeach
    @endforeach
</div>
@foreach($DataRuangan as $dr)
@foreach(DB::table('penempatan_barang')->where('ruangan',$dr->id)->select('kode_barang','nama_barang')->groupBy('kode_barang','nama_barang')->get() as $db)
<div id="menu-success-2-{{$db->kode_barang}}" class="menu menu-box-modal bg-green-dark rounded-m text-center" data-menu-height="350" data-menu-width="350">
    <h4 class=" mt-2 font-700 color-white">Qr Code Kode Barang </h4>
    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($db->kode_barang, 'qrcode')}}" style="background-color:rgb(255,255,255); padding:6px;" class="" width="65%">
    <h4 class=" mt-2 font-700 color-white">Kode Barang {{ $db->kode_barang }} </br>Ruangan {{ $dr->nama_ruangan }}</h4>
</div>
@endforeach
@endforeach
@foreach($DataRuangan as $dr)
@foreach(DB::table('penempatan_barang')->where('ruangan',$dr->id)->select('kode_barang','nama_barang')->groupBy('kode_barang','nama_barang')->get() as $db)
<div id="menu-success-2-1-{{$db->kode_barang}}" class="menu menu-box-modal rounded-m" style="padding-left: 4px; padding-right:4px;" data-menu-height=" 350" data-menu-width="400">
    <h6 class=" mt-2 font-700 color-white" style="padding-left:4px">Nama Barang : {{ $db->nama_barang }}</h6>
    <table class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
        <thead>
            <tr>
                <th scope="col" class="bg-blue-dark color-white py-3 font-14">No</th>
                <th scope="col" class="bg-blue-dark color-white py-3 font-14">Merk/Type</th>
                <th scope="col" class="bg-blue-dark color-white py-3 font-14">No Urut</th>
                <th scope="col" class="bg-blue-dark color-white py-3 font-14">Tahun</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-blue-light color-gray-light">
                <th scope="row">Apple</th>
                <td>iPhone</td>
                <td>iOS</td>
                <td>Yes</td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach
@endforeach
@endsection