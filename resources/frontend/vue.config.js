const HtmlWebpackPlugin = require("html-webpack-plugin");
const { join } = require("path");

module.exports = {
    devServer: {
        proxy: "http://localhost",
        overlay: {
            warnings: false,
            errors: true
        }
    },

    // output built static files to Laravel's public dir.
    outputDir: "../../public/frontend-assets",

    // Set the beginning of the URL to access vue assets
    publicPath: "/frontend-assets",

    // modify the location of the generated HTML file.
    indexPath: "../../resources/views/frontend.blade.php",

    lintOnSave: true,

    // TODO: Fix integrity
    // integrity: true,

    // transpileDependencies: ['vuex-persist'],

    // TODO: Fixed webpack configuration to keep the same result as without the configuration
    configureWebpack: {
        plugins: [
            new HtmlWebpackPlugin({
                template: join(__dirname, '/src/index.html'),
                title: "SCT Backoffice",
                description: "SCT Backoffice",
            }),
        ],
    },
};
