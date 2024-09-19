import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue()
    ],
    server:{
        port: 5111, // vite port
        host: 'larasdtest_app',          // app host
        origin: 'http://localhost:5111', // vite host
    },
});
