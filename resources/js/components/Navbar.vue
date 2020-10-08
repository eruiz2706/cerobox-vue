<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Cerobox</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" v-if="app.user !== null">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Administrador de contenido
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <router-link to='/clientes' class="dropdown-item">Clientes</router-link>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ app.user === null ? '' : app.user.name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a @click="cerrarSesion()" href="javascript:;" class="dropdown-item">Cerrar sesion</a>
                </div>
            </li>
        </ul>
    </div>
    </nav>
</template>

<script>
export default {
    name: 'navbar',
    props: ['app'],
    data(){
        return {

        }
    },
    methods: {
        cerrarSesion(){
            this.app.axios.post('auth/logout').then(()=>{
                this.app.user = null;
                this.app.autenticado = false;
                this.$router.push('/login');
            },);
        }
    }
    ,mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style>
</style>