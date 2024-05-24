import {createRouter, createWebHistory} from "vue-router";
import RegistrationComponent from "@/components/RegistrationComponent.vue";
import AuthenticatorComponent from "@/components/AuthenticatorComponent.vue";
import MainComponent from "@/components/MainComponent.vue";
import BooksComponent from "@/components/BooksComponent.vue";
import CreateBookComponent from "@/components/CreateBookComponent.vue";
import UpdateBookComponent from "@/components/UpdateBookComponent.vue";
import BookContentComponent from "@/components/BookContentComponent.vue";


export default createRouter({
    history:createWebHistory(),
    routes: [{
            path: '/registration',
            component: RegistrationComponent
        },
        {
            path: '/',
            component: AuthenticatorComponent
        },
        {
            path: '/main',
            component: MainComponent
        },
        {
            path: '/books',
            component: BooksComponent
        },
        {
            path: '/create',
            component: CreateBookComponent
        },
        {
            path: '/book/:id(\\d+)/update',
            component: UpdateBookComponent
        },
        {
            path: '/book/:id(\\d+)/content',
            component: BookContentComponent
        }
    ]
})