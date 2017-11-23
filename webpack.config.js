var Encore = require('@symfony/webpack-encore');

Encore
    .autoProvideVariables({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
    })
// directory where all compiled assets will be stored
    .setOutputPath('web/assets/')

    // what's the public path to this directory (relative to your project's document root dir)
    .setPublicPath('/assets')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // will output as web/build/app.js
    .addEntry('js/app', './assets/js/main.js')

    // will output as web/build/admin.css
    .addStyleEntry('css/admin', './assets/css/admin.sass')

    // will output as web/build/main.css
    .addStyleEntry('css/main', './assets/css/main.sass')

    // allow sass/scss files to be processed
    .enableSassLoader()

    .enableSourceMaps(!Encore.isProduction())

// create hashed filenames (e.g. app.abc123.css)
// .enableVersioning()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();