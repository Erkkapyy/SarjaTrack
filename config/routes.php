<?php

  $routes->get('/', function() {
    HelloWorldController::login();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/tuukkalaatikko', function() {
    HelloWorldController::tuukkabox();
  });

  $routes->get('/list', function() {
    HelloWorldController::serie_list();
  });

  $routes->get('/show', function() {
    HelloWorldController::serie_show();
  });

  $routes->get('/edit', function() {
    HelloWorldController::serie_edit();
  });

  
