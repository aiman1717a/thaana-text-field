Nova.booting((Vue, router, store) => {
  Vue.config.devtools = true
  Vue.component('index-thaana-text-field', require('./components/IndexField'))
  Vue.component('detail-thaana-text-field', require('./components/DetailField'))
  Vue.component('form-thaana-text-field', require('./components/FormField'))
})
