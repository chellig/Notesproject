import Accueil from './components/accueil.vue';
import Enseignant from './components/enseignants/EnseignantComponent.vue'
import Addenseignant from './components/enseignants/addenseignant.vue'
import Etudiant from './components/etudiants/EtudiantComponent.vue'
import Addetudiant from "./components/etudiants/addetudiant.vue"
import Editetudiant from "./components/etudiants/editetudiant.vue"
import Matiere from './components/matieres/MatiereComponent.vue'
import Addmatiere from "./components/matieres/addmatiere.vue"
import Note from './components/notes/NoteComponent.vue'
import Addnote from "./components/notes/addnote.vue"
import Register from './components/authentification/register.vue'
import Dashboard from './components/admin/dashboard.vue'
import Editenseignant from "./components/enseignants/editenseignant.vue"
import Editmatiere from "./components/matieres/editmatiere.vue"
import Editnote from "./components/notes/editnote.vue"
import Login from './components/authentification/login.vue'
export const routes = [
  
{
name: 'accueil',
path: '/',
component: Accueil
},
{
    path: '/etudiant',
    name: 'etudiant',
    component: Etudiant,
    meta:{isAuth:true}
  },

  {
    name:"Addetudiant",
    path:"/addetudiant",
    component:Addetudiant
    },
    {

      name:"editetudiant",
      path:"/editetudiant/:id_etudiant",
      component:Editetudiant
      },
      {
        name:"enseignant",
        path:"/enseignant",
        component:Enseignant
        },
      {
        name:"Addenseignant",
        path:"/addenseignant",
        component:Addenseignant
      },
      {

        name:"editenseignant",
        path:"/editenseignant/:id_enseignant",
        component:Editenseignant
        },
      {
        name:"matiere",
        path:"/matiere",
        component:Matiere
        },
        {
          name:"Addmatiere",
          path:"/addmatiere",
          component:Addmatiere
          },
          {
            name:"editmatiere",
            path:"/editmatiere/:id_matiere",
            component:Editmatiere
            },
          {
            name:"note",
            path:"/note",
            component:Note
            },
            {
              name:"Addnote",
              path:"/addnote",
              component:Addnote
              },
              {
                name:"editnote",
                path:"/editnote/:id_note",
                component:Editnote
                },
//login et register
            
                {
                name: "register",
                path: "/register",
                component: Register,
                },
                {
                
                name: "dashboard",
                path: '/dashboard',
                component: Dashboard,
                },
                {
                  name: "login",
                  path: "/login",
                  component: Login,
                  },
];