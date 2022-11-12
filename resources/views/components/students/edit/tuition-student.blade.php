<div class="row">
    <div class="card col-12 col-lg-8 col-xl-9 px-0 my-3 my-md-0">
        <ul class="nav nav-pills mb-0 border-bottom bg-light" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button 
                    class="nav-link border-start rounded-0 active" 
                    id="unidad-educativa-tab-pane-tab" 
                    data-bs-toggle="pill" 
                    data-bs-target="#unidad-educativa-tab-pane" 
                    type="button" 
                    role="tab" 
                    aria-controls="unidad-educativa-tab-pane" 
                    aria-selected="true"
                >Unidad Educativa de Procedencia</button>
            </li>
            <li class="nav-item" role="presentation">
                <button 
                    class="nav-link border-start rounded-0"
                    id="historial-tab-pane-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#historial-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="historial-tab-pane"
                    aria-selected="false"
                >Historial de matriculas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button 
                    class="nav-link border-start rounded-0"
                    id="facturacion-tab-pane-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#facturacion-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="facturacion-tab-pane"
                    aria-selected="false"
                >Facturación</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade p-4 show active" id="unidad-educativa-tab-pane" role="tabpanel" aria-labelledby="unidad-educativa-tab"
                tabindex="0">
                <div class="input-group">
                    <span class="input-group-text">SIE: </span>
                    <input type="text" name="sie" value="{{$student->sie ?? '' }}" class="form-control">
                </div>
            </div>
            <div class="tab-pane fade p-4" id="historial-tab-pane" role="tabpanel" aria-labelledby="historial-tab"
                tabindex="0">
                <p class="mb-0">
                    Código: 541357 | Fecha de inscripción: La Paz, 10 de enero de 2022 | Gestión 2022
                </p>
                <p class="mb-0">
                    Código: 543214 | Fecha de inscripción: La Paz, 7 de enero de 2021 | Gestión 2021
                </p>
                <p class="mb-0">
                    Código: 213215 | Fecha de inscripción: La Paz, 23 de enero de 2020 | Gestión 2020
                </p>
                <p class="mb-0">
                    Código: 873645 | Fecha de inscripción: La Paz, 14 de enero de 2019 | Gestión 2019
                </p>
                <p class="mb-0">
                    Código: 549876 | Fecha de inscripción: La Paz, 09 de enero de 2018 | Gestión 2018
                </p>
            </div>
            <div class="tab-pane fade p-4" id="facturacion-tab-pane" role="tabpanel" aria-labelledby="facturacion-tab"
                tabindex="0">
                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre: </span>
                    <input type="text" name="fnombre" value="{{$student->fnombre ?? '' }}" class="form-control">
                </div>
                <div class="input-group">
                    <span class="input-group-text">NIT: </span>
                    <input type="text" name="nit" value="{{$student->nit ?? '' }}" class="form-control">
                    @error('nit')
                        <p class="text-danger w-100">Este campo es requerido</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 col-xl-3 my-3 my-xl-0">
        <button type="button" class="btn btn-primary-custom btn-lg">Nueva Matricula</button>
    </div>
</div>