<?php

$dbconn = null;
if(getenv('DATABASE_URL')){
    $connectionConfig = parse_url(getenv('DATABASE_URL'));
    $host = $connectionConfig['host'];
    $user = $connectionConfig['user'];
    $password = $connectionConfig['pass'];
    $port = $connectionConfig['port'];
    $dbname = trim($connectionConfig['path'],'/');
    $dbconn = pg_connect(
        "host=".$host." ".
        "user=".$user." ".
        "password=".$password." ".
        "port=".$port." ".
        "dbname=".$dbname
    );
} else {
    $dbconn = pg_connect("host=localhost dbname=quizzes");
}

class quiz  {
  public $id;
  public $quiztitle;
  public $category;
  public $question1;
  public $answer1;
  public $wronganswer1a;
  public $wronganswer1b;
  public $question2;
  public $answer2;
  public $wronganswer2a;
  public $wronganswer2b;
  public $question3;
  public $answer3;
  public $wronganswer3a;
  public $wronganswer3b;
  public $question4;
  public $answer4;
  public $wronganswer4a;
  public $wronganswer4b;
  public $question5;
  public $answer5;
  public $wronganswer5a;
  public $wronganswer5b;


  public function __construct($id, $quiztitle, $category, $question1, $answer1, $wronganswer1a, $wronganswer1b, $question2, $answer2, $wronganswer2a, $wronganswer2b, $question3, $answer3, $wronganswer3a, $wronganswer3b, $question4, $answer4, $wronganswer4a, $wronganswer4b, $question5, $answer5, $wronganswer5a, $wronganswer5b) {
    $this->id = $id;
    $this->quiztitle = $quiztitle;
    $this->category = $category;
    $this->question1 = $question1;
    $this->answer1 = $answer1;
    $this->wronganswer1a = $wronganswer1a;
    $this->wronganswer1b = $wronganswer1b;
    $this->question2 = $question2;
    $this->answer2 = $answer2;
    $this->wronganswer2a = $wronganswer2a;
    $this->wronganswer2b = $wronganswer2b;
    $this->question3 = $question3;
    $this->answer3 = $answer3;
    $this->wronganswer3a = $wronganswer3a;
    $this->wronganswer3b = $wronganswer3b;
    $this->question4 = $question4;
    $this->answer4 = $answer4;
    $this->wronganswer4a = $wronganswer4a;
    $this->wronganswer4b = $wronganswer4b;
    $this->question5 = $question5
    $this->answer5 = $answer5;
    $this->wronganswer5a = $wronganswer5a;
    $this->wronganswer5b = $wronganswer5b;
  }
}

class Quizzes {
  static function all() {
    $quizzes = array();

    $results = pg_query("SELECT * FROM allquizzes");

    $row_object = pg_fetch_object($results);
    while($row_object){
      $new_quiz = new Quiz(
        intval($row_object->id),
        $row_object->quiztitle,
        $row_object->category,
        $row_object->question1,
        $row_object->answer1,
        $row_object->wronganswer1a,
        $row_object->wronganswer1b,
        $row_object->question2,
        $row_object->answer2,
        $row_object->wronganswer2a,
        $row_object->wronganswer2b,
        $row_object->question3,
        $row_object->answer3,
        $row_object->wronganswer3a,
        $row_object->wronganswer3b,
        $row_object->question4,
        $row_object->answer4,
        $row_object->wronganswer4a,
        $row_object->wronganswer4b,
        $row_object->question5,
        $row_object->answer5,
        $row_object->wronganswer5a,
        $row_object->wronganswer5b
      );

      $quizzes[] = $new_quiz;
      $row_object = pg_fetch_object($results);
    }
  }
  return $quizzes;
}


 ?>
