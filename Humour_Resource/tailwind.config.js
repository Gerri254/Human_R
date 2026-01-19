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
            900: '#00264d', // User: Deep Royal Navy (Primary Brand)
            800: '#003366', // Slightly lighter for cards/sections
            700: '#004080', // Hover states
        },
        gold: {
            400: '#ffb366', // Lighter (Hover effects)
            500: '#ffa64d', // User: Vibrant Sunset Orange (Buttons/Highlights)
            600: '#cc7a00', // Darker (Text/Borders)
        },
        gray: {
            50: '#F9FAFB',
            100: '#F3F4F6',
            200: '#E5E7EB',
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