import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                inter: ['Inter', 'sans-serif'],
            },
            boxShadow: {
                'card': '0 2px 16px 0 rgba(25, 40, 57, 0.09)',
                'card-secondary': '0 8px 24px 0 rgba(25, 40, 57, 0.12)'
            },
            colors: {
                'ghost-white': '#F5F8FF',
                'grayish-blue': '#90A5BB',
                'catalina-blue': '#14286D',
                'oxford-blue': '#0D1A48',
                'breadcumb-link': '#1B3591',
                'primary': '#305EFF',
                'secondary': '#D8E4FD',
                'accent': '#00BE5F',
            },
        },
        plugins: [
            forms,
            require('flowbite/plugin'),
        ],
    }
};
