<div class="container-fluid">
    <div class="row g-2">
        <section class="col-lg-3 col-xxl-3 mt-5 " >
            <div class="sidebar-users card tw-h-[500px] lg:tw-h-[1100px] tw-w-[100%] tw-max-w-[400px] mx-auto">
                <ul class="p-0 p-2 ">

                    @foreach($users as $userOne)
                        <li wire:key='user-{{ $userOne->codigo }}' wire:click="editUser({{ $userOne->codigo }})" class="p-1 py-2 d-flex align-items-center border-bottom tw-select-none tw-cursor-pointer user-selectable {{ ($userOne->codigo == $flagUserSelected)? 'selected': '' }}">
                            <figure class="tw-m-0 tw-mr-[10px]">
                          
                                <img class="tw-w-[50px] tw-h-[50px] tw-max-w-none tw-object-cover tw-object-center tw-rounded-full" src="{{ ($userOne->foto == '')? asset('images/user.png') : asset('storage/users/img/'.$userOne->foto) }}" alt="">
    
                            </figure>
                            <div>
                                
                                <div class="tw-text-sm tw-font-bold">{{ $userOne->nombres }} {{$userOne->appaterno}} {{$userOne->apmaterno}}</div>
                                <div>
                                    @if($userOne->tipo == 0)
                                        Administrador
                                    @elseif($userOne->tipo == 1)
                                        Profesor
                                    @elseif($userOne->tipo == 2)
                                        Secretaria
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="filter d-flex justify-content-between mt-3">
                <span>Mostrar:</span>
                <div>
                    <label for="">
                        <input type="radio" wire:model="filtroUsuarios" wire:change="cambiarFiltroUsuarios" value="todos">
                        todos
                    </label>
                    <label for="">
                        <input type="radio" wire:model="filtroUsuarios" wire:change="cambiarFiltroUsuarios" value="administrador">
                        Admin.
                    </label>
                    <label for="">
                        <input type="radio" wire:model="filtroUsuarios" wire:change="cambiarFiltroUsuarios" value="profesor">
                        Prof.
                    </label>
                    <label for="">
                        <input type="radio" wire:model="filtroUsuarios" wire:change="cambiarFiltroUsuarios" value="secretaria">
                        Sria.
                    </label>
                </div>
            </div>
        </section>
        <section class="col-lg-5 col-xxl-6 mt-5">
            <div class="container-form-user card p-3 mx-auto" style="width: 100%; max-width: 700px;">
                <form >

                    <input type="hidden" name="codigo" wire:model="codigo">

                    <fieldset class="card pb-3 mt-3">
                        <legend class="tw-text-sm float-none w-auto">Seleccione el tipo de usuario</legend>
                        <div class="d-flex justify-content-center flex-wrap p-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" wire:change='cambiarTipoForm' wire:model="tipo" id="radio_administrador" value="0"
                                    
                                >
                                <label class="form-check-label" for="radio_administrador">Administrador</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" wire:change='cambiarTipoForm' wire:model="tipo" id="radio_profesor" value="1"
                                
                                >
                                <label class="form-check-label" for="radio_profesor">Profesor</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" wire:change='cambiarTipoForm' wire:model="tipo" id="radio_secretaria" value="2"
                                
                                >
                                <label class="form-check-label" for="radio_secretaria">Secretaria</label>
                            </div>
                        </div>
                        <div>
                            @error('tipo')<p class="text-danger text-center"> {{$message}} </p> @enderror
                        </div>
                    </fieldset>
                    <fieldset class="card pb-3 mt-3">
                        <legend class="tw-text-sm float-none w-auto">Datos de usuario</legend>
                        <div class="container" style="max-width: 900px; width: 100%;">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    {{-- <livewire:change-image-user :user="$user" /> --}}
                                    <div>
                                        <div class="container-img-user">
                                        
                                            <label for="image" class="inline-block mb-3 rounded-full">
                                                <img
                                                    class="  tw-cursor-pointer tw-object-cover tw-object-center tw-rounded-full tw-block tw-aspect-square tw-w-100 tw-max-w-[250px]" style="width: 100%; max-width: 200px;"
                                                   
                                                    @if ($image)
                                                        src="{{$image->temporaryUrl()}}"
                                                    @elseif($user->foto ?? false)
                                                        src="{{asset('storage/users/img/'.$user->foto)}}"
                                                    @else
                                                        src="{{asset('images/user.png')}}"
                                                    @endif
                                                >
                                            </label>
                                        </div>
                                        <input type="file" name="image" id="image" class="tw-hidden" wire:model="image">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="">CI <span class="text-danger">*</span></label>
                                                <input class="form-control tw-uppercase" wire:input='crearClave' name="ci" wire:model="ci" type="text" >
                                                @error('ci')<p class="text-danger"> {{$message}} </p> @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            {{-- <div class="mb-3">
                                                <label for="">Exp CI <span class="text-danger">*</span></label>
                                                <input class="form-control tw-uppercase" name="exp_ci" wire:model="exp_ci" type="text" >
                                                
                                            </div> --}}
                                            <div class="mb-3">
                                                <label for="" class="">Exp. CI: </label>
                                                <select wire:model="exp_ci" class="form-select" id="" >
                                                    <option value="">--</option>
                                                    <option  value="LP">LP La Paz</option>
                                                    <option  value="CB">CB Cochabamba</option>
                                                    <option value="OR">OR Oruro</option>
                                                    <option  value="PT">PT Potosí</option>
                                                    <option  value="TJ">TJ Tarija</option>
                                                    <option value="SC">SC Santa Cruz</option>
                                                    <option value="BE">BE Beni</option>
                                                    <option  value="PD">PD Pando</option>
                                                    <option  value="CH">CH Chuquisaca</option>
                                                </select>
                                                @error('ci')<p class="text-danger"> {{$message}} </p> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Apellido Paterno <span class="text-danger">*</span></label>
                                        <input class="form-control tw-uppercase" wire:input='crearClave' name="appaterno" wire:model="appaterno" type="text" >
                                        @error('appaterno')<p class="text-danger"> {{$message}} </p> @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="">Apellido Materno</label>
                                        <input class="form-control tw-uppercase" name="apmaterno" wire:model="apmaterno" type="text" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Nombre(s) <span class="text-danger">*</span></label>
                                        <input class="form-control tw-uppercase" wire:input='crearClave' name="nombres" wire:model="nombres" type="text" >
                                        @error('nombres')<p class="text-danger"> {{$message}} </p> @enderror

                                    </div>
                                    <div class="mb-3">
                                        <label for="">Correo institucional</label>
                                        <input class="form-control tw-lowercase" name="correo_institucional" wire:model="correo_institucional" type="text" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">RDA</label>
                                        <input class="form-control tw-uppercase" name="rda" wire:model="rda" type="text" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Teléfono</label>
                                        <input class="form-control tw-uppercase" name="telefono" wire:model="telefono" type="text" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Celular</label>
                                        <input class="form-control tw-uppercase" name="celular" wire:model="celular" type="text" >
                                        {{-- @error('celular')<p class="text-danger"> {{$message}} </p> @enderror --}}

                                    </div>
                                    <div class="mb-3">
                                        <label for="">Fec. Nac.</label>
                                        <input class="form-control tw-uppercase" name="fnacimiento" wire:model="fnacimiento" type="date" >
                                        @error('fnacimiento')<p class="text-danger"> {{$message}} </p> @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input class="form-control tw-uppercase" name="mail" wire:model="mail" type="text" >
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="">Dirección</label>
                                    <input class="form-control tw-uppercase" name="direccion" wire:model="direccion" type="text" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label for="">Contraseña</label>
                                    <input class="form-control tw-uppercase" name="clave" type="text" wire:model="clave">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="card pb-3 mt-3 mb-3">
                        <legend class="tw-text-sm float-none w-auto">Opciones</legend>
                        <div class="d-flex justify-content-center flex-wrap">
                            <button type="button" class="btn btn-primary-custom me-1 mt-1" wire:click.prevent="cleanFields">Limpiar</button>
                            <button type="button" class="btn btn-primary-custom me-1 mt-1" {{ ($is_save == false)? 'disabled' : '' }} wire:click="saveUser">Guardar</button>
                            <button type="button" class="btn btn-primary-custom me-1 mt-1" {{ ($is_update == false)? 'disabled' : '' }} wire:click="updateUser">Actualizar</button>
                            <button type="button" class="btn btn-primary-custom me-1 mt-1" {{ ($is_delete == false)? 'disabled' : '' }} wire:click="eliminarUsuario({{$codigo}})">Eliminar</button>
                        </div>
                    </fieldset>
                    @if(session('message'))
                        <x-alert :message="session('message')" color="success" class="mt-3"/>
                    @endif
                </form>
            </div>
        </section>
        <section class="col-lg-4 col-xxl-3 mt-5">
            <div class="card tw-h-[730px] lg:tw-h-[1134px]  tw-w-[100%] tw-max-w-[550px] mx-auto p-2 d-flex flex-column justify-content-between">
                <div class="">
                    <fieldset class="card p-2 pb-3 mt-3 mb-3">
                        <legend class="tw-text-sm float-none w-auto">Información profesor</legend>
                        <div class="">
                            <label for="">Especialidad</label>
                            <input type="text" class="form-control" {{ ($flagEspecialidad)? 'readonly' : '' }} wire:model="especialidad">
                        </div>
                    </fieldset>
                    <fieldset class="card p-2 pb-3 mt-3 mb-3">
                        <legend class="tw-text-sm float-none w-auto">El profesor es titular de los siguientes cursos</legend>
                        <div class="tw-overflow-y-auto tw-h-[150px] tw-text-sm tw-bg-gray-50 tw-border-gray-200 pt-2 tw-divide-y-2">
                            @foreach($cursosProfesor as $cursoProfesor)
                                <div class="py-2 ps-1 curso-de-profesor tw-cursor-pointer {{ ($cursoAEliminar == $cursoProfesor->codigo)? 'selected' : '' }}" wire:click="agregarCursoAEliminar({{ $cursoProfesor->codigo }})" >
                                    <span class="tw-font-bold text-center py-1 px-1 tw-border tw-border-gray-500 me-1">
                                        {{ $cursoProfesor->gnumeral }} "{{ $cursoProfesor->paralelo }}"
                                    </span>
                                    <p class="d-inline-block m-0 me-1">
                                        <span class="tw-font-bold">Nivel:</span>
                                        {{ $cursoProfesor->nivel }}
                                    </p>
                                    <p class="d-inline-block m-0">
                                        <span class="tw-font-bold">Turno:</span>
                                        {{ $cursoProfesor->turno }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <button class="btn btn-primary-custom btn-sm" wire:click="agregarCursoModal">Agregar</button>
                            <button class="btn btn-primary-custom btn-sm" wire:click="eliminarCurso({{ $cursoAEliminar }})">Eliminar</button>
                        </div>
                    </fieldset>
                </div>
                <div class="">
                    <fieldset class="card p-2 pb-2 mt-3 mb-3">
                        <legend class="tw-text-sm float-none w-auto m-0">El profesor imparte las siguientes materias</legend>
                        <div class="text-end">
                            @php
                                $user = App\Models\User::find($codigo);
                                if($user){
                                    if($user->tipo == 1){
                                        $professorId = $user->codigo;
                                    }else{
                                        $professorId = 0;
                                    }
                                }else{
                                    $professorId = 0;
                                }
                            @endphp
                            <a href="{{ route('admins.subjects-export', ['professorId' => $professorId]) }}" target="_blank" class="btn btn-primary-custom btn-sm">xls</a>
                        </div>
                        <div class="tw-overflow-y-auto tw-h-[150px] tw-bg-gray-50 tw-border-gray-200 mt-2 tw-divide-y">
                            @foreach ($materiasProfesor as $materiaProfesor)
                            @php
                                $curso = $materiaProfesor->course()->first();
                                $materia = $materiaProfesor->subject()->first();
                            @endphp
                                <div class="py-1 px-1 tw-cursor-pointer {{ ($materiaSelected == $materiaProfesor->id)? 'selected' : '' }}" wire:click="selectMateriaList({{ $materiaProfesor->id }})">
                                    <span class="d-inline-block tw-text-xs tw-font-bold">
                                        [{{ $materia->sigla }}] {{ $materia->descripcion }}
                                    </span>
                                    <span class="d-inline-block tw-text-xs">
                                        {{ $curso->gnumeral }} "{{ $curso->paralelo }}"" {{ $curso->nivel }}
                                    </span>
                                    <p class="d-inline-block tw-text-xs m-0 px-1 border border-secondary">
                                        P.: {{ $materiaProfesor->periodo }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-primary-custom btn-sm me-1" wire:click="openModalMaterias('Crear')">Agregar</button>
                            <button class="btn btn-primary-custom btn-sm me-1" wire:click="openModalMaterias('Actualizar', {{ $materiaAEditar }})">Editar</button>
                            <button class="btn btn-primary-custom btn-sm" wire:click="eliminarDicta({{ $materiaSelected }})">Remover</button>
                        </div>
                    </fieldset>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal Cursos -->
    <div class="modal" id="cursosModal" tabindex="-1" aria-labelledby="cursosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cursosModalLabel">Cursos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="tw-overflow-y-auto tw-divide-y-2 tw-h-[350px]">
                        @foreach ($cursosSeleccionables as $cursoSeleccionable)    
                            <div class="py-3 curso-de-profesor tw-select-none tw-cursor-pointer {{ ($cursoAAgregar == $cursoSeleccionable->codigo)? 'selected' : '' }} text-center" wire:click="agregarCursoAAgregar({{ $cursoSeleccionable->codigo }})">
                                <span class="tw-font-bold text-center py-1 px-1 tw-border tw-border-gray-500 me-1">
                                    {{ $cursoSeleccionable->gnumeral }} "{{ $cursoSeleccionable->paralelo }}"
                                </span>
                                <p class="d-inline-block m-0 me-1">
                                    <span class="tw-font-bold">Nivel:</span>
                                    {{ $cursoSeleccionable->nivel }}
                                </p>
                                <p class="d-inline-block m-0">
                                    <span class="tw-font-bold">Turno:</span>
                                    {{ $cursoSeleccionable->turno }}
                                </p>
                            </div>
                        @endforeach
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary-custom" wire:click="asignarCurso({{ $cursoAAgregar }})">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal materias -->
    <div class="modal" wire:ignore.self id="materiasModal" tabindex="-1" aria-labelledby="materiasModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="materiasModalLabel">Materias que dicta por curso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="row g-0">
                                    <div class="col-12">
                                        <h4 class="text-center">Cursos</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="tw-border tw-border-gray-200 tw-overflow-y-auto tw-h-[400px] w-100 tw-divide-y">
                                            @foreach ($cursosListaModal as $cursoListaModal)
                                                <div class="py-3 ps-1 tw-cursor-pointer {{ ($cursoSelectedModal == $cursoListaModal->codigo)? 'selected' : '' }}" wire:click="cursoSelectModal({{ $cursoListaModal->codigo }})">
                                                    <span class="tw-font-bold text-center py-1 px-1 tw-border tw-border-gray-500 me-1">
                                                        {{ $cursoListaModal->gnumeral }} "{{ $cursoListaModal->paralelo }}"
                                                    </span>
                                                    <p class="d-inline-block m-0 me-1">
                                                        <span class="tw-font-bold">Nivel:</span>
                                                        {{ $cursoListaModal->nivel }}
                                                    </p>
                                                    <p class="d-inline-block m-0">
                                                        <span class="tw-font-bold">Turno:</span>
                                                        {{ $cursoListaModal->turno }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row g-0">
                                    <div class="col-12">
                                        <h4 class="text-center">Materias</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="tw-border tw-border-gray-200 tw-overflow-y-auto tw-h-[400px] w-100 tw-divide-y">
                                            @foreach ($materiasListaModal as $materiaListaModal)
                                                <div class="py-3 ps-1 tw-cursor-pointer {{ ($materiaSelectedModal == $materiaListaModal->codigo)? 'selected' : '' }}" wire:click="materiaSelectModal({{ $materiaListaModal->codigo }})">
                                                    <span class="tw-font-bold text-center py-1 px-1 tw-border tw-border-gray-500 me-1">
                                                        {{ $materiaListaModal->sigla }} 
                                                    </span>
                                                    <p class="d-inline-block m-0 me-1">
                                                        {{-- <span class="tw-font-bold">Nivel:</span> --}}
                                                        {{ $materiaListaModal->descripcion }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="tw-max-w-[150px] w-100 mx-auto mt-3">
                                    <label for="">Periodos</label>
                                    <input type="text" class="form-control input-number" wire:model="periodos">
                                </div>
                                @if (session('messageModalMateriasE'))
                                    <x-alert :message="session('messageModalMateriasE')" color="danger" classes="mt-3" />
                                @endif
                                @if (session('messageModalMaterias'))
                                    <x-alert :message="session('messageModalMaterias')" color="success" classes="mt-3" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="crearEditarMateria">{{ $textMateriasModal }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="module">
        // $(document).ready(function(){
        //     $('body').on('click', '.user-selectable', function(){
        //         $('.user-selectable').removeClass('selected');
        //         setTimeout(() => {

        //             $(this).addClass('selected');
        //         }, 1000);
        //     })
        // });
        document.addEventListener('livewire:load', function(){
            // var cursosModal = document.getElementById('cursosModal');
            var materiasModal = new bootstrap.Modal(document.getElementById('materiasModal'));
            
            document.addEventListener('show-cursos-modal', () => {
                const cursosModal = new bootstrap.Modal('#cursosModal', {});
    
                cursosModal.show();
            });
            document.addEventListener('hide-cursos-modal', () => {
                const cursosModal = new bootstrap.Modal('#cursosModal', {});
    
                cursosModal.hide();
            });
            document.addEventListener('hide-materias-modal', () => {
                // const materiasModal = new bootstrap.Modal('#materiasModal', {});
    
                materiasModal.hide();
            });
            document.addEventListener('show-materias-modal', () => {
                // const materiasModal = new bootstrap.Modal('#materiasModal', {});
    
                materiasModal.show();
            });
            document.addEventListener('delete-backdrop-cursos-modal', () => {
                // const cursosModal = new bootstrap.Modal('#cursosModal', {});
                $('.modal-backdrop').remove();
                $('body').css('overflow', 'auto');
                $('body').css('padding-right', '0');
                // cursosModal.hide();
            });
            $('.input-number').on('input', function () { 
                this.value = this.value.replace(/[^0-9]/g,'');
            });
        });

    </script>
@endpush
{{-- DBORELLANA --}}
{{-- 246223CLS --}}