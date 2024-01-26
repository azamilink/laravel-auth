@extends('layouts.bootstrap')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Add New Worker</div>
                    <div class="card-body">
                        @if (Session::has('worker-added'))
                            <div class="alert alert-success">{{ Session::get('worker-added') }}</div>
                        @endif
                        <form action="{{ route('worker.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" name="profile_image" id="file" class="form-control" onchange="previewFile(this)">
                                <img id="previewImg" class="img-thumbnail mt-2" alt="profile image">
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

    @if (Session::has('worker-added'))
        <script>
            toastr.success("{!! Session::get('worker-added') !!}");
        </script>
    @endif
    @if (Session::has('worker-added'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{!! Session::get('worker-added') !!}",
                icon: "success"
            });
        </script>
    @endif
@endpush
