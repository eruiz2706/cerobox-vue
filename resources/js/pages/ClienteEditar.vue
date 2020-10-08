<template>
<div class="container">
    <div class="card mt-4">
        <div class="card header">
            Editar cliente
        </div>

        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form v-on:submit.prevent="onSubmit">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre" v-model='nombre'>
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <img style="width:50px;heigth:50px" v-bind:src="app.baseUrl+'/storage/'+imagen">
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
                    <button class="btn btn-success" type="submit">Actualizar</button>

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
            id: '',
            nombre: '',
            imagen: '',
            cedula: '',
            email: '',
            telefono: '',
            observaciones: ''
        }
    },
    methods:{
        init(){
            this.id = this.$route.params.id;
            this.app.axios.get(`clientes/editar/${this.id}`).then( response => {
                const cliente = response.data.cliente;
                console.log(cliente);
                this.nombre = cliente.nombre;
                this.imagen = cliente.imagen;
                this.cedula = cliente.cedula;
                this.email = cliente.email;
                this.telefono = cliente.telefono;
                this.observaciones = cliente.observaciones;
            });
        },
        onSubmit(){ 
            this.loading = true;
            const data = {
                id: this.id,
                nombre: this.nombre,
                imagen: this.imagen,
                cedula: this.cedula,
                email: this.email,
                telefono: this.telefono,
                observaciones: this.observaciones
            }
            this.app.axios.put('clientes/actualizar',data).then( response => {
                console.log(response.data);
                this.$swal({
                    title: '',
                    text: 'Cliente actualizado correctamente',
                    icon: 'success',
                });
            });
        },
        volver(){
            this.$router.push('/clientes');
        }
    },
    mounted() {
        this.init();
    }
}
</script>

<style>
</style>