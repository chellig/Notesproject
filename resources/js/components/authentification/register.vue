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
            <h2 class="mt-4 mt-md-0">Sign In</h2>
            <p> Inscrivez-vous</p>
                
            <form @submit.prevent="handleSubmit">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-4 bg-light-input">
                      <label for="yourName" class="form-label">Votre nom</label>
                      <input id="name" type="text" class="form-control" v-model="user.name" required autofocus autocomplete="off">      
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-4 bg-light-input">
                      <label for="yourName" class="form-label">Votre email</label>
                      <input id="email" type="email" class="form-control" v-model="user.email" required autofocus autocomplete="off">      
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-4 bg-light-input">
                      <label for="yourName" class="form-label">Votre password</label>
                      <input id="password" type="password" class="form-control" v-model="user.password" required autocomplete="off">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-4 bg-light-input">
                      <label for="yourName" class="form-label">Confirmer password</label>
                      <input id="password_confirmation" type="password" class="form-control" v-model="user.password_confirmation" required autocomplete="off">            
                    </div>
                  </div>
                </div>
                
                <div class="row">
                
                    <div class="mb-4 bg-light-input">
                      <label for="yourImage" class="form-label">Votre photo</label>
                      <input id="yourImage" type="file" class="form-control" accept="image/*" @change="handleImageChange">
                    
                  </div>
                </div>
                
                <div class="d-grid">
                  <button class="btn btn-lg btn-primary mb-0" type="submit">Send Message</button>
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
import axios from "axios"
import { useRouter } from 'vue-router';
const router = useRouter()
let user= {}

const handleSubmit=async()=> {
axios.post('http://localhost:8000/api/register/', user).then(response => {
router.push("/")
console.log(response)

})
.catch(err => {console.log(err);alert(err) })

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