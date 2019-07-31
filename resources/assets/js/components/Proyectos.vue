<template>
    <div class="container">
        <div class="row mt-2" >
          <div class="col-md-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de proyectos </h3>

                <div class="card-tools">
                    <button class="btn btn-success" @click="newModal"> <i class="fas fa-user-plus fa-fw"></i> Agregar nuevo proyecto </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Título</th>
                      <th>Presupuesto</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="proyecto in this.proyectos" :key="proyecto.id">
                      <td>{{ proyecto.id }}</td>
                      <td>{{ proyecto.titulo }}</td>
                      <td>{{ proyecto.presupuesto }} </td>
                      <td>{{ proyecto.estado }} </td>
                      
                      <td>
                        
                        <a href="/proyecto">
                            <i class="fas fa-eye fa-lg blue"></i>
                        </a>
                        /

                        <a href="#" @click="editModal(user)">
                            <i class="fa fa-edit fa-lg blue"> </i> 
                        </a>

                        /

                        <a href="#" @click="deleteUser(user.id)">
                            <i class="fa fa-trash fa-lg red"> </i>
                        </a>

                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
            </div>
        </div>


        <div class="modal fade" id="modalNew" tabindex="-1" role="dialog" aria-labelledby="modalNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                
                <div class="modal-header">

                    <h5 class="modal-title" v-show="!editmode" id="modalNewLabel">Agregar nuevo proyecto</h5>
                    <h5 class="modal-title" v-show="editmode" id="modalNewLabel">Actualizar proyecto</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form @submit.prevent="editmode ? updateUser() : createUser()">

                    <div class="modal-body">

                        
                        <div class="form-group">
                            <input v-model="form.titulo" type="text" name="titulo" id="titulo"
                                placeholder="Titulo del proyecto" class="form-control" :class="{ 'is-invalid': form.errors.has('titulo') }">
                            <has-error :form="form" field="titulo"></has-error>
                        </div>

                        <div class="form-group">
                            <textarea v-model="form.descripcion" name="descripcion" id="descripcion"
                                placeholder="Descripción del proyecto" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('descripcion') }">
                            </textarea>
                            <has-error :form="form" field="descripcion"></has-error>
                        </div>

                        <div class="form-group">
                            <input v-model="form.presupuesto" type="text" name="presupuesto" id="presupuesto"
                                placeholder="Presupuesto del proyecto" class="form-control" :class="{ 'is-invalid': form.errors.has('presupuesto') }">
                            <has-error :form="form" field="presupuesto"></has-error>
                        </div>

                        <div class="form-group">
                            <input v-model="form.fechaInicio" type="text" name="fechaInicio" id="fechaInicio"
                                placeholder="Fecha inicio del proyecto" class="form-control" :class="{ 'is-invalid': form.errors.has('fechaInicio') }">
                            <has-error :form="form" field="fechaInicio"></has-error>
                        </div>

                        <div class="form-group">
                            <input v-model="form.fechaFin" type="text" name="fechaFin" id="fechaFin"
                                placeholder="Fecha de finalizacion del proyecto" class="form-control" :class="{ 'is-invalid': form.errors.has('fechaFin') }">
                            <has-error :form="form" field="fechaFin"></has-error>
                        </div>

                        

                        
                   

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
                
                </div>
            
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            
            return{

                proyectos: {},

                editmode: false,
                users: {},
            
                form: new Form({
                    titulo: '',
                    descripcion: '',
                    presupuesto: '',
                    fechaInicio: '',
                    fechaFin: ''
                })
                
            }
        },

        methods: {

            /*getResults(page = 1) {
			    axios.get('api/user?page=' + page)
				.then(response => {
					this.users = response.data;
				});
            },
            
            updateUser(){
                this.$Progress.start();

                //console.log('Editing data');
                this.form.put('api/user/'+ this.form.id )
                .then( ()=> {
                    $('#modalNew').modal('hide');
                    swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                    )

                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                })
                .catch( () => {
                    this.$Progress.fail();
                });
            },

            editModal(user){
                this.editmode = true;
                this.form.reset();
                this.form.clear();
                $('#modalNew').modal('show');
                this.form.fill(user);
            },
            
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#modalNew').modal('show');
            },
            
            deleteUser(id){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    //Send request to the server
                    if (result.value) {
                        this.form.delete('api/user/'+id).then( ()=>{
                            

                            swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )

                            Fire.$emit('AfterCreate');

                        }).catch( ()=>{
                            swal.fire("Failed!", "There was something wrong.", "warning");
                        } );
                    }

                })

            },
            
            loadUsers(){
                //if(this.$gate.isAdminOrAuthor()){
                    axios.get("api/user").then( ({ data }) => (this.users = data) );
                //}
                
            },

            createUser(){
                this.$Progress.start();
                
                this.form.post('api/user')
                .then( () =>{

                    Fire.$emit('AfterCreate');
                    $('#modalNew').modal('hide');
                    toast.fire({
                        type: 'success',
                        title: 'User created successfully'
                    })
                    this.$Progress.finish();

                })
                .catch( () => {

                })
  
            }
            */
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#modalNew').modal('show');
            },

            cargarProyectos(){
                axios.get("api/proyecto").then( ({ data }) => (this.proyectos = data) );
            },

            
        },

        created() {
            this.cargarProyectos();
            /*Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                .then( (data) =>{
                    this.users = data.data;
                })
                .catch( () => {
                    toast.fire({
                        type: 'error',
                        title: 'Error al buscar'
                    })
                })
            });
            
            
            //this.loadUsers();
            Fire.$on('AfterCreate', ()=> {
                this.loadUsers();
            });*/

        }
    }
</script>
