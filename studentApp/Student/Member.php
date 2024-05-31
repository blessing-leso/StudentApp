<?php

// Abstract class for Member
abstract class Member
{
    protected $email; // Encapsulates Member's email
    protected $password; // Encapsulates Member's password
    public $name = "";
    public $surname = "";

    // Constructor to initialize email and password
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    // Abstract methods to be implemented by subclasses
    abstract public function register(); // Polymorphism: Different behavior in subclasses
    abstract public function login(); // Polymorphism: Different behavior in subclasses
    abstract public function updatePassword(); // Polymorphism: Different behavior in subclasses
}
