@extends('admin.layouts.master')

@section('title','Testimonials Page ')
@section('page-heading','Add Testimonials ')

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
                    <h3 class="card-title">Testimonials Form</h3>
                </div>
                <form method='POST' action="{{route('add_Testimonials')}}" enctype="multipart/form-data">
                        @csrf()
                    <div class="card-body">                        
                        <div class="form-group">
                            <label>Client Name</label>
                            <input autofocus placeholder="ClientName" type="text" required  name='Name' class='form-control'>
                            @error('Name')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div>   
                        <div class="form-group">
                            <label>Designation</label>
                            <input placeholder="Designation" required type="text" name='Designation' class='form-control'>
                            @error('Designation')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label>Feedback</label>
                            <textarea class='form-control' required name='Feedback'></textarea>
                            @error('Feedback')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label>Image</label>
                            <input required accept="image/jpg,image/jpeg,image/png" name='Image'  type="file" class='form-control'>
                            @error('Image')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div> 
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">View Faq</h3>
                </div>
                <table class="table  table-bordered" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">Sr</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Desig</th>
                            <th scope="col">Desc</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1;@endphp
                        @foreach($data as $d=>$vv)
                            <tr>
                                <td>{{$i}}</td>
                                <td><img width="10%" src="{{asset('storage/image/client/'.$vv->logo)}}" class='img-fluid'></td>
                                <td>{{$vv->name}}</td>
                                <td>{{$vv->designation}}</td>
                                <td>{{urldecode($vv->description)}}</td>
                                <td>
                                    <a href="#" data-type="testimonials" data-id="{{$vv->id}}" class="btn btn-success btn-sm edibtn" data-toggle="modal" data-target="#exampleModal">
                                        Edit
                                    </a>
                                    <a onclick="return confirm('Are you sure you want to delete this?');" href="{{URL::to('/Admin/delclient/'.$vv->id)}}" class='btn btn-sm btn-danger'>Delete</a>
                                </td>
                            </tr>
                            <?php $i++;?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
@endsection
