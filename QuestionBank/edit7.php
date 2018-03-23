   <?php 
        if(isset($_POST['update'])){
          if(isset($_POST['choice1'])){
              
              $ch1id  = $_POST['choice1Id'];
              $ch2id  = $_POST['choice2Id'];
              $ch3id  = $_POST['choice3Id'];
              $ch4id  = $_POST['choice4Id'];
              
              $ch1  = $_POST['choice1'];
              $ch2  = $_POST['choice2'];
              $ch3  = $_POST['choice3'];
              $ch4  = $_POST['choice4'];
          }
          $facul_sub_id = $_GET['edit'];
          $edit_record1= $_GET['editform'];
          $edit_question= $_POST['question'];
          $edit_subject = $_POST['subject'];
          $edit_faculty = $_POST['faculty'];
          $conn = mysqli_connect("localhost", "root", '', 'questionbank');
          
          $s_id = getSubjectIdFromSubject($edit_subject);
          $f_id = getFacultyIdFromFaculty($edit_faculty);
         $query1="INSERT INTO faculty_subject (subject_id,faculty_id) VALUES ('$s_id','$f_id')";
//           $que= "update faculty_subject set subject_id = '$s_id' where id = '$edit_subject'"; 
//                   mysqli_query($conn, $que);
//                      $que= "update faculty_subject set faculty_id = '$f_id' where id = '$edit_faculty'";
//                           mysqli_query($conn, $que);   
            if(mysqli_query($conn, $query1)){
                $fa_su_id = mysqli_insert_id($conn);
                
            }
          $query1="update question set name='$edit_question', faculty_subject_id='$fa_su_id' where id= '$edit_record1'";
          mysqli_query($conn,$query1);
                  //delete option of editform from choice table     
                   //insert ch1 ch2 ch3 ch4 to choice table with id editform
                   $sql="update choice set choice_text = '$ch1' where id = '$ch1id'";
                   mysqli_query($conn, $sql);
                   
                    $sql="update choice set choice_text = '$ch2' where id = '$ch2id'";
                    mysqli_query($conn, $sql);
                    $sql="update choice set choice_text = '$ch3' where id = '$ch3id'";
                    mysqli_query($conn, $sql);
                    $sql="update choice set choice_text = '$ch4' where id = '$ch4id'";
                    mysqli_query($conn, $sql);
                    header("Location: subquestionlist.php");
                    //echo "succesful ".$fa_su_id;
            
}
else {
?>
<?php
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'questionbank'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

    $edit2= $_GET['edit'];
    $query= "SELECT * FROM question where id=".$edit2; 

    $result= mysqli_query($conn, $query);
    if(!$result){
        die(mysqli_errno($conn));
    }
        while ($row = mysqli_fetch_array($result)) {
    $edit_id = $row['id'];
    $edit_question = $row['name'];
    $fsi = $row['faculty_subject_id']; 
    $type = $row['type_id'];
    
}



?>
<html>
    <body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
                 <link rel = "stylesheet" type ="text/css" href = "a.css"/>
        <link rel ="stylesheet" type ="text/css" href ="font-awesome.css"/>

    <h2>Edit information</h2>

    <div class="regisFrm">



    <form method="post" action="edit7.php?editform=<?php echo $edit2;?>&edit=<?php echo $fsi;?>">
            <input type="text" name="question" value =" <?php echo $edit_question;?>" required="">
            <input type="text" name="subject" value = <?php echo SubjectFacultyFromFacultyId($fsi, 0);?> >
            <input type="text" name="faculty" value = <?php echo SubjectFacultyFromFacultyId($fsi, 1);?> >
            <?php
                if ($type == 2){
                    $choices = getOptions($edit2);
            ?>
            <input type="hidden" name="choice1Id" value = "<?php echo $choices[0];?>" >
            <input type="text" name="choice1" value = "<?php echo $choices[1];?>" >
            
            <input type="hidden" name="choice2Id" value = "<?php echo $choices[2];?>" >
            <input type="text" name="choice2" value = "<?php echo $choices[3];?>" >
            
            <input type="hidden" name="choice3Id" value = "<?php echo $choices[4];?>" >
            <input type="text" name="choice3" value = "<?php echo $choices[5];?>" >
            
            <input type="hidden" name="choice4Id" value = "<?php echo $choices[6];?>" >
            <input type="text" name="choice4" value = "<?php echo $choices[7];?>" >
            <?php
                }
}
            ?>
                <input type="submit" name="update" value="UPDATE">
         
        </form>
    </div>
</div>
          </div>
</form>
</body>
</html>

<?php
    function getFacultyIdFromFaculty($fac){
        $db_host = 'localhost'; 
        $db_user = 'root';
        $db_pass = ''; 
        $db_name = 'questionbank'; 
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
        $query= "SELECT * from faculty WHERE name = '$fac'"; 

        $result= mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            $fac_id = $row['id'];
        }
        return $fac_id;
    }
    function getSubjectIdFromSubject($sid){
          $db_host = 'localhost'; 
        $db_user = 'root';
        $db_pass = ''; 
        $db_name = 'questionbank'; 
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
        $query= "SELECT * from subject WHERE name = '$sid'"; 

        $result= mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            $sub_id = $row['id'];
        }
        return $sub_id;
    }
    function SubjectFacultyFromFacultyId($fsi,$check){
        $db_host = 'localhost'; 
        $db_user = 'root';
        $db_pass = ''; 
        $db_name = 'questionbank'; 
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
        $query= "SELECT * from faculty_subject WHERE id = '$fsi'"; 

        $result= mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            $sub_id = $row['subject_id'];
            $fac_id = $row['faculty_id'];
        }
        if($check == 0){
            return SubjectFromSujectId($sub_id);
        }
        else if ($check == 1){
            return FacultyFromFacultyId($fac_id);
        }
    }
    
    function SubjectFromSujectId($sid){
        $db_host = 'localhost'; 
        $db_user = 'root';
        $db_pass = ''; 
        $db_name = 'questionbank'; 
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
        $query= "SELECT * from subject WHERE id = '$sid'"; 

        $result= mysqli_query($conn, $query);
        while($subject = mysqli_fetch_assoc($result)){
            return $subject['name'];
        }
    }
    function FacultyFromFacultyId($fid){
        $db_host = 'localhost'; 
        $db_user = 'root';
        $db_pass = ''; 
        $db_name = 'questionbank'; 
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
        $query= "SELECT * from faculty WHERE id = '$fid'"; 

        $result= mysqli_query($conn, $query);
        while($faculty = mysqli_fetch_assoc($result)){
            return $faculty['name'];
        }
    }
    function getOptions($quesId){
        $options = array();
        $db_host = 'localhost'; 
        $db_user = 'root';
        $db_pass = ''; 
        $db_name = 'questionbank'; 
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
        $query= "SELECT * from answer WHERE question_id = '$quesId'"; 

        $result= mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            $questionId = $row['id'];
        }
        $query= "SELECT * from choice WHERE answer_id = '$questionId'"; 

        $result= mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){
            array_push($options, $row['id']);
            array_push($options, $row['choice_text']);
        }
//        var_dump($options);
        return $options;
    }
?>

        

           
