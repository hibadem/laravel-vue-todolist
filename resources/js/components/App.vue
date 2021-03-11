<template>
  <div id="app">
    <div class="container">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" >
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../../img/logo.svg" style="height: 28px">
                Yapılacaklar Listesi
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapseContent">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">Anasayfa</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/login" class="nav-link">Giriş Yap</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/register" class="nav-link">Kayıt Ol</router-link>
                    </li>
                     <li class="nav-item">
                        <router-link to="/ekleme" class="nav-link">Ekleme</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/sayfalama" class="nav-link">Sayfalama</router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  v-text="name">
                           
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" v-show="this.name.length>0">
                            <a class="dropdown-item" href="#">Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"  @click="cikisyap">Çıkış Yap</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline ml-auto my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Aranan" aria-label="Search" v-model="search" >
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" @click.prevent="ara">Ara</button>
                    

                </form>
                <!-- <button  class="btn btn-outline-success my-2 my-sm-0" type="submit" @click="cikisyap">çikiş yap</button> -->
            </div>
        </div>
        </nav>
        <table class="table mt-5" v-show="this.search.length>0">
            <thead class="thead-dark mt-5">
            <tr>
                <th scope="col">Kullanıcı Id</th>
                <th scope="col">Kullanıcı Adı</th>
                <th scope="col">Task</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in arananItems" :key="index">
                <th scope="row">{{item.user_id}}</th>
                <td>{{item.userName}}</td>
                <td><input class="form-control" type="text" v-model="item.name" v-show="item.duzenle" />
                <span>{{item.name}}</span> </td>
            
            </tr>
            </tbody>
  </table>
    <div v-if="this.name.length>0" class="alert alert-success"> Giriş yapıldı.</div>
    <div v-if="this.ciktim" class="alert alert-danger">Çıkış yapıldı.</div>
       <div class="yukaribosluk">
           <router-view></router-view>
       </div>
    </div>
  </div>
</template>

<script>
    import Ekleme from './Ekleme.vue';
    import Login from './Login.vue';
    export default {
        mounted() {
            console.log('Component mounted.');
            this.getKullanici();
        },
        created(){
            this.getList();
        },
        components:{
            Ekleme,Login
        },
        data(){
            return{
                name:'',
                items:[],
                arananItems:[],
                search:'',
                ciktim:false
                
            }
        },
        computed:{
            ara(){
                this.arananItems = [];
                if(this.search.length>0){
                    this.items.forEach(i => {
                        if(i.name != null && i.name.includes(this.search)){
                            this.arananItems.push(i);
                        }
                    })
                }
                else{
                    this.arananItems = this.items;
                }
            }
        },
        methods:{
            getList(){
                axios.get('api/items',{ 'headers': { 'Authorization': 'Bearer ' +localStorage.getItem('token') }}).then(response => {
                    // console.log(response.data);
                    this.items = response.data.map((degisken)=>{return {...degisken,duzenle:false}});
                });
            },
            getKullanici(){
                axios.get('/api/me',{ 'headers': { 'Authorization': 'Bearer ' +localStorage.getItem('token') }}).then(response => {
                    /* console.log(response.data.name); */
                    console.log(response.data);
                     this.name = response.data.name; 
                });
            },
            cikisyap(){
                axios.get('/api/logout',{ 'headers': { 'Authorization': 'Bearer ' +localStorage.getItem('token') }}).then(response => {
                    console.log(response);
                    this.name = '';
                    this.$store.commit('clearToken');
                    this.ciktim = true;
                })
            },
            
        }
        /* methods: {
             axiosyolla(){
                axios.get('/api/user-profile',{ 'headers': { 'Authorization': 'Bearer ' +localStorage.getItem('token') }}).then(res =>{
                    console.log(res.data);
                });

            } 
        } */
        
    }
</script>

<style >
.yukaribosluk{
    margin-top:100px;
}
</style>