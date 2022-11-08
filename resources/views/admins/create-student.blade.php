@extends('layouts.layout')
@section('title', 'Crear Alumno')
@push('styles')
    <style>

    </style>
@endpush
@section('content')
    <div class="container-fluid">
        @if(session('message'))
            <x-alert color="success" message="{{ session('message') }}" classes="mt-4 text-center" />
        @endif

        <form method="POST" action=""  enctype="multipart/form-data">
            @csrf
            @method('POST')
            <x-admins.create-student />
        </form>
    </div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush