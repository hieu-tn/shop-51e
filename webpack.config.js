const webpack                 = require('webpack')
const path                    = require('path')
const CleanWebpackPlugin      = require('clean-webpack-plugin')
const UglifyJsPlugin          = require('uglifyjs-webpack-plugin')
const MiniCssExtractPlugin    = require('mini-css-extract-plugin')
const StyleLintPlugin         = require('stylelint-webpack-plugin')
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin')
const VueLoaderPlugin         = require('vue-loader/lib/plugin')

let config = {

  entry: [
    'babel-polyfill',
    './resources/scripts/main.js',
    './resources/styles/main.scss'
  ],
  output: {
    path: path.resolve(__dirname, './dist'),
    publicPath: '/',
    filename: 'scripts/[name].js',
  },

  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: [
          {
            loader: 'babel-loader',
            query: {
              presets: [
                [ 'env', { 'modules': false } ]
              ]
            }
          }
        ]
      },
      {
        test: /\.scss$/,
        use: [
          // 'style-loader',
          // MiniCssExtractPlugin.loader,
          process.env.NODE_ENV !== 'production' ? 'style-loader' : MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1
            }
          },
          'postcss-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.css$/,
        use: [
          process.env.NODE_ENV !== 'production' ? 'vue-style-loader' : MiniCssExtractPlugin.loader,
          'css-loader'
        ]
      },
      {
        test: /\.(png|jpe?g|gif|eot|ttf|woff|woff2)$/,
        loader: 'url-loader',
        options: {
          // Inline files smaller than 10 kB (10240 bytes)
          limit: 10 * 1024
        },
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/,
        loader: 'image-webpack-loader',
        // This will apply the loader before the other ones
        enforce: 'pre',
      },
      {
        test: /\.svg(\?[a-z0-9#=&.]+)?$/,
        use: [
          {
            loader: 'svg-url-loader',
            options: {
              // Inline files smaller than 10 kB (10240 bytes)
              limit: 10 * 1024,
              // Remove the quotes from the url
              // (they’re unnecessary in most cases)
              noquotes: true,
              iesafe: true
            }
          }
        ]
      },
      {
        test: /\.md/,
        use: [
          {
            loader: 'raw-loader'
          }
        ]
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader'
      },
    ]
  },

  plugins: [
    new CleanWebpackPlugin(['dist']),
    new VueLoaderPlugin(),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery'
    }),
    new MiniCssExtractPlugin({
      // Options similar to the same options in webpackOptions.output
      // both options are optional
      filename: 'styles/[name].css',
      chunkFilename: 'styles/[id].css'
    }),
  ],

  resolve: {
    alias: {
      sharingVars: path.resolve(__dirname, './resources/styles/abstracts/_vars.scss'),
      sharingFunctions: path.resolve(__dirname, './resources/styles/abstracts/_functions.scss'),
      sharingMixins: path.resolve(__dirname, './resources/styles/abstracts/_mixins.scss'),
    }
  }

}

module.exports = (env, argv) => {
  console.log('env ', process.env.NODE_ENV)
  if (argv.mode === 'development') {
    config.output.publicPath = '/'
    let rules = [
      {
        enforce: 'pre',
          test: /\.js$/,
        exclude: /node_modules/,
        use: [
        {
          loader: 'eslint-loader'
        }
      ]
      },
    ]
    rules.map(rule => {
      config.module.rules.push(rule)
    })

    let plugins = [
      new StyleLintPlugin(),
      new webpack.HotModuleReplacementPlugin(),
      new webpack.NoEmitOnErrorsPlugin()
    ]
    plugins.map(plugin => {
      config.plugins.push(plugin)
    })

    config.devServer = {
      historyApiFallback: true,
      noInfo: true,
      overlay: {
        warnings: true,
        errors: true
      },
      quiet: true,
      hot: true,
      inline: true,
      host: '0.0.0.0',
      port: 8000,
      disableHostCheck: true,
      // open: true,
      // contentBase: '',
      headers: {
        'Access-Control-Allow-Origin': '*'
      },
      stats: {
        colors: true
      }
    }

    config.devtool = 'inline-source-map'

    console.log('Starting dev server...')
    console.log('Listening at http://localhost:8000')
  }

  if (argv.mode === 'production') {
    config.output.publicPath = '/wp-content/themes/shop_51e/'
    let plugins = [
      new webpack.HashedModuleIdsPlugin(),
      new UglifyJsPlugin({
        cache: true,
        parallel: true,
        sourceMap: true // set to true if you want JS source maps
      }),
      new OptimizeCSSAssetsPlugin({}),
    ]
    plugins.map(plugin => {
      config.plugins.push(plugin)
    })

    config.devtool = 'source-map'

    config.optimization = {
      splitChunks: {
        chunks: 'async',
          minSize: 30000,
          maxSize: 0,
          minChunks: 1,
          maxAsyncRequests: 5,
          maxInitialRequests: 3,
          automaticNameDelimiter: '~',
          name: true,
          cacheGroups: {
          vendors: {
            test: /[\\/]node_modules[\\/]/,
              priority: -10
          },
        default: {
            minChunks: 2,
              priority: -20,
              reuseExistingChunk: true
          }
        }
      }
    }
  }

  return config
}
