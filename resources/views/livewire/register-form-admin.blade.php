<div class="container-fluid">
    <div class="row ">
        <div class="col-md-8 col-lg-9">
            <div class="d-flex py-5">

                <div class="register card p-2 tw-mx-auto tw-max-w-[700px] tw-w-[100%]">
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
                            <select class="form-select" name="" wire:model="curso" id="">
                                @foreach ($cursos as $curso)
                                    <option value="{{ $curso->codigo }}">
                                        <strong>{{ $curso->gnumeral }} {{ $curso->paralelo }}</strong>            
                                        <strong> - </strong>{{ $curso->nivel }}            
                                        <strong> - </strong>{{ $curso->turno }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary-custom btn-sm tw-text-sm mt-2" {{ ($flagRegister)? '' : 'disabled' }} wire:click="crearMatricula">Registrar Matricula</button>
                
                            @if(session('messageCreateRegisterSuccess'))
                                <x-alert :message="session('messageCreateRegisterSuccess')" color="success" classes="mt-2 mb-0" />
                            @endif
                            @if(session('messageCreateRegisterError'))
                                <x-alert :message="session('messageCreateRegisterError')" color="danger" classes="mt-2 mb-0" />
                            @endif
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
                                    @foreach($matriculas as $matricula_aux)
                                        <tr class="tw-cursor-pointer registro-matricula {{ ($matriculaAEliminar == $matricula_aux->codigo)? 'selected' : '' }}" wire:click="seleccionarMatricula({{ $matricula_aux->codigo }})">
                                            <td>{{ $matricula_aux->codigo }}</td>
                                            <td>{{ $matricula_aux->finscripcion->format('Y-m-d') }}</td>
                                            <td>{{ $matricula_aux->course()->first()->gnumeral }}{{ $matricula_aux->course()->first()->paralelo }}</td>
                                            <td>{{ $matricula_aux->finscripcion->format('Y') }}</td>
                                            <td>{{ $matricula_aux->codalumno }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                    <div class="mt-2">
                        <button class="btn btn-primary-custom btn-delete-register" 
                        {{-- onclick="confirm('¿estas seguro?') || event.stopImmediatePropagation()"  --}}
                        data-id="{{ $matriculaAEliminar }}" 
                        {{-- wire:click="eliminarMatricula({{ $matriculaAEliminar }})" --}}
                        >Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3">
            <section class="w-100 card sidebar-registered tw-h-[100vh]  tw-min-h-[400px] md:tw-min-h-[700px] tw-mx-auto  tw-mb-3 md:tw-mb-0">
                <article class="header-registered p-2">
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="w-100 tw-max-w-[230px]">
                            <h5 class="tw-text-gray-700 text-center m-0 tw-text-[19px]">Estudiantes matriculados</h5>
                            <p class="tw-text-gray-400 tw-text-[12px] text-center">La Paz, {{ $fecha }}</p>
                        </div>
                        <div class="text-center ms-auto mb-2">
                            <button class="btn btn-primary-custom btn-sm" wire:click="$emit('cambiarTurno')">Actualizar</button>
                        </div>
                    </div>
                    <div class="text-center">
                        <label for="" class="d-inline-block me-2">
                            <input type="radio" wire:model="filtroTurno" wire:change="cambiarTurno" value="manana">
                            Mañana
                        </label>
                        <label for="" class="d-inline-block me-2">
                            <input type="radio" wire:model="filtroTurno" wire:change="cambiarTurno" value="tarde">
                            Tarde
                        </label>
                        <label for="" class="d-inline-block me-2">
                            <input type="radio" wire:model="filtroTurno" wire:change="cambiarTurno" value="noche">
                            Noche
                        </label>
                    </div>
                </article>
                <article class="w-100 tw-bg-gray-50 tw-border tw-border-gray-200 tw-h-[100%] md:tw-h-[100%] tw-overflow-y-auto">
                    <ul class="p-0 m-0 tw-divide-y tw-divide-gray-200">
                        @foreach($matriculasPorTurno as $matriculaPorTurno)
                            @isset($matriculaPorTurno->course)
                                @php
                                    $counterMPT++;
                                @endphp
                                <li class="p-1 m-0 tw-list-none">
                                    [ Cod.: {{ $matriculaPorTurno->student->codigo }}] - {{ $matriculaPorTurno->student->appaterno }} {{ $matriculaPorTurno->student->apmaterno }} {{ $matriculaPorTurno->student->nombres }}
                                </li>
                            @endisset
                        @endforeach
                    </ul>
                </article>
                <article class="footer-registered tw-h-[100px] p-2">
                    <p class="text-end m-0 mt-2">
                        Total registros:
                        <span class="d-inline-block tw-py-1 tw-w-[90px] text-center tw-bg-gray-50 tw-border tw-border-gray-200" >
                            {{ $counterMPT }}
                        </span>
                    </p>
                </article>
            </section>
        </div>
    </div>
</div>
@push('scripts')
    <script type="module">
        $(document).ready(function(){
            $('body').on('click', '.btn-delete-register', function(){
                let matriculaAEliminar = $(this).attr('data-id');
                if(matriculaAEliminar != '0'){

                    if(confirm('¿estas seguro que deseas eliminar esta matricula?')){
                        Livewire.emit('eliminarMatricula', matriculaAEliminar);
                    }
                }
            });
        });
    </script>
@endpush



