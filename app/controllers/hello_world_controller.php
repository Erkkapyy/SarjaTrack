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
    }

    public static function login(){
      View::make('suunnitelmat/login.html');
    }

    public static function serie_edit(){
      View::make('suunnitelmat/serie_edit.html');
    }
  }
