@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    {{ __('words.roles') }}
@stop
@section('subtitle')
    {{ __('words.manage_your_roles') }}
@stop
@can('role-create'.session('appKey'))
    @section('button_create')
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('roles.create') }}" type="button" class="btn btn-primary">+</a>
            </div>
        </div>
    @stop
@endcan

@section('content')
    <!--wrapper-->
    <div class="wrapper">
        <h6 class="mb-0 text-uppercase">{{ __('words.manage_your_roles') }}</h6>
        <hr />
        <div class="mt-2">
            @include('admin.layouts.messages')
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="15%">{{ __('words.name') }}</th>
                                <th scope="col" colspan="3" width="1%">{{ __('words.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                @if ($role->name != 'superAdmin')
                                    <tr>
                                        <td>{{ $role->name }}</td>


                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('roles.show', $role->id) }}">{{ __('words.show') }}</a>
                                        </td>
                                        @can('role-edit'.session('appKey'))
                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('roles.edit', $role->id) }}">{{ __('words.update') }}</a>
                                            </td>
                                        @endcan
                                        {{-- <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td> --}}
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex">
                        {!! $roles->links() !!}
                    </div>
                </div>
            </div>
        </div>

        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->

    @push('body-scripts')
        <!--end switcher-->

        <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#example2').DataTable({
                    lengthChange: false,
                    buttons: [{
                        text: 'Add Role',
                        action: function(e, dt, node, config) {
                            window.location.href = {{ route('roles.create') }}
                        }
                    }]
                });

                table.buttons().container()
                    .appendTo('#example2_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endpush
@endsection
