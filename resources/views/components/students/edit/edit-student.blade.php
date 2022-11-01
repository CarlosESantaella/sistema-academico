<section class="row my-4">

    <div class="col-md-6 px-4">
        <div class="card p-4">
            <x-students.edit.data-student :student="$student"/>
        </div>
    </div>

    <div class="col-md-6">
        <div class="p-4 p-md-0">
            <div class="row">
                <x-students.edit.tuition-student :student="$student"/>
            </div>
            
            <div class="row mt-3">
                <div class="card p-3">
                    <x-students.edit.family-info :student="$student" :responsibles="$responsibles"/>
                </div>
            </div>

            <div class="row mt-3 align-items-end">
                <div class="col-md-8 card p-3">
                    <x-students.edit.social-aspects :student="$student"/>
                </div>
                <div class="col-md-4 d-flex justify-content-end pe-0 mt-3">
                    <button class="btn btn-primary btn-lg">Guardar datos</button>
                </div>
            </div>
        </div>
    </div>

</section>
