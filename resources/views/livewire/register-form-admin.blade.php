
<div class="register border bg-white tw-shadow-2xl p-2">
    <fieldset class="card pb-3">
        <legend class="tw-text-sm float-none w-auto">Información del estudiante</legend>
        <div class="container">
            <form wire:submit.prevent="searchStudent" >

                <div class="row mb-1">
                    <div class="col-12 col-md-2">
                        <label for="">
                            Código:
                        </label>
                    </div>
                    <div class="col-12 col-md-8  mb-2">
                        <input class="form-control" wire:model="codigo" type="text">
                    </div>
                    <div class="col-12 col-lg-2 ">
                        <input class="btn btn-primary-custom" type="submit" value="Buscar">
                    </div>
    
                </div>
            </form>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="">
                        Nombre:
                    </label>
                </div>
                <div class="col-12 col-md-10">
                    <input class="form-control" wire:model="nombreCompleto" readonly type="text">
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="card pb-3 mt-3">
        <legend class="tw-text-sm float-none w-auto">Gestión academica</legend>
        <div style="width: 95%; max-width: 150px; margin: 0 auto;">
            <input type="number" class="form-control" wire:model="ultimoAnoMatricula" />
        </div>
    </fieldset>
    <fieldset class="card pb-3 mt-3">
        <legend class="tw-text-sm float-none w-auto">Datos de inscripción</legend>
        <div class="mx-auto  w-100 text-center" style="max-width: 500px;">
            <select class="form-select" name="" id="">
                @foreach ($cursos as $curso)
                    <option value="">
                        <strong>{{ $curso->gnumeral }} {{ $curso->paralelo }}</strong>            
                        <strong> - </strong>{{ $curso->nivel }}            
                        <strong> - </strong>{{ $curso->turno }}
                    </option>
                @endforeach)
            </select>
            <button class="btn btn-primary-custom btn-sm tw-text-sm mt-2">Registrar Matricula</button>
        </div>
    </fieldset>
    <fieldset class="card p-2 pb-3 mt-3">
        <legend class="tw-text-sm float-none w-auto">Historial</legend>
        <div class="table-responsive" style="max-height: 200px; overflow: scroll;">
            <table class="table table-bordered">
                <thead>
                    <th>Código</th>
                    <th>Fecha Inscripción</th>
                    <th>Curso</th>
                    <th>Gestión</th>
                    <th>Usuario</th>
                </thead>
                <tbody>
                    @foreach($matriculas as $matricula)
                        <tr>
                            <td>{{ $matricula->codigo }}</td>
                            <td>{{ $matricula->finscripcion->format('Y-m-d') }}</td>
                            <td>{{ $matricula->course()->first()->gnumeral }}{{ $matricula->course()->first()->paralelo }}</td>
                            <td>{{ $matricula->finscripcion->format('Y') }}</td>
                            <td>{{ $matricula->codalumno }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </fieldset>
    <div class="mt-2">
        <button class="btn btn-primary-custom">Eliminar</button>
    </div>
</div>

