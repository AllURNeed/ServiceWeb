@extends('admin.layouts.master')

@section('title','Faq ')
@section('page-heading','Question AND Answere')

@section('main-section')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
   
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Frequently Asked Questions</h3>
                </div>
                <form method='POST' action="{{route('add_faq')}}" enctype="multipart/form-data">
                        @csrf()
                    <div class="card-body">                        
                        <div class="form-group">
                            <label>Question</label>
                            <input placeholder="Enter FAQ Here" type="text" required  name='Question' class='form-control'>
                            @error('Question')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div>   
                        <div class="form-group">
                            <label>Answere</label>
                            <input placeholder="Answere" required type="text" name='Answere' class='form-control'>
                            @error('Answere')
                                <div class='alert alert-danger'>{{$message}}</div>
                            @enderror
                        </div>  
                        <div class="form-group">
                            <label>Logo</label>
                            <input required accept="image/jpg,image/jpeg,image/png" name='Logo'  type="file" class='form-control'>
                            @error('Logo')
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
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">View Faq</h3>
                </div>
                <table class="table  table-bordered" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">Sr</th>
                            <th scope="col">FAQ</th>
                            <th scope="col">Answere</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1;@endphp
                        @foreach($data as $d=>$vv)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{urldecode($vv->question)}}</td>
                                <td>{{urldecode($vv->answere)}}</td>
                                <td>
                                    <a onclick="return confirm('Are you sure you want to delete this?');" href="{{URL::to('/Admin/delfaq/'.$vv->id)}}" class='btn btn-sm btn-danger'>Delete</a>
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
