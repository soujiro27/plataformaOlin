<?php  
require 'Slim/Slim.php';
require 'app/models/insert.php';
require 'app/controllers/login.php';
require 'app/controllers/tables.php';
require 'app/controllers/insert.php';
require 'app/controllers/update.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
    'templates.path' => './templates'
));





$admin=function(){
	if(!isset($_SESSION['tipoUsuario']) and !isset($_SESSION['idUsuario'])){
		$app = \Slim\Slim::getInstance();
        $app->flash('error', 'Login required');
        $app->redirect('/login');
	}
};


$app->get('/', function() use ($app) {
	$app->render('main.html');
})->name('inicio');


$app->get('/login', function() use ($app) {
	$app->render('login.html');
});



$app->post('/registrarUser', function() use ($app) {
	$insert=new InsertController();
	$insert->checkDataInsert('Usuarios',$app->request->post());
});



$app->post('/logearse', function() use ($app) {
	$login= new Login();
	$login->checkLogin($app->request->post(),$app);
});


$app->get('/adminPanel',$admin, function() use ($app) {
	$app->render('web/index.html');
})->name('adminPanel');


$app->get('/categorias',$admin, function() use ($app) {
	$app->render('web/categorias.html');
})->name('categorias');

$app->get('/table/:modulo',function($modulo) use ($app){
	$controllersTabla=new Tables();
	$controllersTabla->incio($modulo);
});

$app->post('/insert/:modulo',function($modulo) use ($app){
	$insert=new InsertController();
	$insert->checkDataInsert($modulo,$app->request->post());
});


$app->get('/getRegister/:modulo',function($modulo) use ($app){
	
	$update=new UpdateController();
	$update->showRegister($modulo,$app->request->get());

});	


$app->run();



?>