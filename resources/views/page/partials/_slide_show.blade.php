<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="row top_tiles">
    <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <div class="tile-stats">
        @foreach ($slide as $slide)
          <img class="mySlides" src="{{ url('image/Slide/'.$slide->image) }}" width="100%" height="200px">
        @endforeach
      </div>
    </div>
  </div>
</div>
