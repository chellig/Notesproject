  
  <template><!-- Header START -->
  <header class="navbar-light navbar-sticky header-static">
    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid px-3 px-xl-3">
            <!-- Logo START -->
            <a class="navbar-brand" href="/">
                <img class="light-mode-item navbar-brand-item" src="@/assets/images/logo-iit.png" alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="@/assets/images/logo-iit.png" alt="logo">
            </a>        
            <!-- Main navbar START -->
            <div class="navbar-collapse w-100 collapse" id="navbarCollapse">       
              
                <!-- Nav Main menu START -->
                <ul class="navbar-nav navbar-nav-scroll me-auto">
                    <!-- Nav item 1 Demos -->
                    <li class="nav-item dropdown">
                        <router-link to="/">
                        <a class="nav-link dropdown-toggle active" href="#" id="demoMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acceuil</a>                               
                   </router-link> </li>
                    <li class="nav-item dropdown">
                        <router-link to="/etudiant">
                        <a class="nav-link dropdown-toggle active" href="#" id="demoMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Etudiants</a>                               
                       </router-link>
                </li>
                    <li class="nav-item dropdown">
                        <router-link to="/enseignant">
                        <a class="nav-link dropdown-toggle active" href="#" id="demoMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enseignants</a>                               
                    </router-link>
                </li>
                    <li class="nav-item dropdown">
                        <router-link to="/matiere">
                        <a class="nav-link dropdown-toggle active" href="#" id="demoMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Matieres</a>                               
                    </router-link> </li>
                    <li class="nav-item dropdown">
                        <router-link to="/note">
                        <a class="nav-link dropdown-toggle active" href="#" id="demoMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notes</a>                               
                    </router-link></li>
                    
                </ul>
               
            </div>
            <!-- Main navbar END -->
<div class="collapse navbar-collapse w-100" id="navbarTopContent">
						<!-- Top search START -->
						<div class="nav my-3 my-xl-0 flex-nowrap align-items-center">
              <div class="nav-item w-100">
                <form class="position-relative" id="searchForm" @submit.prevent="handleSearch">
                    <input class="form-control pe-5 bg-secondary bg-opacity-10 border-0" v-model="searchTerm" type="search" placeholder="Search" aria-label="Search">
                    <button class="bg-transparent px-2 py-0 border-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 text-primary"></i></button>
                </form>
            </div>
						</div>
						<!-- Top search END -->
					</div>
            <!-- Profile START -->
            <div>
                <div class="row">
                  <div class="col-md-7">
                    <!-- Votre contenu principal ici -->
                  </div>
                  <div class="col-md-5">
                    <div class="dropdown ms-1 ms-lg-0">
                      <a class="avatar avatar-sm p-0 show" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" @click="toggleDropdown" :aria-expanded="dropdownOpen">
                        <!--img class="avatar-img rounded-circle" :src="userImage" alt="avatar"-->
                        <img class="avatar-img rounded-circle border border-white border-3 shadow" src="http://[::1]:5173/resources/js/assets/images/avatar/09.jpg" alt="" data-v-868c91e6="">
                      </a>
                      <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" v-show="dropdownOpen" :class="{ 'display-block': displayBlock }" aria-labelledby="profileDropdown" data-bs-popper="static">
                        <login @login-successful="onLoginSuccessful" />
                         <li class="px-3 mb-3">
                          <div class="d-flex align-items-center">
                            <div>
                              <a class="h6" href="#">{{ userName }}</a>
                              <p class="small m-0">{{ userEmail }}</p>                             
                            </div>
                          </div>
                        </li>
                        <li v-if="!isLoggedIn"><router-link class="dropdown-item" to="/login">Login</router-link></li>
                        <li v-if="!isLoggedIn"><router-link class="dropdown-item" to="/register">Register</router-link></li>
                        <li v-if="isLoggedIn"><a class="dropdown-item" @click="logout">Déconnexion</a></li>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>
  
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
const searchTerm = ref('');
const router = useRouter();
const userName = ref(null); 
const userEmail = ref(null);
const dropdownOpen = ref(false);
const displayBlock = ref(false);
const isLoggedIn = ref(false);
const logout = async () => {
  const token = localStorage.getItem('token');
  try {
    const response = await axios.post('http://localhost:8000/api/logout', null, {
      headers: {
        'Authorization': `Bearer ${token}`
      }
    });
    console.log(response);
    localStorage.removeItem('token');
    localStorage.removeItem('user');
    isLoggedIn.value = false;
    displayBlock.value = false;
    dropdownOpen.value = false;
    userName.value = null;
    userEmail.value = null;
    router.push("/login");
    alert("Vous êtes déconnecté");
  } catch (err) {
    console.error(err);
    alert(err);
  }
};
const toggleDropdown = () => {
  dropdownOpen.value = !dropdownOpen.value;
  displayBlock.value = !displayBlock.value;
};
/*******************/
const onLoginSuccessful = ({ userName, userEmail }) => {
  isLoggedIn.value = true;
  userName.value = userName;
  userEmail.value = userEmail;

  // Rafraîchir le dropdown
  toggleDropdown();
};
/************/
const handleSearch = async () => {
    try {
        console.log('Search term:', searchTerm.value);       
        searchTerm.value = '';
    } catch (error) {
        console.error(error);
    }
};

onMounted(async () => {
  const token = localStorage.getItem('token');
  if (token) {
    isLoggedIn.value = true;
    userName.value = localStorage.getItem('user');
    userEmail.value = localStorage.getItem('user.email');
  }

});
</script>

<style scoped>
li.nav-item.dropdown a {
    text-decoration: none;
}
.display-block {
    display: block !important;
}
.container-fluid.px-3.px-xl-3 {
    max-width: 1400px;
}
</style>