<?php

class Sarja extends BaseModel{
    public $name, $published, $genre, $episodes, $description;

    public function __construct($attributes){
    parent::__construct($attributes);
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









  }
