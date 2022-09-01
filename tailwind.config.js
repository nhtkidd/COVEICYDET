/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            spaceGray: "#DEDAD0",
            gold : "#AA983F",
        },
        extend: {},
    },
    plugins: [],
};
