@extends('layouts.layout')
@push('styles')
    <style>
        .app-main {
            /* padding-top: 3rem; */
            padding-bottom: 3rem;
        }

        .row>* {
            /* height: 300px; */
        }

        .sidebar-users {
            /* margin-top: 2rem; */
            overflow-y: scroll;
        }

        .selected {
            color: white;
            background: var(--color-primary);
        }

        ul {}

        main {
            padding-bottom: 4rem;
        }
    </style>
@endpush
@section('content')
    <livewire:views.users-crud-admin />

@endsection

