<template>
    <section class="section-add">
        <div class="container">
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
      <h4 align="center">Modifier note</h4>
      <form @submit.prevent="modifiernote">
        <div class="row">
            <div class="col-md-6">
              <label for="valeur" class="form-label">Valeur</label>
              <input type="text" class="form-control" id="valeur" v-model="note.valeur">
            </div>
            <div class="col-md-6 ms-auto">
              <label for="date_note" class="form-label">Date-Note</label>
              <input type="text" class="form-control" id="date_note" v-model="note.date_note">
            </div>
          </div>   
          <div class="row">
            <div class="col-md-6 ms-auto">
              <label for="enseignant" class="form-label">Enseignants</label>
              <select class="form-control" v-model="note.id_enseignant">
              <option v-for="e in enseignants" :key="e.id_enseignant" :value=e.id_enseignant>{{e.nom}}</option>
              </select>         
              </div>         
          </div>
          <div class="row">
            <div class="col-md-6 ms-auto">
              <label for="etudiant" class="form-label">Etudiants</label>
              <select class="form-control" v-model="note.id_etudiant">
                <option v-for="e in etudiants" :key="e.id_etudiant" :value="e.id_etudiant">{{ e.nom }}</option>
              </select>       
              </div>
            <div class="col-md-6 ms-auto">
              <label for="matiere" class="form-label">Matieres</label>
              <select class="form-control" v-model="note.id_matiere">
              <option v-for="e in matieres" :key="e.id_matiere" :value="e.id_matiere">{{e.nom}}</option>
              </select>    
            </div>
          </div>
         
        
          <br />
          <button type="submit" class="btn btn-outline-primary">
            <i class="fa-solid fa-floppy-disk"></i> Enregister
          </button>
          <router-link to="/note" class="btn btn-outline-danger mx-2">
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
  const note = ref({});
  
  const fetchnote = async () => {
    await axios
      .get(`http://localhost:8000/api/notes/${route.params.id_note}`)
      .then((res) => {
        note.value = res.data;
        console.log("hello",note.value )
      })
      .catch((err) => {
        console.error(err);
      });
  };
  
  const modifiernote = () => {
    axios
      .put(`http://localhost:8000/api/notes/${route.params.id_note}`, note.value)
      .then(() => {
        router.push("/note");
      })
      .catch((error) => {
        console.error("Erreur lors de la modification la note", error);
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
/*****matiere***/
const matieres = ref([]);
const getmatieres = async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/matieres');
    matieres.value = response.data;
  } catch (error) {
    console.error(error);
  }
};

onMounted(() => {
  fetchnote();
  getenseignants();
  getetudiants();
  getmatieres();
  console.log("hello" )
}

);  
  </script>
  
  <style scoped>
  .section-add{
    padding-top:150px !important;
   }
  </style>
  