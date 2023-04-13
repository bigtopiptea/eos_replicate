
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                dokdo: "dokdo",
                "rubik-light": ["Rubik", "sans-serif"],
                "be-vietnam": ["Be Vietnam Pro", "sans-serif"],
            },
            colors: {
                "#ECECEC": "#ECECEC",
                "#A0A0A0": "#A0A0A0",
                "#F9951E": "#F9951E",
                'dark-orange': "#F9951E",
                "#f0870a": "#f0870a",
                "#3E3E3E": "#3E3E3E",
                "#4472C4": "#4472C4",
                "#2156b5": "#2156b5",
                "#7F7F7F": "#7F7F7F",
                "#EE3E2C": "#EE3E2C", //gradient start
                "#F98B38": "#F98B38",
                "#FB9E30": "#FB9E30",
                "#FFFFFF": "#FFFFFF", //gradient end
                "#0070C0": "#0070C0",
                "#D7D7D7": "#D7D7D7",
                "#D9D9D9": "#D9D9D9",
                "#EAEAEA": "#EAEAEA",
                "#D9D9D9": "#D9D9D9",
                "#194E72": "#194E72",
                "#FBB056": "#FBB056",
                "mid-red": "rgba(238, 62, 44, 1)",
                "light-gray": "rgb(107 114 128 / var(--tw-text-opacity))",
            },
            fontSize: {
                '2xs': '0.688rem', // 11px
                '3xs': '0.625rem', // 10px
                '4xs': '0.563rem', // 9px
                '5xs': '0.5rem',   // 8px
                '6xs': '0.438rem', // 7px
            },
            height: {
                "3.5/6": "60%",
            }
        },
    },
    plugins: [require("@tailwindcss/typography")],
};
