<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Model New
$route [ 'news/update' ]  =  'news/update' ; 
$route [ 'news/create' ]  =  'news/create' ; 
$route [ 'news/(:any)' ]  =  'news/view/$1' ; 
$route['news'] = 'news';

// controleur connexion
$route['connexion'] = 'connexion';
$route [ 'connexion/(:any)' ]  =  'connexion/view/$1' ; 

// controleur pages
$route['pages'] = 'pages';
$route [ 'pages/(:any)' ]  =  'pages/view/$1' ; 


// Controleur par defaut
$route [ '(:any)' ]  =  'pages/view/$1' ; 
$route [ 'default_controller' ]  =  'principal' ;


