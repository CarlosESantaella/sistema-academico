<section class="row my-4">

        <input type="hidden" name="prueba" value="hola mundo">
        <div class="col-md-6 px-4">
            <div class="card p-4">
                <x-students.edit.data-student :student="$student" :password="$password" :username="$username"/>
            </div>
        </div>
    
        <div class="col-md-6 px-4">
            <div class="p-4 p-md-0">
                <div class="row">
                    <x-students.edit.tuition-student :licenseplates="$licenseplates" :student="$student"/>
                </div>
                
                <div class="row mt-3">
                    <div class="card p-3">
                        
                        <x-students.edit.family-info :student="$student" :responsibles="$responsibles"/>
                    </div>
                </div>
    
                <div class="row mt-3 align-items-start">
                    {{-- <div class="col-md-8 card p-3">
                        <x-students.edit.social-aspects :student="$student"/>
                    </div> --}}
                    <div class="col-md-12 d-flex justify-content-end pe-0 mt-3 mt-md-0">
                        <button class="btn btn-primary-custom btn-lg" type="submit">Guardar datos</button>
                    </div>
                </div>
            </div>
        </div>

</section>
@push('scripts')
<script>
    $(document).ready(function(){
        $('body').on('input', '.input-number', function(){
            this.value = this.value.replace(/[^0-9]/g,'');
        });
    });
</script>
@endpush