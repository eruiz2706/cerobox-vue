<template>
    <div>
        <navbar :app="this" ></navbar>

        <spinner v-if="loading"></spinner>
        <div v-else-if="inicializado">
            <router-view :app="this"></router-view>
        </div>
    </div>
</template>

<script>
import Navbar from './components/Navbar';
export default {
    name: 'app',
    components:{
        Navbar
    },
    data(){
        return{
            user: null,
            loading: false,
            autenticado: false,
            inicializado: false,
            baseUrl: BASE_URL,
            axios: axios.create({
                baseUrl:  BASE_URL
            })
        }
    },
    methods:{
        init(){ 
            console.log("fasd");
            this.loading = true;
            this.autenticado = false;
            this.inicializado = false;
            this.axios.post('auth/init').then( response => {
                this.user = response.data.user;
                if(response.data.user !== null){
                    this.autenticado = true;
                }
                this.loading = false;
                this.inicializado = true;
            });
        }
    },
    mounted() {
        this.init();
    }
}
</script>
