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

    transpileDependencies: ["vuex-persist"],

    // TODO: Fixed webpack configuration to keep the same result as without the configuration
    configureWebpack: {
        plugins: [
            new HtmlWebpackPlugin({
                template: join(__dirname, "/src/index.html"),
                title: "SCT Backoffice",
                description: "SCT Backoffice"
            })
        ]
    },

    // Snippet to replace Webpack configuration
    // pages: {
    //     index: {
    //         // entry for the page
    //         entry: 'src/index/main.js',
    //         // the source template
    //         template: 'public/index.html',
    //         // output as dist/index.html
    //         filename: 'index.html',
    //         // when using title option,
    //         // template title tag needs to be <title><%= htmlWebpackPlugin.options.title %></title>
    //         title: 'Index Page',
    //         // chunks to include on this page, by default includes
    //         // extracted common chunks and vendor chunks.
    //         chunks: ['chunk-vendors', 'chunk-common', 'index']
    //     },
    //     // when using the entry-only string format,
    //     // template is inferred to be public/subpage.html
    //     // and falls back to public/index.html if not found.
    //     // Output filename is inferred to be subpage.html.
    //     subpage: 'src/subpage/main.js'
    // }
};
