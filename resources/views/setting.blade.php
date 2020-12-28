@extends('layouts.main')
@section('body')    
    <div class="section-header">
      <h1>Settings</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Settings</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Overview</h2>
      <p class="section-lead">
        Organize and adjust all settings about this site.
      </p>

      <div class="row">
        <div class="col-lg-6">
            <div class="card card-large-icons">
              <div class="card-icon bg-primary text-white">
                <i class="fas fa-lock"></i>
              </div>
              <div class="card-body">
                <h4>Security</h4>
                <p>Security settings such as firewalls, server accounts and others.</p>
                <a href="{{route('setting.edit', Auth::user()->id)}}" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
      </div>
    </div>

  @endsection