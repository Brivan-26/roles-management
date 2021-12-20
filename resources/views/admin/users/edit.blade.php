@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit: <strong>{{$user->name}}</strong></div>

                <div class="card-body">
                    <form action="{{route('admin.users.update', $user->id)}}" method="POST">
                        @csrf 
                        @method('PATCH')
                        @foreach($roles as $role)
                            <div class="form-group form-check">
                                <input type="checkbox" name="roles[]" id="{{$role->id}}" value="{{$role->id}}" class="form-check-input" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                <label for="{{$role->id}}" class="form-check-label">{{$role->name}}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

