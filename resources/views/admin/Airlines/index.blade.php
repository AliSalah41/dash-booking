@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.airlines_country') }}
@stop
@section('subtitle')
    {{ __('words.airline_country') }}
@stop
@can('airline-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('airlineCountry.create') }}" type="button" class="btn btn-primary">{{ __('words.create_airlines_country') }}</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.airlines_country') }}</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                @include('admin.layouts.messages')
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('words.airlines_country') }}</th>
                            <th>{{ __('words.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($n=1)
                    @foreach($airline_countries as $airline_country)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$airline_country->country_airport}}</td>

                            <td>

                                <a class="btn btn-warning" href="{{route('airlineCountry.edit',  $airline_country->id)}}">{{__('words.update')}}</a>
                                <form id="myform" method="post" class='d-inline' action="{{ route('airlineCountry.destroy', ['airlineCountry' => $airline_country->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="confirmDelete(event)">{{__('words.delete')}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>


@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            function addNewField() {
                let newFieldGroup = $(".field:first").clone();
                newFieldGroup.find("input[name='depart[]']").val('');
                newFieldGroup.find("input[name='returnn[]']").val('');
                newFieldGroup.find(".add-inputs").replaceWith('<button type="button" class="btn btn-danger px-5 ms-auto removeField"> - </button>');

                $(".modal-body #fieldContainer").append(newFieldGroup);
            }

            // Add new fields on button click
            $(document).on("click", ".add-inputs", addNewField);

            // Remove field on button click
            $(".modal-body #fieldContainer").on("click", ".removeField", function () {
                $(this).closest('.row').remove();
            });
        });


    </script>

    <!-- Add this script to your page -->
    <script>
        $(document).ready(function () {
            $('#example').on('click', '.btn-primary', function () {
                // Get the airport ID from the data-airline-id attribute
                var airportId = $(this).data('airport-id');

                // Set the airport ID in the hidden input field
                $('#airportIdInput').val(airportId);

                // Open the modal
                $('#exampleModal').modal('show');
            });
        });
    </script>


    {{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#save').on('click', function () {--}}
{{--                // Prepare data to be sent in the AJAX request--}}
{{--                var formData = {--}}
{{--                    depart: $('input[name="depart[]"]').map(function () { return $(this).val(); }).get(),--}}
{{--                    returnn: $('input[name="returnn[]"]').map(function () { return $(this).val(); }).get(),--}}
{{--                    _token: $('meta[name="csrf-token"]').attr('content'), // Include CSRF token in the form data--}}
{{--                    // Add any other data you want to send--}}
{{--                };--}}

{{--                // Send AJAX request--}}
{{--                $.ajax({--}}
{{--                    type: 'POST',--}}
{{--                    url: '{{ route("create_time") }}',--}}
{{--                    data: formData,--}}
{{--                    dataType: 'json',--}}

{{--                    success: function (data) {--}}
{{--                        // Handle success response--}}
{{--                        console.log(data);--}}
{{--                        // You can perform additional actions here--}}
{{--                    },--}}
{{--                    error: function (error) {--}}
{{--                        // Handle error response--}}
{{--                        console.error(error);--}}
{{--                        // You can perform additional actions here--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@stop
