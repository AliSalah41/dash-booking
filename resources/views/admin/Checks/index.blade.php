@extends('admin.layouts.app')
@section('home', '/booking')
@section('title')
  Check in
@stop
@section('subtitle')
Check in
@stop
@can('confirm-create'.session('appKey'))
    @section('button_create')

    @stop
@endcan
@section('content')
    <h6 class="mb-0 text-uppercase">Check in</h6>
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


                        <th>user name</th>
                      {{--  <th>Room type</th>  --}}


                        <th>{{__('words.action')}}</th>
                    </tr>
                    </thead>
                    @php($n=1)
                    @foreach( $checks as  $check)
                    <tbody>


                        <td>{{$n++}}</td>

                        <td>{{  $check->ticket->user->name }}</td>

                        <td>
                            <a class="btn btn-success" href="{{ route('checks.show',$check->id)}}"> {{__('words.show')}}</a>

                        </td>

                    </tbody>
                    @endforeach
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

@stop
