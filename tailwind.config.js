import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                navbarBg: "#6cab5e", // تحديد اللون الخلفي للشريط العلوي
                navbarText: "#ffffff", // تحديد اللون النصي
            },
        },
    },

    plugins: [forms],
};
