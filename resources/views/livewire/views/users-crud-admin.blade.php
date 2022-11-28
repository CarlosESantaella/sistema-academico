<div class="container-fluid">
    <div class="row">
        <section class="col-lg-2  " >
            <div class="sidebar-users card">
                <ul class="p-0 p-2 ">

                    @foreach($users as $user)
                        <li wire:click="editUser({{ $user->codigo }})" class="p-1 py-2 d-flex align-items-center border-bottom tw-select-none tw-cursor-pointer">
                            <figure class="m-0">
                                @if($user->foto == '')
                                    <img class="tw-w-[50px] me-2" src="{{ asset('images/user.png') }}" alt="">
                                @else
                                    <img  class="tw-w-[50px] me-2" src="{{ asset('storage/users/img/'.$user->foto) }}" alt="">
                                @endif
                            </figure>
                            <div>
                                
                                <div class="tw-text-sm tw-font-bold">{{ $user->nombres }} {{$user->appaterno}} {{$user->apmaterno}}</div>
                                <div>
                                    @if($user->tipo == 0)
                                        Administrador
                                    @elseif($user->tipo == 1)
                                        Profesor
                                    @elseif($user->tipo == 2)
                                        Secretaria
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <section class="col-lg-7  ">
            <div class="container-form-user card p-3 mt-5 mx-auto" style="width: 100%; max-width: 700px;">
                <form action="">
                    <fieldset class="card pb-3 mt-3">
                        <legend class="tw-text-sm float-none w-auto">Seleccione el tipo de usuario</legend>
                        <div class="d-flex justify-content-center flex-wrap p-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" wire:model="tipo" id="radio_administrador" value="0"
                                    
                                >
                                <label class="form-check-label" for="radio_administrador">Administrador</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" wire:model="tipo" id="radio_profesor" value="1"
                                
                                >
                                <label class="form-check-label" for="radio_profesor">Profesor</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" wire:model="tipo" id="radio_secretaria" value="2"
                                
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
                                    <livewire:change-image-user :user="$user_edit" />
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">CI <span class="text-danger">*</span></label>
                                        <input class="form-control" wire:model="ci" type="text" >
                                        @error('ci')<p class="text-danger"> {{$message}} </p> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Apellido Paterno <span class="text-danger">*</span></label>
                                        <input class="form-control" wire:model="appaterno" type="text" >
                                        @error('appaterno')<p class="text-danger"> {{$message}} </p> @enderror

                                    </div>
                                    <div class="mb-3">
                                        <label for="">Apellido Materno</label>
                                        <input class="form-control" wire:model="apmaterno" type="text" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Nombre(s) <span class="text-danger">*</span></label>
                                        <input class="form-control" wire:model="nombres" type="text" >
                                        @error('nombres')<p class="text-danger"> {{$message}} </p> @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Dirección</label>
                                        <input class="form-control" wire:model="direccion" type="text" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Teléfono</label>
                                        <input class="form-control" wire:model="telefono" type="text" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Fec. Nac.</label>
                                        <input class="form-control" wire:model="fnacimiento" type="date" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input class="form-control" wire:model="mail" type="text" >
                                    </div>
                                    <div>
                                        <label for="">Contraseña</label>
                                        <input class="form-control" type="text" readonly wire:model="clave">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="card pb-3 mt-3">
                        <legend class="tw-text-sm float-none w-auto">Opciones</legend>
                        <div class="d-flex justify-content-center flex-wrap">
                            <button type="button" class="btn btn-primary-custom me-1 mt-1" wire:click.prevent="cleanFields">Limpiar</button>
                            <button type="button" class="btn btn-primary-custom me-1 mt-1" {{ ($is_save == false)? 'disabled' : '' }} wire:click="saveUser">Guardar</button>
                            <button type="button" class="btn btn-primary-custom me-1 mt-1" {{ ($is_update == false)? 'disabled' : '' }}>Actualizar</button>
                            <button type="button" class="btn btn-primary-custom me-1 mt-1" {{ ($is_delete == false)? 'disabled' : '' }}>Eliminar</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>
        <section class="col-lg-3  border border-danger">

        </section>
    </div>
</div>
{{-- DBORELLANA --}}
{{-- 246223CLS --}}