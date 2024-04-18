<template>
    <section class="section-add">
      <div class="container">
        <div class="row g-4 g-lg-0 align-items-center">
    
          <div class="col-md-6 align-items-center text-center">
            <!-- Image -->
            <img src="@/assets/images/element/contact.svg" class="h-400px" alt="">
    
            <!-- Social media button -->
            <div class="d-sm-flex align-items-center justify-content-center mt-2 mt-sm-4">
              <h5 class="mb-0">Follow us on:</h5> 
              <ul class="list-inline mb-0 ms-sm-2">
                <li class="list-inline-item"> <a class="fs-5 me-1 text-facebook" href="#"><i class="fab fa-fw fa-facebook-square"></i></a> </li>
                <li class="list-inline-item"> <a class="fs-5 me-1 text-instagram" href="#"><i class="fab fa-fw fa-instagram"></i></a> </li>
                <li class="list-inline-item"> <a class="fs-5 me-1 text-twitter" href="#"><i class="fab fa-fw fa-twitter"></i></a> </li>
                <li class="list-inline-item"> <a class="fs-5 me-1 text-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a> </li>
                <li class="list-inline-item"> <a class="fs-5 me-1 text-dribbble" href="#"><i class="fas fa-fw fa-basketball-ball"></i></a> </li>
                <li class="list-inline-item"> <a class="fs-5 me-1 text-pinterest" href="#"><i class="fab fa-fw fa-pinterest"></i></a> </li>
              </ul>
            </div>
          </div>
    
          <!-- Contact form START -->
          <div class="col-md-6">
            <!-- Title -->
            <h2 class="mt-4 mt-md-0">Ajout Etudiant</h2>          
      <form @submit.prevent="addEtudiant">
        <div class="row">
          <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" v-model="etudiant.nom">
          </div>
          <div class="col-md-6 ms-auto">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" v-model="etudiant.prenom">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="cin" class="form-label">CIN</label>
            <input type="text" class="form-control" id="cin" v-model="etudiant.cin">
          </div>
          <div class="col-md-6 ms-auto">
            <label for="groupe" class="form-label">Groupe</label>
            <input type="text" class="form-control" id="groupe" v-model="etudiant.groupe">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" v-model="etudiant.adresse">
          </div>
          <div class="col-md-6 ms-auto">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" v-model="etudiant.email">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="telephone" v-model="etudiant.télephone">
          </div>
        </div>
        <br />
        <button type="submit" class="btn btn-outline-primary">
          <i class="fa-solid fa-floppy-disk"></i> Enregister
        </button>
        <router-link to="/etudiant" class="btn btn-outline-danger mx-2">
          <i class="fa-solid fa-xmark"></i> Retour
        </router-link>
      
      </form>
          </div>
          <!-- Contact form END -->
        </div>
      </div>
    </section>
  </template>
  
  <script setup>
  import { ref} from "vue";
  import axios from "axios";
  import { useRouter } from "vue-router";
  const etudiants = ref([]);
  const router=useRouter()
  const etudiant=ref({
  nom:"",
  prenom:"",
  cin:"",
  groupe:"",
  adresse:"",
  email:"",
  télephone:""
  })
  /****addetudiant***/
  const addEtudiant=async()=>{       
          await axios.post("http://localhost:8000/api/etudiants",etudiant.value)
          .then(res=>{
              router.push({ name: 'etudiant'})
          }
          )
          .catch (err =>console.log(error))
  }
  </script>
  
  <style scoped>
  .section-add{
    padding-top:150px !important;
   }
  </style>
  