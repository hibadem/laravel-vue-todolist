<template>
  <div>
  <table class="table mt-5">
    <thead class="thead-dark mt-5">
      <tr>
        <th scope="col">Kullanıcı Id</th>
        <th scope="col">Kullanıcı Adı</th>
        <th scope="col">Task</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item,index) in items" :key="index">
        <th scope="row">{{item.user_id}}</th>
        <td>{{item.userName}}</td>
        <td><input class="form-control" type="text" v-model="item.name" v-show="item.duzenle" />
         <span v-show="!item.duzenle">{{item.name}}</span> </td>
        <td>
          <button class="btn btn-sm btn-danger" @click="sil(item.id)">
              Sil
          </button>
          <button v-on:click="duzenleme(index)" class="btn btn-sm btn-secondary">Düzenle</button>
          <button href="#" class="btn btn-sm btn-primary"  @click="guncelle(item.id,item.name)" v-show="item.duzenle">
              Kaydet
          </button>
        </td>
      </tr>
    </tbody>
  </table>

  </div>
</template>

<script>

export default {
  created(){
    
    this.getList();
  },
  mounted(){},
  data(){
    return{
      items:[],
      kullanici:'',
      duzenleItem:[]
     
      
      
    }
  },
  methods:
  {
    getList(){
     axios.get('api/items',{ 'headers': { 'Authorization': 'Bearer ' +localStorage.getItem('token') }}).then(response => {
        /* console.log(response.data.name); */
        //  console.log("Id 2 mi",response.data.id); 
          console.log("bak bu", response.data);
          this.items = response.data.map((degisken)=>{return {...degisken,duzenle:false}});
          
    }); 
  },
  guncelle(id,ad)
  {
    
    axios.put('api/item/'+id,{ad},{ 'headers': { 'Authorization': 'Bearer ' +localStorage.getItem('token') }})
    .then(response => {
      console.log(response);
      if(response.data){
       this.duzenleItem = this.items.filter(item=>item.id == id );
       this.duzenleItem[0].duzenle = false;
      }
    }).catch(error => {
      console.log(error);
    })
  },
  duzenleme(index){
    this.items[index].duzenle = !this.items[index].duzenle;
    /* this.duzenle = !this.duzenle; */
  },
  sil(id){
    axios.delete('api/item/'+id,{ 'headers': { 'Authorization': 'Bearer ' +localStorage.getItem('token') }})
    .then(response=>{
      if(response.status == 200)
      {
        console.log('İtem silindi');
        this.getList();
      }
    }).catch(error => {
      console.log(error);
    })
  }
  
  }



}
</script>

<style scoped>
.completed{
  text-decoration:line-through;
  color: red;
}

</style>