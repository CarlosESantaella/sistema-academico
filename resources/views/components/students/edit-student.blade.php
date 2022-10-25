{{$id}}

<section class="row">

    <div class="col-md-6">
        <div class="card p-4">
            <h2 class="fs-4 text-center mb-4 fw-bold">Datos del estudiante</h2>
    
            <div class="row">
                <div class="col-4 col-md-4">
                    <img class="w-100" src="{{asset('images/user.png')}}">
                </div>
                <div class="col-8 col-md-8">
                    <div class="mb-3 row">
                        <label for="code" class="col-sm-3 col-form-label fw-bold">CÓDIGO</label>
                        <div class="col-sm-9">
                            <input 
                                type="text" 
                                disabled 
                                class="form-control" 
                                id="codigo"
                                name="codigo" 
                                value="2546216"
                            >
                        </div>
                    </div>
                    <p class="mb-2">
                        <b>Apellidos y Nombres</b>
                    </p>
                    <div class="mb-3 row">
                        <label for="ap_paterno" class="col-sm-3 col-form-label">Ap. Paterno</label>
                        <div class="col-sm-9">
                            <input
                                type="text" 
                                class="form-control" 
                                id="ap_paterno" 
                                name="ap_paterno"
                                value="John Doe"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ap_materno" class="col-sm-3 col-form-label">Ap. Materno</label>
                        <div class="col-sm-9">
                            <input
                                type="text" 
                                class="form-control" 
                                id="ap_materno" 
                                name="ap_materno"
                                value="Jane Doe"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nombres" class="col-sm-3 col-form-label">Nombres</label>
                        <div class="col-sm-9">
                            <input
                                type="text" 
                                class="form-control" 
                                id="nombres" 
                                name="nombres"
                                value="John Doe Jr"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-3">
                <div class="mb-3">
                    <label for="codigo_estudiantil_rude" class="label fw-bold mb-2">Código estudiantil RUDE</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="codigo_estudiantil_rude"
                        id="codigo_estudiantil_rude" 
                        value="2546216"
                    >
                </div>
                <div class="mb-3">
                    <label class="label fw-bold mb-2">Documento de identificación</label>
                    <div class="row">

                        <div class="col-6">
                            <div class="mb-3 row">
                                <label for="documento" class="col-sm-4 col-form-label">C.I :</label>
                                <div class="col-sm-8">
                                    <input
                                        type="text" 
                                        class="form-control" 
                                        id="documento" 
                                        name="documento"
                                        value="23554654"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3 row">
                                <label for="pasaporte" class="col-sm-4 col-form-label">Pasaporte</label>
                                <div class="col-sm-8">
                                    <input
                                        type="text" 
                                        class="form-control" 
                                        id="pasaporte" 
                                        name="pasaporte"
                                        value="4752465"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3 row">
                                <label for="fecha_nacimiento" class="col-sm-4 col-form-label">Fec. Nac. :</label>
                                <div class="col-sm-8">
                                    <input
                                        type="date" 
                                        class="form-control" 
                                        id="fecha_nacimiento"
                                        name="fecha_nacimiento"
                                        value="1998-04-04"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3 row">
                                <label for="sexo" class="col-sm-4 col-form-label">Sexo :</label>
                                <div class="col-sm-8">
                                    <select class="form-select" id="sexo" name="sexo">
                                        <option value="Mujer">Mujer</option>
                                        <option value="Hombre">Hombre</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="oficialia_n" class="label fw-bold">Oficialia N</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="oficialia_n"
                                name="oficialia_n"
                                value="2546216"
                            >
                        </div>
                        <div class="col">
                            <label for="libro_n" class="label fw-bold">Libro N</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="libro_n" 
                                name="libro_n"
                                value="2546216"
                            >
                        </div>
                        <div class="col">
                            <label for="partida_n" class="label fw-bold">Partida N</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="partida_n" 
                                name="partida_n"
                                value="2546216"
                            >
                        </div>
                        <div class="col">
                            <label for="folio_n" class="label fw-bold">Folio N</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="folio_n" 
                                name="folio_n"
                                value="2546216"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        asd
    </div>

</section>