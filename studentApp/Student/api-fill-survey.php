<?php
include 'dbConfig.php';
include "Survey.php";
include "SurveyQuestion.php";


if (!isset($_POST["email"], $_POST["questions"])) {
    makeMessage(false, "Bad Request");
}

$s = new SurveyQuestion($_POST["questions"], $_POST["email"]);
$s->CreateSurvey();
