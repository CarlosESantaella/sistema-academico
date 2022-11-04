@extends('layouts.layout')
@section('title', 'Home')
@section('content')
<main>

    @if ($student->estado == '-1')
    <div class="modal fade" id="verifyModel" tabindex="-1" aria-labelledby="verifyModelLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p class="mb-4">
                    ¿Desea matricularse en el siguiente periodo escolar?
                </p>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-danger btn-no" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary-custom btn-si">Si</button>
                </div>
            </div>
        </div>
        </div>
    </div>

    @elseif ($student->estado != '1')
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

@vite('resources/js/edit-students.js')