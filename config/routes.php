<?php

function check_logged_in() {
    BaseController::check_logged_in();
}

$routes->get('/', function() {
    UserController::login();
});

$routes->post('/', function() {
    UserController::handle_login();
});

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$routes->get('/show/:name', function($name) {
    SarjaController::serie_details($name);
});

$routes->get('/sarjat/:name/edit', function($name) {
    SarjaController::edit($name);
});

$routes->get('/kayttajansarjat', 'check_logged_in', function() {
    SarjaController::serie_list();
});

$routes->get('/sarjat', function() {
    SarjaController::serie_show();
});

$routes->post('/sarjat/serie_add', function() {
    SarjaController::store();
});

$routes->get('/sarjat/serie_add', function() {
    SarjaController::create();
});

$routes->post('/sarjat/:name/edit', function($name) {
    SarjaController::update($name);
});

$routes->post('/sarjat/:name/destroy', function($name) {
    SarjaController::destroy($name);
});

$routes->post('/logout', function() {
    UserController::logout();
});

$routes->get('/kayttajansarjat/:sarja_name/edit', function($sarja_name) {
    KayttajansarjaController::edit($sarja_name);
});

$routes->post('/kayttajansarjat/:sarja_name/edit', function($sarja_name) {
    KayttajansarjaController::update($sarja_name);
});

$routes->get('/sarjat/:name/add', function($name) {
    KayttajansarjaController::serie_add($name);
});

$routes->post('/sarjat/:name/add', function($name) {
    KayttajansarjaController::store($name);
});

$routes->post('/kayttajansarjat/:kayttaja_id/:sarja_name/destroy', function($kayttaja_id, $sarja_name) {
    KayttajansarjaController::destroy($kayttaja_id, $sarja_name);
});




