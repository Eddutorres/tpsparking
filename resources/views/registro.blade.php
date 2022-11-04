
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>  
   
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
  <style>
  #app{
      background-color:#CFD8DC;      
  }
  </style>
</head>
<body>
  <div id="app">
    <v-app>
      <v-main>   
       <!--<h2 class="text-center">CRUD usando APIREST con Node JS</h2>-->
       <!-- Botón CREAR -->  
       <v-flex class="text-center align-center">
       <v-btn class="mx-2 mt-4"  fab dark color="#00B0FF" @click="formNuevo()"><v-icon dark>mdi-plus</v-icon></v-btn>           
       </v-flex>              
         
        <v-card class="mx-auto mt-5" color="transparent" max-width="1280" elevation="8">                    
      
        <!-- Tabla y formulario -->
        <v-simple-table class="mt-5">
            <template v-slot:default>
                <thead>
                    <tr class="indigo darken-4">
                        <th class="white--text">fecha</th>
                        <th class="white--text">estacionamiento</th>
                        <th class="white--text">hora ingreso</th>
                        <th class="white--text">hora salida</th>
                        <th class="white--text">rut</th>
                        <th class="white--text">patente</th>
                        <th class="white--text text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="registro in registros" :key="registro.id">
                    <td>{{ registro.fecha }}</td>
                    <td>{{ registro.codigo_est }}</td>
                    <td>{{ registro.hora_ingreso }}</td>
                    <td>{{ registro.hora_salida}}</td>
                    <td>{{ registro.rut}}</td>
                    <td>{{ registro.patente}}</td>
                    <td>
                        <v-btn fab dark color="#00BCD4" small @click="formEditar(registro.id, registro.fecha, registro.codigo_est, registro.hora_ingreso,registro.hora_salida,registro.rut,registro.patente)"><v-icon>mdi-pencil</v-icon></v-btn>
                        <v-btn fab dark color="#E53935" small @click="borrar(registro.id)"><v-icon>mdi-delete</v-icon></v-btn>
                    </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
        </v-card> 

      <!-- Componente de Diálogo para CREAR y EDITAR -->
      <v-dialog v-model="dialog" max-width="500">        
        <v-card>
          <v-card-title class="blue darken-2 white--text">Registrar ingreso</v-card-title>    
          <v-card-text>            
            <v-form>             
              <v-container>
                <v-row>
                  <input v-model="registro.id" hidden></input>

                  <v-col cols="12" md="4">
                    <v-text-field v-model="registro.fecha" type="date" label="Fecha" solo required></v-text-field>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field v-model="registro.codigo_est" label="Estacionamiento" type="text" solo required></v-text-field>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field v-model="registro.hora_ingreso" label="Hora ingreso" type="time" solo required></v-text-field>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field v-model="registro.hora_salida" label="Hora salida" type="time"></v-text-field>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field v-model="registro.rut" label="Rut" type="text" solo required></v-text-field>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field v-model="registro.patente" label="Patente" type="text" solo required></v-text-field>
                  </v-col>

                </v-row>
              </v-container>            
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="dialog=false" color="blue-grey" dark>Cancelar</v-btn>
            <v-btn @click="guardar()" type="submit" color="blue darken-2" dark>Guardar</v-btn>
          </v-card-actions>
          </v-form>
        </v-card>
      </v-dialog>
      </v-main>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vuetify/2.5.7/vuetify.min.js" integrity="sha512-BPXn+V2iK/Zu6fOm3WiAdC1pv9uneSxCCFsJHg8Cs3PEq6BGRpWgXL+EkVylCnl8FpJNNNqvY+yTMQRi4JIfZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>

    let urlObtener = 'http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/todosRegistros';
    let urlCrear = 'http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/crearRegistro';
    let urlModificar = 'http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/registrarSalida/';
    let urlEliminar = 'http://webservicetps-env.eba-uzinfdjq.us-east-1.elasticbeanstalk.com/api/eliminarRegistro/';
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
       data() {
        return {            
            registros: [],
            dialog: false,
            operacion: '',            
            registro:{
                fecha: '',
                codigo_est:'',
                hora_ingreso:'',
                hora_salida:'',
                rut:'',
                patente:'',
            }          
        }
       },
       created(){               
            this.mostrar()
       },  
       methods:{          
            //MÉTODOS PARA EL CRUD
            mostrar:function(){
              axios.get(urlObtener)
              .then(response =>{
                this.registro = response.data;                   
              })
            },
            crear:function(){
                let parametros = {fecha:this.registro.fecha, codigo_est:this.registro.codigo_est,hora_ingreso:this.registro.hora_ingreso, hora_salida:this.registro.hora_salida,
                                rut:this.registro.rut, patente:this.registro.patente};                
                axios.post(urlCrear, parametros)
                .then(response =>{
                  this.mostrar();
                });     
                this.registro.fecha="";
                this.registro.codigo_est="";
                this.registro.hora_ingreso="";
                this.registro.hora_salida="";
                this.registro.rut ="";
                this.registro.patente="";
            },                        
            editar: function(){
            let parametros = {fecha:this.registro.fecha, codigo_est:this.registro.codigo_est,hora_ingreso:this.registro.hora_ingreso, hora_salida:this.registro.hora_salida,
                                rut:this.registro.rut, patente:this.registro.patente, id:this.registro.id};                            
            //console.log(parametros);                   
                 axios.put(urlModifica+this.registro.id, parametros)                            
                  .then(response => {                                
                     this.mostrar();
                  })                
                  .catch(error => {
                      console.log(error);            
                  });
            },
            borrar:function(id){
             Swal.fire({
                title: '¿Confirma eliminar el registro?',   
                confirmButtonText: `Confirmar`,                  
                showCancelButton: true,                          
              }).then((result) => {                
                if (result.isConfirmed) {      
                      //procedimiento borrar
                      axios.delete(urlEliminar+id)
                      .then(response =>{           
                          this.mostrar();
                       });      
                      Swal.fire('¡Eliminado!', '', 'success')
                } else if (result.isDenied) {                  
                }
              });              
            },

            //Botones y formularios
            guardar:function(){
              if(this.operacion=='crear'){
                this.crear();                
              }
              if(this.operacion=='editar'){ 
                this.editar();                           
              }
              this.dialog=false;                        
            }, 
            formNuevo:function () {
              this.dialog=true;
              this.operacion='crear';
              this.registro.fecha="";
               this.registro.codigo_est="";
                this.registro.hora_ingreso="";
                this.registro.hora_salida="";
                this.registro.rut ="";
                this.registro.patente="";
            },
            formEditar:function(id, fecha, codigo_est, hora_ingreso, hora_salida,rut,patente){
              //capturamos los datos del registro seleccionado y los mostramos en el formulario
              this.registro.id = id;
              this.registro.fecha=fecha;
                this.registro.codigo_est=codigo_est;
                this.registro.hora_ingreso=hora_ingreso;
                this.registro.hora_salida=hora_salida;
                this.registro.rut =rut;
                this.registro.patente=patente;                      
              this.dialog=true;                            
              this.operacion='editar';
            }
       }      
    });
  </script>
</body>
</html> 
