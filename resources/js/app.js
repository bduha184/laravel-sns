import "./bootstrap";
import "../css/app.css";
import { createApp } from "vue/dist/vue.esm-bundler.js";
import ArticleLike from "./components/ArticleLike.vue";
import ArticleTagsInput from "./components/ArticleTagsInput.vue";
import FollowButton from "./components/FollowButton.vue";

const app = createApp({
    components:{
        ArticleLike,
        ArticleTagsInput,
        FollowButton
    }

});
app.mount('#app');
