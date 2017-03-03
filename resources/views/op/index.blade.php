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


<h2>Clients</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    @foreach($leads as $lead)
      <tr>
        <td>{{$lead->client->name}}</td>
        <td>{{$lead->client->email}}</td>
        <td>{{$lead->client->phone}}</td>
        <td> <a href="{{route('showClient',["id"=>$lead->id])}}" class="btn btn-primary">View</a>
        <form style="display: inline;" method="POST" action="{{route('deleteClient',["id"=>$lead->id])}}">
          {{ csrf_field() }}
         <input type="submit" class="btn btn-danger" value="delete"></td>
         </form>
      </tr>

      @endforeach
    </tbody>
  </table>

  {{ $leads->links() }}

@endsection
@section('js')

@endsection