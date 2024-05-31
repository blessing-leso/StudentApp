<?php
include 'dbConfig.php';
include "Survey.php";
include "SurveyQuestion.php";


if (!isset($_POST["email"])) {
    makeMessage(false, "Bad Request");
}

$member = new SurveyQuestion([],$_POST["email"]);
$member->CheckSurveyWasCreated();
