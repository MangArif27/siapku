@extends('mobile.index')
@section('konten')
@if (!isset($_GET['reload']))
<meta http-equiv=Refresh content="0;url=/Apk/Galery?reload=1">
@endif
<div class="page-content">
    <div class="divider divider-margins"></div>
    <div class="card card-slider card-style pb-4">
        <div class="content">
            <h4>Galeri Rutan Kelas I Depok</h4>
        </div>

        <div class="splide single-slider slider-no-arrows" id="single-slider-4">
            <div class="splide__track">
                <div class="splide__list">
                    @foreach($media as $md)
                    <div class="splide__slide">
                        <div class="pb-5">
                            {!! $md->link !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection