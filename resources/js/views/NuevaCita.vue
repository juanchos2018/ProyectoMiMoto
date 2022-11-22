<template>
  <div>
    <v-app>
      <v-container>
        <v-row>
          <v-col cols="12" sm="8">
            <v-system-bar window color="primary">
              <h5 style="color: white">Servicio {{ descripcion }}</h5>
        
            </v-system-bar>

            <b-card header="Datos de cliente" header-tag="header">
              <!-- <pre>
                      {{model}}
              </pre> -->
              <form>
                <div class="row">
                  <div class="col-md-6">
                    <label for="inputPassword4">Cliente</label>
                    <v-select
                      v-model="cliente"
                      placeholder="Seleccione"
                      label="Nombres"
                      style="padding-left: 4px; width: 100%"
                      item-value="IdCliente"
                      v-on:input="changeCliente"
                      :options="clients"
                    />
                    <!-- <input
                      type="text"
                      class="form-control"
                      v-model="model.DNI"
                      required   
                      placeholder="DNI"
                    /> -->
                  </div>

                  <div class="col-md-6">
                    <label for="inputAddress">Moto</label>
                    <v-select
                      v-model="moto"
                      placeholder="Seleccione"
                      label="marca"
                      style="padding-left: 4px"
                      item-value="IdMoto"
                      :options="motos"
                      v-on:input="changeMoto"
                    />
                    <!-- <input
                      type="text"
                      class="form-control"                 
                      required
                      v-model="model.telefono"              
                      placeholder="telefono"
                    /> -->
                  </div>

                  <div class="col-md-6">
                    <label>Servicios</label>
                    <v-select
                      v-model="categoria"
                      placeholder="Seleccione"
                      label="descripcion"
                      style="padding-left: 4px; width: 100%"                    
                      item-value="IdCategoria"
                      v-on:input="changeServicio"
                      :options="servicios"
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="modelo">observaciones </label>
                    <input
                      type="text"
                      class="form-control"
                      id="detalle_moto"
                      v-model="model.detalle_moto"
                    />
                  </div>

                  <!-- <div class="col-md-6">
                    <label for="inputEmail4">Nombres</label>
                    <input
                      type="text"
                      class="form-control"                  
                      required
                       v-model="model.Nombres"
                      placeholder="Nombres"
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="inputPassword4">Apelldios</label>
                    <input
                      type="text"
                      class="form-control"                  
                      required
                      v-model="model.Apellidos"
                      placeholder="Apellidos"
                    />
                  </div> -->

                  <!-- <div class="col-md-6">
                    <label for="inputAddress">Correo</label>
                    <input
                      type="text"
                      class="form-control"                
                      required
                      v-model="model.correo"
                      placeholder="correo"
                    />
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <!-- @click="storeCita()" -->
                    <b-button variant="primary" 
                     @click="storeCita()"
                      >Registrar Cita</b-button
                    >
                  </div>
                </div>
              </form>
            </b-card>

            <b-card header="Fecha " header-tag="header">
              <div class="row">
                <v-chip
                  class="ma-2"
                  color="primary"
                  v-model="horario"
                  v-for="item in horarios"
                  :key="item.IdHorario"
                  v-on:click="changeHorario(item)"
                >
                  {{ item.fec_atencion }}
                </v-chip>
                <!-- <div class="col-md-4">
        
                  <label>Moto</label>
                  <v-select
                    v-model="moto"
                    placeholder="Seleccione"
                    label="marca"
                    style="padding-left: 4px"
                    item-value="IdMoto"
                    :options="motos"
                    v-on:input="changeMoto"
                  />
                </div>
                <div class="col-md-3">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control"   v-model="model.marca" id="marca" />
                </div>
                <div class="col-md-3">
                  <label for="modelo">Modelo</label>
                  <input type="text" class="form-control"  v-model="model.modelo" id="modelo" />
                </div>
                  <div class="col-md-2">
                  <label for="modelo">Color</label>
                  <input type="text" class="form-control"   v-model="model.color" id="Color" />
                </div> -->
              </div>

              <br />

              <!-- <div class="row">
                
                <div class="col-md-4">
         
                  <label for="modelo">modelo Motor</label>
                  <input type="text" class="form-control"  v-model="model.modelo_motor"  />
            
                </div>
                <div class="col-md-4">
         
                  <label for="modelo">potencia Motor</label>
                  <input type="text" class="form-control" v-model="model.potencia_motor"  />
            
                </div>
                   <div class="col-md-4">
         
                  <label for="modelo">cilindrada Motor</label>
                  <input type="number" class="form-control" id="cilindrada" v-model="model.cilindrada_motor" />
            
                </div>
                 <div class="col-md-12">
         
                  <label for="modelo">observaciones </label>
                  <input type="text" class="form-control" id="detalle_moto" v-model="model.detalle_moto" />
            
                </div>
              </div> -->
              <br />
            </b-card>
          </v-col>
          <v-col cols="12" sm="4">
            <v-date-picker
              locale="es-es"
              v-model="fec"
              elevation="15"
                event-color="green lighten-1" 
                 :events="arrayEvents"
              @input="onInput()"
            ></v-date-picker>
            <br />
            <br />

            <v-card>
              <!-- <p>{{horario}}</p> -->
              <!-- <div class="text-center">
                <v-card-title class="text-h6" v-text="title"></v-card-title>
                <v-chip
                  class="ma-2"
                  color="primary"
                  v-model="horario"
                  v-for="item in horarios"
                  :key="item.IdHorario"
                  v-on:click="changeHorario(item)"
                >
                  {{ item.fec_atencion }}
                </v-chip>
                <br /><br />
                <hr />
                <v-chip
                  v-if="empleado != null"
                  class="ma-2"
                  color="deep-purple accent-4"
                  outlined
                >
                  <v-icon left> mdi-wrench </v-icon>
                  {{ empleado }}
                </v-chip>
              </div> -->


              <!-- <p>{{ selectedItem }}</p>
              <v-list flat>
                <v-subheader>Categorias</v-subheader>
                <v-list-item-group v-model="selectedItem" color="primary">
                  <v-list-item
                    v-for="item in categorias"
                    :key="item.IdHorario"
                    @change="ChangeCAtgeroria(item)"
                  >
                    <v-list-item-content>
                      <v-list-item-title
                        v-text="item.descripcion"
                      ></v-list-item-title>
                      <v-list-item-subtitle>otra cosa</v-list-item-subtitle>
                    </v-list-item-content>
                  </v-list-item>
                </v-list-item-group>
              </v-list> -->
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-app>
  </div>
</template>

<script>
import vSelect from "vue-select";
export default {
  components: {
    vSelect,
  },
  data() {
    return {
      date: "2018-03-02",
      picker: null,
      settings: [],
      categorias: [],
      servicios: [],
      horarios: [],
      clients: [],
      cliente: {},
      motos: [],
      selectedItem: null,
      arrayEvents: null,
      fec: "",
      title: "Fechas Disponibles",
      items: [
        { text: "Real-Time", icon: "mdi-clock" },
        { text: "Audience", icon: "mdi-account" },
        { text: "Conversions", icon: "mdi-flag" },
      ],
      curren_date: moment(new Date()).local().format("YYYY-MM-DD"),
      curren_month: moment(new Date()).local().format("MM"),
      curren_year: moment(new Date()).local().format("YYYY"),
      model: {
        DNI: null,
        Nombres: null,
        Apellidos: null,
        correo: null,
        telefono: null,
        IdHorario: null,
        marca: null,
        modelo: null,
        IdCliente: null,
        color: null,
        IdMoto: null,
        modelo_motor: null,
        potencia_motor: null,
        cilindrada_motor: null,
        detalle_moto: null,
        detalle_motor: "detealle",
        estado: "n",
        IdUsuario: 1,
        fec_registro: "2022-10-05",
        cilindrada: 200,
      },
      categoria: null,
      moto: null,
      descripcion: null,
      horario: null,
      empleado: null,
    };
  },
  mounted() {
    moment.lang("es", {
      months:
        "Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre".split(
          "_"
        ),
      monthsShort:
        "Enero._Feb._Mar_Abr._May_Jun_Jul._Ago_Sept._Oct._Nov._Dec.".split("_"),
      weekdays: "Domingo_Lunes_Martes_Miercoles_Jueves_Viernes_Sabado".split(
        "_"
      ),
      weekdaysShort: "Dom._Lun._Mar._Mier._Jue._Vier._Sab.".split("_"),
      weekdaysMin: "Do_Lu_Ma_Mi_Ju_Vi_Sa".split("_"),
    });
    this.fec = this.curren_date;
    this.getMotos();
    this.getServicios();
    this.getClientes();
  },
  methods: {
    changeCliente() {
      if (this.cliente) {
        
        this.model.IdCliente=this.cliente.IdCliente;
      }
    },
    changeMoto() {
      if (this.moto) {
        this.model.IdMoto = this.moto.IdMoto;
        this.model.color = this.moto.color;
        this.model.marca = this.moto.marca;
        this.model.modelo = this.moto.modelo;
      } else {
        this.model.IdMoto = null;
        this.model.color = null;
        this.model.marca = null;
        this.model.modelo = null;
      }
    },

    storeCita() {
      let url = "./cita-store";
      let data = this.model;
      console.log(this.cliente);
      if (!this.model.IdCliente) {
        alert("Ingresar el documento");
      } else if (!this.model.IdHorario) {
        alert("Seleccionar una fecha");
      } else {
        console.log(data);


        axios
          .post(url, data, {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          })
          .then((response) => {
            console.log(response);
            const { result, status } = response.data;
            if (status == 200) {
              alert(result);
            } else if (status == 400) {
              alert(result);
            } else {
              alert("hubo Algun error");
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }

      // axios({
      //   method: "POST",
      //   url: url,
      //   data: data,

      // })
      //   .then(function (response) {
      //    console.log(response);
      //   })
      //   .catch((error) => {
      //     console.log(error);
      //   });
    },
    changeServicio(e) {
    ///  console.log(this.categoria);
      let me = this;
      me.descripcion = me.categoria.descripcion;
      let url = "./horario-categoria/" + me.categoria.IdCategoria;
      console.log("url",url);
      axios({
        method: "GET",
        url: url,
      })
        .then(function (response) {
          if (response.data.status == 200) {
            console.log(response);
            me.arrayEvents=[];
            me.horarios = response.data.result;
            me.horarios.forEach((item)=>{
              me.arrayEvents.push(item.fec_atencion);
            }); 
            //arrayEvents
          }else{
              me.arrayEvents=null;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    changeHorario(horario) {
      console.log(horario);
      this.empleado = horario.Nombres + " " + horario.Apellidos;
      this.model.IdHorario = horario.IdHorario;
      this.model.fec_registro = horario.fec_atencion;
    },

    onInput(e) {
      let me = this;
      let url = "./gethorario/" + me.fec;
      axios({
        method: "GET",
        url: url,
      })
        .then(function (response) {
          if (response.data.status == 200) {
            // console.log(response);
            me.categorias = response.data.result;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getServicios() {
      //clientes-records
      let me = this;
      let url = "./categorias-records";
      axios({
        method: "GET",
        url: url,
      })
        .then(function (response) {
          if (response.data.status == 200) {
            console.log(response);
            me.servicios = response.data.result;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getClientes() {
      //clientes-records
      let me = this;
      let url = "./clientes-records";
      axios({
        method: "GET",
        url: url,
      })
        .then(function (response) {
          if (response.data.status == 200) {
            console.log(response);
            me.clients = response.data.result;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMotos() {
      let me = this;
      let url = "./motos-records";
      axios({
        method: "GET",
        url: url,
      })
        .then(function (response) {
          if (response.data.status == 200) {
            console.log(response);
            me.motos = response.data.result;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    ChangeCAtgeroria(item) {
      this.categoria = item.descripcion;
      this.model.IdHorario = item.IdHorario;
    },
  },
};
</script>

<style>
.v-application ol,
.v-application ul {
  padding-left: 2px;
}
</style>