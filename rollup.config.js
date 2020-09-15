import resolve from 'rollup-plugin-node-resolve';
import postcss from 'rollup-plugin-postcss';
import postcssImport from 'postcss-import';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';
import postcssNested from 'postcss-nested';
import postcssUrl from 'postcss-url';

export default {
    input: {
        main:'src/main.js'
    },
    output: {
        dir: 'dist/',
        format: 'esm'
    },
    plugins: [
        resolve(),
        postcss({
            plugins: [
                tailwindcss(),
                autoprefixer(),
                postcssImport(),
                postcssNested(),
                postcssUrl()
            ],
            sourceMap: true,
            modules: false,
            extract: true,
        }),
    ],
    watch: {
        include: 'src/**',
        exclude: 'node_modules/**'
    }
  };