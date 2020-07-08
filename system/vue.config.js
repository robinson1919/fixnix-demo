const VueLoaderPlugin = require('./node_modules/vue-loader/lib/plugin');

module.exports = {
  "transpileDependencies": [
    "vuetify"
  ],
  module: {
    rules: [
      // ... other rules
      {
        test: /\.(pdf|docx?|xlsx?|csv|pptx?)(\?.*)?$/,
        loader: 'vue-loader',
        options: {
          name: 'downloads/[name].[hash:8].[ext]'
        }
      }
    ]
  },
  plugins: [
    // make sure to include the plugin!
    new VueLoaderPlugin()
  ]
}