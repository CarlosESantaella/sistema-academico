<div class="mt-5 container tw-w-[95%]  mx-auto card tw-max-w-[800px] pb-3
mb-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between flex-wrap">

                <div class="text-end mt-3">
                    <button class="btn btn-primary-custom btn-sm" wire:click="abrirCursosModal">Gestionar cursos</button>
                </div>
                <div class="text-end mt-3">
                    <button class="btn btn-primary-custom btn-sm" wire:click="abrirAnadirMateriaModal">Gestionar materias
                        y áreas</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mt-2">
                <h3 class="text-center mt-2 ">Cursos</h3>
            </div>
            <div class="card tw-h-[450px] tw-overflow-y-auto">
                @foreach ($cursos as $curso_aux)
                    <div class="tw-py-2 tw-px-1 tw-cursor-pointer curso {{ $cursoSeleccionado == $curso_aux->codigo ? 'selected' : '' }}"
                        wire:key="curso-{{ $curso_aux->codigo }}"
                        wire:click="seleccionarCurso({{ $curso_aux->codigo }})">
                        <span class="tw-inline-block px-2 border tw-font-bold tw-mr-1 tw-text-sm">
                            {{ $curso_aux->gnumeral }}
                            "{{ $curso_aux->paralelo }}"
                        </span>
                        <span class="tw-inline-block tw-mr-1 tw-text-sm">
                            <strong>Nivel: </strong>
                            {{ $curso_aux->nivel }}
                        </span>
                        <span class="tw-inline-block tw-text-sm">
                            <strong>Turno: </strong>
                            {{ $curso_aux->turno }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="mt-2 d-flex tw-justify-between tw-items-center">
                <div class="tw-cursor-pointer" wire:click="anadirMateriaACurso">
                    <i class="fa-solid fa-plus fa-xl text-success"></i>
                </div>
                <h3>Materias</h3>
                <div class="tw-cursor-pointer" wire:click="quitarMateriaACurso">
                    <i class="fa-solid fa-minus fa-xl text-danger"></i>
                </div>
            </div>
            <div class="card tw-h-[450px] tw-overflow-y-auto">
                @foreach ($areas as $area_aux)
                    <h5 class="tw-pl-3 tw-text-lg mt-2 mb-0">{{ $area_aux->descripcion }}</h5>
                    @php
                        $materias_b = $area_aux->subjects()->get();
                    @endphp
                    @foreach ($materias_b as $materia_aux)
                        <div class="tw-py-1 tw-pl-2 tw-cursor-pointer materia {{ $materiaSeleccionada == $materia_aux->codigo ? 'selected' : '' }}"
                            wire:key="materia-{{ $materia_aux->codigo }}"
                            wire:click="seleccionarMateria({{ $materia_aux->codigo }})">
                            @if ($cursoSeleccionado != 0)
                                @php
                                    $materiaCurso = App\Models\Course::find($cursoSeleccionado)
                                        ->subjects()
                                        ->where('codigo', '=', $materia_aux->codigo)
                                        ->first();
                                @endphp
                                @isset($materiaCurso)
                                    <i class="fa-solid fa-file-circle-check fa-xl text-success"></i>
                                @else
                                    <i class="fa-solid fa-file fa-xl text-primary"></i>
                                @endisset
                            @else
                                <i class="fa-solid fa-file fa-xl text-primary"></i>
                            @endif
                            [{{ $materia_aux->sigla }}] {{ $materia_aux->descripcion }}
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
    <!-- añadir materias Modal -->
    <div class="modal" wire:ignore.self id="materiaModal" tabindex="-1" aria-labelledby="materiaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="materiaModalLabel">Gestionar Materias y Áreas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="tw-pl-3 ">Crear Asignatura</h5>
                                @if (session('messageMateriaE'))
                                    <x-alert :message="session('messageMateriaE')" color="danger" classes="mt-2 py-1 " />
                                @endif
                                @if (session('messageMateriaS'))
                                    <x-alert :message="session('messageMateriaS')" color="success" classes="mt-2 py-1 " />
                                @endif
                            </div>
                            <div class="col-sm-9">
                                <label for="">Descripción</label>
                                <input type="text" class="form-control" wire:model='descripcionMateria'>
                            </div>
                            <div class="col-sm-3">
                                <label for="">Sigla:</label>
                                <input type="text" class="form-control" wire:model='siglaMateria' maxlength="5">
                            </div>
                            <div class="col-12">
                                <label for="">Area:</label>
                                <select wire:model="areaMateria" class="form-select" id="">
                                    <option value=""></option>
                                    @foreach ($areas as $area_aux)
                                        <option value="{{ $area_aux->codigo }}">{{ $area_aux->descripcion }}</option>
                                    @endforeach)
                                </select>
                            </div>
                            <div class="col-12 text-end ">
                                <button type="button" class="btn btn-primary-custom btn-sm mt-2"
                                    wire:click="crearMateria">Guardar</button>

                            </div>
                            <div class="col-12">
                                <h5 class="tw-pl-3 ">Eliminar Asignatura</h5>
                            </div>
                            <div class="col-12">
                                <label for="">Descripción</label>
                                <select wire:model="materiaAEliminar" class="form-select" id="">
                                    <option value=""></option>
                                    @foreach ($areas as $area_aux)
                                        @php
                                            $materias_aux = $area_aux->subjects()->get();
                                        @endphp
                                        @foreach ($materias_aux as $materia_aux)
                                            <option value="{{ $materia_aux->codigo }}">
                                                {{ $materia_aux->descripcion }}
                                            </option>
                                        @endforeach
                                    @endforeach)
                                </select>
                            </div>
                            <div class="col-12 text-end ">
                                <button type="button" class="btn btn-primary-custom btn-sm mt-2"
                                    wire:click="eliminarMateria">Eliminar</button>

                            </div>
                            <hr class="tw-max-w-[85%] tw-w-[100%] tw-mx-auto tw-my-7">
                            <div class="col-12">
                                <h5 class="tw-pl-3 ">Crear Área</h5>
                                @if (session('messageAreaE'))
                                    <x-alert :message="session('messageAreaE')" color="danger" classes="mt-2 py-1 " />
                                @endif
                                @if (session('messageAreaS'))
                                    <x-alert :message="session('messageAreaS')" color="success" classes="mt-2 py-1 " />
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="">Descripción</label>
                                <input type="text" wire:model="descripcionArea" class="form-control">
                            </div>
                            <div class="col-12 text-end ">
                                <button type="button" class="btn btn-primary-custom btn-sm mt-2"
                                    wire:click="crearArea">Guardar</button>
                            </div>
                            <div class="col-12">
                                <h5 class="tw-pl-3 ">Eliminar Área</h5>
                            </div>
                            <div class="col-12">
                                <label for="">Descripción</label>
                                <select wire:model="areaAEliminar" class="form-select" id="">
                                    <option value=""></option>
                                    @foreach ($areas as $area_aux)
                                        <option value="{{ $area_aux->codigo }}">{{ $area_aux->descripcion }}</option>
                                    @endforeach)
                                </select>
                            </div>
                            <div class="col-12 text-end ">
                                <button type="button" class="btn btn-primary-custom btn-sm mt-2"
                                    wire:click="eliminarArea">Eliminar</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="button" class="btn btn-primary-custom">Guardar</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- cursos Modal -->
    <div class="modal" wire:ignore.self id="cursosModal" tabindex="-1" aria-labelledby="cursosModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cursosModalLabel">Gestionar Cursos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="tw-pl-3 ">Crear Curso</h5>
                                @if (session('messageCursoE'))
                                    <x-alert :message="session('messageCursoE')" color="danger" classes="mt-2 py-1 " />
                                @endif
                                @if (session('messageCursoS'))
                                    <x-alert :message="session('messageCursoS')" color="success" classes="mt-2 py-1 " />
                                @endif
                            </div>
                            <div class="col-6 mb-2">
                                <label for="">Nivel</label>
                                <input type="text" wire:model="nivelCurso" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="">Grado</label>
                                <input type="text" wire:model="gradoCurso" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="">Gnumeral</label>
                                <input type="text" wire:model="gnumeralCurso" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="">Paralelo</label>
                                <input type="text" wire:model="paraleloCurso" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="">Turno</label>
                                <select wire:model="turnoCurso" class="form-select">
                                    <option value=""></option>
                                    <option value="Mañana">Mañana</option>
                                    <option value="Tarde">Tarde</option>
                                    <option value="Noche">Noche</option>
                                </select>
                            </div>
                            <div class="col-12 text-end ">
                                <button type="button" class="btn btn-primary-custom btn-sm mt-2" wire:click="crearCurso">Guardar</button>
                            </div>
                            <div class="col-12">
                                <h5 class="tw-pl-3 ">Eliminar Curso</h5>
                            </div>
                            <div class="col-12">
                                <label for="">Cursos</label>
                                <select wire:model="cursoAEliminar" class="form-select" id="">
                                    <option value=""></option>
                                    @foreach ($cursos as $curso_aux)
                                        <option value="{{ $curso_aux->codigo }}">
                                            <span class="tw-inline-block px-2 border tw-font-bold tw-mr-1 tw-text-sm">
                                                {{ $curso_aux->gnumeral }}
                                                "{{ $curso_aux->paralelo }}"
                                            </span>
                                            <span class="tw-inline-block tw-mr-1 tw-text-sm">
                                                <strong>Nivel: </strong>
                                                {{ $curso_aux->nivel }}
                                            </span>
                                            <span class="tw-inline-block tw-text-sm">
                                                <strong>Turno: </strong>
                                                {{ $curso_aux->turno }}
                                            </span>
                                        </option>
                                    @endforeach)
                                </select>
                            </div>
                            <div class="col-12 text-end ">
                                <button type="button" class="btn btn-primary-custom btn-sm mt-2"
                                    wire:click="eliminarCurso">Eliminar</button>

                            </div>
                            {{-- <hr class="tw-max-w-[85%] tw-w-[100%] tw-mx-auto tw-my-7"> --}}

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="module">
        document.addEventListener('livewire:load', function(){
            var addSubjectModal = new bootstrap.Modal(document.getElementById('materiaModal'));
            var coursesModal = new bootstrap.Modal(document.getElementById('cursosModal'));

            document.addEventListener('show-add-subject-modal', () => {
                addSubjectModal.show();
            });
            document.addEventListener('show-courses-modal', () => {
                coursesModal.show();
            });
            document.addEventListener('hide-add-subject-modal', () => {
                addSubjectModal.hide();
            })
        });

    </script>
@endpush
