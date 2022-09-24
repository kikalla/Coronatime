/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    screens:{ 
    'mob': {'min': '320px' , 'max': '639px'},

    'sm': {'min': '639px' },

    'md': {'min': '767px'},

    'lg': {'min': '1023px'},

    'xl': {'min': '1278px'},

    '2xl': {'min': '1535px'},
  },
  plugins: [],
}

}