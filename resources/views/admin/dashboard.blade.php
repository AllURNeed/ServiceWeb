@extends('admin.layouts.master')

@section('title','Dashboard')
@section('page-heading','Dashboard')

@section('main-section')

<div class="row">
      <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                  <span class="info-box-text">Incoming Message</span>
                  <span class="info-box-number">
                      {{$msg}}
                      <small></small>
                  </span>
              </div>
              <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
      </div>
      <!-- /.col -->
      
      <!-- /.col -->
  </div>


 
@endsection
