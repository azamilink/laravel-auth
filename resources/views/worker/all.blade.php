@extends('layouts.bootstrap')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>All Workers</h5>
                        <a href="{{ route('worker.add') }}" class="btn btn-success">Add New</a>
                    </div>
                    <div class="card-body">
                        @if (Session::has('worker-deleted'))
                            <div class="alert alert-success">{{ Session::get('worker-deleted') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Profile Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($workers as $worker)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $worker->name }}</td>
                                        <td>
                                            <img src="{{ asset('images') }}/{{ $worker->profile_image }}" alt="Profile Image" width="60">
                                        </td>
                                        <td>
                                            <a href="{{ route('worker.edit', $worker->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('worker.delete', $worker->id) }}" class="btn btn-dark">Delete</a>
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
@endsection()
