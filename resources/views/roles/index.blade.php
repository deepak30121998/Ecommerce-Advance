@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Roles</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @can('role.create')
    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create New Role</a>
    @endcan

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->permissions->pluck('name')->implode(', ') }}</td>
                <td>
                    @can('role.edit')
                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-info">Edit</a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
