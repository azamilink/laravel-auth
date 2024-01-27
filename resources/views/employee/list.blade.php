@extends('layouts.bootstrap')
@push('style')
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
@endpush

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Salaray</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $emp)
                            <tr>
                                <td>{{ $emp->id }}</td>
                                <td>{{ $emp->name }}</td>
                                <td>{{ $emp->email }}</td>
                                <td>{{ $emp->phone }}</td>
                                <td>{{ $emp->salary }}</td>
                                <td>{{ $emp->department }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let table = new DataTable('#example');
    </script>
@endpush
