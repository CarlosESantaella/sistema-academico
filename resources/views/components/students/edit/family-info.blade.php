<div>
    <label class="label fw-bold mb-2">Información Familiar</label>

    <div class="row mt-3">

        <!-- Familiar 1 -->
        <div class="col-md-6 pe-md-3">
            <div class="mb-3 row">
                <label for="relacion" class="col-4 col-form-label">Relación: </label>
                <div class="col-8">
                    <select name="relacion" id="relacion" class="form-control">
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
                <label for="ci" class="col-4 col-form-label">C.I: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="ci" value="{{$responsibles[0]->ci}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="appaterno" class="col-4 col-form-label">Ap. Paterno: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="appaterno" value="{{$responsibles[0]->appaterno}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="apmaterno" class="col-4 col-form-label">Ap. Materno: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="apmaterno" value="{{$responsibles[0]->apmaterno}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombres" class="col-4 col-form-label">Nombre(s): </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="nombres" value="{{$responsibles[0]->nombres}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idioma" class="col-4 col-form-label">Idioma: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="idioma" value="{{$responsibles[0]->idioma}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ocupacion" class="col-4 col-form-label">Ocupación: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="ocupacion" value="{{$responsibles[0]->ocupacion}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ginstruccion" class="col-4 col-form-label">G. Instrucción: </label>
                <div class="col-8">
                    <select name="ginstruccion" id="ginstruccion" class="form-control">
                        <option 
                            @if($responsibles[0]->ginstruccion == 'LICENCIATURA')         
                                selected
                            @endif
                            value="LICENCIATURA"
                        >Licenciatura</option>
                        <option 
                            @if($responsibles[0]->ginstruccion == 'BACHILLER')         
                                selected
                            @endif
                            value="BACHILLER"
                        >Bachiller</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telefono" class="col-4 col-form-label">Teléfono: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="telefono" value="{{$responsibles[0]->telefono}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="celular" class="col-4 col-form-label">Celular: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="celular" value="{{$responsibles[0]->celular}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="email" value="{{$responsibles[0]->mail}}">
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
                <label for="relacion" class="col-4 col-form-label">Relación: </label>
                <div class="col-8">
                    <select name="relacion" id="relacion" class="form-control">
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
                <label for="ci" class="col-4 col-form-label">C.I: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="ci" value="{{$responsibles[1]->ci}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="appaterno" class="col-4 col-form-label">Ap. Paterno: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="appaterno" value="{{$responsibles[1]->appaterno}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="apmaterno" class="col-4 col-form-label">Ap. Materno: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="apmaterno" value="{{$responsibles[1]->apmaterno}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombres" class="col-4 col-form-label">Nombre(s): </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="nombres" value="{{$responsibles[1]->nombres}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idioma" class="col-4 col-form-label">Idioma: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="idioma" value="{{$responsibles[1]->idioma}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ocupacion" class="col-4 col-form-label">Ocupación: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="ocupacion" value="{{$responsibles[1]->ocupacion}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ginstruccion" class="col-4 col-form-label">G. Instrucción: </label>
                <div class="col-8">
                    <select name="ginstruccion" id="ginstruccion" class="form-control">
                        <option 
                            @if($responsibles[0]->ginstruccion == 'LICENCIATURA')         
                                selected
                            @endif
                            value="LICENCIATURA"
                        >Licenciatura</option>
                        <option 
                            @if($responsibles[0]->ginstruccion == 'BACHILLER')         
                                selected
                            @endif
                            value="BACHILLER"
                        >Bachiller</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telefono" class="col-4 col-form-label">Teléfono: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="telefono" value="{{$responsibles[1]->telefono}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="celular" class="col-4 col-form-label">Celular: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="celular" value="{{$responsibles[1]->celular}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email: </label>
                <div class="col-8">
                    <input type="text" class="form-control" id="email" value="{{$responsibles[1]->mail}}">
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-success">Guardar</button>
                <button class="btn btn-danger">Eliminar</button>
            </div>
        </div>

    </div>
</div>