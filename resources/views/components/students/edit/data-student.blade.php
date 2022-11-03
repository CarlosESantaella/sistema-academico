<div>
    <h2 class="fs-4 text-center mb-4 fw-bold">Datos del estudiante</h2>

    <div class="row">
        <livewire:change-image-student :student="$student"/>
        <div class="col-xl-8">
            <div class="mb-3 row">
                <label for="code" class="col-4 col-form-label fw-bold">CÓDIGO</label>
                <div class="col-8">
                    <input type="text" disabled class="form-control" id="codigo" name="codigo"
                        value="{{ $student->codigo }}">
                </div>
            </div>
            <p class="mb-2">
                <b>Apellidos y Nombres</b>
            </p>
            <div class="mb-3 row">
                <label for="appaterno" class="col-4 col-form-label">Ap. Paterno</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="appaterno" name="appaterno"
                        value="{{$student->appaterno}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="apmaterno" class="col-4 col-form-label">Ap. Materno</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="apmaterno" name="apmaterno"
                        value="{{$student->apmaterno}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombres" class="col-4 col-form-label">Nombres</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="nombres" name="nombres"
                        value="{{$student->nombres}}">
                </div>
            </div>
        </div>
    </div>

    <!-- Estudiante -->
    <div class="card p-3">
        <div class="mb-3">
            <label for="codigo_estudiantil_rude" class="label fw-bold mb-2">Código estudiantil RUDE</label>
            <input type="text" class="form-control" name="codigo_estudiantil_rude"
                id="codigo_estudiantil_rude" value="{{$student->rude}}">
        </div>
        <div class="mb-3">
            <label class="label fw-bold mb-2">Documento de identificación</label>
            <div class="row">

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="documento" class="col-sm-4 col-form-label">C.I :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="documento" name="documento"
                                value="{{$student->ci}}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="expedido_del_ci" class="col-sm-4 col-form-label">Exp. CI. :</label>
                        <div class="col-sm-8">
                            <x-students.edit.elements.select-exp-ci 
                                id="expedido_del_ci" 
                                :exp="$student->exp_ci"
                            />
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="pasaporte" class="col-sm-4 col-form-label">Pasaporte</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pasaporte" name="pasaporte"
                                value="{{$student->pasaporte}}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="fecha_nacimiento" class="col-sm-4 col-form-label">Fec. Nac. :</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="fecha_nacimiento"
                                name="fecha_nacimiento" value="{{$student->fnacimiento}}"> 
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="sexo" class="col-sm-4 col-form-label">Sexo :</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="sexo" name="sexo">
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
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-6 col-md-3">
                    <label for="oficialia_n" class="label fw-bold">Oficialia N</label>
                    <input type="text" class="form-control" id="oficialia_n" name="oficialia_n"
                        value="{{$student->oficialia}}">
                </div>
                <div class="col-6 col-md-3">
                    <label for="libro_n" class="label fw-bold">Libro N</label>
                    <input type="text" class="form-control" id="libro_n" name="libro_n"
                        value="{{$student->libro}}">
                </div>
                <div class="col-6 col-md-3">
                    <label for="partida_n" class="label fw-bold">Partida N</label>
                    <input type="text" class="form-control" id="partida_n" name="partida_n"
                        value="{{$student->partida}}">
                </div>
                <div class="col-6 col-md-3">
                    <label for="folio_n" class="label fw-bold">Folio N</label>
                    <input type="text" class="form-control" id="folio_n" name="folio_n"
                        value="{{$student->folio}}">
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
                        <label for="pais" class="col-sm-4 col-form-label">Pais :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pais" name="npais"
                                value="{{$student->paisnac}}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="provincia" class="col-sm-4 col-form-label">Provincia: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="provincia" name="nprovincia"
                                value="{{$student->provnac}}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <label for="departamento" class="col-sm-4 col-form-label">Departamento:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="departamento" name="ndepartamento"
                                value="{{$student->depnac}}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <label for="localidad" class="col-sm-4 col-form-label">Localidad :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="localidad" name="nlocalidad"
                                value="{{$student->locnac}}">
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
                        <label for="provincia" class="col-sm-4 col-form-label">Provincia :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="provincia" name="provincia"
                                value="{{$student->provincia}}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="zona" class="col-sm-4 col-form-label">Zona/Villa: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="zona" name="zona"
                                value="{{$student->zona}}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <label for="seccion" class="col-sm-4 col-form-label">Sección:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="seccion" name="seccion"
                                value="{{$student->seccion}}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <label for="calle" class="col-sm-4 col-form-label">Callle :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="calle" name="calle"
                                        value="{{$student->calle}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <label for="numero" class="col-sm-4 col-form-label">N" :</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="numero" name="numero"
                                        value="{{$student->numero}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="localidad" class="col-sm-4 col-form-label">Localidad: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="localidad" name="localidad"
                                value="{{$student->localidad}}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="row">
                        <label for="telefono" class="col-sm-4 col-form-label">Telefono:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                value="{{$student->telefono}}">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    
    <!-- Datos de contacto -->
    <div class="card p-3 mt-3">
        <div class="">
            <label class="label fw-bold mb-2">Datos de contacto</label>
            <div class="row">

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="correo_institucional" class="col-sm-4 col-form-label">Correo institucional :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="correo_institucional" name="correo_institucional"
                                value="{{$student->correo_institucional}}">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 row">
                        <label for="celular_alumno" class="col-sm-4 col-form-label">Celular: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="celular_alumno" name="celular_alumno"
                                value="{{$student->celular}}">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>