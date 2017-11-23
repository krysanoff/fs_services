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

    // admin js
    .addEntry('js/admin', './assets/js/admin.js')

    // public js
    .addEntry('js/main', './assets/js/main.js')

    // admin.css
    .addStyleEntry('css/admin', './assets/css/admin.sass')

    // main.css
    .addStyleEntry('css/main', './assets/css/main.sass')

    // allow sass/scss files to be processed
    .enableSassLoader()

    .enableSourceMaps(!Encore.isProduction())

    /*.addLoader({
        test: /\.(png|jpg|gif|svg)$/,
        loader: 'file-loader',
        options: {
            name: '[path][name].[ext]',
            outputPath: 'images',
            publicPath: '/images/i'
        }
    })*/

// create hashed filenames (e.g. app.abc123.css)
//.enableVersioning()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();