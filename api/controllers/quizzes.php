<?php
include_once __DIR__ . '/../models/quiz.php';
header('Content-Type: application/json');

if ($_REQUEST['action'] === 'index') {
  echo json_encode(Quizzes::all());
  // echo 'test';
} elseif ($_REQUEST['action'] === 'post') {
  $request_body = file_get_contents('php://input');
  $body_object = json_decode($request_body);
  $new_quiz = new Quiz(null,
  $body_object->quiztitle,
  $body_object->category,
  $body_object->question1,
  $body_object->answer1,
  $body_object->wronganswer1a,
  $body_object->wronganswer1b,
  $body_object->question2,
  $body_object->answer2,
  $body_object->wronganswer2a,
  $body_object->wronganswer2b,
  $body_object->question3,
  $body_object->answer3,
  $body_object->wronganswer3a,
  $body_object->wronganswer3b,
  $body_object->question4,
  $body_object->answer4,
  $body_object->wronganswer4a,
  $body_object->wronganswer4b,
  $body_object->question5,
  $body_object->answer5,
  $body_object->wronganswer5a,
  $body_object->wronganswer5b
);
  $all_quizzes = Quizzes::create($new_quiz);
  echo json_encode($all_quizzes);
}

else if ($_REQUEST['action'] === 'update'){
  $request_body = file_get_contents('php://input');
  $body_object = json_decode($request_body);
  $updated_quiz = new Quiz($_REQUEST['id'],
    $body_object->quiztitle,
    $body_object->category,
    $body_object->question1,
    $body_object->answer1,
    $body_object->wronganswer1a,
    $body_object->wronganswer1b,
    $body_object->question2,
    $body_object->answer2,
    $body_object->wronganswer2a,
    $body_object->wronganswer2b,
    $body_object->question3,
    $body_object->answer3,
    $body_object->wronganswer3a,
    $body_object->wronganswer3b,
    $body_object->question4,
    $body_object->answer4,
    $body_object->wronganswer4a,
    $body_object->wronganswer4b,
    $body_object->question5,
    $body_object->answer5,
    $body_object->wronganswer5a,
    $body_object->wronganswer5b
  );

  $all_quizzes = Quizzes::update($updated_quiz);
  echo json_encode($all_quizzes);
  }

  else if ($_REQUEST['action'] === 'delete') {
    $all_quizzes = Quizzes::delete($_REQUEST['id']);
    echo json_encode($all_quizzes);
  }




 ?>
