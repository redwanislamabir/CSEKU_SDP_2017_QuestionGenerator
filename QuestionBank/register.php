<?php
include ("includes/public_header.html"); 
echo '</br></br></br></br></br></br></br>';
?>
<!DOCTYPE html>
<html>

<head>

    <title></title>
    <style type="text/css">
        
        #success {
            color : red;
            font-size: 38px;
            text-align: center;
            font-family: fantasy;
      
            
        }
          #success1 {
            color : #003eff;
            font-size: 30px;
            text-align: center;
            font-family: serif;
            
        }
        
        
        </style>
</head>
<body>

</body>
</html>
<?php
  $conn = mysqli_connect('localhost', 'root', '', 'questionbank');
if (isset($_POST['first_name']) and isset($_POST['last_name']) and isset($_POST['email']) and
        isset($_POST['phone']) and
        isset($_POST['password']) and isset($_POST['confirm_password']) and isset($_POST['description']) and ! empty($_POST['first_name']) and ! empty($_POST['last_name']) and ! empty($_POST['email']) and ! empty($_POST['phone']) and ! empty($_POST['password']) and ! empty($_POST['confirm_password']) and ! empty($_POST['description'])) {

    $first_name = mysqli_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_escape_string($conn, $_POST['last_name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $phone = mysqli_escape_string($conn, $_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $description = mysqli_escape_string($conn, $_POST['description']);


    
    if ($password == $confirm_password) {
        $getinfo = "SELECT * from user WHERE email ='$email' ";
        $res = mysqli_query($conn, $getinfo);
        $row = mysqli_fetch_assoc($res);
        if (mysqli_num_rows($res) > 0) {
               echo '<div id ="success"> This Email is already taken!!</div>';
    
            echo '<br> <br>';
              echo '<div id ="success"> <a href = "registration.php"> Try Registering Again !</a> </div>';
            
        } else {

            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
            $sql = "INSERT INTO user (first_name, last_name,password,email,phone,description) VALUES ('$first_name','$last_name','$password','$email','$phone','$description')";
            if (!mysqli_query($conn, $sql)) {
                 echo '<div id ="success"> there was a problem </div>';
               
            } else {
               
                echo '<div id ="success"> Request sent !!! Please wait for approval !</div>';
                  echo '<br> <br>'; 
                echo '<div id ="success1"><a href = "signup.php">Login </a></div>';
            }
        }
    } else {
        echo 'Passwords didnot match';
    }
}
?>
    

