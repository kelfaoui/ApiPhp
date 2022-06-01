<?php

require_once __DIR__ . '/../vendor/autoload.php';

header('Access-Control-Allow-Origin: http://127.0.0.1:5500');

$router = new \Bramus\Router\Router();

//user part

$router->get('/utilisateurs/page', 'Mvc\Controller\UserController@page');
$router->post('/utilisateurs/create', 'Mvc\Controller\UserController@createUser');
$router->put('/utilisateurs/update/(\d+)', 'Mvc\Controller\UserController@update');
$router->delete('/utilisateurs/delete/(\d+)', 'Mvc\Controller\UserController@delete');


//tournoi part


$router->get('/tournoi/page', 'Mvc\Controller\UserController@pageTournoi');
$router->post('/tournoi/create', 'Mvc\Controller\UserController@createTournoi');
$router->put('/tournoi/update/(\d+)', 'Mvc\Controller\UserController@updateTournoi');
$router->delete('/tournoi/delete/(\d+)', 'Mvc\Controller\UserController@deleteTournoi');
$router->post('/tournoi/participer/(\d+)/(\d+)', 'Mvc\Controller\UserController@joinTournoi');


$router->run();

?>