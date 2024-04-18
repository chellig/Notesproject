<template>
  <section class="section-add">
    <div class="container">
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
      <h4 align="center">Modifier Étudiant</h4>
      <form @submit.prevent="modifierEtudiant">
        <div class="row">
          <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" v-model="etudiant.nom">
          </div>
          <div class="col-md-6 ms-auto">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" v-model="etudiant.prenom">
          </div>
          <div class="col-md-6 ms-auto">
            <label for="prenom" class="form-label">Cin</label>
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
          <i class="fa-solid fa-floppy-disk"></i> Enregistrer
        </button>
        <router-link to="/listetudiant" class="btn btn-outline-danger mx-2">
          <i class="fa-solid fa-xmark"></i> Annuler
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
  const etudiant = ref({});
  
  const fetchEtudiant = async () => {
    await axios
      .get(`http://localhost:8000/api/etudiants/${route.params.id_etudiant}`)
      .then((res) => {
        etudiant.value = res.data;
      })
      .catch((err) => {
        console.error(err);
      });
  };
  
  const modifierEtudiant = () => {
    axios
      .put(`http://localhost:8000/api/etudiants/${route.params.id_etudiant}`, etudiant.value)
      .then(() => {
        router.push("/etudiant");
      })
      .catch((error) => {
        console.error("Erreur lors de la modification d'étudiant", error);
      });
  };
  
  onMounted(() => {
    fetchEtudiant();
  });
  </script>
  
  <style scoped>
    /* ... styles spécifiques à ce composant ... */
  </style>
  