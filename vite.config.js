import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
// import vuetify from 'vite-plugin-vuetify';

export default defineConfig({
    plugins: [
        // vuetify({ autoImport: true }),
        vue(),
        laravel({
            input: [
                // 'resources/css/app.css',
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
    server: {
        host: true,
        hmr:{
            host:"localhost",
        }
    },
});
