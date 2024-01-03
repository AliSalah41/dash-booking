@extends('admin.layouts.app')
@section('home', '/')
@section('title')
    Tickets
@stop
@section('subtitle')
    Requests
@stop
@section('content')
    <x-table title="ticket edit requests table" >
        {{ $dataTable->table() }}
    </x-table>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
