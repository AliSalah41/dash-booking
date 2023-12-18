@extends('admin.layouts.app')
@section('home', '/booking')
@section('title')
  Send Emails
@stop
@section('subtitle')
Send Emails
@stop
@can('confirm-create'.session('appKey'))
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
                <div class="col-md-12">
                <label for="userId" class="form-label">Select Users : </label>
                <div class="input-group">
                <select name="userId[]" class="multiple-select form-control" id="userId" multiple="multiple" >
                    <!-- استيراد بيانات المستخدمين من قاعدة البيانات -->
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" >{{ $user->name }}</option>
                    @endforeach
                </select>

                @error('userId')
               <small class="form-text text-danger">{{ $message }}</small>
               @enderror

                </div>
                <label for="emailContent" class="mt-3">Email Content : </label>
                <textarea name="emailContent" id="emailContent" class="form-control" placeholder="Enter email content ..."></textarea>

                @error('emailContent')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
                <div class="col-12 d-flex">

                            <button type="submit" onclick="sendEmail()" class="btn btn-primary px-5 ms-auto mt-4">Send</button>
                </div>

            </form>
        </div>
    </div>
@endsection



@section('scripts')


<script>

    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
            'w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    tinymce.init({
        selector: '#emailContent'
    });



    {{--  function sendEmail() {
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
                alert('تم إرسال البريد بنجاح!');
            },
            error: function(error) {
                console.error('حدث خطأ أثناء إرسال البريد:', error);
                alert('حدث خطأ أثناء إرسال البريد: ' + error.responseText);
            }
        });
    }  --}}

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


@stop
