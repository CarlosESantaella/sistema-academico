/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
    screens: {
      'sm': '576px',
      'md': '768px',
      'lg': '992px',
      'xl': '1200px',
      '2xl': '1400px',
    }
  },
  plugins: [],
  prefix: 'tw-',
}
