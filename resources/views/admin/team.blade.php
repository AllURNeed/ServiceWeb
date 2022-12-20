@extends('admin.layouts.master')

@section('title','Our Best Team')
@section('page-heading','Team')

@section('main-section')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
   
    <div class="row">
        <div class="col-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Team Members</h3>
                </div>
                <form method='POST' action="{{route('add_team')}}" enctype="multipart/form-data">
                        @csrf()
                    <div class="card-body">                        
                        <div class="form-group">
                            <label>Member Photo</label>
                            <input accept="image/jpg,image/png,image/jpeg" required type='file' name='Photo'  class='form-control'>
                            @error('Photo')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label>Member Name</label>
                            <input autofocus required type='text' name='Member' placeholder="Enter Member Name" class='form-control'>
                            @error('Member')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div>   
                        <div class="form-group">
                            <label>Designation</label>
                            <input placeholder="Member Designation" required  name='Designation' class='form-control'>
                            @error('Designation')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label>Facebook Link (optional)</label>
                            <input   name='Facebook' class='form-control'>
                            @error('Facebook')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label>Linkedin Link (optional)</label>
                            <input   name='Linkedin' class='form-control'>
                            @error('Linkedin')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label>Twitter Link (optional)</label>
                            <input   name='Twitter' class='form-control'>
                            @error('Twitter')
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
        <div class="col-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">View Plan's</h3>
                </div>
                <table class="table  table-bordered" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">Sr</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Desig.</th>
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
                                <td><img width="10%" src="{{asset('storage/image/team/'.$v->image)}}" class="img-fluid"></td>
                                <td>{{$v->name}}</td>
                                <td>{{$v->designation}}</td>
                                <td>
                                    <a href="#" data-type="team" data-id="{{$v->id}}" class="btn btn-success btn-sm edibtn" data-toggle="modal" data-target="#exampleModal">
                                        Edit
                                    </a>
                                     <a onclick="return confirm('Are you sure you want to delete this ?');" class='btn btn-sm btn-danger' href="{{URL::to('/Admin/teamdlt/'.$v->id)}}">Delete</a>
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
