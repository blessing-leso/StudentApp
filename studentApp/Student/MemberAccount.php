<?php

// Class representing a MemberAcount -> inherit from Member
class MemberAcount extends Member
{
    private function makeMessage($status, $message)
    {
        header('Content-Type: application/json; charset=utf-8');
        $res = json_encode(["status" => $status, "message" => $message]);
        print($res);
    }
    private function accountExit()
    {
        global $conn;
        $sql = "SELECT * FROM member WHERE email='$this->email' LIMIT 1 ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function login()
    {
       

        global $conn;
        $sql = "SELECT * FROM member WHERE email='$this->email'  AND password='$this->password' LIMIT 1 ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $this->makeMessage(true, "Logged in Successfully");
        } else {
            return $this->makeMessage(false, "Invalid Email or Password");
        }
    }
    public function register()
    {
        global $conn;
        if ($this->accountExit()) {
            return $this->makeMessage(false, "Account Exist Please Login");
        }

        $sql = "INSERT INTO member (name, surname, email,password) 
        VALUES ('$this->name', '$this->surname', '$this->email','$this->password')";

        if (mysqli_query($conn, $sql)) {
            return $this->makeMessage(true, "Account Created Successfully");
        } else {
            return $this->makeMessage(false, "Opps Fail to create Account Please Try Again later..");
        }
    }

    // Method to update Member
    public function updatePassword()
    {
        global $conn;

        if (!$this->accountExit()) {
            return $this->makeMessage(false, "Account Doesn't Exist");
        }

        $sql = "UPDATE member SET password='$this->password' WHERE email=$this->email ";
        if (mysqli_query($conn, $sql)) {
            return $this->makeMessage(true, "Password updated successfully");
        } else {
            return $this->makeMessage(false, "Opps Fail to Update Password Please Try Again later..");
        }
    }
    // Method to update Member
    public function deleteAccount()
    {
        global $conn;
        if (!$this->accountExit()) {
            return $this->makeMessage(false, "Account Doesn't Exist");
        }

        $sql = "DELETE member WHERE email='$this->email'  AND password='$this->email'";
        if (mysqli_query($conn, $sql)) {
            return $this->makeMessage(true, "Account Deleted successfully");
        } else {
            return $this->makeMessage(false, "Opps Fail to Update Password Please Try Again later..");
        }
    }
}
