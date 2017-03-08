@extends('layouts.app')

@section('content')
 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Overview</small>
                        </h1>
                        {{-- <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> User 
                            </li>
                        </ol> --}}
                    </div>
                </div>


<h2>Clients</h2><a class="btn btn-primary pull-right" href="{{ route('addClientForm') }}"> New client</a>
  <table class="table">
    <thead>
      <tr>
        <th>Fist Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>City</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    @foreach($clients as $client)
      <tr>
        <td>{{$client->firstname}}</td>
        <td>{{$client->lastname}}</td>
        <td>{{$client->email}}</td>
        <td>{{$client->phone}}</td>
        <td>{{$client->city}}</td>
        <td> <a href="{{route('showClient',["id"=>$client->id])}}" class="btn btn-primary">View</a>
        <form style="display: inline;" method="POST" action="{{route('deleteClient',["id"=>$client->id])}}">
          {{ csrf_field() }}
         <input type="submit" class="btn btn-danger" value="delete"></td>
         </form>
      </tr>
      @endforeach
    </tbody>
  </table>
<div class="row">
  {{ $clients->links() }}
</div>
  

@endsection
@section('js')

@endsection