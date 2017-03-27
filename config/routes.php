<?php

  $routes->get('/', function() {
    HelloWorldController::login();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/show', function() {
    SarjaController::serie_details();
  });

  $routes->get('/edit', function() {
    HelloWorldController::serie_edit();
  });

  $routes->get('/kayttajansarjat', function() {
    SarjaController::serie_list();
  });

  $routes->get('/sarjat', function() {
    SarjaController::serie_show();
  });

  $routes->get('/search', function() {
    SarjaController::serie_search();
  });

  $routes->get('/search/:name', function($name) {
   SarjaController::serie_search($name);
  });

  $routes->post('/sarjat', function() {
    SarjaController::store();
  });

  $routes->get('/sarjat/serie_add', function() {
    SarjaController::create();
  });

  
