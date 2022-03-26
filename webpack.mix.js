const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    module:
    {
        rules: [
            { test: /\.mjs$/, resolve: { fullySpecified: false }, include: /node_modules/, type: "javascript/auto" }
        ]
    },

    resolve: {
        extensions: ['.tsx', '.ts', '.js', '.vue'],
        alias: {
            vue$: 'vue/dist/vue.esm-bundler.js',
        }
    },
});

mix.js('resources/js/main.js', 'public/js')
    .vue()
    .postCss("resources/css/app.css", "public/css");

