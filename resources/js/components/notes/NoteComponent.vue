<template>
    <div v-if="isLoading">
      <h2> Loading .... </h2>
      </div>
      <main>
        
        <!-- =======================
        Page Banner START -->
        <section class="pt-0">
          <div class="container-fluid px-0">
            <div class="card bg-blue h-100px h-md-200px rounded-0" style="background:url(@/assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
            </div>
          </div>
          <div class="container mt-n4">
            <div class="row">
              <div class="col-12">
                <div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
                  <div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
                    <!-- Avatar -->
                    <div class="col-auto">
                      <div class="avatar avatar-xxl position-relative mt-n3">
                        <img class="avatar-img rounded-circle border border-white border-3 shadow" src="@/assets/images/avatar/09.jpg" alt="">
                        <span class="badge bg-success text-white rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">Pro</span>
                      </div>
                    </div>
                    <!-- Profile info -->
                    <div class="col d-sm-flex justify-content-between align-items-center">
                      <div v-if="isLoggedIn">
                        <h1 class="my-1 fs-4">{{ userName }}</h1>
                       
                      </div>
                      <!-- Button -->
                     
                    </div>
                  </div>
                </div>
        
                <!-- Advanced filter responsive toggler START -->
                <!-- Divider -->
                <hr class="d-xl-none">
                <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                  <a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
                  <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <i class="fas fa-sliders-h"></i>
                  </button>
                </div>
                <!-- Advanced filter responsive toggler END -->
              </div>
            </div>
          </div>
        </section>
        <!-- =======================
        Page Banner END -->
        
        <!-- =======================
        Page content START -->
        <section class="pt-0">
          <div class="container">
            <div class="row">
        
              <!-- Left sidebar START -->
              <div class="col-xl-3">
                <!-- Responsive offcanvas body START -->
                <nav class="navbar navbar-light navbar-expand-xl mx-0">
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <!-- Offcanvas header -->
                    <div class="offcanvas-header bg-light">
                      <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <!-- Offcanvas body -->
                    <div class="offcanvas-body p-3 p-xl-0">
                      <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                        <!-- Dashboard menu -->
                        <div class="list-group list-group-dark list-group-borderless">
                          <a class="list-group-item" href="/addnote">
                            <i class="bi bi-card-checklist fa-fw me-2"></i>Ajouter une note
                          </a>
                          <a class="list-group-item active" href="/etudiant"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Liste des Etudiants</a>                              
                          <a class="list-group-item" href="/enseignant"><i class="bi bi-basket fa-fw me-2"></i>Listes des Enseignants</a>
                          <a class="list-group-item" href="/matiere"><i class="bi bi-basket fa-fw me-2"></i>Listes des Matieres</a>
                         </div>
                      </div>
                    </div>
                  </div>
                </nav>
                <!-- Responsive offcanvas body END -->
              </div>
              <!-- Left sidebar END -->
        
              <!-- Main content START -->
              <div class="col-xl-9">
         <!-- Counter item -->
         <div class="card card-body bg-success bg-opacity-10 p-4 h-100">
                <!-- Counter boxes START -->
                <div class="row mb-4">
                  <!-- Counter item -->
                  <div class="">
                    <h3>LISTE DES notes</h3>
                    <table class="table table-striped">
                      <thead>
                        <tr>                
                          <th>valeur</th>
                          <th>date_note</th>
                          <th>Enseignant</th>                        
                          <th>Etudiant</th>
                          <th>Matiere</th>                                              
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="note in notes" :key="note.id_note">                                             
                          <td>{{ note.valeur }}</td>
                          <td>{{ note.date_note }}</td>  
                          <td>{{ note.enseignant.nom }}</td>
                          <td>{{ note.etudiant.nom }}</td>
                          <td>{{ note.matiere.nom }}</td>                                            
                          <td>
                            <router-link
                              :to="{ name: 'editnote', params: { id_note: note.id_note } }"
                              class="btn btn-outline-warning mx-2">
                              <i class="fa-solid fa-pen-to-square"></i> Modifier
                            </router-link>
                            <button @click="deletenote(note.id_note)" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i>Supprimer</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                 
                </div>
              </div>
              <!-- Main content END -->
              </div><!-- Row END -->
            </div>
          </div>	
        </section>
        <!-- =======================
        Page content END -->
        
        </main>
      </template>
      <script setup>
      import { ref, onMounted } from "vue";
      import axios from "axios";  
      import { useRouter } from 'vue-router';
  /*******log*/
const router = useRouter();
const userName = ref(null); 
const userEmail = ref(null);
const dropdownOpen = ref(false);
const displayBlock = ref(false);
const isLoggedIn = ref(false);   
      class note {
      }     
      const notes = ref([]);
      const isLoading = ref(true);     
const getnotes = async () => {
    try {
      const response = await axios.get("http://localhost:8000/api/notes");
      notes.value = response.data;
      isLoading.value = false;
      console.log("hi",notes.value); 
    } catch (error) {
      console.error(error);
    }
  };
  onMounted(() => {
        getnotes();
        const token = localStorage.getItem('token');
  if (token) {
    isLoggedIn.value = true;
    userName.value = localStorage.getItem('user');
    userEmail.value = localStorage.getItem('user.email');
  }
    });
      /***********delete******/
      const deletenote = async (id_note) => {
        if (window.confirm("Voulez-vous supprimer la note?")) {
          try {
            await axios.delete(`http://localhost:8000/api/notes/${id_note}`);
            alert("note supprimé");
            getnotes();
          } catch (error) {
            console.error(error);
          }
        }
      };
  
      </script>    
      <style scoped>
        h1 {
          color: #333;
        }
        .list-group-dark .list-group-item {
          color: #000 !important;
      }
      .bg-transparent {
        border: none;
    }
      </style>
      