import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/components/search-filter.js',
                'resources/js/components/checkbox.js',
                'resources/js/admin/role/index.js',
                'resources/js/admin/role/edit.js',
                'resources/js/admin/permission/index.js',
                'resources/js/admin/permission/edit.js',
                'resources/js/admin/users/index.js',
                'resources/js/admin/users/edit.js',
                'resources/js/admin/route-permissions/index.js',
            ],
            refresh: true,
        }),
    ],
});
