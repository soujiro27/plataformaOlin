<?php  
require 'Slim/Slim.php';
require 'app/models/insert.php';
require 'app/controllers/login.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
    'templates.path' => './templates'
));




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


$app->get('/adminPanel', function() use ($app) {
	$app->render('admin.php');
})->name('adminPanel');





$app->run();



?>