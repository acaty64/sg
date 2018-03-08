import CreateNote from './components/notes/CreateNote.vue'
import List from './components/notes/List.vue'
import FavouriteList from './components/notes/FavouriteList.vue'

const routes = [
    { path: '/', component: List },
    { path: '/create', component: CreateNote },
    { path: '/list', component: List },
    { path: '/favourite-list', component: FavouriteList },
    { path: '*', redirect: '/list' },
];

export default routes;