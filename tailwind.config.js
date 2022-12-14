/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            "Bodoni": ["Bodoni Moda", "serif"],
            "Drive": ["Drive", "sans"],
        },
        colors: {
            white: "white",
            primary: "#719C53",
            blue: "#395C67",
            pink: "#E5BBA4",
            lightGrey: "#F5F5F5",
            dark: "#233B37",
            red:"red"
        },
        container: {
            center: true,
            padding: "2rem"
        },
        extend: {},
    },
    plugins: [],
}
