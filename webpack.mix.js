const mix = require('laravel-mix');
const path = require('path');

const AutoImport = require('unplugin-auto-import/webpack')
const Components = require('unplugin-vue-components/webpack')
const { ElementPlusResolver } = require('unplugin-vue-components/resolvers')
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
            '@': path.resolve('resources/js')
        }
    },
});

mix.js('resources/js/main.js', 'public/js')
    .vue({
        globalStyles: { sass: ['resources/sass/app.sass'] },
    })
    .postCss("resources/css/app.css", "public/css");



