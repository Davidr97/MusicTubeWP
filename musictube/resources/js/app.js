/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import router from './routes';


require('./bootstrap');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('login', require('./components/auth/Login').default);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sidebar', require('./components/layout/Sidebar.vue').default);
Vue.component('header-component', require('./components/layout/Header.vue').default);
Vue.component('search-result', require('./components/SearchResult').default);
Vue.component('player', require('./components/Player').default);
Vue.component('side-track', require('./components/SideTrack').default);

Vue.component('new-album', require('./components/album/NewAlbum').default);
Vue.component('edit-album', require('./components/album/EditAlbum').default);
Vue.component('most-listened', require('./components/statistics/mostListened').default);
Vue.component('most-liked', require('./components/statistics/mostLiked').default);
Vue.component('most-disliked', require('./components/statistics/mostDisliked').default);
Vue.component('most-recent', require('./components/statistics/mostRecent').default);
Vue.component('track-item', require('./components/upload_tracks/TrackItem').default);
Vue.component('track-list', require('./components/upload_tracks/TrackList').default);
Vue.component('track-form', require('./components/upload_tracks/TrackForm').default);
Vue.component('edit-track-form', require('./components/upload_tracks/EditTrackForm').default);
Vue.component('add-track-form', require('./components/upload_tracks/AddTrackForm').default);
Vue.component('statistics-track', require('./components/statistics/Track').default);
Vue.component('statistics-navigation', require('./components/statistics/Navigation').default);

Vue.component('new-artist', require('./components/artist/NewArtist').default);
Vue.component('edit-artist', require('./components/artist/EditArtist').default);

Vue.component('post-comment-form', require('./components/comments/PostCommentForm').default);
Vue.component('comment-list', require('./components/comments/CommentList').default);
Vue.component('comment', require('./components/comments/Comment').default);

Vue.component('user-info', require('./components/subsribe/UserInfo').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
