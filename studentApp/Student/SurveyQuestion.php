<?php

// Class representing a MemberAcount -> inherit from Member
class SurveyQuestion extends Survey
{
    private function makeMessage($status, $message, $data = [])
    {
        header('Content-Type: application/json; charset=utf-8');
        $res = json_encode(["status" => $status, "message" => $message, 'data' => $data]);
        print($res);
    }
    public function UpdateSurvey()
    {
        global $conn;
        foreach ($this->questionsAndAnswer as $key => $value) {
            $answer = $value['answer'];
            $question = $value['question'];
            $sql = "UPDATE survey SET answer='$answer' WHERE MemberEmail='$this->MemberEmail' And questionID='$question'";
            if (mysqli_query($conn, $sql)) {
            } else {
                return $this->makeMessage(false, "Opps Fail to create Account Please Try Again later..");
            }
        }
        return  $this->makeMessage(true, "SurveyUpdated");
    }
    public function CreateSurvey()
    {
        global $conn;

        foreach ($this->questionsAndAnswer as $key => $value) {
            $answer = $value['answer'];
            $question = $value['question'];
            $sql = "INSERT INTO survey (MemberEmail,answer,questionID) 
            VALUES ('$this->MemberEmail', '$answer','$question')";
            if (mysqli_query($conn, $sql)) {
            } else {
                return $this->makeMessage(false, "Opps Fail to create Account Please Try Again later..");
            }
        }
        return  $this->makeMessage(true, "Survey Submitted");
    }
    public function CheckSurveyWasCreated()
    {
        global $conn;
        $sql = "SELECT * FROM survey WHERE MemberEmail='$this->MemberEmail' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                unset($row["id"]);
                unset($row["MemberEmail"]);

                $data[] = $row;
            }
            return  $this->makeMessage(true, "Answered Questions", $data);
        } else {
            return  $this->makeMessage(false, "Not Answered Questions");
        }
    }
    public function deleteSurvey()
    {
        global $conn;
        $sql = "DELETE FROM survey WHERE MemberEmail='$this->MemberEmail'";
        if (mysqli_query($conn, $sql)) {
            return $this->makeMessage(true, "Survey Deleted successfully");
        } else {
            return $this->makeMessage(false, "Opps Fail to Update Password Please Try Again later..");
        }
    }
}
