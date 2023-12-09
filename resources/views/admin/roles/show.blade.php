@extends('admin.layouts.app')
@section('home', '/roles')
@section('title')
    {{__('words.roles')}}
@stop
@section('subtitle')
    {{__('words.show_role')}}
@stop
@section('content')
    <!--wrapper-->
    <div class="wrapper">
        <!--breadcrumb-->
        {{-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Roles</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($role->name) }} Role</li>
                    </ol>
                </nav>
            </div>
        </div> --}}
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">{{__('words.roles')}}</h6>
        <hr/>
        <div class="mt-2">
            @include('admin.layouts.messages')
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                        <th scope="col" width="20%">{{ __('words.name') }}</th>
                        </thead>
                        @foreach($rolePermissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
            <div class="mt-4">
                @can('role-edit')
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">{{ __('words.update') }}</a>
                @endcan
                <a href="{{ route('roles.index') }}" class="btn btn-default">{{ __('words.back') }}</a>
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
                var table = $('#example2').DataTable( {
                    lengthChange: false,
                    buttons: [
                        {
                            text: 'Add Role',
                            action: function ( e, dt, node, config ) {
                                alert( 'Button activated' );
                            }
                        }
                    ]
                } );

                table.buttons().container()
                    .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
            } );
        </script>
    @endpush
@endsection
