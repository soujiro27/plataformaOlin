<?php  
require 'Slim/Slim.php';
require 'app/models/insert.php';
require 'app/controllers/login.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
    'templates.path' => './templates'
));





$admin=function(){
	if(!isset($_SESSION['tipoUsuario'])){
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
	$insert= new Insert();
	$insert->insertaBd('Usuarios', $app->request->post());
});



$app->post('/logearse', function() use ($app) {
	$login= new Login();
	$login->checkLogin($app->request->post(),$app);
});


$app->get('/adminPanel',$admin, function() use ($app) {
	$app->render('web/index.html');
})->name('adminPanel');


$app->get('/categorias',$admin, function() use ($app) {
	$app->render('web/form_component.html');
})->name('categorias');







$app->run();



?>