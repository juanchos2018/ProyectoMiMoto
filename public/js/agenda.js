document.addEventListener('DOMContentLoaded', function() {

    //let formulario = document.querySelector("form");

    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "es",
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        //para listar
        events: "http://127.0.0.1:8000/horario-show",
        //para nuevo
        dateClick: function(info){            
            $('#start').val(info.dateStr);
            $('#evento').modal('show');
        },
        //para editar
        eventClick: function(info){
            var horario = info.event;
            console.log(horario);

            axios.get("http://127.0.0.1:8000/horario-edit/"+horario.id).
            then(
                (respuesta) => {
                    console.log(respuesta);
                    $('#empleado').val(respuesta.data.IdEmpleado);
                    $('#categoria').val(respuesta.data.IdCategoria);
                    $('#start').val(respuesta.data.fec_atencion);
                    $('#evento').modal('show');
                }
            ).catch(
                error=>{
                    if(error.response){
                        console.log(error.response.data);
                    }
                }
            )
        }
    });
    calendar.render();


    document.getElementById("btnGuardar").addEventListener("click", function(){
        const datos = new FormData();
        let empleado = document.getElementById("empleado").value;
        let categoria = document.getElementById("categoria").value;
        let start = document.getElementById("start").value;

        datos.append("IdEmpleado",empleado);
        datos.append("IdCategoria",categoria);
        datos.append("fec_atencion",start);


        axios.post("http://127.0.0.1:8000/horario-store", datos,
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            } 
        ).
        then(
            (respuesta) => {
                calendar.refetchEvents();
                $('#evento').modal('hide');
            }
        ).catch(
            error=>{
                if(error.response){
                    console.log(error.response.data);
                }
            }
        )
    });
});
