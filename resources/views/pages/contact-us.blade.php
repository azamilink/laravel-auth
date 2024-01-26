@extends('layouts.bootstrap')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Contact us</div>
                    <div class="card-body">
                        <form action="{{ route('contact.sent') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="msg" name="msg" style="height: 100px"></textarea>
                                <label for="msg">Comments</label>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    @if (Session::has('message-sent'))
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{!! Session::get('message-sent') !!}",
                icon: "success"
            });
        </script>
    @endif
@endpush
