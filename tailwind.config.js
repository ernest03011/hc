module.exports = {
  purge: [
    "./Views/**/*.{php,js,jsx,ts,tsx}",
    "./public/**/*.{php,js,jsx,ts,tsx}",
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      screens: {
        xs: "420px",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
