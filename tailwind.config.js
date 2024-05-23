import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "petconnect-color": "#75AA32",
                "petconnect-color-400": "#D9FAAF",
                "petconnect-color-600": "#6B903C", 
                "petconnect-color-41": "rgba(117, 170, 50, 0.41)"
            },
        },
    },

    plugins: [forms],
};
