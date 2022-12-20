@extends('admin.layouts.master')

@section('title','Add Company Details')
@section('page-heading','Company-Profile')

@section('main-section')
    
  <div class="row">
      <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Company Profile</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
           
            @if(isset($data[0]))
                <form method='POST' action="{{route('add_info')}}" enctype= multipart/form-data>
                    @csrf()
                    <div class="card-body">
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input value="{{$data[0]->company_name}}" placeholder="Company Name" autofocus type='text' required  name='CompanyName' class='form-control'>
                                </div>
                                @error('CompanyName')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="{{$data[0]->Email}}" placeholder="example@gmail.com" type='email' required  name='Email' class='form-control'>
                                </div>
                                @error('Email')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input value="{{$data[0]->Mobile}}" placeholder="1234567890" type='number' required  name='Mobile' class='form-control'>
                                </div>
                                @error('Mobile')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>WhatApp No.</label>
                                    <input value="{{$data[0]->Whatapp}}" placeholder="1234567890" type='number' required  name='Whatapp' class='form-control'>
                                </div>
                                @error('Whatapp')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Facebook Link</label>
                                    <input value="{{$data[0]->Facebook}}" placeholder="https://www.facebook.com/" type='text'   name='Facebook' class='form-control'>
                                </div>
                                @error('Facebook')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input value="{{$data[0]->Twitter}}" placeholder="https://www.twitter.com/" type='text'   name='Twitter' class='form-control'>
                                </div>
                                @error('Twitter')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>linkedin</label>
                                    <input value="{{$data[0]->linkedin}}" placeholder="https://www.linkedin.com/" type='text'   name='linkedin' class='form-control'>
                                </div>
                                @error('linkedin')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input value="{{$data[0]->Address}}" placeholder="Address" type='text' required  name='Address' class='form-control'>
                                </div>
                                @error('Address')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea  placeholder="Describe Your Company" required  name='Description' class='form-control'>{{$data[0]->Description}}</textarea>
                                </div>
                                @error('Description')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Upload Company Logo</label>
                                    <input  accept="image/png, image/jpg, image/jpeg" type='file'   name='Logo' class='form-control'>
                                </div>
                                @error('linkedin')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-2'>
                                <img class='img-fluid' width="50%" src="{{asset('storage/image/Logo/'.$data[0]->logo) }}">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
                @else
                <form method='POST' action="{{route('add_info')}}" enctype= multipart/form-data>
                    @csrf()
                    <div class="card-body">
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input  placeholder="Company Name" autofocus type='text' required  name='CompanyName' class='form-control'>
                                </div>
                                @error('CompanyName')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input  placeholder="example@gmail.com" type='email' required  name='Email' class='form-control'>
                                </div>
                                @error('Email')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input  placeholder="1234567890" type='number' required  name='Mobile' class='form-control'>
                                </div>
                                @error('Mobile')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>WhatApp No.</label>
                                    <input  placeholder="1234567890" type='number' required  name='Whatapp' class='form-control'>
                                </div>
                                @error('Whatapp')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Facebook Link</label>
                                    <input  placeholder="https://www.facebook.com/" type='text'   name='Facebook' class='form-control'>
                                </div>
                                @error('Facebook')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input  placeholder="https://www.twitter.com/" type='text'   name='Twitter' class='form-control'>
                                </div>
                                @error('Twitter')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>linkedin</label>
                                    <input  placeholder="https://www.linkedin.com/" type='text'   name='linkedin' class='form-control'>
                                </div>
                                @error('linkedin')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input  placeholder="Address" type='text' required  name='Address' class='form-control'>
                                </div>
                                @error('Address')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea  placeholder="Describe Your Company" required  name='Description' class='form-control'></textarea>
                                </div>
                                @error('Description')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class="form-group">
                                    <label>Upload Company Logo</label>
                                    <input  accept="image/png, image/jpg, image/jpeg" type='file' required  name='Logo' class='form-control'>
                                </div>
                                @error('linkedin')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            @endif
        </div>
      </div>
  </div>
@endsection
