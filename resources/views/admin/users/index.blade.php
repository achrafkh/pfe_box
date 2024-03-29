@extends('layouts.master')

@section('breadcumbs')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Manage Client</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }} ">Dashboard</a></li>
            <li class="active">Manage Client</li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection

@section('content1')
<div class="panel panel-default">
    <div class="panel-heading">Users</div>
    <div class="panel-body">
        <a href="{{ url('/admin/users/create') }}" class="btn btn-success btn-sm" title="Add New User">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        {!! Form::open(['method' => 'GET', 'url' => '/admin/users', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        {!! Form::close() !!}
        <br/>
        <br/>
        <hr>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>ID</th><th>Fullname</th><th>Username</th><th>Email</th><th>Showroom</th><th>Role</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    @if(isset($item->showroom))
                    <td>{{ $item->showroom->city }}</td>
                    @else
                    <td></td>
                    @endif
                    <td>{{ $item->role->fulltitle }}</td>
                    <td>
                        <a href="{{ url('/admin/users/' . $item->id) }}" title="View User"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                        <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['/admin/users', $item->id],
                        'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'title' => 'Delete User',
                        'onclick'=>'return confirm("Confirm delete?")'
                        )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
    </div>
</div>

@endsection