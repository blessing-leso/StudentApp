<?php

// Abstract class for Survey
abstract class Survey
{
    protected $questionsAndAnswer; // Encapsulates Survey's email
    protected $MemberEmail; // Encapsulates Survey's MemberEmail

    // Constructor to initialize $questionsAndAnswer, $MemberEmail
    public function __construct($questionsAndAnswer, $MemberEmail)
    {
        $this->questionsAndAnswer = $questionsAndAnswer;
        $this->MemberEmail = $MemberEmail;
    }
    
    // Abstract methods to be implemented by subclasses
    abstract public function CreateSurvey(); // Polymorphism: Different behavior in subclasses
    abstract public function CheckSurveyWasCreated(); // Polymorphism: Different behavior in subclasses
    abstract public function deleteSurvey(); // Polymorphism: Different behavior in subclasses
}
