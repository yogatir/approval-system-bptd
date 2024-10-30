/** @type {import('tailwindcss').Config} */

module.exports = {
  mode: 'jit',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      keyframes: {
        marquee: {
          '0%': { transform: 'translateX(100vw)' },  // Start from off-screen right
          '100%': { transform: 'translateX(-100%)' },  // Move to off-screen left
        },
      },
      animation: {
        marquee: 'marquee 20s linear infinite',
      },
    },
  },
  plugins: []
}