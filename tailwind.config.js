/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                nunito: ["Nunito", "sans-serif"],
            },
            fontSize: {
                "10xl": "18rem",
            },
        },
        container: {
            center: true,
            padding: "2rem",
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
