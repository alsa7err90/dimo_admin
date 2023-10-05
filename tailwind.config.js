/** @type {import('tailwindcss').Config} */
module.exports = {

  content: [
    "./resources/**/*.blade.php",
    "./Modules/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",

  ],
  theme: {
    extend: {},
  },
  plugins: [
     require("daisyui") ,
    // require('@tailwindcss/typography'),
    // require('@tailwindcss/forms'),
    // require('@tailwindcss/aspect-ratio'),
    // require('@tailwindcss/container-queries'),
],

}

