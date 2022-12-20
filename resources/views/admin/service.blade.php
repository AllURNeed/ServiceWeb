@extends('admin.layouts.master')

@section('title','Add Service You Provide')
@section('page-heading','Service We Provide')

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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Service Here</h3>
                    </div>
                    <form method='POST' action="{{route('edit_service')}}" enctype="multipart/form-data">
                            @csrf()
                            <input type="hidden" name="id" value="{{$find[0]->id}}">
                            <input type="hidden" name="Oldimage" value="{{$find[0]->logo}}">
                        <div class="card-body">                        
                            <div class="form-group">
                                <img width="30%" src="{{asset('storage/image/service/'.$find[0]->logo)}}" class="img-fluid">
                            </div>   
                            <div class="form-group">
                                <label>Add Service Image</label>
                                <input accept="image/jpg,image/png,image/jpeg"  type='file' name='image' class='form-control'>
                                @error('image')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>                   
                            <div class="form-group">
                                <label>Heading</label>
                                <input value="{{$find[0]->heading}}" type='text' placeholder="Ex:- Web Development" required name='heading' class='form-control'>
                                @error('heading')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea placeholder="Describe Service" required  name='Description' class='form-control'>{{$find[0]->description}}</textarea>
                                @error('Description')
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
        @else
            <div class="col-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Service Here</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    <form method='POST' action="{{route('add_service')}}" enctype="multipart/form-data">
                            @csrf()
                        <div class="card-body">                        
                            <div class="form-group">
                                <label>Add Service Image</label>
                                <input accept="image/jpg,image/png,image/jpeg" required type='file' name='image' class='form-control'>
                                @error('image')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>                   
                            <div class="form-group">
                                <label>Heading</label>
                                <input type='text' placeholder="Ex:- Web Development" required name='heading' class='form-control'>
                                @error('heading')
                                    <div class='alert alert-danger'>{{$message}}</div>
                                @enderror
                            </div>  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea placeholder="Describe Service" required  name='Description' class='form-control'></textarea>
                                @error('Description')
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
                    <h3 class="card-title">View Service's</h3>
                </div>
                <table class="table  table-bordered" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">Sr</th>
                            <th scope="col">Image</th>
                            <th scope="col">Heading</th>
                            <th scope="col">Description</th>
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
                                    <a  class="example-image-link" data-lightbox="example-set" href="{{asset('storage/image/service/'.$v->logo)}}" >
                                        <img width="50px" class="img-fluid" src="{{asset('storage/image/service/'.$v->logo)}}">
                                    </a>
                                </td>
                                <td>{{$v->heading}}</td>
                                <td>{{$v->description}}</td>
                                <td>{{$v->created_at}}</td>
                                <td>
                                    <a class='btn btn-sm btn-success' href="{{URL::to('/Admin/ServiceEdit/'.$v->id)}}">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this ?');" class='btn btn-sm btn-danger' href="{{URL::to('/Admin/ServiceDel/'.$v->id)}}">Delete</a>
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
