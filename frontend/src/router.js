import AppHome from './components/pages/AppHome.vue';
import AppDoctorShow from './components/pages/AppDoctorShow.vue'
import {createRouter, createWebHistory} from 'vue-router';


const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: AppHome
        },
        {
          path: "/doctor/:id",
          name: "doctor-show",
          component: AppDoctorShow
        },
        // {
        //     path: '',
        //     name: '',
        //     component: 
        // },
        // { 
            // path: '/:pathMatch(.*)*', 
            // name: 'not-found',
            // component: PageNotFound
        // }
    ]
});

export { router };