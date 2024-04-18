<template>
  <section class="section-add">
    <div class="container">
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
      <h4 align="center">Modifier Étudiant</h4>
      <form @submit.prevent="modifierenseignant">
        <div class="row">
          <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" v-model="enseignant.nom">
          </div>
          <div class="col-md-6 ms-auto">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" v-model="enseignant.prenom">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 ms-auto">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" v-model="enseignant.email">
          </div>
          <div class="col-md-6">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" v-model="enseignant.adresse">
          </div>
         
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="télephone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="télephone" v-model="enseignant.télephone">
          </div>
        </div>
        <br />
        <button type="submit" class="btn btn-outline-primary">
          <i class="fa-solid fa-floppy-disk"></i> Enregister
        </button>
        <router-link to="/enseignant" class="btn btn-outline-danger mx-2">
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
  const enseignant = ref({});
  
  const fetchenseignant = async () => {
    await axios
      .get(`http://localhost:8000/api/enseignants/${route.params.id_enseignant}`)
      .then((res) => {
        enseignant.value = res.data;
      })
      .catch((err) => {
        console.error(err);
      });
  };
  
  const modifierenseignant = () => {
    axios
      .put(`http://localhost:8000/api/enseignants/${route.params.id_enseignant}`, enseignant.value)
      .then(() => {
        router.push("/enseignant");
      })
      .catch((error) => {
        console.error("Erreur lors de la modification d'enseignant", error);
      });
  };
  
  onMounted(() => {
    fetchenseignant();
  });
  </script>
  
  <style scoped>
    /* ... styles spécifiques à ce composant ... */
  </style>
  