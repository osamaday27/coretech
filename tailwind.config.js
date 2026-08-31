import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                colors: {
                    cyan: { 400: '#22d3ee', 500: '#06b6d4', 600: '#0891b2' },
                    amber: { 400: '#fbbf24', 500: '#f59e0b' }
                }
            },
        },
    },

    plugins: [require('tailwind-scrollbar')],
};
