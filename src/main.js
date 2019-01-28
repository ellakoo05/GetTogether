import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

Vue.config.productionTip = false
Vue.prototype.store = {
  globalName: "This is a global name"
}

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
