@extends('admin.layouts.master')

@section('title','Plans Features')
@section('page-heading','Add Features Plans')

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
                    <h3 class="card-title">Add Features of Plans Here</h3>
                </div>
                <form method='POST' action="{{route('add_Fplans')}}" >
                        @csrf()
                    <div class="card-body">                        
                        <div class="form-group">
                            <label>Select Plan</label>
                            <select name='Plan' class='form-control select2' required>
                                <option value=''>Select</option>
                                @foreach($plan as $p=>$l)
                                    <option value='{{$l->plan}}'>{{$l->plan}}</option>
                                @endforeach
                            </select>
                            @error('Plan')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div>   
                        <div class="form-group">
                            <label>Add Features</label>
                            <input placeholder="10GB Storage Space" required  type="text" name='Features' class='form-control'>
                            @error('Features')
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
                    <h3 class="card-title">View Features Plan's List</h3>
                </div>
                <table class="table  table-bordered" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">Sr</th>
                            <th scope="col">Plan</th>
                            <th scope="col">Feature</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1;@endphp
                        @foreach($data as $d=>$vv)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$vv->plan}}</td>
                                <td>{{$vv->feature_list}}</td>
                                <td>{{$vv->created_at}}</td>
                                <td>
                                    <a onclick="return confirm('Are you sure you want to delete this ?');" href="{{URL::to('Admin/DelListPlan/'.$vv->id)}}" class='btn btn-sm btn-danger'>Delete</a>
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
