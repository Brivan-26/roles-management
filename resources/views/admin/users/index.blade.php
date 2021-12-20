@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged in!') }}
                    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
        <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
        <td>
          <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-warning">Edit</a>
          @can('delete-user')
            <form action="{{route('admin.users.destroy', $user->id)}}" method="POST" class="d-inline">
              @csrf 
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          @endcan
        </td>
        </tr>
    @endforeach

  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

