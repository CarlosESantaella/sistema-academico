<div>
    <label class="label fw-bold mb-3">Aspectos sociales</label>

    <div class="mb-3 row">
        <label for="etnia" class="col-md-8 col-form-label">
            A que nación o pueblo indigena originario campesino pertenece: 
        </label>
        <div class="col-md-4">
            <select name="etnia" id="etnia" class="form-select">
                <option 
                    @if($student->pertenece =='NO PERTENECE')         
                        selected
                    @endif
                    value="NO PERTENECE"
                >NO PERTENECE</option>
                <option 
                    @if($student->pertenece =='MESTIZO')         
                        selected
                    @endif
                    value="MESTIZO"
                >MESTIZO</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="salud" class="col-md-8 col-form-label">
            Cuantas veces fué el estudiante al centro de salud el año pasado: 
        </label>
        <div class="col-md-4">
            <select name="salud" id="salud" class="form-select">
                <option 
                    @if($student->nsalud =='1 a 2 veces')         
                        selected
                    @endif
                    value="1 a 2 veces"
                >1 a 2 veces</option>
                <option 
                    @if($student->nsalud =='3 a 5 veces')         
                        selected
                    @endif
                    value="3 a 5 veces"
                >3 a 5 veces</option>
                <option 
                    @if($student->nsalud =='6 a mas veces')         
                        selected
                    @endif
                    value="6 a mas veces"
                >6 a mas veces</option>
                <option 
                    @if($student->nsalud =='NINGUNA')         
                        selected
                    @endif
                    value="NINGUNA"
                >NINGUNA</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="transporte" class="col-md-8 col-form-label">
            Como llegó el estudiante a la Unidad Educativa: 
        </label>
        <div class="col-md-4">
            <select name="transporte" id="transporte" class="form-select">
                <option 
                    @if($student->transporte =='A PIE')         
                        selected
                    @endif
                    value="A PIE"
                >A PIE</option>
                <option 
                    @if($student->transporte =='VEHICULO')         
                        selected
                    @endif
                    value="VEHICULO"
                >VEHICULO</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="tiempo" class="col-md-8 col-form-label">
            Tiempo máximo que demora llegar a la UE y viceversa: 
        </label>
        <div class="col-md-4">
            <select name="tiempo" id="tiempo" class="form-select">
                <option 
                    @if($student->tiempo =='< a 1/2 hora')         
                        selected
                    @endif
                    value="1/2 a 1 hora"
                >1/2 a 1 hora</option>
                <option 
                    @if($student->tiempo =='1 a 2 horas')         
                        selected
                    @endif
                    value="1 a 2 horas"
                >1 a 2 horas</option>
                <option 
                    @if($student->tiempo =='2 a 3 horas')         
                        selected
                    @endif
                    value="2 a 3 horas"
                >2 a 3 horas</option>
            </select>
        </div>
    </div>
</div>