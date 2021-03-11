<template>
  <div class="row mt-5">
      <div class="col-md-6">
    <form method="POST" > 
  <div class="form-group row mt-5 ">
    <input type="email" class="form-control" placeholder="Enter email" v-model="credentials.email">
  </div>
  <div class="form-group row">
    <input type="password" class="form-control" placeholder="Password" v-model="credentials.password">
  </div>
  <button type="submit" class="btn btn-primary" @click.prevent="login" >Submit</button>
</form>
  </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            credentials:{
                email:'',
                password:''
            },
            loading:true
        }
    },
    methods: {
        login(){
            axios.post('/api/login', this.credentials).then(response => {    
                this.$store.commit('setToken',response.data.token);
                this.$router.push('/');
                console.log(response);
               
            });
        }
    },
}
</script>

<style>

</style>