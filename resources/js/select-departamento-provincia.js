// Departamentos
const departamentos = {
    "Ninguno": ["Ninguno"] ,
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
    ],
};

function initSelectDepartamento(clase) {
    const departamentoSeleccionada = $(clase).data('departamento');

    let optionsDepartamentos = "";
    let i = 0;
    for (let departamento of Object.keys(departamentos)) {
        let helper = "";
        if (departamento.toUpperCase() == departamentoSeleccionada.toUpperCase()) helper = "selected";
        optionsDepartamentos += `
            <option value="${departamento}" ${(i == 0)? 'selected' : '' } ${helper} >${departamento}</option>
        `;
        i++;
    }
    $(clase).html(optionsDepartamentos);
}

function findProvincias(claseDepartamento, claseProvincia, setSelected) {
    const provinciaSeleccionada = $(claseProvincia).data('provincia');
    let departamento = $(claseDepartamento).val();
    if (departamento != "") {
        let optionsProvincias = "";
        departamentos[departamento].forEach(function (provincia, i) {
            let helper = "";
            if (provincia.toUpperCase() == provinciaSeleccionada.toUpperCase() && setSelected) {
                helper = "selected"
            };
            optionsProvincias += `
                <option value="${provincia}" ${helper}>${provincia}</option>
            `;
        })
        $(claseProvincia).html(optionsProvincias);
    }
}

// Provincia y departamento de alumnos
initSelectDepartamento(".departamento-select");
findProvincias(".departamento-select", ".provincia-select", true);
$(".departamento-select").change(function () {
    findProvincias(".departamento-select", ".provincia-select", false);
})