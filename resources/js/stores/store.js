import Vue from "vue"
import Vuex from "vuex"

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    filter: {
      name: ""
    },
    host: "http://fh7929y8.bget.ru/staff/public"
  }
})