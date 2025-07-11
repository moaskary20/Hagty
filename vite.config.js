import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/filament/admin/theme.css',
                'resources/css/force-toolbar-fix.css',
                'resources/css/final-overrides.css',
                'resources/js/nuclear-color-force.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
