<template>

<div class="row mt-5" >
  <div class="col-md-12">
    <form class="row mt-5" @submit.prevent="ekle">
        <div class="col-12 col-sm pr-sm-0">
            <input type="text" class="form-control" placeholder="Yapılacak bir şey yazın..." v-model="item.name">
        </div>
        <div class="col-12 col-sm-auto">
            <button type="submit" class="btn btn-primary btn-block mb-2" >Kaydet</button>
        </div>
    </form>
  </div>
</div>

</template>

<script>
export default {
  data: function() {
    return {
      item:{
        name: '',
        /* user_id:'' */
      },
    }
  },
  mounted(){
    /* this.getKullanici(); */
  },
  methods:{
    ekle()
    {
      /* if (this.item.name == "") {
        return;
      } */
      
      axios.post('api/item/store',{
        item: this.item
      },{ 'headers': { 'Authorization': 'Bearer ' +localStorage.getItem('token') }})
      .then(response => {
        console.log(response);
      })
      .catch(error => {
        console.log("hata burda");
      })
    },
    /* getKullanici(){
      axios.get('/api/me',{ 'headers': { 'Authorization': 'Bearer ' +localStorage.getItem('token') }}).then(response => {
          console.log(response.data.id);
          console.log(response.data);
          this.item.user_id = response.data.id;
      });
      }, */
    
  
  
  
  }
}
</script>

<style>

</style>