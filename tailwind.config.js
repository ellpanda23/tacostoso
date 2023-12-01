import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                'ping-slow': {
                  '0%, 100%': { transform: 'scale(0.5)', opacity: '0.5' }, // Tamaño más pequeño, Opacidad inicial y final
                  '50%': { transform: 'scale(1.2)', opacity: '0.3' }, // Tamaño más grande en la mitad de la animación, Opacidad reducida
                },
              },
              animation: {
                'ping-slow': 'ping-slow 2s cubic-bezier(0, 0, 0.2, 1) infinite', // 2 segundos de duración, escala personalizada
              },
        },
    },

    plugins: [forms, typography],
};
