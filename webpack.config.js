const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

module.exports = () => {
  return {
    mode: "development",
    watch: true,
    entry: ["./src/index.js"],
    output: {
      filename: "./scripts.js",
      path: path.resolve(__dirname, "js"),
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: "./../style.css",
      }),
      new BrowserSyncPlugin(
        // BrowserSync options
        {
          // browse to http://localhost:3000/ during development
          host: "cloudmind2.local",
          open: false, // make 'external' for browser
          port: 8080,
          notify: false,
          // proxy the Webpack Dev Server endpoint
          // (which should be serving on http://localhost:3100/)
          // through BrowserSync
          proxy: "https://cloudmind2.local/",
        },
        // plugin options
        {
          // prevent BrowserSync from reloading the page
          // and let Webpack Dev Server take care of this
          reload: true,
        }
      ),
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
          // all css changes
          test: /\.((c|sa|sc)ss)$/i,
          use: [
            MiniCssExtractPlugin.loader,
            "css-loader",
            "postcss-loader",
            "sass-loader",
          ],
        },
        // { // add imgs to /imgs dir
        //   test: /\.(svg|jpg|png)$/,
        //   use: [
        //     {
        //       loader: 'file-loader',
        //       options: {
        //         outputPath: 'img/icons',
        //         name: '[name].[ext]',
        //       }
        //     },
        //   ],
        // },
      ],
    },
  };
};
