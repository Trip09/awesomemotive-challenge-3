import * as webpack from 'webpack';
import {Configuration} from 'webpack';
import * as path from 'path';

const config: webpack.Configuration = <Configuration> {
    entry: './src/index.js',
    plugins: [new webpack.optimize.UglifyJsPlugin({sourceMap: false, compress: true})],
    output: {
        path: path.resolve(__dirname, '../../dist/js'),
        filename: 'admin.vue.min.js'
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.css$/, use: 'css-loader'
            },
            {
                test: /\.tsx?$/,
                loader: 'ts-loader',
                exclude: /node_modules/,
                options: {
                    appendTsSuffixTo: [/\.vue$/],
                }
            },
            {
                test: /\.(png|jpg|gif|svg)$/,
                loader: 'file-loader',
                options: {
                    name: '[name].[ext]?[hash]'
                }
            }
        ]
    },
    resolve: {
        // Array of extensions that should be used to resolve modules.
        extensions: ['.ts', '.js', '.vue', '.json'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        }
    },
    devServer: {
        historyApiFallback: true,
        noInfo: true
    },
    performance: {
        hints: false
    },
    devtool: '#eval-source-map'
};

export default config;
