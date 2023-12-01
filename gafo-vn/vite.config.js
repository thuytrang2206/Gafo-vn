import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
	server: {
        host: '127.0.0.1',  // Add this to force IPv4 only
    },
    // plugins: [
    //     laravel({
    //         input: ['resources/css/app.css', 'resources/js/app.js'],
    //         refresh: true,
    //     }),
    // ],
    plugins: [
        // vue(),
        laravel({
            input: ['resources/sass/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({ 
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    }, 
});
