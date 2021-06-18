@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
        @can('user-create')
          <a class="btn btn-success add-modal" data-toggle="modal" data-target="#modal-edit" data-role="{{ $roles }}" data-data="{{ route('users.store') }}"> Create New User</a>
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
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
        <a class="btn btn-info show-modal" data-toggle="modal" data-target="#modal-show" data-userrole="{{ $user->getRoleNames() }}" data-data="{{ $user }}" href="#">Show</a>
        @can('user-edit')
          <a class="btn btn-primary edit-modal" data-toggle="modal" data-target="#modal-edit" data-userrole="{{ $user->getRoleNames() }}" data-role="{{ $roles }}" data-data="{{ $user }}" href="#">Edit</a>
        @endcan
        @can('user-delete')
          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@include('users.script')
@include('users.modal')
@include('users.modal_show')

@endsection