const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const dotenv = require("dotenv").config();

const monitored_files = [
  "**/*.php",
  "**/*.css",
  "**/*.js",
  "**/*.scss",
  "**/*.ts",
  "**/*.tsx",
];

const env = dotenv.parsed;
// entry point
const admin_entry = "./admin/src/index.tsx";
const public_entry = "./public/src/index.tsx";

// resolve
const admin_resolve = { extensions: [".tsx", ".ts", ".js"] };
const public_resolve = { extensions: [".tsx", ".ts", ".js"] };

// output
const admin_output = {
  path: path.resolve(__dirname, "admin/dist"),
  filename: "bundle.js",
};
const public_output = {
  path: path.resolve(__dirname, "public/dist"),
  filename: "bundle.js",
};

const browserSync = new BrowserSyncPlugin({
  host: env.BROWSERSYNC_HOST || "localhost",
  port: env.BROWSERSYNC_PORT || 3000,
  proxy: env.BROWSERSYNC_PROXY || "http://localhost:8080",
  files: monitored_files,
});

const public_module = {
  rules: [
    {
      test: /\.tsx?$/,
      use: "ts-loader",
      exclude: /node_modules/,
    },
    {
      test: /\.scss$/,
      use: [
        MiniCssExtractPlugin.loader,
        "css-loader",
        "postcss-loader",
        "sass-loader",
      ],
    },
  ],
};

const admin_module = {
  rules: [
    {
      test: /\.tsx?$/,
      use: "ts-loader",
      exclude: /node_modules/,
    },
    {
      test: /\.scss$/,
      use: [
        MiniCssExtractPlugin.loader,
        "css-loader",
        "postcss-loader",
        "sass-loader",
      ],
    },
  ],
};
const public_plugins = [
  new MiniCssExtractPlugin({
    filename: "style.css",
  }),
];
const admin_plugins = [
  new MiniCssExtractPlugin({
    filename: "style.css",
  }),
  browserSync,
];
module.exports = [
  {
    entry: admin_entry,
    output: admin_output,
    resolve: admin_resolve,
    module: admin_module,
    plugins: admin_plugins,
  },
  {
    entry: public_entry,
    output: public_output,
    resolve: public_resolve,
    module: public_module,
    plugins: public_plugins,
  },
];
