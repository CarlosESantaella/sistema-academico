<div>
    <label class="label fw-bold mb-2">Información Familiar</label>

    <div class="row mt-3">
        
        <!-- Familiar 1 -->
        @isset($responsibles[0])
        <div class="col pe-md-3 {{$responsibles[0]->relacion == 'Padre' ? 'order-1': 'order-2'}}">
        @else
        <div class="col-md-6 pe-md-3">

        @endif
            <div class="mb-3 row">
                <input type="hidden" id="codigo_1" name="codigo_1" value="{{$responsibles[0]->codigo ?? ''}}">
                <label for="relacion_1" class="col-12 col-form-label">Relación: </label>
                <div class="col-12">
                    @isset($responsibles[0]->relacion)

                    <input 
                        type="text" 
                        name="relacion_1" 
                        id="relacion_1" 
                        class="form-control " 
                        readonly
                        value="{{$responsibles[0]->relacion}}"
                    >
                    @else
                    <select name="relacion_1" id="relacion_1" class="form-select">
                        {{-- @php
                        echo $responsible[0];
                    @endphp --}}
                        <option value="">--</option>
                        <option 
                            value="PADRE"
                        >Padre</option>
                        <option 
                            value="MADRE"
                        >Madre</option>
                    </select>   
                    @endisset
                </div>
            </div> 
             <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="ci_1" class="col-12 col-form-label">C.I: </label>
                    <div class="col-12">
                        <input type="text" class="form-control tw-uppercase" id="ci_1" name="ci_1" value="{{$responsibles[0]->ci ?? ''}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="expedido_del_ci_1" class="col-12 col-form-label">Exp. CI: </label>
                    <div class="col-12">
                        <x-students.edit.elements.select-exp-ci 
                            id="expedido_del_ci_1" 
                            :exp="$responsibles[0]->exp_ci ?? ''"
                        />
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="appaterno_1" class="col-12 col-form-label">Ap. Paterno: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="appaterno_1" name="appaterno_1" value="{{$responsibles[0]->appaterno ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="apmaterno_1" class="col-12 col-form-label">Ap. Materno: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="apmaterno_1" name="apmaterno_1" value="{{$responsibles[0]->apmaterno ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombres_1" class="col-12 col-form-label">Nombre(s): </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="nombres_1" name="nombres_1" value="{{$responsibles[0]->nombres ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idioma_1" class="col-12 col-form-label">Idioma: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="idioma_1" name="idioma_1" value="{{$responsibles[0]->idioma ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ocupacion_1" class="col-12 col-form-label">Ocupación: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="ocupacion_1" name="ocupacion_1" value="{{$responsibles[0]->ocupacion ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ginstruccion_1" class="col-12 col-form-label">G. Instrucción: </label>
                <div class="col-12">
                    <x-students.edit.elements.select-degree-of-instruction
                        id="ginstruccion_1"
                        :ginstruccion="$responsibles[0]->ginstruccion ?? ''"
                    />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telefono_1" class="col-12 col-form-label">Teléfono: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" name="telefono_1" id="telefono_1" value="{{$responsibles[0]->telefono ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="celular_1" class="col-12 col-form-label">Celular: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="celular_1" name="celular_1" value="{{$responsibles[0]->celular ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email_1" class="col-12 col-form-label">Email: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-lowercase" id="email_1" name="email_1" value="{{$responsibles[0]->mail ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fecha_de_nacimiento_1" class="col-12 col-form-label">Fecha de nacimiento: </label>
                <div class="col-12">
                    @isset($responsibles[0])
                        <input type="date" class="form-control" id="fecha_de_nacimiento_1" name="fecha_de_nacimiento_1" value="{{$responsibles[0]->fnacimiento ? $responsibles[0]->fnacimiento->format('Y-m-d'): $responsibles[0]->fnacimiento}}">
                    @else
                        <input type="date" class="form-control" id="fecha_de_nacimiento_1" name="fecha_de_nacimiento_1" value="">
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-success">Guardar</button>
                @isset($responsibles[1])
                <button class="btn btn-danger delete-student" data-codalumno="{{$responsibles[0]->pivot->codalumno}}" data-codresponsable="{{$responsibles[0]->pivot->codresponsable}}" type="button">Eliminar</button>
                @endif
            </div>
        </div>

        <hr class="my-4 d-block d-md-none">

        <!-- Familiar 2 -->
        @isset($responsibles[1]->relacion)
        <div class="border-start-md ps-md-3 col tw-border-l  {{$responsibles[1]->relacion == 'Padre' ? 'order-1': 'order-2'}}">
        @else
        <div class="border-start-md ps-md-3 col-md-6 md:tw-border-l ">
        @endif
            <div class="mb-3 row">
                <label for="relacion_2" class="col-12 col-form-label">Relación: </label>
                <input type="hidden" id="codigo_2" name="codigo_2" value="{{$responsibles[1]->codigo ?? ''}}">
                <div class="col-12">
                    @isset($responsibles[1]->relacion)
                    <input 
                        type="text" 
                        name="relacion_2" 
                        id="relacion_2" 
                        class="form-control"
                        readonly
                        value="{{$responsibles[1]->relacion ?? ''}}"
                    >
                    @else   
                    <select name="relacion_2" id="relacion_2" class="form-select">
                        <option value="">--</option>
                        <option 
                            value="PADRE"
                        >Padre</option>
                        <option 
                            value="MADRE"
                        >Madre</option>
                    </select>
                    @endisset
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">

                    <label for="ci_2" class="col-12 col-form-label">C.I: </label>
                    <div class="col-12">
                        <input type="text" class="form-control tw-uppercase" id="ci_2" name="ci_2" value="{{$responsibles[1]->ci ?? ''}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="expedido_del_ci_2" class="col-12 col-form-label">Exp. CI: </label>
                    <div class="col-12">
                        <x-students.edit.elements.select-exp-ci 
                            id="expedido_del_ci_2" 
                            :exp="$responsibles[1]->exp_ci ?? ''"
                        />
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="appaterno_2" class="col-12 col-form-label">Ap. Paterno: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="appaterno_2" name="appaterno_2" value="{{$responsibles[1]->appaterno ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="apmaterno_2" class="col-12 col-form-label">Ap. Materno: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="apmaterno_2" name="apmaterno_2" value="{{$responsibles[1]->apmaterno ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombres_2" class="col-12 col-form-label">Nombre(s): </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="nombres_2" name="nombres_2" value="{{$responsibles[1]->nombres ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idioma_2" class="col-12 col-form-label">Idioma: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="idioma_2" name="idioma_2" value="{{$responsibles[1]->idioma ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ocupacion_2" class="col-12 col-form-label">Ocupación: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="ocupacion_2" name="ocupacion_2" value="{{$responsibles[1]->ocupacion ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ginstruccion_2" class="col-12 col-form-label">G. Instrucción: </label>
                <div class="col-12">
                    <x-students.edit.elements.select-degree-of-instruction
                        id="ginstruccion_2"
                        :ginstruccion="$responsibles[1]->ginstruccion ?? ''"
                    />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telefono_2" class="col-12 col-form-label">Teléfono: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="telefono_2" name="telefono_2" value="{{$responsibles[1]->telefono ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="celular_2" class="col-12 col-form-label">Celular: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-uppercase" id="celular_2" name="celular_2" value="{{$responsibles[1]->celular ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email_2" class="col-12 col-form-label">Email: </label>
                <div class="col-12">
                    <input type="text" class="form-control tw-lowercase" id="email_2" name="email_2" value="{{$responsibles[1]->mail ?? ''}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fecha_de_nacimiento_2" class="col-12 col-form-label">Fecha de nacimiento: </label>
                <div class="col-12">
                    @isset($responsibles[1])
                        <input type="date" class="form-control" id="fecha_de_nacimiento_2" name="fecha_de_nacimiento_2" value="{{$responsibles[1]->fnacimiento?->format('Y-m-d')}}">
                    @else
                        <input type="date" class="form-control" id="fecha_de_nacimiento_2" name="fecha_de_nacimiento_2" value="">
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-success">Guardar</button>
                @isset($responsibles[1])
                <button class="btn btn-danger delete-student" data-codalumno="{{$responsibles[1]->pivot->codalumno}}" data-codresponsable="{{$responsibles[1]->pivot->codresponsable}}" type="button">Eliminar</button>
                @endif
            </div>
        </div>

    </div> 
</div>