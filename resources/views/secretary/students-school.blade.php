@extends('layouts.layout')
@section('title', 'estudiantes del colegio')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/r-2.3.0/datatables.min.css"/>
@endpush
@section('content')
<form class="tw-pb-16" action="">
    @csrf
    <section class="tw-mt-20 card tw-mx-auto tw-w-[98%]  p-3">
        <div class="text-center">
            <h3>Alumnos del Colegio</h3>
            <label for="">
                Gestión Académica
                <input type="number" class="form-control d-inline-block tw-w-[130px] tw-ml-3" name="year" value="{{ date('Y') }}" id="">
            </label>
        </div>
        <div class="mt-4 pb-3">
            <div class="table-responsive">
                <table id="students" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>RUDE</th>
                            <th>CI</th>
                            <th class="text-nowrap">Exp. ci</th>
                            <th>Pasaporte</th>
                            <th>Nombres</th>
                            <th class="text-nowrap">Ap. paterno</th>
                            <th class="text-nowrap">Ap. materno</th>
                            <th>Sexo</th>
                            <th>Foto</th>
                            <th class="text-nowrap">Pais Nac.</th>
                            <th class="text-nowrap">Dep. Nac.</th>
                            <th class="text-nowrap">Prov. Nac</th>
                            <th class="text-nowrap">Loc. Nac.</th>
                            <th class="text-nowrap">Fec. Nac.</th>
                            <th>Oficialia</th>
                            <th>Libro</th>
                            <th>Partida</th>
                            <th>Folio</th>
                            <th>Provincia</th>
                            <th>Sección</th>
                            <th>Localidad</th>
                            <th>Zona</th>
                            <th>Calle</th>
                            <th>Numero</th>
                            <th>Teléfono</th>
                            <th class="text-nowrap">Corrio Institucional</th>
                            <th>Celular</th>
                            <th>SIE</th>
                            <th class="text-nowrap">Fac. Nombre</th>
                            <th>NIT</th>
                            <th>Complemento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)                            
                            <tr>
                                <td>{{ $student->codigo }}</td>
                                <td>{{ $student->rude }}</td>
                                <td>{{ $student->ci }}</td>
                                <td>{{ $student->exp_ci }}</td>
                                <td>{{ $student->pasaporte }}</td>
                                <td>{{ $student->nombres }}</td>
                                <td>{{ $student->appaterno }}</td>
                                <td>{{ $student->apmaterno }}</td>
                                <td>{{ $student->sexo }}</td>
                                <td>{{ $student->foto }}</td>
                                <td>{{ $student->paisnac }}</td>
                                <td>{{ $student->depnac }}</td>
                                <td>{{ $student->provnac }}</td>
                                <td>{{ $student->locnac }}</td>
                                <td>{{ $student->fnacimiento }}</td>
                                <td>{{ $student->oficialia }}</td>
                                <td>{{ $student->libro }}</td>
                                <td>{{ $student->partida }}</td>
                                <td>{{ $student->folio }}</td>
                                <td>{{ $student->provincia }}</td>
                                <td>{{ $student->seccion }}</td>
                                <td>{{ $student->localidad }}</td>
                                <td>{{ $student->zona }}</td>
                                <td>{{ $student->calle }}</td>
                                <td>{{ $student->numero }}</td>
                                <td>{{ $student->telefono }}</td>
                                <td>{{ $student->correo_institucional }}</td>
                                <td>{{ $student->celular }}</td>
                                <td>{{ $student->sie }}</td>
                                <td>{{ $student->fnombre }}</td>
                                <td>{{ $student->nit }}</td>
                                <td>{{ $student->complemento }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <button class="btn btn-primary-custom me-1">Actualizar información</button>
                <button class="btn btn-primary-custom">Exportar a Excel</button>
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
            $('#students').DataTable({
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