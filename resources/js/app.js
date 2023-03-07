import "./bootstrap";
import "../css/app.css";
import { createApp } from "vue/dist/vue.esm-bundler.js";
import ArticleLike from "./components/ArticleLike.vue";

const app = createApp({
    components:{
        ArticleLike
    }

});
app.mount('#app');
