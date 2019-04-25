import Vue from 'vue'
import vueCustomElement from 'vue-custom-element'
import 'document-register-element/build/document-register-element'
import navigation from './abstracts/navigation'
import search from './abstracts/search'
import pageHome from './pages/_home'
import Products from './components/products.vue'

navigation()
search()
pageHome()

Vue.use(vueCustomElement)
if (document.getElementsByTagName('shop51e-products')) {
  Vue.customElement('shop51e-products', Products)
}
