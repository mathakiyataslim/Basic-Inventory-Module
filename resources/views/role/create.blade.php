@extends('layout.app')
@section('title','Add Role')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-0">Add Role</h4>
            <small class="text-muted">Create a new role and assign permissions</small>
        </div>

        <a href="{{ route('role.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    <form action="{{ route('role.store') }}" method="post">
                        @csrf

                       
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Role Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter role name">
                        </div>

                        
                        <div class="mb-3 bg-light">
                            <label class="form-label fw-semibold mb-2">Permissions</label>

                            <div class="border rounded-3 p-3 bg-light" style="max-height: 260px; overflow:auto;">
                                <div class="row g-2">
                                    @foreach($permissions as $permission)
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input
                                                    type="checkbox"
                                                    class="form-check-input"
                                                    name="permission[]"
                                                    value="{{ $permission->name }}">
                                                   
                                               
                                                <label class="form-check-label">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <small class="text-muted d-block mt-2">
                                Choose only the permissions required for this role.
                            </small>
                        </div>

                       
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-check-circle"></i> Submit
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
