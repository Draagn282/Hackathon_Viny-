import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    important: true,
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                customLightBrown: '#EC8922',
                customDarkBrown: '#915018',
            },
        },
    },
    plugins: [],
    safelist: [{
        pattern: /(bg|text|border)-custom(LightBrown|DarkBrown)/
    }],
};
