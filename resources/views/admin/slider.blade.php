@extends('admin.layouts.master')

@section('title','Add Company Details')
@section('page-heading','Company-Profile')

@section('main-section')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
    @if(session()->has('del'))
        <div class="alert alert-danger" role="alert">
            {{session('del')}}
        </div>
    @endif

    
    
    <div class="row">

       @if($find!='')
       
        <div class="col-4">
        <a class="btn btn-sm btn-dark pt-2" href="{{URL::to('/Admin/slider')}}">Refresh</a>
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Edit Slider's</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    <form method='POST' action="{{route('edit_slider')}}" enctype="multipart/form-data">
                        <input type='hidden' name='id' value="{{$find[0]->id}}">
                        <input type='hidden' name='Oldimage' value="{{$find[0]->slider}}">
                        @csrf()
                        <div class="card-body">
                            <div class="form-group">
                                <img class='img-fluid' width="10%" src="{{asset('storage/image/slider/'.$find[0]->slider)}}">
                            </div> 
                            <div class="form-group">
                                <label>Add Slider Image</label>
                                <input accept="image/jpg,image/png,image/jpeg" type='file'   name='slider' class='form-control'>
                                @error('slider')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>                   
                            <div class="form-group">
                                <label>Heading Small</label>
                                <input value="{{$find[0]->small_hdg}}" placeholder="99% Off" type='text' required  name='HeadingSmall' class='form-control'>
                                @error('HeadingSmall')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Heading Large</label>
                                <input value="{{$find[0]->heading}}"  type='text' required  name='HeadingLarge' class='form-control'>
                                @error('HeadingLarge')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea placeholder="Description" name='Description' class='form-control'>{{$find[0]->small_desc}}</textarea>
                                @error('Description')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Button Name</label>
                                <input placeholder="Get Start Now" value="{{$find[0]->link_hdg}}"  type='text'   name='ButtonName' class='form-control'>
                                @error('ButtonName')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Button LinkURL</label>
                                <input placeholder="URL Address" type='text' value="{{$find[0]->link}}"  name='URL' class='form-control'>
                                @error('URL')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="col-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Slider's</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    
                    <form method='POST' action="{{route('add_slider')}}" enctype= multipart/form-data>
                        @csrf()
                        <div class="card-body">
                            <div class="form-group">
                                <label>Add Slider Image</label>
                                <input accept="image/jpg,image/png,image/jpeg" type='file' required  name='slider' class='form-control'>
                                @error('slider')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>                   
                            <div class="form-group">
                                <label>Heading Small</label>
                                <input value="{{old('HeadingSmall')}}" placeholder="99% Off" type='text' required  name='HeadingSmall' class='form-control'>
                                @error('HeadingSmall')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Heading Large</label>
                                <input value="{{old('HeadingLarge')}}"  type='text' required  name='HeadingLarge' class='form-control'>
                                @error('HeadingLarge')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea placeholder="Description" name='Description' class='form-control'>{{old('Description')}}</textarea>
                                @error('Description')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Button Name</label>
                                <input placeholder="Get Start Now" value="{{old('ButtonName')}}"  type='text'   name='ButtonName' class='form-control'>
                                @error('ButtonName')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Button LinkURL</label>
                                <input placeholder="URL Address" type='text' value="{{old('URL')}}"  name='URL' class='form-control'>
                                @error('URL')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
       @endif
       
        <div class="col-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">View Slider's</h3>
                </div>
                <table class="table  table-bordered" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">Sr</th>
                            <th scope="col">Image</th>
                            <th scope="col">Small</th>
                            <th scope="col">Large</th>
                            <th scope="col">Desc</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $i=1;
                        @endphp
                        @foreach($data as $k=>$v)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    <a  class="example-image-link" data-lightbox="example-set" href="{{asset('storage/image/slider/'.$v->slider)}}" >
                                        <img width="50px" class="img-fluid" src="{{asset('storage/image/slider/'.$v->slider)}}">
                                    </a>
                                </td>
                                <td>{{$v->small_hdg}}</td>
                                <td>{{$v->heading}}</td>
                                <td>{{$v->small_desc}}</td>
                                <td>{{$v->created_at}}</td>
                                <td>
                                    <a class='btn btn-sm btn-success' href="{{URL::to('/Admin/SliderEdit/'.$v->id)}}">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this ?');" class='btn btn-sm btn-danger' href="{{URL::to('/Admin/SliderDel/'.$v->id)}}">Delete</a>
                                </td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>
  
@endsection
