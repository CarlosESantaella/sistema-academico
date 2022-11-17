@extends('layouts.layout')
@section('title', 'Matriculas')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
    <style>

    </style>
@endpush
@section('content')
@php
    // echo $students[0];
    // die();
@endphp
<div class="container-table mx-auto mt-5" style="max-width: 1200px; width: 95%;">

    <div class="table-responsive">
        <form action="" method="POST" class="filters-table d-flex justify-content-between flex-wrap">
            @csrf
            {{-- <div class="d-flex flex-wrap"> --}}
                {{-- <div class="from-date d-flex align-items-center my-2 me-2">
                    <span>Desde: </span>
                    <input 
                        type="date" 
                        class="from-date-input form-control ms-1" 
                        name="startDate" 
                        value="{{ $startDate ?? '' }}"
                    >
                </div>
                <div class="to-date d-flex align-items-center my-2 me-2">
                    <span>Hasta: </span>
                    <input 
                        type="date" 
                        class="to-date-input form-control ms-1" 
                        name="endDate" 
                        value="{{ $endDate ?? '' }}"
                    >
                </div>
                <div class="d-flex align-items-center my-2 me-2">
                    <span>Curso: </span>
                    <div class="ms-1">
                        <x-admins.license_plates.elements.select-curso id="curso" curso="{{ $curso ?? '' }}"/>
                    </div>
                </div>
                <div class="d-flex align-items-center my-2 me-2">
                    <span>Nivel: </span>
                    <div class="ms-1">
                        <x-admins.license_plates.elements.select-nivel id="nivel" nivel="{{ $nivel ?? '' }}"/>
                    </div>
                </div>
                <div class="d-flex align-items-center my-2">
                    <span>Turno: </span>
                    <div class="ms-1">
                        <x-admins.license_plates.elements.select-turno id="turno" turno="{{ $turno ?? '' }}"/>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary-custom search-table">Buscar</button>
            </div> --}}
        </form>
        <a href="{{ route('students.pre-registrations-export', ['startDate' => $startDate, 'endDate' => $endDate, 'curso' => $curso, 'nivel' => $nivel, 'turno' => $turno]) }}" class="btn btn-success me-1 text-break">Exportar Excel</a>
        @php
            $cursos = [
                "Inicial" => "K",
                "Primario" => "P",
                "Secundaria" => "S"
            ];
        @endphp
        <table id="students" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Cod. Estudiante</th>
                    <th>Estudiante</th>
                    <th>Curso</th>
                    <th>Nivel</th>
                    {{-- <th>Turno</th> --}}
                    <th>Sexo</th>
                    <th>¿Matriculado?</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    @php
                        $last_lp = $student->licenses_plates()->latest()->first();
                        
                        if($last_lp){
                            $course = $last_lp->course()->first();
                            
                            $gnumeral = match($course->gnumeral){
                                "Kinder" => '1',
                                "Prekinder" => '2',
                                " Prekinder" => '2',
                                default => $course->gnumeral
                            };
                            
                            $curso_procesado = $cursos[$course->nivel] . str_replace("°", "", $gnumeral).$course->paralelo;
                            $nivel = $course->nivel;
                        }else{
                            $curso_procesado = '';
                            $nivel = '';

                        }

                    @endphp
                    <tr>
                        <td>{{ $student->codigo }}</td>
                        <td>{{ $student->nombres }} {{$student->appaterno}} {{$student->apmaterno}}</td>
                        <td>{{ $curso_procesado }}</td>
                        <td>{{ $nivel }}</td>
                        <td>{{ $student->sexo }}</td>
                        <td>{{ 'no' }}</td>
                    </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#students').DataTable({
                lengthChange: false,
                // searching: false,

            });
        });
    </script>
@endpush