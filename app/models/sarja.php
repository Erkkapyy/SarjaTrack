<?php

class Sarja extends BaseModel{
    public $name, $published, $genre, $episodes, $description;

    public function __construct($attributes){
    parent::__construct($attributes);
    $this->validators = array('validate_name', 'validate_episodes');
    }


    public static function all(){
    $query = DB::connection()->prepare('SELECT * FROM sarja');
    $query->execute();
    $rows = $query->fetchAll();
    $sarjat = array();
    foreach($rows as $row){
      $sarjat[] = new Sarja(array(
        'name' => $row['name'],
        'published' => $row['published'],
        'genre' => $row['genre'],
        'episodes' => $row['episodes'],
        'description' => $row['description']
      ));
    }

    return $sarjat;
    }

    public static function find($name){
    
    $query = DB::connection()->prepare('SELECT * FROM sarja WHERE name LIKE :name');
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->execute(array('name' => $name));
    $rows = $query->fetchAll();
    $sarjat = array();
    foreach($rows as $row){
      $sarjat[] = new Sarja(array(
        'name' => $row['name'],
        'published' => $row['published'],
        'genre' => $row['genre'],
        'episodes' => $row['episodes'],
        'description' => $row['description']
      ));

      return $sarjat;
    }

    return null;
    }
    
    public static function findSpecific($name){
    
    $query = DB::connection()->prepare('SELECT * FROM sarja WHERE name = :name');
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->execute(array('name' => $name));
    $row = $query->fetch();

    if($row){
      $sarja = new Sarja(array(
        'name' => $row['name'],
        'published' => $row['published'],
        'genre' => $row['genre'],
        'episodes' => $row['episodes'],
        'description' => $row['description']
      ));

      return $sarja;
    }

    return null;
    }

    public static function findEpisodes($episodes){
    
    $query = DB::connection()->prepare('SELECT * FROM sarja WHERE episodes = :episodes');
    $query->execute(array('episodes' => $episodes));
    $row = $query->fetch();

    if($row){
      $sarja = new Sarja(array(
        'name' => $row['name'],
        'published' => $row['published'],
        'genre' => $row['genre'],
        'episodes' => $row['episodes'],
        'description' => $row['description']
      ));

      return $sarja;
    }

    return null;
    }

    public function save(){
    $query = DB::connection()->prepare('INSERT INTO sarja (name, published, genre, episodes, description) VALUES (:name, :published, :genre, :episodes, :description) RETURNING name');
    $query->execute(array('name' => $this->name, 'published' => $this->published, 'genre' => $this->genre, 'episodes' => $this->episodes, 'description' => $this->description));
    $row = $query->fetch();
    $this->name = $row['name'];
    }
    
    public function validate_name(){
    $errors = array();
    if($this->name == '' || $this->name == null){
      $errors[] = 'Nimi ei saa olla tyhjä!';
    }
    if(strlen($this->name) < 3){
      $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
    }

    return $errors;
    }
    
        public function validate_episodes(){
    $errors = array();
    if($this->episodes == null){
      $errors[] = 'Jaksomäärä tulee kertoa!';
    }
    if($this->episodes > 1000){
      $errors[] = 'Liian suuri jaksomäärä!';
    }
    if(!is_numeric($this->episodes)){
      $errors[] = 'Anna jaksomäärään numeroita';
    }

    return $errors;
    }
    
    public function update(){
    $query = DB::connection()->prepare('UPDATE sarja SET published = :published, genre = :genre, episodes = :episodes, description = :description WHERE name = :name RETURNING name');
    $query->execute(array('name' => $this->name, 'published' => $this->published, 'genre' => $this->genre, 'episodes' => $this->episodes, 'description' => $this->description));
    $row = $query->fetch();
    $this->name = $row['name'];
    }
    
    public function destroy(){
    $query = DB::connection()->prepare('DELETE FROM sarja WHERE name = :name');
    $query->execute(array('name' => $this->name));
    }
    
    
    
    









  }
