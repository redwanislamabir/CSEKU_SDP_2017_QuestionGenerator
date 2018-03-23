<?php

// create a variable



$connect = mysqli_connect('localhost', 'root', "", 'questionbank');
$sector = $_POST['sector'];
$faculty = $_POST['faculty'];
$subject = $_POST['subject'];
$TypeID = $_POST['TypeID'];

$question = $_POST['question1'];

$question1 = $_POST['question'];
$myInputs = $_POST["myInputs"];
$answer = $_POST['answer'];

$Importance_rating = $_POST['Importance_rating'];
$Difficulty_rating = $_POST['Difficulty_rating'];

//$question = $_POST["question"];
//$userID=$_POST['userID'];
//$entry_date=






if (mysqli_connect_errno($connect)) {
    echo "Failed to connect";
} else {
    echo "database connected    ";
}




$fsid = 'SELECT faculty_subject.id FROM faculty_subject, faculty, sector, subject WHERE faculty.id =' . $faculty . ' AND sector.id=' . $sector . ' AND subject.id=' . $subject . ' AND faculty_subject.faculty_id  = faculty.id AND faculty_subject.subject_id = subject.id';
$result_fsid = mysqli_query($connect, $fsid);
while ($arr = mysqli_fetch_array($result_fsid)) {
    $fsid_no = $arr[0];
//echo "".$TypeID;

    if ($question != '')
        $sql = "INSERT INTO question(faculty_subject_id,type_id,importance,diffuculty,name)
		        VALUES('$fsid_no','$TypeID','$Importance_rating','$Difficulty_rating','$question')";
    else
        $sql = "INSERT INTO question(faculty_subject_id,type_id,importance,diffuculty,name)
		        VALUES('$fsid_no','$TypeID','$Importance_rating','$Difficulty_rating','$question1')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
            header("Location: subquestionlist.php");
    } else {
        echo "<br>" . "Unsuccessfull Operation,   Question cannot uploaded :( ";
        //echo "Error !  Try Again ";
    }

    if ($TypeID == 2) {
        $id = "SELECT id FROM question WHERE name = " . $question1;
        $id = mysqli_insert_id($connect);
        $sql1 = "INSERT INTO answer (question_id,right_answer) VALUES('$id','$answer')";
        mysqli_query($connect, $sql1);


        $id1 = "SELECT id FROM answer WHERE answer.right_answer = '$answer'";
        $result_asid = mysqli_query($connect, $id1);
//        var_dump($result_asid);
        while ($arr = mysqli_fetch_array($result_asid)) {
            $asid_no = $arr[0];
            $count = count($myInputs);
            var_dump($myInputs);
            for ($ii = 0; $ii < $count; $ii++) {
                $sql2 = "INSERT INTO choice (choice_index, answer_id,  choice_text) VALUES ('$ii','$asid_no', '$myInputs[$ii]')";
                //$in++;

                mysqli_query($connect, $sql2);
                //$result = mysqli_query($connect,$sql);
                //$r++;
                //}
            }
//echo "string".$asid_no;
        }
    }
}
?> 
