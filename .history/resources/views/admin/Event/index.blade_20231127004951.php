@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    Events
@stop
@section('subtitle')
    events
@stop
@can('event-create' . session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('create') }}" type="button" class="btn btn-primary">Create event</a>
            </div>
        </div>
    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">events</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                @include('admin.layouts.messages')
            </div>
            <div class="me-auto col-2">
                <label class="form-label d-inline">{{ __('words.filter') }}:</label>
                <select class="form-control d-inline-block" id="is_active" class="mb-3">
                    <option value="-1">{{ __('words.select_all') }}</option>
                    <option value="1" id='active'>{{ __('words.activation') }}</option>
                    <option value="0" id='not_active'>{{ __('words.not_activation') }}</option>
                </select>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>

                            <th>description</th>
                            <th>Address</th>


                            <th>category</th>
                            <th>country</th>
                            <th>city</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($n = 1)
                        @foreach ($events as $event)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $event->name ?? '-' }}</td>

                                <td>{{ $event->description ?? '-' }}</td>
                                <td>{{ $event->address ?? '-' }}</td>
                            

                                <td>
                                    {{ $event->category->title ?? '-' }}
                                </td>
                                <td>
                                    {{ $event->country->country ?? '-' }}
                                </td>
                                <td>
                                    {{ $event->city->city ?? '-' }}
                                </td>


                                {{--  <td>
                                @if ($event->is_active)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input active" onchange="changeStatus(this)"
                                               data-url="{{ route('users.activate', $event->id) }}"
                                               class="toggle-class" type="checkbox"
                                            {{ $event->is_active ? 'checked' : '' }}>
                                    </div>
                                @else
                                    {{--  <div class="form-check form-switch">
                                        <input class="form-check-input not_active" onchange="changeStatus(this)"
                                               data-url="{{ route('event.activate', $event->id) }}"
                                               class="toggle-class" type="checkbox"
                                            {{ $user->is_active ? 'checked' : '' }}>
                                    </div>  --}}
                                {{--  @endif  </td>  --}}
                                <td>
                                    {{-- <div class="toggle-switch"> --}}
                                        <form action="post"></form>

                                        <label class="switch">
                                            <input type="hidden" name="status" value="{{ $event->status ? 1 : 0 }}">
                                            <span class="slider round" onclick="toggleStatus({{ $event->id }})"></span>
                                        </label>
                                    {{-- </div> --}}

                                    <a class="btn btn-success"
                                        href="{{ route('btn.show', $event->id) }}">{{ __('words.show') }}</a>
                                    <a class="btn btn-warning"
                                        href="{{ route('btn.edit', $event->id) }}">{{ __('words.update') }}</a>
                                    <form id="myform" method="post" class='d-inline'
                                        action="{{ route('delete', ['id' => $event->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"
                                            onclick="confirmDelete(event)">{{ __('words.delete') }}</button>
                                    </form>

                                    {{--  <a name="hotel"
                                        href="{{ route('hotels.create', ['event' => $event->id]) }}"
                                        class="btn btn-primary "> Hotel </a>

                                        <a name="transportation"
                                        href="{{ route('transportations.create', ['event' => $event->id]) }}"
                                        class="btn btn-primary "> Transportation</a>  --}}

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        function changeStatus(x) {
            console.log(x);
            url = $(x).attr("data-url");
            if ($(x).hasClass('active')) {
                x.classList.remove("active");
                x.classList.add("not_active");
            } else {
                x.classList.remove("not_active");
                x.classList.add("active");
            }

            $.ajax({
                method: "get",
                url: url,
                success: function(success) {
                    console.log(success);
                }
            })
        }
    </script>
    <script type="text/javascript">
        $('#is_active').on('change', function(e) {
            var is_active = $('#is_active').val();
            var table = $('#example');
            console.log(is_active);
            if (is_active == 1) {
                table.find('.not_active').parents('tr').hide();
                table.find('.active').parents('tr').show();
            } else if (is_active == 0) {
                table.find('.not_active').parents('tr').show();
                table.find('.active').parents('tr').hide();
            } else {
                table.find('td').parent().show();
            }
        });
    </script>


    <!-- Inside the head section of your HTML -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let toggleSwitches = document.querySelectorAll('.status-toggle');

            toggleSwitches.forEach(function(switchElement) {
                switchElement.addEventListener('change', function() {
                    let hiddenInput = this.closest('.toggle-switch').querySelector('input[type="hidden"]');
                    hiddenInput.value = this.checked ? 0 : 1;

                    // You can optionally submit the form here or perform other actions
                    // Example: this.closest('form').submit();
                });
            });
        });
    </script>

    <!-- Include SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    {{-- <!-- Inside the head section of your HTML -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

    <!-- Inside the head section of your HTML -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
{{-- 
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let toggleSwitches = document.querySelectorAll('.slider');

            toggleSwitches.forEach(function(switchElement) {
                switchElement.addEventListener('click', function() {
                    let hiddenInput = this.closest('.switch').querySelector('input[type="hidden"]');
                    
                    Swal.fire({
                        title: 'Confirm Action',
                        text: 'Are you sure you want to toggle the status?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'Cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Toggle the value
                            let newValue = hiddenInput.value === '1' ? '0' : '1';

                            // Send AJAX request to the controller
                            axios.post(`/toggle/${this.dataset.id}/${newValue}`)
                                .then(response => {
                                    // Handle success, e.g., update the UI
                                    console.log(response.data);
                                })
                                .catch(error => {
                                    // Handle error
                                    console.error(error);
                                });

                            // You can optionally update the UI here based on the response

                            // Update the hidden input field's value
                            hiddenInput.value = newValue;
                        }
                    });
                });
            });
        });
    </script> --}}


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let toggleSwitches = document.querySelectorAll('.slider');
    
            toggleSwitches.forEach(function(switchElement) {
                switchElement.addEventListener('click', function() {
                    let hiddenInput = this.closest('.switch').querySelector('input[type="hidden"]');
                    
                    Swal.fire({
                        title: 'Confirm Action',
                        text: 'Are you sure you want to toggle the status?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'Cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Toggle the value
                            let newValue = hiddenInput.value === '1' ? '0' : '1';
    
                            // Send AJAX request to the controller
                            axios.post(`/toggle/${hiddenInput.value}/${newValue}`)
                                .then(response => {
                                    // Handle success, e.g., update the UI
                                    console.log(response.data);
                                })
                                .catch(error => {
                                    // Handle error
                                    console.error(error);
                                });
    
                            // You can optionally update the UI here based on the response
    
                            // Update the hidden input field's value
                            hiddenInput.value = newValue;
                        }
                    });
                });
            });
        });
    </script>






   

    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider - the moving part that indicates the toggle status */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        /* Style the slider when it's checked (on) */
        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>




@stop
