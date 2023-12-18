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

                    @foreach ($airlines as $airline)
                        <option value="{{ $airline->id }}">{{ $airline->country_airport }}</option>
                    @endforeach
                </select>


                <div class="col-md-12 mt-3">
                    <label for="" class="form-label">Select Users :</label>
                    <div class="input-group">
                        <select class="form-control multiple-select" id="userId" name="userId[]" multiple="multiple">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{--  @error('event_id.*')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror  --}}
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
{{--  @section('scripts')  --}}

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
            var eventId = $('#eventId').val();
            var airlineId = $('#airlineId').val();

            var emailContent = tinymce.get('emailContent').getContent();
            console.log('UserID:', userId);
            console.log('eventId:', eventId);
            console.log('airlineId:', airlineId);
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

{{--  @endsection  --}}

@endpush
