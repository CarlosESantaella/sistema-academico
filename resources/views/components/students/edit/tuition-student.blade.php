<div class="row">
    <div class="card col-md-8 px-0 my-3 my-md-0">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="unidad-educativa-tab" data-bs-toggle="tab"
                    data-bs-target="#unidad-educativa-tab-pane" type="button" role="tab" aria-controls="unidad-educativa-tab-pane"
                    aria-selected="true">Unidad Educativa de Procedencia</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="historial-tab" data-bs-toggle="tab"
                    data-bs-target="#historial-tab-pane" type="button" role="tab"
                    aria-controls="historial-tab-pane" aria-selected="false">Historial de matriculas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="facturacion-tab" data-bs-toggle="tab"
                    data-bs-target="#facturacion-tab-pane" type="button" role="tab"
                    aria-controls="facturacion-tab-pane" aria-selected="false">Facturación</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
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
    <div class="col-md-4 my-3 my-md-0">
        <button class="btn btn-primary btn-lg">Nueva Matricula</button>
    </div>
</div>