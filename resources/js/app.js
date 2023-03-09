import "./bootstrap";
import "../css/app.css";
import { createApp } from "vue/dist/vue.esm-bundler.js";
import ArticleLike from "./components/ArticleLike.vue";
import ArticleTagsInput from "./components/ArticleTagsInput.vue";

const app = createApp({
    components:{
        ArticleLike,
        ArticleTagsInput
    }

});
app.mount('#app');
