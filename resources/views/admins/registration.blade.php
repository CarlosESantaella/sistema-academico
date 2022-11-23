@extends('layouts.layout')
@section('titulo', 'Matricula')
@push('styles')
    <style>
        .app-main{
            display: flex;
            justify-content: center;
        }
        .container-register{
            
            border: 1px solid red;

        }
        .container-register > .register{
            width: 95%;
            max-width: 700px;
            margin: 0 auto;
            margin-top: 3rem;

        }
        .sidebar-register{
            max-width: 300px;
            border: 1px solid red;
        }
    </style>
@endpush
@section('content')
    <section class="w-100 container-register tw-pb-20">
        <livewire:register-form-admin />
    </section>

    <section class="w-100 sidebar-register">

    </section>
@endsection
@push('scripts')
    
@endpush