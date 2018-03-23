<?php
include ("includes/header_admin.html"); 
//include ("includes/dbconfig.php"); 

?>

<?php
error_reporting(0);
session_start();
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'questionbank'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
if (isset($_POST["deletemarked"])) {
        $box = $_POST["num"];
        while(list ($key,$val) = @each($box)) {
            //delete from question where id = $val;
            $query= "DELETE from question  WHERE id = '$val'"; 

            $result= mysqli_query($conn, $query);
            echo "Successfully Deleted";
        }
        
    }
       if (isset($_POST["approve"])) {
        $box = $_POST["num"];
        while(list ($key,$val) = @each($box)) {
            //delete from question where id = $val;
  $query= "UPDATE question SET approve=1 WHERE id='$val'"; 

            $result= mysqli_query($conn, $query);
            echo "Successfully approved";
        }
        
    }

$sql = 'SELECT * 
		FROM question';
		
$query = mysqli_query($conn, $sql);
$i = 1;
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<title>All user list</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
    a.nav:link, a.nav:visited {
    background-color: #508abb;
    color: white;
    font-family: monospace;
    font-size: 16px;
    padding: 6px 22px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;
}

a.nav:hover, a.nav:active {
    background-color: #6ea1cc;
}
   a.nav1:link, a.nav1:visited {
    background-color: red;
    color:white;
    font-family: monospace;
    font-size: 16px;
    padding: 6px 22px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;
}

a.nav1:hover, a.nav1:active {
    background-color: #508abb;
}
  a.nav3:link, a.nav3:visited {
    background-color: red;
    color:white;
    font-family: monospace;
    font-size: 16px;
    padding: 6px 22px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;
}

a.nav3:hover, a.nav3:active {
    background-color: #508abb;
}

	</style>
</head>
<body>
    <form action="questionlist.php" method="POST">
	<h1>Table 1</h1>
	<table class="data-table">
		<caption class="title">View All question</caption>
		<thead>
			<tr>
                                               <?php
  function count_user()
{
   $conn=mysqli_connect('localhost','root',"",'questionbank');
    $sql = "SELECT COUNT(*) FROM question";
    if ($result=mysqli_query($conn, $sql)){
        $row= mysqli_fetch_array($result);
        $rowcount = $row[0];
        mysqli_free_result($result);
    }
    return $rowcount;
}

   echo 'Available Questions :' , count_user();
?>
                            <th> Mark</th>
                               <th>Approval</th>
				<th>NO</th>
				<th>Question</th>
                                <th>Subject</th>
                                <th>Faculty</th>
                                <th>Type</th>
                                <th>Edit</th>
			
				<th>Delete</th>
                                <th>a</th>
                                <th>b</th>
                                <th>c</th>
                                <th>d</th>
                               
                     
		
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($query))
                { 

      echo "<tr>";
echo '<td> <input type = "checkbox" name = "num[]"  value = "' .$row['id'].'" /> </td>';
   
$sql1="SELECT approval FROM question WHERE id='".$row['id']."'";
$res1=mysqli_query($conn, $sql1);
$res2= mysqli_fetch_array($res1);
if($res2['approval']==1){
    echo '<td class ="nav4"><i class="fa fa-check-circle" style="font-size:24px"></i> Approved</td>';
}else{
    echo '<td><a href="approve5.php?approve='.$row['id'].'"  class="nav3">Approve</a></td>';
}

echo '<td>' . $i++  .'</td>';

echo '<td>' . $row['name'] . '</td>';
$s = SubjectFacultyFromFacultyId($row['faculty_subject_id'], 0);
$f = SubjectFacultyFromFacultyId($row['faculty_subject_id'], 1);
echo '<td>' . $s . '</td>';
echo '<td>' . $f . '</td>';
if($row['type_id'] == 1)
    echo '<td>' . "Creative" . '</td>';
else{
    echo '<td>' . "MCQ" . '</td>';
    $a = getOptions($row['id']);
}
    


echo '<td><a href="edit2.php? edit=  ' . $row['id']  . '"  class="nav" >Edit</a></td>';

echo '<td><a href="delete2.php?id=' . $row['id'] . '" class="nav1">Delete</a></td>';
if($row['type_id'] == 2){
    echo '<td>'.$a[0].'</td>';
    echo '<td>'.$a[1].'</td>';
    echo '<td>'.$a[2].'</td>';
    echo '<td>'.$a[3].'</td>';

}

echo "</tr>";


}

// close table>

echo "</table> <br> <br> <br>";



?>
                <div align ="center">
                    <input type = "submit" name ="deletemarked" value="Delete Marks" />
                   
                           <input type="reset" value ="Clear Marks" />
                    </form>
 
<?php

    function SubjectFacultyFromFacultyId($fsi,$check){
        $db_host = 'localhost'; 
        $db_user = 'root';
        $db_pass = ''; 
        $db_name = 'questionbank'; 
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//      if (isset($_POST["deletemarked"])) {
//        $box = $_POST["num"];
//        while(list ($key,$val) = @each($box)) {
//            //delete from question where id = $val;
//            $query= "DELETE from question  WHERE id = '$val'"; 
//
//            $result= mysqli_query($conn, $query);
//            echo "Deleted ".$val;
//        }
//        
//    }
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
            array_push($options, $row['choice_text']);
        }
        return $options;
    }
?>
         