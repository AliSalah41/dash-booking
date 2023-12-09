@extends('admin.layouts.app')
@section('home', '/User')
@section('title')
   Transportations
@stop
@section('subtitle')
    transportation
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div>
                            <i class="fa-solid fa-truck-plane" style="color: #008cff;"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Transportation Details</h5>
                    </div>
                    <hr>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                   @endif
                   <div id="radioButtons">
                    <label for="" class="label-form mb-4" style="font-weight: bold;">Do you want to add Transportation ?</label>
                    <div>
                        <label style="margin-right: 50px;">
                            <input  type="radio" name="hotelChoice" value="yes" id="yesRadio"> Yes
                        </label>
                        <label style="margin-bottom: 50px;">
                            <input type="radio" name="hotelChoice" value="no" id="noRadio"> No
                        </label>
                    </div>
                    <div id="next">
                        <div class="col-12 d-flex mt-3">
                            <button type="submit" class="btn btn-primary px-5 ms-auto">Skip <i
                                class="bx bx-right-arrow-alt"></i></button>
                        </div>
                    </div>
                   </div>
                    <div id="hotelFormContainer">
                    <form class="row g-3" action="{{ route('transportations.store', $event->id) }}" method="POST">
                        @csrf

                        @php

                        $old = $transportations->where('price')->first();
                    @endphp
                            <div class="col-md-12">
                                <label for="inputLastName1" class="form-label">Transportation price</label>
                                <div class="input-group">
                                    <input type="text" name="price" class="form-control border-start-1" id="inputLastName1"
                                           placeholder="Enter price"
                                           value="{{ $old ? $old->price : '' }}"
                                        />
                                </div>
                                @error('price')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror

                                <div id="addHotel" class="col-12 d-flex " style="margin-top: 20px">
                                    <button type="submit" class="btn btn-primary px-5 ms-auto">Add transportation</button>
                                </div>

                                <div id="editHotel" class="col-12 d-flex " style="margin-top: 20px">
                            <button type="submit"   class="btn btn-primary px-5 ms-auto">Update transportation</button>
                        </div>
                </div>


            </div>

        </div>


        </form>

            </div>


    </div>
    </div>


    </div>
    {{-- @yield('imagePreview') --}}
@endsection
@section('scripts')


    {{--  <script>
    $(document).ready(function () {
        var roomCounter = 1;

        // Function to clone the room div
        function cloneRoom() {
            var originalRoom = $('#room_' + roomCounter);
            var clonedRoom = originalRoom.clone();

            // Update IDs and clear input values
            clonedRoom.attr('id', 'room_' + (++roomCounter));
            clonedRoom.find('input[name="room_types[]"]').val('');
            clonedRoom.find('input[name="prices[]"]').val('');

            // Append the cloned room div to the container
            originalRoom.parent().append(clonedRoom);

            // Remove the "Add More Rooms" button from the last cloned room
            clonedRoom.find('#addRoom').remove();
        }

        // Add event listener to the "Add More Rooms" button
        $('#addRoom').on('click', function () {
            cloneRoom();
        });
    });
</script>  --}}
    <script>
        $(document).ready(function() {
            var roomCounter = 1;

            // Function to clone the room div
            function cloneRoom() {
                var originalRoom = $('#room_' + roomCounter);
                var clonedRoom = originalRoom.clone();

                // Update IDs and clear input values
                clonedRoom.attr('id', 'room_' + (++roomCounter));
                clonedRoom.find('input[name="room_types[]"]').val('');
                clonedRoom.find('input[name="prices[]"]').val('');

                // Insert the cloned room div above the "Add More Rooms" button
                originalRoom.before(clonedRoom);

                // Remove the "Add More Rooms" button from the last cloned room
                clonedRoom.find('#addRoom').remove();
            }

            // Add event listener to the "Add More Rooms" button
            $('#addRoom').on('click', function() {
                {{--  cloneRoom();  --}}
            });

            //////////////////////////////////////
                // Hide the hotel form initially
                $('#hotelFormContainer').hide();
                $('#next').hide();

                // Show/hide the form based on the selected radio button
                $('input[name="hotelChoice"]').change(function () {
                    if ($(this).val() === 'yes') {
                        $('#hotelFormContainer').show();
                        $('#next').hide();
                        $('#editHotel').remove();
                    } else {
                        // Redirect to another page when "No" is selected
                        $('#hotelFormContainer').hide();
                        $('#next').show();


                    }
                });

                 // Handle the click event on the "Next" button
        $('#next').on('click', function () {
            // Redirect to another page when "Next" is clicked
            var eventId = "{{ $event->id }}"; // Get the event ID from your PHP variable
            var url = "{{ route('entertainments.create', ['event' => ':event']) }}";
            url = url.replace(':event', eventId);
            window.location.href = url;
        });
        });
    </script>
    <script>
        $(document).ready(function () {
            // Check if the 'param' parameter in the URL is set to 'ho'

            var isParamHo = new URLSearchParams(window.location.search).has('tr');
            // If 'param' is 'ho', hide the radio buttons
            if (isParamHo) {
                $('#radioButtons').hide();
                $('#addHotel').remove();

            // Add 'ho' as a hidden input to the form
            var hoInput = $('<input>').attr({
                type: 'hidden',
                name: 'tr',
                value: 'tr' // You can set the value based on your requirements
            });

            // Append the hidden input to the form
            $('#hotelFormContainer form').append(hoInput);
                $('#hotelFormContainer').show();
                $('#editHotel').show();
            }


        });
    </script>

@endsection
