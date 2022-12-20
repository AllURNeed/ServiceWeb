@extends('admin.layouts.master')

@section('title','View Incoming Message')
@section('page-heading','Incoming Message')

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
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">View Message's</h3>
                </div>
                <table class="table  table-bordered" id="table_id">
                    <thead>
                        <tr>
                            <th scope="col">Sr</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $i=1;
                        @endphp
                        @foreach($data as $k=>$v)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$v->name}}</td>
                                <td><a class="text-white btn-sm btn btn-dark " href="mailto:{{$v->Email}}">{{$v->Email}}</a></td>
                                <td><a class="text-white btn-sm btn btn-dark " href="tel:{{$v->mobile}}">{{$v->mobile}}</a></td>
                                <td>{{$v->subject}}</td>
                                <td>{{urldecode($v->Message)}}</td>
                                <td>{{$v->created_at}}</td>

                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    </tbody>
                   
                </table>
                {{$data->links()}}
            </div>
        </div>
  </div>
  
@endsection
