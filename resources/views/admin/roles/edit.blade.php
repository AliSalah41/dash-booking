@extends('admin.layouts.app')
@section('home', '/roles')
@section('title')
    {{__('words.roles')}}
@stop
@section('subtitle')
    {{__('words.update_role')}}
@stop
@section('content')
    <!--wrapper-->
    <div class="wrapper">
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-content">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="border p-4 rounded" enctype="multipart/form-data" method="POST" action="{{ route('roles.update', $role->id) }}">
                        @method('patch')
                        @csrf
                        <div class="card-title d-flex align-items-center">
                            {{-- <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div> --}}
                            <h5 class="mb-0 text-primary">{{__('words.update_role')}}</h5>
                        </div>
                        <hr/>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">{{ __('words.role_name') }}</label>
                            <div class="col-sm-9">
                                <input type="text"  value="{{ $role->name }}"
                                       name="name"
                                       class="form-control" id="inputEnterYourName"
                                       placeholder="Role Name" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <ul class="list-group">
                                        <li class="list-group-item"style="font-size: 20px;"><input type="checkbox" onchange="toggle(this)" /> {{ __('words.select_all') }}
                                            <div class="row">
                                                <?php
                                                    $count = 0;
                                                    $num = 0;
                                                ?>
                                                @foreach ($permissions as $value)
                                                    @if($count++ %3 == 0)
                                                        <label class="col-3" style="font-size: 16px;">
                                                            <input type="checkbox" onchange="selectRow(this, 'row{{ $num }}')" />
                                                        </label>
                                                        @php($num++)
                                                    @endif
                                                    <label class="col-3" style="font-size: 16px;">
                                                    <input type="checkbox"

                                                       name="permission[{{ $value->name }}]"
                                                       class= 'row{{ $num-1 }}'
                                                        {{ in_array($value->id, $rolePermissions)
                                                        ? 'checked'
                                                        : '' }}>
                                                        {{ substr($value->name, 0, strlen($value->name)-3) }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </li><br />
                                    </ul>
                                </div>
                            </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">{{ __('words.save_changes') }}</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-default">{{ __('words.back') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->
    <!--start switcher-->

    @section('scripts')
    <script>
        function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>
    <script>
        function selectRow(source, row) {
            console.log(row);
            var checkboxes = document.querySelectorAll(`input[type = 'checkbox'].${row}`);
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('[name="all_permission"]').on('click', function() {

                    if($(this).is(':checked')) {
                        $.each($('.permission'), function() {
                            $(this).prop('checked',true);
                        });
                    } else {
                        $.each($('.permission'), function() {
                            $(this).prop('checked',false);
                        });
                    }

                });
            });
        </script>
    @endsection
@endsection
