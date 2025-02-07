@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Users</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                <td>
                    @can('user.edit')
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-info">Edit</a>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
