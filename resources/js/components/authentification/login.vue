<template>
    <section class="bg-light register">
        <div class="container">
            <div class="row g-4 g-lg-5 align-items-center">
                <div class="col-xl-7 order-2 order-xl-1">
                    <figure class="fill-danger opacity-2 position-absolute top-0 start-0 translate-middle mb-3">
                        <svg width="211px" height="211px">
                            <path d="M210.030,105.011 C210.030,163.014 163.010,210.029 105.012,210.029 C47.013,210.029 -0.005,163.014 -0.005,105.011 C-0.005,47.015 47.013,-0.004 105.012,-0.004 C163.010,-0.004 210.030,47.015 210.030,105.011 Z"></path>
                        </svg>
                    </figure>
                        <!-- Review -->
                        <div class="col-md-7 position-relative mb-0 mt-0 mt-md-5">
                            <!-- SVG -->
                           
  
        <div class="col-md-12">
            <!-- Title -->
            <h2 class="mt-4 mt-md-0">Enregistrer</h2>         
        <form @submit.prevent="handleLogin">
        <div class="form-group row">
        
        <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
        
        <div class="col-md-6">
        <input id="email" type="email" class="form-control" v-model="user.email" required autofocus autocomplete="off">
        
        </div>
        </div>
        <div class="form-group row">
        
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
        
        <div class="col-md-6">
        <input id="password" type="password" class="form-control" v-model="user.password" required autocomplete="off">
        
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
        
        <button type="submit" class="btn btn-primary" >
        
        Login
        </button>
        </div>
        </div>
        </form>
        
</div>	
</div> 
</div>

</div> <!-- Row END -->
</div>
</section>
        </template>
        <script setup>
        import axios from 'axios';
        import { useRouter } from 'vue-router';
        const router = useRouter()
let user= {}
const handleLogin=async()=> {
axios.post('http://localhost:8000/api/login/', user)

.then((response) => {
    
router.push("/")
localStorage.setItem('user',response.data.user.name)
localStorage.setItem('token',response.data.token)
alert("Vous êtes connecté");

})
.catch(err => {console.log(err);
alert(err)
})

}
</script>

<style scoped>
.register .col-md-12[data-v-585970d5] {
    margin: 0 auto;
    display: table;
    box-shadow: 0 0 10px #7e7e7e;
    width: 100%;
    padding: 45px;
    border-radius: 10px;
    border: 1px solid#cf2d844f;
    background: #ffffff;
}
.register{
    padding-top: 9.5rem !important;
}
.register .mt-md-5 {
    display: table;
    margin: 3rem auto;
}
.col-xl-7 {
    flex: 0 0 auto;
    width: 100%;
    display: table;
    margin: 0 auto;
}
</style>