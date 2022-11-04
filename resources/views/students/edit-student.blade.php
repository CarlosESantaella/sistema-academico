@extends('layouts.layout')
@section('title', 'Home')
@section('content')
<main>

    @if ($student->estado != '1')
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
                <x-students.edit.edit-student :student="$student" :responsibles="$responsibles"/>
            </form>
        </div>
    @endif
</main>
@endsection

@push('scripts')
    <script>
        var id_estudiante = "{{$student->codigo}}";
        var estado = "{{$student->estado}}";
    </script>
@endpush
@vite('resources/js/edit-students.js')
