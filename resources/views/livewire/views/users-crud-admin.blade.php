<div class="container-fluid">
    <div class="row">
        <section class="col-lg-3  " >
            <div class="sidebar-users card">
                <ul class="p-0 p-2 ">

                    @foreach($users as $userOne)
                        <li wire:click="editUser({{ $userOne->codigo }})" class="p-1 py-2 d-flex align-items-center border-bottom tw-select-none tw-cursor-pointer">
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
        </section>
        <section class="col-lg-6  ">
            <div class="container-form-user card p-3 mt-5 mx-auto" style="width: 100%; max-width: 700px;">
                <form >

                    <input type="hidden" name="codigo" wire:model="codigo">

                    <fieldset class="card pb-3 mt-3">
                        <legend class="tw-text-sm float-none w-auto">Seleccione el tipo de usuario</legend>
                        <div class="d-flex justify-content-center flex-wrap p-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" wire:model="tipo" id="radio_administrador" value="0"
                                    
                                >
                                <label class="form-check-label" for="radio_administrador">Administrador</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" wire:model="tipo" id="radio_profesor" value="1"
                                
                                >
                                <label class="form-check-label" for="radio_profesor">Profesor</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" wire:model="tipo" id="radio_secretaria" value="2"
                                
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
                                            <div class="mb-3">
                                                <label for="">Exp CI <span class="text-danger">*</span></label>
                                                <input class="form-control tw-uppercase" wire:input='crearClave' name="ci" wire:model="ci" type="text" >
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
                                        <input class="form-control tw-uppercase" name="correo_institucional" wire:model="correo_institucional" type="text" >
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
                                    <input class="form-control tw-uppercase" name="clave" type="text" readonly wire:model="clave">
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
        <section class="col-lg-3  border border-danger">

        </section>
    </div>
</div>
{{-- DBORELLANA --}}
{{-- 246223CLS --}}