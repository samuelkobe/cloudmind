const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

module.exports = () => {
  return {
    mode: "production",
    watch: false,
    entry: ["./src/index.js"],
    output: {
      filename: "./scripts.js",
      path: path.resolve(__dirname, "js"),
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: "./../style.css",
      }),
    ],
    module: {
      rules: [
        {
          // perform js babelization on all .js files
          test: /\.m?js$/,
          exclude: /(node_modules|bower_components)/,
          use: {
            loader: "babel-loader",
            options: {
              presets: ["@babel/preset-react"],
            },
          },
        },
        {
          test: /\.(woff|woff2|eot|ttf|otf)$/i,
          type: "asset/resource",
        },
        {
          // add imgs to /imgs dir
          test: /\.(svg|jpg|png)$/,
          use: [
            {
              loader: "file-loader",
              options: {
                outputPath: "img/icons",
                name: "[name].[ext]",
              },
            },
          ],
        },
        {
          // all css changes
          test: /\.((c|sa|sc)ss)$/i,
          use: [
            MiniCssExtractPlugin.loader,
            "css-loader",
            "postcss-loader",
            "sass-loader",
          ],
        },
      ],
    },
    optimization: {
      minimize: true,
      minimizer: [
        // For webpack@5 you can use the `...` syntax to extend existing minimizers (see below)
        `...`, // here we are minifying .js
        new CssMinimizerPlugin(), // here we are minifying .css
      ],
    },
  };
};
