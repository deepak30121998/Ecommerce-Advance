@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Role</h2>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label>Permissions</label>
            @foreach($permissions as $permission)
                <div class="form-check">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-check-input">
                    <label class="form-check-label">{{ $permission->name }}</label>
                </div>
            @endforeach
            @error('permissions')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Role</button>
    </form>
</div>
@endsection
