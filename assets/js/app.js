import Vue from 'vue';
import FilmWebApp from "./components/FilmWebApp";
import 'bootstrap/dist/css/bootstrap.css';

Vue.component('film-web-app', FilmWebApp);

const app = new Vue({
    el: '#v-film-web'
});
