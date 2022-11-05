$(document).ready(function(){

    setTimeout(() => {
        $('.alert').slideUp();
    }, 3000);

    function changeStatus(id_estudiante, estado) {
        fetch(
            "/students/"+id_estudiante+"/changeState",
            {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    'estado': estado
                }) 
            }
        ).then(res => window.location.reload());
    }
    
    if (estado == "-1") {
        Swal.fire({
            title: '¿Desea continuar sus estudios en la institución la siguiente gestión?',
            imageUrl: "/images/logo-salle-2.png",
            showCancelButton: true,
            confirmButtonColor: '#101f34',
            cancelButtonColor: '#101f34',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                changeStatus(id_estudiante, "1")
            }else{
                changeStatus(id_estudiante, "0")
            }
        })
        $(".swal2-image").attr("style", "margin: 0; width: 100%")
    }

    // Provincias
    const provincias = {
        "Chuquisaca": [
            "Oropeza", "Azurduy", "Zudanez", "Tomina", "Hernando Siles", "Yamparaez",
            "Nor Cinti", "Belisario Boeto", "Sud Cinti", "Luis Calvo" 
        ],
        "La Paz": [
            "Murillo", "Omasuyos", "Pacajes", "Camacho", "Munecas", "Larecaja",
            "Franz Tamayo", "Ingavi", "Loayza", "Inquisivi", "Sur Yungas", "Los Andes",
            "Aroma", "Nor Yungas", "Abel Iturralde", "Bautista Saavedra", "Manco Kapac",
            "Gualberto Villarroel", "Gral. J. Manuel Pando", "Caranavi "
        ],
        "Cochabamba": [
            "Cercado", "Campero", "Ayopaya", "Esteban Arce",  "Arani", "Arque", "Capinota",
            "German Jordan", "Quillacollo", "Chapare", "Tapacari", "Carrasco", "Mizque",
            "Punata", "Bolivar", "Tiraque"
        ],
        "Oruro": [
            "Cercado", "Abaroa", "Carangas", "Sajama", "toral", "Poopo",
            "Pantaleon Dalence", "Ladislao Cabrera", "Sabaya", "Saucari", "Tomas Barron",
            "Sur Carangas", "S. Pedro de Totora", "Sebastian Pagador", "Mejillones", "Nor Carangas"
        ],
        "Potosí": [
            "Tomas Frias", "Rafael Bustillo", "Cornelio Saavedra", "Chayanta", "Charcas",
            "Nor Chichas", "Alonzo de Ibanez", "Sur Chichas", "Nor Lipez", "Sur Lipez", "Jose Maria Linares",
            "Antonio Quijarro", "Gral. B. Bilbao", "Daniel Campos", "Modesto Omiste", "Enrique Baldiviezo"
        ],
        "Tarija": [
            "Cercado", "Arce", "Gran Chaco", "Avilez", "Mendez", "Burnet O’ Connor"
        ],
        "Santa Cruz": [
            "Andres Ibanez", "Warnes", "Velasco", "Ichilo",  "Chiquitos", "Sara", "Cordillera",
            "llegrande", "Florida", "Obispo Santiestevan", "Nuflo de Chavez", "Angel Sandoval",
            "Caballero", "German Busch", "Guarayos"
        ],
        "Beni": [
            "Cercado", "Vaca Diez", "Gral. J. Ballivian", "Yacuma", "Moxos",
            "Marban", "Mamore", "Itenez"
        ],
        "Pando": [
            "Nicolas Suarez", "Manuripi", "Madre de Dios", "Abuna", "Gral. Federico Roman",
        ]
    };

    function initSelectProvincia(clase) {
        const provinciaSeleccionada = $(clase).data('provincia');

        let optionsProvincias = "";
        let i = 0;
        for (let provincia of Object.keys(provincias)) {
            let helper = "";
            if (provincia == provinciaSeleccionada) helper = "selected";
            optionsProvincias += `
                <option value="${provincia}" ${(i == 0)? 'selected' : '' } ${helper} >${provincia}</option>
            `;
            i++;
        }
        $(clase).html(optionsProvincias);
    }

    function findDepartamentos(claseProvincia, claseSubProvincia, setSelected) {
        const departamentoSeleccionado = $(claseProvincia).data('provincia');
        let provincia = $(claseProvincia).val();
        if (provincia != "") {
            let optionsDepartamentos = "";
            provincias[provincia].forEach(function (departamento, i) {
                let helper = "";
                if (departamento == departamentoSeleccionado && setSelected) {
                    helper = "selected"
                };
                optionsDepartamentos += `
                    <option value="${departamento}" ${helper}>${departamento}</option>
                `;
            })
            $(claseSubProvincia).html(optionsDepartamentos);
        }
    }

    // Provincia y departamento de alumnos
    initSelectProvincia(".provincia-select");
    findDepartamentos(".provincia-select", ".departamento-select", true);
    $(".provincia-select").change(function () {
        findDepartamentos(".provincia-select", ".departamento-select", false);
    })

});
