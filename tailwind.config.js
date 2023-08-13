/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.ts",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      animation: {
        'scale-up': 'scale-up 200ms forwards',
      },

      keyframes: {
        'scale-up': {
          from: { transform: 'scale(0)' },
          to: { transform: 'scale(1)' },
        },
      }
    },
    container: {
      padding: '2rem',
    },
  },
  plugins: [],
}
