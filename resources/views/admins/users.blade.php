@extends('layouts.layout')
@push('styles')
    <style>
        .row > *{
            /* height: 300px; */
        }
        .sidebar-users{
            height: 80vh;
            margin-top: 2rem;
            overflow-y: scroll;
        }
        ul{

        }
        main{
            padding-bottom: 4rem;
        }
    </style>
@endpush
@section('content')
    <livewire:views.users-crud-admin />
@endsection