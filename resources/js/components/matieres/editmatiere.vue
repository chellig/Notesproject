<template>
  <section class="section-add">
    <div class="container">
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
      <h4 align="center">Modifier matiere</h4>
      <form @submit.prevent="modifiermatiere">
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
    </div>
    </section>
  </template>
  
  <script setup>
  import { ref, onMounted } from "vue";
  import { useRouter, useRoute } from "vue-router";
  import axios from "axios";

  const router = useRouter();
  const route = useRoute();
  const matiere = ref({});
  
  const fetchmatiere = async () => {
    await axios
      .get(`http://localhost:8000/api/matieres/${route.params.id_matiere}`)
      .then((res) => {
        matiere.value = res.data;
        console.log("hello",matiere.value )
      })
      .catch((err) => {
        console.error(err);
      });
  };
  
  const modifiermatiere = () => {
    axios
      .put(`http://localhost:8000/api/matieres/${route.params.id_matiere}`, matiere.value)
      .then(() => {
        router.push("/matiere");
      })
      .catch((error) => {
        console.error("Erreur lors de la modification la matiere", error);
      });
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
  fetchmatiere();
  getenseignants();
  getetudiants();
  console.log("hello" )

}

);  
  </script>
  
  <style scoped>
  .section-add{
    padding-top:150px !important;
   }
  </style>
  