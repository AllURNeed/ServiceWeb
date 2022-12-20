@extends('admin.layouts.master')

@section('title','Our Best Plans For You')
@section('page-heading','Best Plans')

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
                    <h3 class="card-title">Add Plans Here</h3>
                </div>
                <form method='POST' action="{{route('add_plans')}}" >
                        @csrf()
                    <div class="card-body">                        
                        <div class="form-group">
                            <label>Enter Plan Name</label>
                            <input required type='text' name='Plan' placeholder="Enter Plan Name" class='form-control'>
                            @error('Plan')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div>   
                        <div class="form-group">
                            <label>Description</label>
                            <input placeholder="Describe Service" required  name='Description' class='form-control'>
                            @error('Description')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label>Rate</label>
                            <input placeholder="Ex:$99" required  name='Rate' class='form-control'>
                            @error('Rate')
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
                            <th scope="col">Plan</th>
                            <th scope="col">Heading</th>
                            <th scope="col">Rate</th>
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
                                <td>{{$v->plan}}</td>
                                <td>{{$v->heading}}</td>
                                <td>{{$v->rate}}</td>
                                <td>{{$v->created_at}}</td>
                                <td>
                                     <a onclick="return confirm('Are you sure you want to delete this ?');" class='btn btn-sm btn-danger' href="{{URL::to('/Admin/PlanDel/'.$v->id)}}">Delete</a>
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
