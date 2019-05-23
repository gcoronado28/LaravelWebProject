/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(window).bind("load", function(){
  var loader = document.getElementById("loader");
  loader.classList.add('hidden');
});
var ingsToDelete = [];
var ingPlato = document.getElementsByName("ingsToDelete")[0];
var selectIng = document.getElementsByName("ingrediente")[0];
var delIngs = document.getElementsByClassName("delIng");
var title = document.getElementsByClassName("addIngTitle")[0];

function deleteIng() {
  /*var opt = document.createElement('option');
  opt.appendChild( document.createTextNode(this.previousElementSibling.id) );*/
  ingsToDelete.push(this.previousElementSibling.id);
  this.previousElementSibling.innerHTML = '<del>'+this.previousElementSibling.innerHTML+'</del>';
  this.classList.add('d-none');
  ingPlato.value = ingsToDelete;
  console.log(ingPlato.value);
}

if(title){
  title.addEventListener('click', function(){
    document.getElementsByClassName("form-row")[0].classList.remove('d-none');
    this.style.textDecoration = 'none';
    this.style.cursor = 'unset';
  });
}

for(let i of delIngs){
  i.addEventListener('click', deleteIng);
}
