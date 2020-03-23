module.exports = {
    devServer: {
        proxy: "http://localhost"
    },

    // output built static files to Laravel's public dir.
    outputDir: "../../public/frontend-assets",

    // Set the beginning of the URL to access vue assets
    publicPath: "/frontend-assets",

    // modify the location of the generated HTML file.
    indexPath: "../../resources/views/frontend.blade.php"
};
