<<<<<<< HEAD
import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
=======
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
>>>>>>> inertia-version

/** @type {import('tailwindcss').Config} */
export default {
    content: [
<<<<<<< HEAD
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
=======
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
>>>>>>> inertia-version
    ],

    theme: {
        extend: {
            fontFamily: {
<<<<<<< HEAD
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                inter: ["Inter", ...defaultTheme.fontFamily.sans],
                montserrat: ["Montserrat", ...defaultTheme.fontFamily.sans],
=======
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
>>>>>>> inertia-version
            },
        },
    },

    plugins: [forms],
};
