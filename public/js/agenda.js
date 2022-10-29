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
        dateClick: function(info){
            $('#start').val(info.dateStr);
            $('#evento').modal('show');
        }
    });
    calendar.render();
    

    document.getElementById("btnGuardar").addEventListener("click", function(){
        const datos = new FormData();
        let token = document.getElementsByName("_token").value;
        let empleado = document.getElementById("empleado").value;
        let categoria = document.getElementById("categoria").value;
        let start = document.getElementById("start").value;

        // datos.append("_token",token);
        datos.append("IdEmpleado",empleado);
        datos.append("IdCategoria",categoria);
        datos.append("fec_atencion",start);


        //print_r(datos);
        //console.log(empleado);
        //console.log(formulario.id.value);

        axios.post("./horario-store", datos,
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            } 
        ).
        then(
            (respuesta) => {
                const {status,message}=respuesta.data;
                if (status==200) {
                   alert(message)
                   $('#evento').modal('hide');
                }else{
                    console.log(response);                 
                    alert(message)
                }
            
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