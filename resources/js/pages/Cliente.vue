<template>
    <div class="container mt-4">
        <div class="row">

            <button class="btn btn-primary" @click="crear()">Crear</button>

            <div class="col-md-12">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(cliente, index) in clientes">
                        <th>{{ cliente.nombre }}</th>
                        <th>
                            <img style="width:50px;heigth:50px" v-bind:src="app.baseUrl+'/storage/'+cliente.imagen">
                        </th>
                        <th>{{ cliente.cedula }}</th>
                        <th>{{ cliente.email }}</th>
                        <th>{{ cliente.telefono }}</th>
                        <th>{{ cliente.observaciones }}</th>
                        <th>
                            <button class="btn btn-primary" @click="editar(cliente.id)">editar</button>
                            <button class="btn btn-primary">detalles</button>
                            <button class="btn btn-primary" @click="eliminar(cliente.id)">eliminar</button>
                        </th>
                    </tr>
                </tbody>
                </table>
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
            clientes: []
        }
    },
    methods:{
        init(){ 
            this.loading = true;
            this.app.axios.get('clientes/listado').then( response => {
                this.clientes = response.data.clientes;
                console.log(this.clientes);
            });
        },
        crear(){
            this.$router.push('/crear-cliente');
        },
        editar(id){
            this.$router.push({ path: `/editar-cliente/${id}` });
        },
        eliminar(id){
            this.$swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    this.app.axios.delete(`clientes/eliminar/${id}`).then( response => {
                        this.$swal({
                            title: '',
                            text: 'cliente eliminado correctamente',
                            icon: 'success',
                        });
                        this.init();
                    });
                    
                }
            });
        }
    },
    mounted() {
        this.init();
    }
}
</script>

<style>
</style>