import type { Config } from "tailwindcss";

const config: Config = {
  darkMode: "class",
  content: ["./resources/**/*.{blade.php,vue,js,ts}"],
  theme: {
    fontFamily: {
      sans: ["Noto Sans JP", "Noto Sans", "system-ui", "sans-serif"],
    },
    extend: {
      colors: {
        background: "var(--color-bg)",
        text: "var(--color-text)",
        subtext: "var(--color-subtext)",
        primary: "var(--color-primary)",
        secondary: "var(--color-secondary)",
        lightPrimary: "var(--color-lightPrimary)",
        lightSecondary: "var(--color-lightSecondary)",
      },
    },
  },
  plugins: [],
};

export default config;
