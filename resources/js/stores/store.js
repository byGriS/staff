import Vue from "vue"
import Vuex from "vuex"

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    filter: {
      name: ""
    },
    host: "http://staff.loc"
  }
})