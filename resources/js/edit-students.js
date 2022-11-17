$(document).ready(function(){

    setTimeout(() => {
        $('.alert').slideUp();
    }, 3000);

    $(".delete-student").click(async function() {
        let codalumno = $(this).data("codalumno");
        let codresponsable = $(this).data("codresponsable");

        const response = await fetch('/responsible_student/'+codresponsable+'/'+codalumno);
        const res = await response.json();

        const deleteResponse = await fetch('/responsible_student/'+res.id, {
            method: "DELETE",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        
        if (deleteResponse.status == 200) {
            Swal.fire({
                title: 'Responsable eliminado del estudiante',
            })
            setTimeout(() => {
                window.location.reload();
            }, 3000);
        }else {
            Swal.fire({
                title: 'Ha habido un error al eliminar responsable',
            })
        }
        $(".swal2-image").attr("style", "margin: 0; width: 100%")

    })

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

});
