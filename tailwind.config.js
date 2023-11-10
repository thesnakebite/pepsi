module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    safelist: [
        {
            pattern: /^/
        },
        // gap-x
        'sm:gap-x-0',
        'sm:gap-x-4',
        // gap-y
        'sm:gap-y-0',
        'sm:gap-y-4',
        // col-span
        'sm:col-span-6',
        // col-start
        'sm:col-start-2',
        'sm:col-start-4',
        // col-end
        'sm:col-end-2',
        'sm:col-end-4',
    ],
    theme: {
        extend: {
            screens: {
                'xs': '480px',
            },
            flexBasis: {
                'unset': 'unset',
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
}
