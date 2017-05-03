<?php

  class KayttajansarjaController extends BaseController{

    public static function serie_list() {
        $user = BaseController::get_user_logged_in();
        if($user) {
            $user_id = $user->id;
            $kayttajansarjat = Kayttajansarja::all($user_id);
            View::make('kayttajansarjat/serie_list.html', array('kayttajansarjat' => $kayttajansarjat));
        }
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
      View::make('/sarjat/serie_add.html');
    }
    
    public static function edit($sarja_name){
        $user = BaseController::get_user_logged_in();
        if($user) {
            $user_id = $user->id;
        $kayttajansarja = Kayttajansarja::findSpecific($user_id, $sarja_name);
        View::make('kayttajansarjat/kayttajansarja_edit.html', array('attributes' => $kayttajansarja));
        }
    }
    
    
    
    public static function update($sarja_name){
    $params = $_POST;

    $attributes = array(
      'kayttaja_id' => $params['kayttaja_id'],
      'sarja_name' => $params['sarja_name'],
      'episodesseen' => $params['episodesseen'],
      'grade' => $params['grade'],
      'finished' => $params['finished'],
      'added' => $params['added']
    );

    $kayttajansarja = new Kayttajansarja($attributes);
    $errors = $kayttajansarja->errors();

    if(count($errors) > 0){
      View::make('sarjat/kayttajansarja_edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      $kayttajansarja->update();
      Redirect::to('/kayttajansarjat', array('message' => 'Sarjaa on muokattu onnistuneesti!'));
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

