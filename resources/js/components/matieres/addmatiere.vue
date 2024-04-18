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
            <h2 class="mt-4 mt-md-0">Ajout Matiere</h2>          
      <form @submit.prevent="addmatiere">
        <div class="row">
          <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" v-model="matiere.nom">
          </div>
          <div class="col-md-6 ms-auto">
            <label for="code_matiere" class="form-label">Code matiére</label>
            <input type="text" class="form-control" id="code_matiere" v-model="matiere.code_matiere">
          </div>
        </div>      
        <div class="row">
          <div class="col-md-6 ms-auto">
            <label for="enseignant" class="form-label">Enseignants</label>
            <select class="form-control" v-model="matiere.id_enseignant">
            <option v-for="e in enseignants" :key="e.id_enseignant" :value="e.id_enseignant">{{e.nom}}</option>
          
            </select>
            
            </div>
            <div class="col-md-6 ms-auto">
              <label for="etudiant" class="form-label">Etudiants</label>
                <select class="form-control" v-model="matiere.id_etudiant">
                  <option v-for="e in etudiants" :key="e.id_etudiant" :value="e.id_etudiant">{{ e.nom }}</option>
                </select>
              
              </div>
          
        </div>
      
        <br />
        <button type="submit" class="btn btn-outline-primary">
          <i class="fa-solid fa-floppy-disk"></i> Enregister
        </button>
        <router-link to="/matiere" class="btn btn-outline-danger mx-2">
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
  import { ref, onMounted } from "vue";
  import { useRouter } from "vue-router";
  import axios from "axios";
  const router = useRouter();
  const matiere = ref({
    nom: "",
    code_matiere: "",
    id_enseignant: "",
    id_etudiant: "",
  });
  
  const addmatiere = async () => {
  try {
    await axios.post("http://localhost:8000/api/matieres/", matiere.value);
    router.push({ name: 'matiere' });
  } catch (error) {
    console.error("Erreur lors de l'ajout d'une matiere :", error.response.data);
  }
};
/***enseignant***/
const enseignants= ref([]);
      const getenseignants=async()=>{

      axios.get('http://localhost:8000/api/enseignants').then(res => {
        enseignants.value = res.data;

      }).catch(error => {
      console.log(error)
      });}
/***etudiant/***/
const etudiants= ref([]);
const getetudiants=async()=>{

axios.get('http://localhost:8000/api/etudiants').then(res => {
  etudiants.value = res.data;
}).catch(error => {
console.log(error)
});
}
onMounted(() => {
  getenseignants();
  getetudiants();
}

);  
  </script>
  <style scoped>
  .section-add{
    padding-top:150px !important;
   }
  </style>
  