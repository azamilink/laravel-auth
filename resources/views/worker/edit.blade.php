@extends('layouts.bootstrap')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Add New Worker</div>
                    <div class="card-body">
                        @if (Session::has('worker-updated'))
                            <div class="alert alert-success">{{ Session::get('worker-updated') }}</div>
                        @endif
                        <form action="{{ route('worker.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $worker->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ old('name', $worker->name) }}" id="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" name="profile_image" id="file" class="form-control" onchange="previewFile(this)">
                                <img id="previewImg" src="{{ asset('images/' . $worker->profile_image) }}" class="img-thumbnail mt-2" alt="profile image">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('workers') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()

@push('script')
    <script>
        function previewFile(input) {
            var file = $('input[type=file]').get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
