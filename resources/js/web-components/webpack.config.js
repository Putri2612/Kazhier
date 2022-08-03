const path = require("path")

module.exports = {
    entry: path.resolve(__dirname, "src/index.js"),
    output: {
        path: path.resolve(__dirname, "../../../public/assets/js"),
        filename: "web-component.js",
        libraryTarget: "umd",
    },
    module: {
        rules: [
            {
                test: /\.(js)$/,
                exclude: /node_modules/
            },
            {
                test: /\.html$/i,
                loader: "html-loader"
            }
        ],
    },
    mode: "production",
}