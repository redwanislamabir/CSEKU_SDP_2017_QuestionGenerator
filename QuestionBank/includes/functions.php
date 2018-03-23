<?php
	/**
	*  Main page functions, Login, Registration etc
	*/
	include('includes/connect.php');
	$function = new Index;
	class Index
	{
		
		function __construct()
		{
			# code...
		}

		//***********************************************
		//Redirect to given location
		//***********************************************
		function redirect($location)
		{
			header("Location:".$location);
			exit;
			
		}

		//***********************************************
		//TIME AND DATE CODES HERE
		//***********************************************

		function getTime()
		{
			$time = time();
			$date_time = date('Y-m-d H:i:s',$time);
			
			return $date_time;
		}
		function getDt()
		{
			$time = time();
			$date_time = date('Y-m-d',$time);
			return $date_time;
		}
		function getTm()
		{
			$time = time();
			$date_time = date('H:i:s',$time);
			return $date_time;
		}


		//***********************************************
		// USER CODES HERE
		//***********************************************


		function user_register($username,$fullname,$about,$email,$password)
		{
			global $con;
		
			$query_user = "	INSERT INTO `user` (`id`, `username`, `full_name`, `mobile_or_email`, `password`, `role_id`, `picID`, `about`) VALUES (NULL, '".$username."', '".$fullname.", '".$email."', '".$password."', '1', NULL, '".$about."')";

			
			$result_user =mysqli_query($con,$query_user);
			
			
			if($result_user)
			{
				return true;
			}
			echo $query_user;
		}

		function user_login($username,$password)
		{
			global $con;
			$query_user =  "SELECT * FROM user WHERE username ='$username'";
			$result_user =mysqli_query($con,$query_user);
			$confirmation =mysqli_fetch_assoc($result_user);
			//echo $confirmation['email'];
			
			if($confirmation['email']==$username && $confirmation['password']== $password)
			{
				$_SESSION['userId'] = $confirmation['userId'];
				return true;
			}
			else
			{
				$_SESSION['message'] = "<script>alert('User doesn't exist or password is wrong')</script>";
				return false;
			}
		}



		/*function user_login($username , $password) {
			global $con;
    $sql = "SELECT * FROM user WHERE username ='$username'";
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result)) {
        if($row['password'] == $password) {
             $_SESSION['username']=$username;
             header('Location:question_upload.php');
             die();
        } else {
          header('Location:login.php?error=1');
        }
        
    }
    header('Location:login.php?error=1');
}
*/
	

	}
?>