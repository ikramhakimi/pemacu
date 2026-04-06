/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './index.php',
    './layout.php',
    './include/**/*.php',
    './views/**/*.php',
  ],
  safelist: [
    'icon',
    'icon--12',
    'icon--16',
    'icon--20',
    'icon--24',
    'icon--32',
    'icon--40',
    {
      pattern: /^icon--[a-z0-9-]+$/,
    },
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          50: '#fafafa',
          100: '#f4f4f5',
          200: '#e4e4e7',
          300: '#d4d4d8',
          400: '#a1a1aa',
          500: '#71717a',
          600: '#52525b',
          700: '#3f3f46',
          800: '#27272a',
          900: '#18181b',
        },
        primary: {
          400: '#60a5fa',
          700: '#1d4ed8',
        },
        positive: {
          300: '#86efac',
          400: '#4ade80',
          500: '#22c55e',
          600: '#16a34a',
        },
        negative: {
          300: '#fda4af',
          400: '#fb7185',
          500: '#f43f5e',
          600: '#e11d48',
        },
      },
    },
  },
  plugins: [],
};
