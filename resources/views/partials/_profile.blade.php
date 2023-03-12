<div class="profile clearfix">
  <div class="profile_pic">
    <img src="{{ url('image/Photo/'.Session::get('photo')) }}" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Selamat Datang</span>
    <h2>{{Session::get('nama')}}</h2>
  </div>
</div>
<div class="navbar nav_title" style="border: 0;">
</div>