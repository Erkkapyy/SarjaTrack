<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }

    public static function tuukkabox(){
      // Testaa koodiasi täällä
      echo 'Tuukka XDXD!';
    }

    public static function login(){
      View::make('suunnitelmat/login.html');
    }

    public static function serie_list(){
      View::make('suunnitelmat/serie_list.html');
    }

    public static function serie_show(){
      View::make('suunnitelmat/serie_show.html');
    }

    public static function serie_edit(){
      View::make('suunnitelmat/serie_edit.html');
    }
  }
