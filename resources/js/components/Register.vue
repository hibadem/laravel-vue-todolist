<template>
  <div class="row mt-5">
      <div class="col-md-6">
    <form method="POST" > 
  <div class="form-group row mt-5 ">
    <input type="email" class="form-control" placeholder="Ad" v-model="credentials.name">
  </div>
  <div class="form-group row mt-5 ">
    <input type="email" class="form-control" placeholder="Email" v-model="credentials.email">
  </div>
  <div class="form-group row">
    <input type="password" class="form-control" placeholder="Şifre" v-model="credentials.password">
  </div>
  <button type="submit" class="btn btn-primary" @click.prevent="kayitOl" >Submit</button>
</form>
  </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            credentials:{
                    name:'',
                    email:'',
                    password:''
                }
                
            
        }
    },
    methods: {
        kayitOl(){
            axios.post('/api/register',{credentials:this.credentials})
            .then(response=>{
                console.log(response);
                this.$store.commit('setToken',response.data.token);
                this.$router.push('/');
            })
            .catch(error => {
                console.log(error);
            })
        }
    },
}
</script>

<style>

</style>