<section class="row my-4">

    <div class="col-md-6 px-4">
        <div class="card p-4">
            <x-students.edit.data-student />
        </div>
    </div>

    <div class="col-md-6 px-4">
        <div class="p-4 p-md-0">
            <div class="row">
                <x-students.edit.tuition-student />
            </div>
            
            <div class="row mt-3">
                <div class="card p-3">
                    <x-students.edit.family-info  />
                </div>
            </div>

            <div class="row mt-3 align-items-start">
                {{-- <div class="col-md-8 card p-3">
                    <x-students.edit.social-aspects />
                </div> --}}
                <div class="col-12 d-flex justify-content-end pe-0 mt-3 mt-md-0">
                    <button class="btn btn-primary-custom btn-lg" type="submit">Guardar datos</button>
                </div>
            </div>
        </div>
    </div>

</section>