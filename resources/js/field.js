Nova.booting((Vue, router, store) => {
  Vue.component('index-dhivehi-field', require('./components/IndexField'))
  Vue.component('detail-dhivehi-field', require('./components/DetailField'))
  Vue.component('form-dhivehi-field', require('./components/FormField'))
})
