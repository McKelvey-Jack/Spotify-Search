
import bootstrap from "./bootstrap";

import axios from "axios";
import VueAxios from "vue-axios";

window.Vue = require("vue").default;

Vue.use(VueAxios, axios);

Vue.component("home", require("./components/Home.vue").default);

Vue.component("error-message", require("./components/ErrorMessage.vue").default);

const app = new Vue({
    el: "#app",
});