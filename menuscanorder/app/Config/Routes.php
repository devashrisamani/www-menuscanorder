<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'Home::index');
$routes->get('/', 'MenuController::index');
$routes->get('/tables', 'MenuController::tables');
$routes->get('/admincont', 'MenuController::admincont');
$routes->post('/admincont', 'MenuController::loginAdmin');
$routes->get('/restaurant/(:num)', 'MenuController::restaurantDetails/$1');
$routes->get('/login', 'MenuController::login');
$routes->post('login', 'MenuController::loginUser');
$routes->get('/register', 'MenuController::register');
$routes->post('register', 'MenuController::registerUser');
$routes->get('/landingpage', 'MenuController::landingpage');
$routes->post('login', 'MenuController::loginAdmin');

$routes->group('admin', function($routes) {
    $routes->get('/', 'MenuController::admin');
    $routes->post('search', 'MenuController::search');
    $routes->match(['get', 'post'], 'add', 'MenuController::add');
    $routes->get('add', 'MenuController::UserForm');  // Display form
    $routes->post('add', 'MenuController::add');  // Process form submission
    $routes->match(['get', 'post'], 'edit/(:num)', 'MenuController::edit/$1');
    $routes->match(['get', 'post'], 'delete/(:num)', 'MenuController::delete/$1');
});

$routes->get('userform', 'MenuController::addUserForm');  // Display form



$routes->group('menu', function($routes) {
    $routes->get('/', 'MenuController::menu');
    $routes->match(['GET', 'POST'], 'addmenuitem', 'MenuController::addmenuitem');
});

$routes->get('deletemenuitem/(:num)', 'MenuController::deletemenuitem/$1');
$routes->post('deletemenuitem/(:num)', 'MenuController::deletemenuitem/$1');
$routes->get('editmenuitem/(:segment)', 'MenuController::editmenuitem/$1');
$routes->post('editmenuitem/(:segment)', 'MenuController::editmenuitem/$1');
$routes->get('/addmenuitem', 'MenuController::addmenuitem');
$routes->match(['GET', 'POST'], 'editmenuitem/(:num)', 'MenuController::editmenuitem/$1');


$routes->get('/tables/add', 'MenuController::addTable');
$routes->get('/qrcode/generate/(:num)', 'MenuController::QRgenerate/$1');
$routes->get('/qrcode/download/(:alphanum)', 'MenuController::QRdownload/$1');
$routes->get('/qrcode/download/(:segment)', 'MenuController::QRdownload/$1');

// Add to cart page routes 
$routes->get('/addtocart', 'MenuController::addToCart');
$routes->post('/menu/addcart', 'MenuController::addcart');

$routes->GET('/cart_items', 'MenuController::index');
$routes->GET('/orders', 'MenuController::orders');
$routes->GET('/getOrders', 'MenuController::getOrders');
