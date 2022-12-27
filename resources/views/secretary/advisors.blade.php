@extends('layouts.layout')
@section('title', 'asesores titulares')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
@endpush
@section('content')
<form class="tw-pb-16" action="">
    @csrf
    <section class="tw-mt-20 card tw-mx-auto tw-w-[98%]  p-3">
        <div class="text-center">
            <h3>Asesores Titulares</h3>
            {{-- <label for="">
                Gestión Académica
                <input type="number" class="form-control d-inline-block tw-w-[130px] tw-ml-3" name="year" value="{{ date('Y') }}" id="">
            </label> --}}
        </div>
        <div class="mt-4 pb-3">
            <div class="table-responsive">
                <table id="advisors" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Titular</th>
                            <th>Especialidad</th>
                            <th>Curso</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($advisors as $advisor)
                            @php
                                $teacher = $advisor->teacher()->first();
                            @endphp                            
                            <tr>
                                <td>{{ $teacher->appaterno }} {{ $teacher->apmaterno }} {{ $teacher->nombres }}</td>
                                <td>{{ $teacher->especialidad }}</td>
                                <td> {{ $advisor->gnumeral }} "{{ $advisor->paralelo }}" / Nivel: {{ $advisor->nivel }} / Turno: {{ $advisor->turno }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <button class="btn btn-primary-custom mt-2 me-1">Todos los Turnos</button>
                    <button class="btn btn-primary-custom mt-2">Turno Mañana</button>
                    <button class="btn btn-primary-custom mt-2">Turno Tarde</button>
                    <button class="btn btn-primary-custom mt-2">Turno Noche</button>
                </div>
                <div>
                    <button class="btn btn-primary-custom mt-2">Exportar a Excel</button>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="text-center pt-3">
        <button class="btn btn-primary-custom">Exportar a Excel</button>
    </div> --}}
</form>
@endsection
@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.js"></script>
    <script type="module">
        $(document).ready(function(){
            $('#advisors').DataTable({
                lengthChange: false,
                scrollY: '400px',
                scrollCollapse: true,
                paging: false,
                searching: false
                // 'oLanguage': {
                //     'sSearch': 'Búsqueda Rápida'
                // }
            });
        });
    </script>
@endpush