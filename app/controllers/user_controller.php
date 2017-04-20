<?php

class UserController extends BaseController{
  public static function login(){
      View::make('suunnitelmat/login.html');
  }
  public static function handle_login(){
    $params = $_POST;

    $user = User::authenticate($params['username'], $params['password']);
    if($user == null){
      View::make('suunnitelmat/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/kayttajansarjat', array('message' => 'Tervetuloa takaisin ' . $user->username . '!'));
    }
  }
}
