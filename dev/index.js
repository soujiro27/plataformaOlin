require('babelify-es6-polyfill');
const $=require('jquery')
const table=require('./table');
const page=require('page');


let tabla=new table();
tabla.drawTable('categorias');
//require('./rutas/update');

page();