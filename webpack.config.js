const path = require('path');

module.exports = {
  mode: 'production',
  entry: "./js/index.js",
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'src/assets/javascripts')
  },
  module: {
    rules: [{
      test: /\.js$/,
      use: {
        loader: 'babel-loader',
        options: {
          presets: ['@babel/preset-env']
        }
      },
      exclude: [
        path.resolve(__dirname, 'node_modules'),
      ]
    }]
  },
  resolve: {
    extensions: ['.json', '.js', '.jsx']
  }
};