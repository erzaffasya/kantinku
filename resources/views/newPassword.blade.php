@extends('layouts.main')
@section('body')

    <div class="section-header">
      <div class="section-header-back">
        <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>General Settings</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="#">Settings</a></div>
        <div class="breadcrumb-item">General Settings</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">All About General Settings</h2>
      <p class="section-lead">
        You can adjust all general settings here
      </p>

      <div id="output-status"></div>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h4>Jump To</h4>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item"><a href="#" class="nav-link active">Security</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <form id="setting-form" method="post" action="{{route('setting.update', Auth::user()->id)}}">
            @csrf
            @method('PUT')
            <div class="card" id="settings-card">
              <div class="card-header">
                <h4>General Settings</h4>
              </div>
              <div class="card-body">
                <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                <div class="form-group row align-items-center">
                  <label for="site-title" class="form-control-label col-sm-3 text-md-right">New Password</label>
                  <div class="col-sm-6 col-md-9">
                    <input type="password" name="password" class="form-control" id="site-title">
                  </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Confirm Password</label>
                    <div class="col-sm-6 col-md-9">
                      <input type="password" name="confirm-password" class="form-control" id="site-title">
                    </div>
                  </div>
              </div>
              <div class="card-footer bg-whitesmoke text-md-right">
                <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                {{-- <button class="btn btn-secondary" type="button">Reset</button> --}}
              </div>
            </div>
          </form>
        </div>
      </div>
        </div>

            
@endsection