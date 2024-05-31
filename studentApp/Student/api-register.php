<?php
include 'dbConfig.php';
include 'Member.php';
include 'MemberAccount.php';


if (!isset($_POST["email"])) {
    makeMessage(false, "Email is required");
}
if (!isset($_POST["password"])) {
     makeMessage(false, "Password is required");
}
$member = new MemberAcount($_POST["email"], $_POST["password"]);
$member->register();
