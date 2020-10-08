<template>
<div class="container">
    <div class="card mt-4">
        <div class="card header">
            Iniciar sesion
        </div>

        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form v-on:submit.prevent="onSubmit">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" v-model='email'>
                    </div>

                    <div class="form-group">
                        <label>Contaseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña" v-model='clave'>
                    </div>

                    <button class="btn btn-success" type="submit">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name:'login',
    props: ['app'],
    data(){
        return{
            email: '',
            clave: ''
        }
    },
    methods: {
        onSubmit(){
            const data = {
                email: this.email,
                clave: this.clave
            };

            this.app.axios.post('auth/login',data).then( response =>{
                console.log(response);
                this.app.user = response.data.user;
                this.$router.push('/');
            }).catch( error =>{
                this.$swal({
                    title: '',
                    text: error.response.data.error,
                    icon: 'error',
                });
                //this.$swal('Hello Vue world!!!');
                //this.errors.push(error.response.data.error);
            });
            
        }
    } 
}
</script>