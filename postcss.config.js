const autoprefixer = require('autoprefixer');

module.exports = {
  plugins: [
    autoprefixer({
      browsers: ["> 0.05%", "ios_saf >= 6", "safari 6", "last 2 versions", "Firefox ESR", "not dead"],
    }),
  ],
};