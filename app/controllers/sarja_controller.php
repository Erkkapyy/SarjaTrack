<?php

  class SarjaController extends BaseController{

    public static function serie_list() {
      $kayttajansarjat = Kayttajansarja::all(1);
      View::make('kayttajansarjat/serie_list.html', array('kayttajansarjat' => $kayttajansarjat));
    }

    public static function serie_show() {
      $sarjat = Sarja::all();
      View::make('sarjat/serie_show.html', array('sarjat' => $sarjat));
    }

    public static function serie_search() {
      View::make('sarjat/serie_search.html');
    }

    public static function serie_details() {
      $sarjat = Sarja::find('%breaking bad%');
      View::make('sarjat/serie_show.html', array('sarjat' => $sarjat));
    }

     public static function store(){
    $params = $_POST;
    $sarja = new Sarja(array(
      'name' => $params['name'],
        'published' => $params['published'],
        'genre' => $params['genre'],
        'episodes' => $params['episodes'],
        'description' => $params['description']
    ));

    $sarja->save();

    Redirect::to('/sarjat', array('message' => 'Sarja on lisätty kaikkien sarjojen listaan.'));
    }

    public static function create() {
      View::make('sarjat/serie_add.html');
    }



    //public static function serie_search($name) {
     // $name = '%' . $name. '%';
     // $name = Sarja::find($name);
     // View::make('sarjat/serie_search.html', array('names' => $name));
    //}



  }
