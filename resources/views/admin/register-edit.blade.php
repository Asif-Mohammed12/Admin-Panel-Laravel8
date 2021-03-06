@extends('layouts.master')

@section('title')
Register Role | Edit 
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Role for the Users.</h3>
                </div>
                <div class="card-body">
                    <form action="/role-register-update/{{ $users-> id}}" method="POST">
                        {{ csrf_field() }};    
                        {{ method_field('PUT') }}
                       <div class="form-group">
                           <label>Name</label>
                           <input type="text" name="username" value="{{ $users->name }}" class="form-control">
                       </div>
                       <div class="form-group">
                           <label>Select Role</label>
                           <select name="usertype" class="form-control">
                                <option value="admin" {{ $users->usertype=='admin' ? "selected=selected" :""}}>Admin</option>
                                <option value="user" {{ $users->usertype=='user' ? "selected=selected" :""}}>User</option>
                                <option value="user" {{ $users->usertype=='none' ? "selected=selected" :""}}>None</option>
                            </select>
                       </div>
                       <button type="submit" class="btn btn-success">Update</button>
                        <a href="/role-register" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection