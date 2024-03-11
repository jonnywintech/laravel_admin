import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/admin-checkbox.js',
                'resources/js/components/search-filter.js',
                'resources/js/admin-search-filter.js',
            ],
            refresh: true,
        }),
    ],
});
