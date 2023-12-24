@extends('admin.layouts.app')
@section('home', '/booking')
@section('title')
    Send Emails
@stop
@section('subtitle')
    Send Emails
@stop
@can('confirm-create' . session('appKey'))
    @section('button_create')

    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">Send Emails</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                @include('admin.layouts.messages')
            </div>

            <form id="emailForm">
                @csrf

                <label for="" class="mt-3">select Event : </label>
                <select name="eventId" class=" form-control" id="eventId">

                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>

                <label for="" class="mt-3">select Airline : </label>
                <select name="airlineId" class=" form-control" id="airlineId">
                    <option value="0"></option>
                    @foreach ($airlines as $airline)
                        <option value="{{ $airline->id }}">{{ $airline->country_airport }}</option>
                    @endforeach
                </select>


                <div class="col-md-12 mt-3">
                    <label for="" class="form-label">Select Users :</label>
                    <div class="input-group">
                        <select class="form-control multiple-select" id="userId" name="userId[]" multiple="multiple">

                            @foreach($users as $user)
                                <option  value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('userId.*')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                    <label for="emailContent" class="mt-3">Email Content : </label>
                    <textarea name="emailContent" id="emailContent" class="form-control" placeholder="Enter email content ..."></textarea>

                    {{--  @error('emailContent')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror  --}}

                    <div class="col-12 d-flex">

                        <button type="submit" onclick="sendEmail()" class="btn btn-primary px-5 ms-auto mt-4">Send</button>
                    </div>

            </form>

        </div>
    </div>
@endsection



@push('scripts')

{{--  <script>
    $(document).ready(function() {
        $('#userId').change(function() {
            var selectedValue = $(this).val();

            if (selectedValue === 'all') {
                // If "All Users" is selected, set all other options as selected
                $(this).find('option').not(':first').prop('selected', true);
            } else {
                // If any other option is selected, deselect the "All Users" option
                $(this).find('option[value="all"]').prop('selected', false);
            }
        });
    });

</script>  --}}
<script type="text/javascript">
    function user_ticket() {
        var airlineId = $('#airlineId').val();
        var eventId = $('#eventId').val();

        console.log('airlineId:', airlineId);
        console.log('eventId:', eventId);

        if (airlineId !== null && eventId !== null) {
            $.ajax({
                url: "{{ route('event.airline', [':eventIds', ':airlineIds']) }}"
                .replace(':eventIds', eventId)
                .replace(':airlineIds', airlineId),
                // data is response event.airline() function
                success: function(data) {
                    console.log(data);
                    $('#userId').empty();

                    if (data.length > 0) {
                    //    $('#userId').append('<option value="all">All</option>');
                        $('#userId').change(function() {
                            var selectedValue = $(this).val();

                            if (selectedValue === 'all') {
                                // If "All Users" is selected, set all other options as selected
                                $(this).find('option').not(':first').prop('selected', true);
                            } else {
                                // If any other option is selected, deselect the "All Users" option
                                $(this).find('option[value="all"]').prop('selected', false);
                            }
                        });
                        $.each(data, function(key, value) {



                            $('#userId').append('<option value="' + value.user_id+ '">' + value.user.name +
                                '</option>');
                        });
                    } else {
                        $('#userId').append('<option value="">No users found</option>');
                    }
                }
            });
        }
        else if (airlineId == 0 && eventId !== null) {
            // Fetch all users related to the specified eventId
            $.ajax({
                url: "{{ route('event.airline', [':eventIds', '0']) }}"
                    .replace(':eventIds', eventId),
                success: function(data) {
                    console.log(data);
                    $('#userId').empty();

                    if (data.length > 0) {
                        $.each(data, function(key, value) {
                            $('#userId').append('<option value="' + value.user_id + '">' + value.user.name +
                                '</option>');
                        });
                    } else {
                        $('#userId').append('<option value="">No users found</option>');
                    }
                }
            });
        } else {
            $('#userId').empty();
            $('#userId').append('<option value="">Select users</option>');
        }

    }


    $(document).ready(function() {

    // Call the function on page load
    user_ticket();

    // Call the function when the event or airline changes
    $('#eventId, #airlineId').change(function() {
        user_ticket();
    });

    });
</script>


        <script>


            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });

        tinymce.init({
            selector: '#emailContent'
        });

        function sendEmail() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var userId = $('#userId').val();
            var emailContent = tinymce.get('emailContent').getContent();

            console.log('UserID:', userId);

            console.log('EmailContent:', emailContent);


            $.ajax({
                url: '/send-email',
                method: 'POST',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: {
                    _token: csrfToken,
                    userId: userId,
                    emailContent: emailContent
                },

                success: function(response) {
                    alert('Mail sent successfully!');
                },
                error: function(error) {
                    console.error('An error occurred while sending mail:', error);

                    if (error.responseJSON) {
                        if (error.responseJSON.errors.userId) {
                            alert('please, choose one user at least');
                        } else if (error.responseJSON.errors.emailContent) {
                            alert('Please, enter email content');
                        }
                    } else {
                        alert('An error occurred while sending mail: ' + error.responseText);
                    }
                }
            });
        }
    </script>



@endpush
