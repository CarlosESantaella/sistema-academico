<div>
    <h2 class="fs-4 text-center mb-4 fw-bold">Datos del estudiante</h2>

    <div class="row">
        <livewire:change-image-student :student="$student ?? ''"/>
        <div class="col-xl-8">
            <div class="mb-3 row">
                <label for="code" class="col-12 fw-bold">CÓDIGO</label>
                <div class="col-12">
                    <input type="text" readonly class="form-control tw-uppercase" id="codigo" name="codigo"
                        value="{{ $student->codigo ?? '' }}">
                </div>
            </div>
            {{-- <p class="mb-2">
                <b>Apellidos y Nombres</b>
            </p> --}}
            <div class="mb-3 row">
                <label for="appaterno" class="col-12 col-form-label">Ap. Paterno</label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="appaterno" name="appaterno"
                        value="{{$student->appaterno ?? '' }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="apmaterno" class="col-12 col-form-label">Ap. Materno</label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="apmaterno" name="apmaterno"
                        value="{{$student->apmaterno ?? '' }}">
                </div>
            </div> 
            <div class="mb-3 row">
                <label for="nombres" class="col-12 col-form-label">Nombres</label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="nombres" name="nombres"
                        value="{{$student->nombres ?? '' }}">
                </div>
            </div>
        </div>
    </div>

    <!-- Estudiante -->
    <div class="card p-3">
        <div class="mb-3">
            <label for="codigo_estudiantil_rude" class="label fw-bold mb-2">Código estudiantil RUDE</label>
            <input type="text" class="form-control tw-uppercase" name="codigo_estudiantil_rude"
                id="codigo_estudiantil_rude" value="{{$student->rude ?? '' }}">
            @error('codigo_estudiantil_rude')
                <p class="text-danger w-100">Este campo es obligatorio</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="label fw-bold mb-2">Documento de identificación</label>
            <div class="row">

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="documento" class="col-12 col-form-label">C.I :</label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="documento" name="documento"
                                value="{{$student->ci ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="expedido_del_ci" class="col-12 col-form-label tw-uppercase">Exp. CI. :</label>
                        <div class="col-12">
                            <x-students.edit.elements.select-exp-ci 
                                id="expedido_del_ci" 
                                :exp="$student->exp_ci ?? '' "
                            />
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="pasaporte" class="col-12 col-form-label">Pasaporte</label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="pasaporte" name="pasaporte"
                                value="{{$student->pasaporte ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="fecha_nacimiento" class="col-12 col-form-label">Fec. Nac. :</label>
                        <div class="col-12">
                            <input type="date" class="form-control tw-uppercase" id="fecha_nacimiento"
                                name="fecha_nacimiento" value="{{$student->fnacimiento ?? '' }}">
                            @error('fecha_nacimiento')
                                <p class="text-danger w-100">Este campo es obligatorio</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="sexo" class="col-12 col-form-label">Sexo :</label>
                        <div class="col-12">
                            <select class="form-select" id="sexo" name="sexo">
                                @isset($student)
                                    <option 

                                        @if($student->sexo =='M')         
                                            selected
                                        @endif
                                        value="M"
                                    >Mujer</option>
                                    <option 
                                        @if($student->sexo =='H')         
                                            selected
                                        @endif
                                        value="H"
                                    >Hombre</option>
                                @else
                                    <option value="M">Mujer</option>
                                    <option value="H">Hombre</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="celular_alumno" class="col-12 col-form-label">Celular: </label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="celular_alumno" name="celular_alumno"
                                value="{{$student->celular ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3 row">
                        <label for="correo_institucional" class="col-12 col-form-label">Correo institucional :</label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="correo_institucional" name="correo_institucional"
                                value="{{$student->correo_institucional ?? '' }}">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-6 col-md-3">
                    <label for="oficialia_n" class="label fw-bold">Oficialia N</label>
                    <input type="text" class="form-control tw-uppercase" id="oficialia_n" name="oficialia_n"
                        value="{{$student->oficialia ?? '' }}">
                </div>
                <div class="col-6 col-md-3">
                    <label for="libro_n" class="label fw-bold">Libro N</label>
                    <input type="text" class="form-control tw-uppercase" id="libro_n" name="libro_n"
                        value="{{$student->libro ?? '' }}">
                </div>
                <div class="col-6 col-md-3">
                    <label for="partida_n" class="label fw-bold">Partida N</label>
                    <input type="text" class="form-control tw-uppercase" id="partida_n" name="partida_n"
                        value="{{$student->partida ?? '' }}">
                </div>
                <div class="col-6 col-md-3">
                    <label for="folio_n" class="label fw-bold">Folio N</label>
                    <input type="text" class="form-control tw-uppercase" id="folio_n" name="folio_n"
                        value="{{$student->folio ?? '' }}">
                </div>
            </div>
        </div>
    </div>

    <!-- Lugar de nacimiento -->
    <div class="card p-3 mt-3">
        <div class="">
            <label class="label fw-bold mb-2">Lugar de nacimiento</label>
            <div class="row">

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="paisnac" class="col-12 col-form-label">Pais :</label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="paisnac" name="paisnac"
                                value="{{$student->paisnac ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="provnac" class="col-12 col-form-label">Provincia: </label>
                        <div class="col-12">
                            <select 
                                class="form-select provincia-select"
                                name="provnac" 
                                id="provnac" 
                                data-provincia="{{$student->provnac ?? '' }}"
                            ></select>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <label for="depnac" class="col-12 col-form-label">Departamento:</label>
                        <div class="col-12">
                            <select 
                                class="form-select departamento-select"
                                name="depnac" 
                                id="depnac" 
                                data-departamento="{{$student->depnac ?? '' }}"
                            ></select>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <label for="locnac" class="col-12 col-form-label">Localidad :</label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="locnac" name="locnac"
                                value="{{$student->locnac ?? '' }}">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Dirección actual -->
    <div class="card p-3 mt-3">
        <div class="">
            <label class="label fw-bold mb-2">Dirección actual</label>
            <div class="row">

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="provincia" class="col-12 col-form-label">Provincia :</label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="provincia" name="provincia"
                                value="{{$student->provincia ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="zona" class="col-12 col-form-label">Zona/Villa: </label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="zona" name="zona"
                                value="{{$student->zona ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <label for="seccion" class="col-12 col-form-label">Sección:</label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="seccion" name="seccion"
                                value="{{$student->seccion ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="row">
                                <label for="calle" class="col-12 col-form-label">Callle :</label>
                                <div class="col-12">
                                    <input type="text" class="form-control tw-uppercase" id="calle" name="calle"
                                        value="{{$student->calle ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="row">
                                <label for="numero" class="col-12 col-form-label">N" :</label>
                                <div class="col-12">
                                    <input type="text" class="form-control tw-uppercase" id="numero" name="numero"
                                        value="{{$student->numero ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="localidad" class="col-12 col-form-label">Localidad: </label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="localidad" name="localidad"
                                value="{{$student->localidad ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <label for="telefono" class="col-12 col-form-label">Telefono:</label>
                        <div class="col-12">
                            <input type="text" class="form-control tw-uppercase" id="telefono" name="telefono"
                                value="{{$student->telefono ?? '' }}">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    @if(auth()->user()->tipo == '0' and request()->routeIs('admins.edit.student'))
    {{-- credenciales --}}

    <div class="card p-3 mt-3">
        <div class="">
            <label class="label fw-bold mb-2">Credenciales</label>
            <div class="row">

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="username" class="col-12 col-form-label">Usuario :</label>
                        <div class="col-12">
                            <input type="text" readonly class="form-control tw-uppercase" id="username" 
                                value="{{$username }}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="password" class="col-12 col-form-label">Contraseña: </label>
                        <div class="col-12">
                            <input type="text" readonly class="form-control" id="password" name="password"
                                value="{{ $password }}">
                        </div>
                    </div>
                </div>

                

            </div>
        </div>
    </div>
    @endif
    
</div>