@extends('layouts.bootstrap')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Search Product</div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control typehead" placeholder="Search..." />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var path = "{{ route('autocomplete') }}";

        $('input.typehead').typeahead({
            source: function(terms, process) {
                return $.get(path, {
                    terms: terms
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>
@endpush
