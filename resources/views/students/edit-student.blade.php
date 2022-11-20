@extends('layouts.layout')
@section('title', 'Home')
@section('content')

    @if ($student->estado != '1' and auth()->user()->tipo != 0)
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
    @endif
@endsection

@push('scripts')
    <script>
        var id_estudiante = "{{$student->codigo}}";
        var estado = "{{$student->estado}}";
    </script>
    @vite('resources/js/edit-students.js')
    @vite('resources/js/select-departamento-provincia.js')
@endpush
