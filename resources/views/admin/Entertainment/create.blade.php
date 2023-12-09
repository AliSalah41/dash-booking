@extends('admin.layouts.app')
@section('home', '/User')
@section('title')
    Entertainments
@stop
@section('subtitle')
  Add  Entertainment
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary"> Entertainment Information</h5>
                    </div>
                    <hr>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                   @endif
                   <div id="radioButtons">
                     <label for="" class="label-form mb-4" style="font-weight: bold;">Do you want to add Entertainment ?</label>


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
<form class="row g-3" action="{{route('entertainments.store', $event->id)}}" method="POST">
    @csrf

    @php

    $old_title = $entertainments->where('title')->first();
    $old_description = $entertainments->where('description')->first();
    $old_address = $entertainments->where('address')->first();
    $old_start = $entertainments->where('start_dateTime')->first();
    $old_end = $entertainments->where('end_dateTime')->first();
    $old_price = $entertainments->where('price')->first();
@endphp
    <div class="tab-content py-3">

            <div class="col-md-12">
                <label for="inputLastName1" class="form-label">Title</label>
                <div class="input-group">
                    <input type="text" name="title" class="form-control border-start-1" id="inputLastName1"
                           placeholder="title"
                           value="{{ $old_title ? $old_title->title : '' }}"
                           />

                @error('title')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label mt-4">Description</label>
                <div class="input-group">
                <input type="text" class="form-control border-start-1" id="birthdate" name="description"
                placeholder="description"
                value="{{ $old_description ? $old_description->description : '' }}"
                />
                </div>

            @error('description')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="description" class="form-label mt-4">Address</label>
            <div class="input-group">
            <input type="text" class="form-control border-start-1" id="birthdate" name="address"
            placeholder="address"
            value="{{ $old_address ? $old_address->address : '' }}"
            />
            </div>

        @error('address')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>


	<div class="input-group">
    <div class="form-group col-5 " style="margin-right: 40px;">
        <label class="form-label mt-4" >Start</label>
        <input required type="datetime-local" name="start_dateTime" class="form-control border-start-1" aria-label="Text input with checkbox"
        value="{{ $old_start ? $old_start->start_dateTime : '' }}"
        >

        @error('start_dateTime')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group col-5  ">
        <label class="form-label mt-4">End</label>
        <input required type="datetime-local" name='end_dateTime' class="form-control border-start-1" aria-label="Text input with checkbox"
        value="{{ $old_end ? $old_end->end_dateTime : '' }}"
        >

        @error('end_dateTime')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror
      </div>

    </div>

    <div class="col-md-12">
        <label class="form-label mt-4">Price</label>
        <div class="input-group">
        <input type="text" class="form-control border-start-1" id="birthdate" name="price"
        placeholder="price"
        value="{{ $old_price ? $old_price->price : '' }}"
        />
        </div>

    @error('price')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
<div id="addHotel" class="col-12 d-flex " style="margin-top: 20px;">
    <button type="submit" class="btn btn-primary px-5 ms-auto">Add entertainment</button>
</div>
<div id="editHotel" class="col-12 d-flex " style="margin-top: 20px;">
    <button type="submit"  id="updateHotelBtn" class="btn btn-primary px-5 ms-auto">Update entertainment</button>
</div>

</form>
</div>
{{--    --}}





                        </div>
                    </div>


    </div>
    {{-- @yield('imagePreview') --}}
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
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
        var url = "{{ route('show', ['event' => ':event']) }}";
        url = url.replace(':event', eventId);
        window.location.href = url;
    });
    });
</script>
<script>
    $(document).ready(function () {
        // Check if the 'param' parameter in the URL is set to 'ho'

        var isParamHo = new URLSearchParams(window.location.search).has('en');
        // If 'param' is 'ho', hide the radio buttons
        if (isParamHo) {
            $('#radioButtons').hide();
            $('#addHotel').remove();

        // Add 'ho' as a hidden input to the form
        var hoInput = $('<input>').attr({
            type: 'hidden',
            name: 'en',
            value: 'en' // You can set the value based on your requirements
        });

        // Append the hidden input to the form
        $('#hotelFormContainer form').append(hoInput);
            $('#hotelFormContainer').show();
            $('#editHotel').show();
        }


    });
</script>
@endsection
