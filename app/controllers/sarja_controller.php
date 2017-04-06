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
    $attributes = array(
      'name' => $params['name'],
      'published' => $params['published'],
      'genre' => $params['genre'],
      'episodes' => $params['episodes'],
      'description' => $params['description']
    );
    $sarja = new Sarja($attributes);
    $errors = $sarja->errors();
    if(count($errors) == 0) {
        $sarja->save();
        Redirect::to('/sarjat', array('message' => 'Sarja on lisätty kaikkien sarjojen listaan.'));
    } else {
        View::make('/sarjat/serie_add.html', array('errors' => $errors, 'attributes' => $attributes));
    }
    }

    public static function create() {
      View::make('sarjat/serie_add.html');
    }
    
    public static function edit($name){
    $sarja = Sarja::find($name);
    View::make('/edit.html', array('attributes' => $sarja));
    }
    
    public static function update($name){
    $params = $_POST;

    $attributes = array(
      'name' => $params['name'],
      'published' => $params['published'],
      'genre' => $params['genre'],
      'episodes' => $params['episodes'],
      'description' => $params['description']
    );

    $sarja = new Sarja($attributes);
    $errors = $sarja->errors();

    if(count($errors) > 0){
      View::make('game/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      $sarja->update();
      Redirect::to('/sarjat', array('message' => 'Sarjaa on muokattu onnistuneesti!'));
    }
    }
    
    public static function destroy($name){
    $sarja = new Sarja(array('name' => $name));
    $sarja->destroy();
    Redirect::to('/sarjat', array('message' => 'Sarja on poistettu onnistuneesti!'));
  }



    //public static function serie_search($name) {
     // $name = '%' . $name. '%';
     // $name = Sarja::find($name);
     // View::make('sarjat/serie_search.html', array('names' => $name));
    //}



  }