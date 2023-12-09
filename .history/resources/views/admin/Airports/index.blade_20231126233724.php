@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.airlines') }}
@stop
@section('subtitle')
    {{ __('words.airline') }}
@stop
@can('user-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('airports.create') }}" type="button" class="btn btn-primary">{{ __('words.create_airlines') }}</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.airlines') }}</h6>
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
                            <th>{{ __('words.event') }}</th>
                            <th>{{ __('words.from') }}</th>
                            <th>{{ __('words.to') }}</th>
                            <th>{{ __('words.country') }}</th>
                            <th>{{ __('words.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($n=1)
                    @foreach($airports as $airport)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$airport->Event->name}}</td>
                            <td>{{$airport->airport_from}}</td>
                            <td>{{$airport->airport_to}}</td>
                            <td>{{$airport->country}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-airport-id="{{$airport->id}}">

                                    {{__('words.time')}}
                                </button>




                                
                                <a class="btn btn-success" href="{{route('airports.show', $airport->id)}}">{{__('words.show')}}</a>
                                <a class="btn btn-warning" href="{{route('airports.edit', $airport->id)}}">{{__('words.update')}}</a>
                                <form id="myform" method="post" class='d-inline' action="{{ route('delete', ['id' => $airport->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"     onclick="confirmDelete(event)">{{__('words.delete')}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('create_time')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="airline_id" id="airportIdInput" value="">
                                    <div class="" id="fieldContainer">
                                        <div class="field mt-3 row">
                                            <div class="col-md-6">
                                                <label for="inputLastName1" class="form-label">{{ __('words.depart') }}</label>
                                                <div class="input-group">
                                                <span class="input-group-text bg-transparent">
                                                    <i class='bx bxs-user'></i>
                                                </span>
                                                    <input type="datetime-local" required name="depart[]" class="form-control border-start-0" id="inputLastName1" placeholder="{{ __('words.depart') }}" />
                                                </div>
                                                @error('depart.*')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="inputLastName1" required class="form-label">{{ __('words.returnn') }}</label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-transparent">
                                                        <i class='bx bxs-user'></i>
                                                    </span>
                                                        <input type="datetime-local" required name="returnn[]" class="form-control border-start-0" id="inputLastName1" placeholder="{{ __('words.returnn') }}" />
                                                        <button type="button" class="btn btn-primary px-5 ms-auto add-inputs"> + </button>
                                                </div>
                                                @error('returnn.*')
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex mt-5">
                                        <button type="submit"
                                                class="btn btn-primary px-5 ms-auto">{{ __('words.add_airline_time') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
