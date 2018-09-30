
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    data : {
        'filename': ''
    },
    methods:{
        majfilename : function (e){
            var files = e.target.files || e.dataTransfer.files;
            var filename = files[0].name;
            
            this.filename = filename;
        }
    }
});
