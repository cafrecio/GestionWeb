import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        manifest: true, // 🔹 Asegurar que genere el manifest
        outDir: 'public/build', // 🔹 Directorio de salida explícito
    },
    server: {
        host: 'localhost',
        port: 5173,
        strictPort: true,
    }
});
