@extends('layouts.layout')
@section('titulo', 'Matricula')
@push('styles')
    <style>
        .app-main{
            /* padding-top: 3rem;
            padding-bottom: 3rem; */
        }
        .registro-matricula.selected{
            background: var(--color-primary);
            color: white;
        }
        /* .container-register{
            
            border: 1px solid red;
            height: 300px;
            background: blue;

        } */
        /* .container-registered > .register{
            width: 95%;
            max-width: 700px;
            margin: 0 auto;
            margin-top: 3rem;

        } */
        .sidebar-registered{
            max-width: 450px;
        }
    </style>
@endpush
@section('content')

    <livewire:register-form-admin :student="request()->student" />



@endsection
@push('scripts')
    
@endpush