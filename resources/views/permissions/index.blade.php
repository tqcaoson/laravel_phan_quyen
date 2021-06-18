@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Permissions Management</h2>
        </div>
        <div class="pull-right">
        @can('permission-create')
            <a class="btn btn-success add-modal" data-toggle="modal" data-target="#modal-edit" data-data="{{ route('permissions.store')}}"> Create New Permission</a>
        @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($permissions as $key => $permission)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $permission->name }}</td>
        <td>
            <a class="btn btn-info show-modal" data-toggle="modal" data-target="#modal-show" data-data="{{ $permission }}" href="#">Show</a>
            @can('permission-edit')
                <a class="btn btn-primary edit-modal" data-toggle="modal" data-target="#modal-edit" data-data="{{ $permission }}" href="#">Edit</a>
            @endcan
            @can('permission-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $permissions->render() !!}

@include('permissions.script')
@include('permissions.modal')
@include('permissions.modal_show')

@endsection