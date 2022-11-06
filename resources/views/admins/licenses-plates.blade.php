@extends('layouts.layout')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
    <style>

    </style>
@endpush
@section('content')
@php
    // die($students[0]->student->responsibles[0]->nombres);
@endphp
<div class="container-table mx-auto mt-5" style="max-width: 1200px; width: 95%;">

    <div class="table-responsive">
        <div class="filters-table d-flex justify-content-between flex-wrap">
            <div class="d-flex flex-wrap">
                <div class="from-date d-flex align-items-center my-2 me-2">
                    <span>Desde: </span>
                    <input type="date" class="from-date-input form-control ms-1" name="" id="" value="{{ $startDate ?? '' }}">
                </div>
                <div class="to-date d-flex align-items-center my-2">
                    <span>Hasta: </span>
                    <input type="date" class="to-date-input form-control ms-1" name="" id="" value="{{ $endDate ?? '' }}">
                </div>
            </div>
            <div class="d-flex align-items-center">
                <a href="{{ route('students.license-plates-export', ['startDate' => $startDate, 'endDate' => $endDate]) }}" class="btn btn-success me-1 text-break">Exportar Excel</a>
                <button class="btn btn-primary-custom search-table">Buscar</button>
            </div>
        </div>
        <table id="students" class="table table-striped table-bordered" style="width:100%">
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
                        <td>{{ $student->student->responsibles[0]->nombres ?? ''  }} {{ $student->student->responsibles[0]->appaterno ?? '' }} {{ $student->student->responsibles[0]->apmaterno ?? '' }}</td>
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
                searching: false,

            });

            $('.search-table').on('click', function(){
                let from_date = $('.from-date-input').val();
                let to_date = $('.to-date-input').val();
                url = "{{ route('admins.licenses_plates', ['startDate' => 'date1', 'endDate' => 'date2']) }}";
                url = url.replace('date1', from_date);
                url = url.replace('date2', to_date);
                
                window.location.href = url;
            })
        });
    </script>
@endpush