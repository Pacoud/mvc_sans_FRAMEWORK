/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/views/**/*.php',
    './public/**/*.php',
    './**/*.php'
  ],
  theme: {
    extend: {
      colors: {
        primary: '#071028',
        'primary-foreground': '#E6EEF8',
        accent: '#6b0f0f'
      }
    }
  },
  plugins: []
}
