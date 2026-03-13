@extends('layout.app')
@section('title','Roles')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-0">Roles</h3>
            <small class="text-muted">Manage roles and their permissions</small>
        </div>

        <a href="{{ route('role.create') }}" class="btn btn-primary">
            + Create Role
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle mb-0 text-center">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th style="width: 180px;">Role Name</th>
                            <th>Permissions</th>
                            <th style="width: 200px;">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($role as $roles)
                            <tr>
                                <td class="fw-semibold">{{ $roles->id }}</td>
            
                                <td>
                                    <span class="fw-bold text-capitalize">{{ $roles->name }}</span>
                                </td>

                                <td class="text-start">
                                    @if($roles->permissions)
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach($roles->permissions as $permission)
                                                <span class="badge rounded-pill   bg-primary px-3 py-2">
                                                    {{ $permission->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="badge rounded-pill bg-secondary px-3 py-2">
                                            No Permissions
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('role.edit', $roles->id) }}" class="btn btn-success btn-sm px-3">
                                            Edit
                                        </a>

                                        <form action="{{ route('role.destroy', $roles->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm px-3"
                                                onclick="return confirm('Are you sure you want to delete this role?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-muted fw-semibold">
                                    No roles found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

@endsection
