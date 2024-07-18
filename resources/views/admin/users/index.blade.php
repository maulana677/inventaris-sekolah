@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">All Users</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Users</h2>
            <p class="section-lead">
                On this page, you can view all user data.
            </p>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>All Users</h4>
                            <div class="card-header-action">
                                <a href="{{ route('users.create') }}" class="btn btn-success">Create New <i
                                        class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left col-1 text-nowrap">No</th>
                                            <th class="text-left">Name</th>
                                            <th class="text-left">Email</th>
                                            <th class="text-left">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-left col-1 text-nowrap">{{ ++$loop->index }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i
                                                            class="fas fa-eye"></i></a>
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    @if (!$user->hasRole('admin'))
                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                            method="POST" class="delete-form"
                                                            style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger delete-button"><i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    @endif
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
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();

            $('.delete-button').on('click', function(event) {
                event.preventDefault();
                var form = $(this).closest('form');
                if (confirm('Are you sure you want to delete this user?')) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
