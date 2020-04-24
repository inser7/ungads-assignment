const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
//
const public_js = 'public/js/';
const public_css = 'public/css/';
const resource_sass = 'resources/assets/sass/';


/* Gentelella JavaScripts and Styles*/

const gentelella_home = 'node_modules/gentelella/';
const gentelella_vendor = gentelella_home + '/vendors/';

mix.js('resources/js/app.js', 'public/js').version();
//.sass('resources/sass/app.scss', 'public/css');

mix.
copy(gentelella_home + 'build/css/custom.css',
        public_css + 'gentelella-custom.css').

// bootstrap
copy(gentelella_vendor + 'bootstrap/dist/css/bootstrap.css',
        public_css + 'bootstrap.css').
copy(gentelella_vendor + 'bootstrap/dist/css/bootstrap.css.map',
    public_css + 'bootstrap.css.map').
// DataTables
copy(gentelella_vendor + 'datatables.net-bs/css/dataTables.bootstrap.css',
        public_css + 'dataTables.bootstrap.css').
copy(gentelella_vendor +
    'datatables.net-buttons-bs/css/buttons.bootstrap.css',
    public_css + 'buttons.bootstrap.css').
copy(gentelella_vendor +
    'datatables.net-fixedheader-bs/css/fixedheader.bootstrap.css',
    public_css + 'fixedheader.bootstrap.css').
copy(gentelella_vendor +
    'datatables.net-responsive-bs/css/responsive.bootstrap.css',
    public_css + 'responsive.bootstrap.css').
copy(gentelella_vendor +
    'datatables.net-scroller-bs/css/scroller.bootstrap.css',
    public_css + 'scroller.bootstrap.css');
