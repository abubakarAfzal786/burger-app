import Vue from 'vue'
import App from './App.vue'
// import 'bootstrap'
// import 'bootstrap/dist/css/bootstrap.min.css'
Vue.config.productionTip = false
Vue.mixin({

  methods: {
    handleLoader(attribute) {
      var yourUl = document.getElementById("loader");
      yourUl.style.display = attribute === "hide" ? "none" : "block";
    },
  },
});
new Vue({
  render: h => h(App),
}).$mount('#app')
