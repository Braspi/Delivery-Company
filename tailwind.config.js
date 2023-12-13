/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.{php,html}", "./components/**/*.{php,html}"],
  theme: {
    extend: {
      colors: {
        'light': 'rgb(0, 176, 190)',
        'dark': 'rgb(1, 129, 168)',
        'background-color': 'rgb(30, 30, 30)'
      },
    },
  },
  plugins: [],
}