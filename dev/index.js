require('babelify-es6-polyfill');
const $=require('jquery')
const table=require('./table');
const page=require('page');


var url=location.pathname;
let urlPos=url.lastIndexOf('/');
url=url.substring(urlPos+1);
urlPos=url.lastIndexOf('.');
url = url.substring(0,urlPos);
let tabla=new table();
tabla.drawTable(url);
//require('./rutas/update');

page();