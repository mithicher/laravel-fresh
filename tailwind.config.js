const defaultTheme = require('tailwindcss/defaultTheme');

const num = [1, 2, 3, 4, 5, 6, 8, 10, 12]
const safelist = []
num.map((x) => {
  safelist.push('grid-cols-' + x)
  safelist.push('sm:grid-cols-' + x)
  safelist.push('md:grid-cols-' + x)
  safelist.push('lg:grid-cols-' + x)
  safelist.push('xl:grid-cols-' + x)

  safelist.push('gap-' + x)
  safelist.push('sm:gap-' + x)
  safelist.push('md:gap-' + x)
  safelist.push('lg:gap-' + x)
  safelist.push('xl:gap-' + x)
});

module.exports = {
    purge: {
        content: [
            './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
        ],
        options: {
            safelist
        }
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
