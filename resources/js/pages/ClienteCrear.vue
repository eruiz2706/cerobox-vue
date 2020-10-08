<template>
<div class="container">
    <div class="card mt-4">
        <div class="card header">
            Crear cliente
        </div>

        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form v-on:submit.prevent="onSubmit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre" v-model='nombre'>
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="file" class="form-control-file border" @change="onFileChange">
                    </div>
                    <div class="form-group">
                        <label>Cedula</label>
                        <input type="text" class="form-control" placeholder="Cedula" v-model='cedula'>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" v-model='email'>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" class="form-control" placeholder="Telefono" v-model='telefono'>
                    </div>
                    <div class="form-group">
                        <label>Observacion</label>
                        <input type="text" class="form-control" placeholder="Observacion" v-model='observaciones'>
                    </div>
                    <button class="btn btn-success" type="submit">Guardar</button>

                    <button class="btn btn-danger" @click="volver()">Volver</button>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'clientes',
    props: ['app'],
    data(){
        return{
            loading: false,
            nombre: '',
            imagen: '',
            cedula: '',
            email: '',
            telefono: '',
            observaciones: ''
        }
    },
    methods:{
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length){
                return;
            }
            this.imagen = files[0];
        },
        onSubmit(){ 
            this.loading = true;
            
            var formData = new FormData();
            formData.append('nombre',this.nombre);
            formData.append('imagen',this.imagen);
            formData.append('cedula',this.cedula);
            formData.append('email',this.email);
            formData.append('telefono',this.telefono);
            formData.append('observaciones',this.observaciones);
            
            this.app.axios.post('clientes/crear',formData).then( response => {
                this.nombre = '';
                this.imagen = '';
                this.cedula = '';
                this.email = '';
                this.telefono = '';
                this.observaciones = '';
                
                this.$swal({
                    title: '',
                    text: 'Cliente creado correctamente',
                    icon: 'success',
                });
            });
        },
        crear(){
            this.$router.push('/crear-cliente');
        },
        volver(){
            this.$router.push('/clientes');
        }
    },
    mounted() {
    }
}
</script>

<style>
</style>