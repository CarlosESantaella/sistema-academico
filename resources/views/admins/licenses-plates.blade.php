@extends('layouts.layout')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
@endpush
@section('content')
@php
    // die($students[0]);
@endphp

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Cod. Estudiante</th>
            <th>Estudiante</th>
            <th>Curso</th>
            <th>Nivel</th>
            <th>Turno</th>
            <th>Sexo</th>
            <th>Responsable</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->student->codigo }}</td>
                <td>{{ $student->student->nombres }} {{ $student->student->appaterno }} {{ $student->student->apmaterno }}</td>
                <td>{{ $student->course->grumeral }} {{ $student->course->paralelo }}</td>
                <td>{{ $student->course->nivel }}</td>
                <td>{{ $student->course->turno }}</td>
                <td>{{ ($student->student->sexo == "M")? 'Masculino' : 'Femenino' }}</td>
                <td>{{ $student->student->responsibles[0]?->nombres }} {{ $student->student->responsibles[0]?->appaterno }} {{ $student->student->responsibles[0]?->apmaterno }}</td>
            </tr>
        @endforeach
       
    </tbody>
</table>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush