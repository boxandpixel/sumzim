// const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );
const MiniCSSExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const path = require("path");

module.exports = {
  // ...defaultConfig,
  mode: "production",
  entry: {
    // ...defaultConfig.entry,
    home: ["./src/home.js", "./src/home.scss"],
    site: ["./src/site.js", "./src/site.scss"],
    timeline: ["./src/timeline.js", "./src/timeline.scss"],
  },
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "[name].js",
  },
  devtool: "source-map",
  plugins: [
    // ...defaultConfig.plugins,
    new MiniCSSExtractPlugin({
      filename: "[name].css",
    }),
    new CleanWebpackPlugin({
      cleanOnceBeforeBuildPatterns: [path.join(__dirname, "dist/*")],
    }),
  ],
  optimization: {
    // ...defaultConfig.optimization,
    minimizer: new CssMinimizerPlugin(),
    minimize: true,
    minimizer: [new TerserPlugin()],
  },
  module: {
    // ...defaultConfig.module,

    rules: [
      {
        test: /\.s?css$/,
        use: [
          MiniCSSExtractPlugin.loader,
          "css-loader",
          "postcss-loader",
          "sass-loader",
        ],
      },
    ],
  },
};
