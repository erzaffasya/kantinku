@extends('layouts.main')
@section('body')


  <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">Hi, {{$profile->nama}}!</h2>
    <p class="section-lead">
      Change information about yourself on this page.
    </p>

    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
          <div class="profile-widget-header">
            <img alt="image" src="{{asset('/img/avatar/'.Auth::user()->foto)}}" class="rounded-circle profile-widget-picture">
            <div class="profile-widget-items">
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Posts</div>
                <div class="profile-widget-item-value">187</div>
              </div>
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Followers</div>
                <div class="profile-widget-item-value">6,8K</div>
              </div>
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Following</div>
                <div class="profile-widget-item-value">2,1K</div>
              </div>
            </div>
          </div>
          <div class="profile-widget-description">
            <div class="profile-widget-name">{{$profile->nama}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div>{{Auth::user()->role}}</div></div>
            <b>{{$profile->nama}}</b> adalah seorang <b>{{$profile->jenis_kelamin}} </b>. Dia terdaftar sebagai <b>{{Auth::user()->role}}</b> di website <b>kantinku</b>, 
            
            <b>{{$profile->nama}}</b> sekarang membuka toko bernama <b>{{$profile->nama_toko}}.</b> 
            {{$profile->nama}} skarang tinggal di <b>{{$profile->alamat}}</b> yang terdaftar sejak <b>{{$profile->created_at}}</b>.
          </div>
          <div class="card-footer text-center">
            {{-- <div class="font-weight-bold mb-2">Follow Ujang On</div> --}}
            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="btn btn-social-icon btn-github mr-1">
              <i class="fab fa-github"></i>
            </a>
            <a href="#" class="btn btn-social-icon btn-instagram">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        </div>
      </div>
      
      @if (Auth::user()->role === 'seller')
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">          
            <form method="post" action="{{route('profile.update',Auth::user()->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-8 col-12">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama" value="{{$profile->nama}}" required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                    <div class="form-group col-md-4 col-12">
                      <label>Role</label>
                      <input type="text" class="form-control" name="role" value="{{Auth::user()->role}}" disabled/>
                      <div class="invalid-feedback">
                        Please fill in the last name
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-7 col-12">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="{{$user->email}}" disabled/>
                      <div class="invalid-feedback">
                        Please fill in the email
                      </div>
                    </div>
                    <div class="form-group col-md-5 col-12">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control"> 
                          @if ($profile->jenis_kelamin === 'perempuan')
                            <option>perempuan</option>
                            <option>laki-laki</option>
                          @else
                            <option>laki-laki</option>
                            <option>perempuan</option>
                          @endif
                        </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-7 col-12">
                      <label>Alamat</label>
                      <input type="text" name="alamat" value="{{$profile->alamat}}" class="form-control" value="" >
                    </div>
                    <div class="form-group col-md-5 col-12">
                      <label>Nama Toko</label>
                      <input type="text" name="nama_toko" value="{{$profile->nama_toko}}" class="form-control" value="">
                    </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-10 col-12">
                    <label>Deskripsi</label>
                    <textarea class="form-control" ></textarea>
                    <div class="invalid-feedback">
                      What do you wanna say?
                    </div>
                  </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-12 col-12">
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="image" class="form-control">
                      </div>
                    </div>
                  </div>     
                          
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      @else
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">          
            <form method="post" action="{{route('profile.update',Auth::user()->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-8 col-12">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama" value="{{$profile->nama}}" required="">
                      <div class="invalid-feedback">
                        Please fill in the first name
                      </div>
                    </div>
                    <div class="form-group col-md-4 col-12">
                      <label>Role</label>
                      <input type="text" class="form-control" name="role" value="{{Auth::user()->role}}" disabled/>
                      <div class="invalid-feedback">
                        Please fill in the last name
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-7 col-12">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="{{$user->email}}" disabled/>
                      <div class="invalid-feedback">
                        Please fill in the email
                      </div>
                    </div>
                    <div class="form-group col-md-5 col-12">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control"> 
                          @if ($profile->jenis_kelamin === 'perempuan')
                            <option>perempuan</option>
                            <option>laki-laki</option>
                          @else
                            <option>laki-laki</option>
                            <option>perempuan</option>
                          @endif
                        </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12 col-12">
                      <label>Alamat</label>
                      <input type="text" name="alamat" value="{{$profile->alamat}}" class="form-control" value="" >
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12 col-12">
                      <div class="form-group">
                        <label>Foto </label>
                        <input type="file" name="image" class="form-control">
                      </div>
                    </div>
                  </div>             
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      @endif
      

    </div>
  </div>


@endsection