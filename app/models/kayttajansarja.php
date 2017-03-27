<?php

class Kayttajansarja extends BaseModel{
    public $kayttaja_id, $sarja_name, $episodesseen, $grade, $finished, $added;

    public function __construct($attributes){
    parent::__construct($attributes);
    }


    public static function all($kayttaja_id){
    $query = DB::connection()->prepare('SELECT * FROM kayttajansarja WHERE kayttaja_id = :kayttaja_id');
    //$query->execute();
    $query->execute(array('kayttaja_id' => $kayttaja_id));
    $rows = $query->fetchAll();
    $kayttajansarjat = array();
    foreach($rows as $row){
      $kayttajansarjat[] = new Kayttajansarja(array(
        'kayttaja_id' => $row['kayttaja_id'],
        'sarja_name' => $row['sarja_name'],
        'episodesseen' => $row['episodesseen'],
        'grade' => $row['grade'],
        'finished' => $row['finished'],
        'added' => $row['added']
      ));
    }

    return $kayttajansarjat;
    }

    
  }
