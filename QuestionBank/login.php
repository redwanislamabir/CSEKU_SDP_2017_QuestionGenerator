<?php
include ("includes/public_header.html"); 
echo '</br></br></br></br></br></br></br>';
?>
<html>

<head>

    <title></title>
    <style type="text/css">
        
        #success {
            color : red;
            font-size: 35px;
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
session_start();
$conn=mysqli_connect('localhost','root','','questionbank');
if(isset($_POST['email']) and isset($_POST['password']) and !empty($_POST['email']) and !empty($_POST['password'])) {
    
   $email = $_POST['email'];
   $password = $_POST['password'];
   
   $getinfo = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
   $res = mysqli_query($conn, $getinfo);
   $row = mysqli_fetch_assoc($res);
   
   if(mysqli_num_rows($res) > 0) {
       $dbpassword = $row['password'];
       
       $password = password_verify($password, $dbpassword);
       if ($email == $row['email'] and $password == $dbpassword and $row['approved']==1 and $row['admin']==0 and $row['subadmin']==0){
      $id = $row['id'];
      
      $_SESSION['id'] = $id;
      $_SESSION['authenticUser'] = $id;
      
      header("Location: user.php");
       }elseif ($email == $row['email'] and $password == $dbpassword and $row['approved']==1 and $row['admin']==0 and $row['subadmin']==1) {
                 $id = $row['id'];
      $_SESSION['id'] = $id;

      $_SESSION['authenticSubadmin'] = $id;
      header("Location: subadmin.php");
        }elseif($email == $row['email'] and $password == $dbpassword and $row['approved']==1 and $row['admin']==1 and $row['subadmin']==0){
               $id = $row['id'];
      $_SESSION['id'] = $id;
      //$type="SELECT * FROM `role` WHERE id
         $_SESSION['usertype'] = $id;
      $_SESSION['authenticAdmin'] = $id;
      header("Location: admin.php");
        } elseif($email == $row['email'] and $password == $dbpassword and $row['superadmin']==1 and $row['approved']==0 and $row['admin']==0 and $row['subadmin']==0){
               $id = $row['id'];
      $_SESSION['id'] = $id;

        
      $_SESSION['authenticSuperadmin'] = $id;
      header("Location: superadmin.php");
      
      

        }
        
       else{
        echo '<div id ="success"> Incorrect password OR Your Request Havenot accepted yet !!! </div>';    
          echo '<div id ="success1"><a href = "signup.php">Go back  </a></div>';
       }
      
       
       
   }else {
    echo '<div id ="success"> We couldnot find you ! </div>';    
       echo '<div id ="success1"><a href = "signup.php">Go back  </a></div>';
   }
  
   
}





?>