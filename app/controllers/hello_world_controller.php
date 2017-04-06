<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      $hellsing = Sarja::find('%hellsing%');
      $sarjat = Sarja::all();
      $episodes = Sarja::findEpisodes(10);
      Kint::dump($episodes);
      Kint::dump($sarjat);
      Kint::dump($hellsing);
      $virhe = new Sarja(array(
      'name' => 'okok',
      'published' => '1.1.2019',
      'genre' => 'ok',
      'episodes' => 1001,
      'description' => 'ok'
      ));
      $errors = $virhe->errors();
      Kint::dump($errors);
    }

    public static function login(){
      View::make('suunnitelmat/login.html');
    }

    public static function serie_edit(){
      View::make('suunnitelmat/serie_edit.html');
    }
  }
