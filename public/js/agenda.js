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
        events: "/horario-show",
        //para nuevo
        dateClick: function(info){            
            $('#start').val(info.dateStr);
            $('#evento').modal('show');
            $('#datos').hide();
        },
        //para editar
        eventClick: function(info){
            var horario = info.event;
            let IdCategoria  =horario.extendedProps.IdCategoria;
            axios.get("/horario-edit/"+horario.id+'/'+IdCategoria).
            then(
                (respuesta) => {
                  //console.log(respuesta);
                  $('#datos').show();
                   const {horario,cantidad} =respuesta.data;
                    $('#empleado').val(horario.IdEmpleado);
                    $('#categoria').val(horario.IdCategoria);
                    $('#start').val(horario.fec_atencion);
                    $('#cantidad').text(cantidad);
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


        axios.post("/horario-store", datos,
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
