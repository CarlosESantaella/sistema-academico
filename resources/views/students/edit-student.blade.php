@extends('layouts.layout')
@section('title', 'Home')
@section('content')

    {{-- @if ($student->estado != '1' and auth()->user()->tipo != 0)
        <div class="container-fluid">
            <p>Esta sección esta bloqueada</p>
        </div>
    @else
        <div class="container-fluid">
            @if(session('message'))
                <x-alert color="success" message="Alumno actualizado correctamente!" classes="mt-4 text-center" />
            @endif
            <form method="POST" action="/students/{{$student->codigo}}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-students.edit.edit-student 
                    :student="$student" 
                    :responsibles="$responsibles" 
                    :licenseplates="$license_plates"
                    :password="$password"
                    :username="$username"
                />
            </form>
        </div>
    @endif --}}

        <div class="container-fluid">
            @if(session('message'))
                <x-alert color="success" :message="session('message')" classes="mt-4 text-center" />
            @endif
            @if(session('messageCreateStudent'))
                <x-alert color="success" :message="session('messageCreateStudent')" classes="mt-4 text-center" />
            @endif
            @if(session('errorEdit'))
                <x-alert color="danger" :message="session('errorEdit')" classes="mt-4 text-center" />
            @endif
            <form method="POST" action="/students/{{$student->codigo}}"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-students.edit.edit-student 
                    :student="$student" 
                    :responsibles="$responsibles" 
                    :licenseplates="$license_plates"
                    :password="$password"
                    :username="$username"
                />
            </form>
        </div>
@endsection

@push('scripts')
    <script>
        var id_estudiante = "{{$student->codigo}}";
        var estado = "{{(auth()->user()->tipo == 0 || auth()->user()->tipo == 2)? 1 : $student->estado}}";
        // var estado = 1;
    </script>
    @vite('resources/js/edit-students.js')
    @vite('resources/js/select-departamento-provincia.js')
@endpush
