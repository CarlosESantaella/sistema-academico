@extends('layouts.layout')
@section('title', 'Asignaturas')
@push('styles')
    <style>
        .materia.selected,
        .curso.selected{
            color: white;
            background: var(--color-primary);
        }
    </style>
@endpush
@section('content')

    <livewire:manage-subjects />

@endsection