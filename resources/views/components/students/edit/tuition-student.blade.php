<div class="row">
    <div class="card col-12 col-xl-8 px-0 my-3 my-md-0">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button 
                    class="nav-link active" 
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
                    class="nav-link"
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
                    class="nav-link"
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
                    <input type="text" name="sie" value="{{$student->sie}}" class="form-control">
                </div>
            </div>
            <div class="tab-pane fade p-4" id="historial-tab-pane" role="tabpanel" aria-labelledby="historial-tab"
                tabindex="0">...</div>
            <div class="tab-pane fade p-4" id="facturacion-tab-pane" role="tabpanel" aria-labelledby="facturacion-tab"
                tabindex="0">...</div>
        </div>
    </div>
    <div class="col-12 col-xl-4 my-3 my-xl-0">
        <button type="button" class="btn btn-primary-custom btn-lg">Nueva Matricula</button>
    </div>
</div>