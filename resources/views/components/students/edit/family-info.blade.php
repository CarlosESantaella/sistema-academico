<div>
    <label class="label fw-bold mb-2">Información Familiar</label>

    <div class="row mt-3">

        <!-- Familiar 1 -->
        <div class="col-md-6 pe-md-3">
            <div class="mb-3 row">
                <input type="hidden" id="codigo_1" name="codigo_1" value="{{$responsibles[0]->codigo}}">
                <label for="relacion_1" class="col-4 col-form-label">Relación: </label>
                <div class="col-8">
                    <select name="relacion_1" id="relacion_1" class="form-control">
                        <option 
                            @if($responsibles[0]->relacion == 'Padre')         
                                selected
                            @endif
                            value="Padre"
                        >Padre</option>
                        <option 
                            @if($responsibles[0]->relacion == 'Madre')         
                                selected
                            @endif
                            value="Madre"
                        >Madre</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ci_1" class="col-4 col-form-label">C.I: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="ci_1" name="ci_1" value="{{$responsibles[0]->ci}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="expedido_del_ci_1" class="col-4 col-form-label">Exp. CI: </label>
                <div class="col-8">
                    <x-students.edit.elements.select-exp-ci 
                        id="expedido_del_ci_1" 
                        :exp="$responsibles[0]->expedido_del_ci"
                    />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="appaterno_1" class="col-4 col-form-label">Ap. Paterno: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="appaterno_1" name="appaterno_1" value="{{$responsibles[0]->appaterno}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="apmaterno_1" class="col-4 col-form-label">Ap. Materno: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="apmaterno_1" name="apmaterno_1" value="{{$responsibles[0]->apmaterno}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombres_1" class="col-4 col-form-label">Nombre(s): </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="nombres_1" name="nombres_1" value="{{$responsibles[0]->nombres}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idioma_1" class="col-4 col-form-label">Idioma: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="idioma_1" name="idioma_1" value="{{$responsibles[0]->idioma}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ocupacion_1" class="col-4 col-form-label">Ocupación: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="ocupacion_1" name="ocupacion_1" value="{{$responsibles[0]->ocupacion}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ginstruccion_1" class="col-4 col-form-label">G. Instrucción: </label>
                <div class="col-8">
                    <x-students.edit.elements.select-degree-of-instruction
                        id="ginstruccion_1"
                        :ginstruccion="$responsibles[0]->ginstruccion"
                    />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telefono_1" class="col-4 col-form-label">Teléfono: </label>
                <div class="col-8">
                    <input type="text" class="form-control" name="telefono_1" id="telefono_1" value="{{$responsibles[0]->telefono}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="celular_1" class="col-4 col-form-label">Celular: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="celular_1" name="celular_1" value="{{$responsibles[0]->celular}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email_1" class="col-4 col-form-label">Email: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="email_1" name="email_1" value="{{$responsibles[0]->mail}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fecha_de_nacimiento_1" class="col-4 col-form-label">Fecha de nacimiento: </label>
                <div class="col-8">
                    <input type="date" class="form-control" id="fecha_de_nacimiento_1" name="fecha_de_nacimiento_1" value="{{$responsibles[0]->fecha_de_nacimiento}}">
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-success">Guardar</button>
                <button class="btn btn-danger">Eliminar</button>
            </div>
        </div>

        <hr class="my-4 d-block d-md-none">

        <!-- Familiar 2 -->
        <div class="border-start-md ps-md-3 col-md-6">
            <div class="mb-3 row">
                <label for="relacion_2" class="col-4 col-form-label">Relación: </label>
                <input type="hidden" id="codigo_2" name="codigo_2" value="{{$responsibles[1]->codigo}}">
                <div class="col-8">
                    <select name="relacion_2" id="relacion_2" class="form-control">
                        <option 
                            @if($responsibles[1]->relacion =='Padre')         
                                selected
                            @endif
                            value="Padre"
                        >Padre</option>
                        <option 
                            @if($responsibles[1]->relacion =='Madre')         
                                selected
                            @endif
                            value="Madre"
                        >Madre</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ci_2" class="col-4 col-form-label">C.I: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="ci_2" name="ci_2" value="{{$responsibles[1]->ci}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="expedido_del_ci_2" class="col-4 col-form-label">Exp. CI: </label>
                <div class="col-8">
                    <x-students.edit.elements.select-exp-ci 
                        id="expedido_del_ci_2" 
                        :exp="$responsibles[1]->expedido_del_ci"
                    />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="appaterno_2" class="col-4 col-form-label">Ap. Paterno: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="appaterno_2" name="appaterno_2" value="{{$responsibles[1]->appaterno}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="apmaterno_2" class="col-4 col-form-label">Ap. Materno: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="apmaterno_2" name="apmaterno_2" value="{{$responsibles[1]->apmaterno}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombres_2" class="col-4 col-form-label">Nombre(s): </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="nombres_2" name="nombres_2" value="{{$responsibles[1]->nombres}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idioma_2" class="col-4 col-form-label">Idioma: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="idioma_2" name="idioma_2" value="{{$responsibles[1]->idioma}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ocupacion_2" class="col-4 col-form-label">Ocupación: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="ocupacion_2" name="ocupacion_2" value="{{$responsibles[1]->ocupacion}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ginstruccion_2" class="col-4 col-form-label">G. Instrucción: </label>
                <div class="col-8">
                    <x-students.edit.elements.select-degree-of-instruction
                        id="ginstruccion_2"
                        :ginstruccion="$responsibles[1]->ginstruccion"
                    />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telefono_2" class="col-4 col-form-label">Teléfono: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="telefono_2" name="telefono_2" value="{{$responsibles[1]->telefono}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="celular_2" class="col-4 col-form-label">Celular: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="celular_2" name="celular_2" value="{{$responsibles[1]->celular}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email_2" class="col-4 col-form-label">Email: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="email_2" name="email_2" value="{{$responsibles[1]->mail}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fecha_de_nacimiento_2" class="col-4 col-form-label">Fecha de nacimiento: </label>
                <div class="col-8">
                    <input type="date" class="form-control" id="fecha_de_nacimiento_2" name="fecha_de_nacimiento_2" value="{{$responsibles[1]->fecha_de_nacimiento}}">
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-success">Guardar</button>
                <button class="btn btn-danger">Eliminar</button>
            </div>
        </div>

    </div>
</div>