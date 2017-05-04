<?php

class Kayttajansarja extends BaseModel{
    public $kayttaja_id, $sarja_name, $episodesseen, $grade, $finished, $added;

    public function __construct($attributes){
    parent::__construct($attributes);
    $this->validators = array('validate_episodesseen', 'validate_grade');
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
    
    public static function findSpecific($kayttaja_id, $sarja_name){
    
    $query = DB::connection()->prepare('SELECT * FROM kayttajansarja WHERE kayttaja_id = :kayttaja_id AND sarja_name = :sarja_name');
    $query->execute(array('kayttaja_id' => $kayttaja_id, 'sarja_name' => $sarja_name));
    $row = $query->fetch();

    if($row){
      $kayttajansarja = new Kayttajansarja(array(
        'kayttaja_id' => $row['kayttaja_id'],
        'sarja_name' => $row['sarja_name'],
        'episodesseen' => $row['episodesseen'],
        'grade' => $row['grade'],
        'finished' => $row['finished'],
        'added' => $row['added']
      ));

      return $kayttajansarja;
    }

    return null;
    }
    
    public function update(){
    $query = DB::connection()->prepare('UPDATE kayttajansarja SET episodesseen = :episodesseen, grade = :grade, finished = :finished, added = :added WHERE sarja_name = :sarja_name AND kayttaja_id = :kayttaja_id RETURNING sarja_name');
    $query->execute(array('kayttaja_id' => $this->kayttaja_id, 'sarja_name' => $this->sarja_name, 'episodesseen' => $this->episodesseen, 'grade' => $this->grade, 'finished' => $this->finished, 'added' => $this->added));
    $row = $query->fetch();
    $this->sarja_name = $row['sarja_name'];
    }
    
    public function validate_grade(){
    $errors = array();
    if($this->grade == null){
      $errors[] = 'Arvosana ei saa olla tyhjä!';
    }
    if($this->grade > 10){
      $errors[] = 'Arvosanan tulee olla enintään 10!';
    }

    return $errors;
    }
    
    public function validate_episodesseen(){
    $errors = array();
    if($this->episodesseen == null){
      $errors[] = 'Jaksomäärä tulee kertoa!';
    }
    if($this->episodesseen > 1000){
      $errors[] = 'Liian suuri jaksomäärä!';
    }
    if(!is_numeric($this->episodesseen)){
      $errors[] = 'Anna jaksomäärään numeroita';
    }

    return $errors;
    }
    
    public function save(){
    $query = DB::connection()->prepare('INSERT INTO kayttajansarja (kayttaja_id, sarja_name, episodesseen, grade, finished, added) VALUES (:kayttaja_id, :sarja_name, :episodesseen, :grade, :finished, :added) RETURNING sarja_name');
    $query->execute(array('kayttaja_id' => $this->kayttaja_id, 'sarja_name' => $this->sarja_name, 'episodesseen' => $this->episodesseen, 'grade' => $this->grade, 'finished' => $this->finished, 'added' => $this->added));
    $row = $query->fetch();
    $this->sarja_name = $row['sarja_name'];
    }
    
    public function destroy(){
    $query = DB::connection()->prepare('DELETE FROM kayttajansarja WHERE kayttaja_id = :kayttaja_id AND sarja_name = :sarja_name');
    $query->execute(array('kayttaja_id' => $this->kayttaja_id, 'sarja_name' => $this->sarja_name));
    }

    
  }
