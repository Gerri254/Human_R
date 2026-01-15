/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        serif: ['"Playfair Display"', 'serif'],
        sans: ['"Inter"', 'sans-serif'],
      },
      colors: {
        navy: {
            900: '#0A192F',
            800: '#112240',
            700: '#233554',
        },
        gold: {
            400: '#D4AF37',
            500: '#C5A059',
            600: '#B08D55',
        },
        whatsapp: '#25D366'
      },
      animation: {
        'scroll': 'scroll 30s linear infinite',
        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      },
      keyframes: {
        scroll: {
            '0%': { transform: 'translateX(0)' },
            '100%': { transform: 'translateX(-50%)' },
        }
      }
    },
  },
    plugins: [
      require('@tailwindcss/typography'),
    ],
  }