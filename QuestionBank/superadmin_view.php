<?php
require ("includes/header_superadmin.html"); 
echo '</br></br></br></br>';
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
if (isset($_POST["deletemarked"])) {
        $box = $_POST["num"];
        while(list ($key,$val) = @each($box)) {
            //delete from question where id = $val;
            $query= "DELETE from user  WHERE id = '$val'"; 

            $result= mysqli_query($conn, $query);
      
        }
}
$sql = 'SELECT * 
		FROM user';
		
$query = mysqli_query($conn, $sql);
$i = 1;
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>All Admin </title>
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
.title{
    text-align: center;
    font-size: 1.6em;
    font-family: serif;
    color: red;
  
}
td.nav {
    font-family: sans-serif;
}
/*tr:nth-child(1) td:nth-child(4) {
    background-color: blue;
    color: white;
    font-family: monospace;
    font-size: 16px;
    padding: 6px 22px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;
}*/

	</style>
</head>
<body>
    <form action="superadmin_view.php" method="POST">
	<h1>Viewing All User Status</h1>
	<table class="data-table">
<caption class="title">All the user Has to be approved in order to become Admin or SubAdmin  ||  A user cannot be Admin and SubAdmin at the same time</caption>
		<thead>
			<tr>
                            <?php ?>
                                               <?php

?>
                            <th>Mark</th>
				<th>NO</th>
				<th>FIRST NAME</th>
				<th>About </th>
                                
                                <th>Admin Status</th>
                                <th>Select</th>
                                     <th>Undo</th>
                                      <th>SubAdmin Status</th>
                                <th>Select</th>
                                     <th>Undo</th>
                                      <th>Approval Status</th>
                                <th>Select</th>
                                     <th>Undo</th>
                           
		
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($query))
                {if($row['superadmin'] != 1 ){ 
      echo "<tr>";
echo '<td> <input type = "checkbox" name = "num[]"  value = "' .$row['id'].'" /> </td>';
echo '<td>' . $i++  .'</td>';

echo '<td>' . $row['first_name'] . '</td>';

echo '<td>' . $row['description'] . '</td>';


$sql1="SELECT admin FROM user WHERE id='".$row['id']."'";
$res1=mysqli_query($conn, $sql1);
$res2= mysqli_fetch_array($res1);
if($res2['admin']==1){
    echo '<td class= "nav" ><i class="fa fa-check-circle" style="font-size:24px"></i></i> ADMIN </td>'; 
    
} 
else {
echo '<td><a href="makeAdmin.php?admin='.$row['id'].'" class="nav" >Make Admin</a></td>';
}


?>
<form action='edit.php' method="POST">
<td><input type='checkbox' name='check' value=<?php echo $row['id']; ?>></td>
<td><input type='submit' name='click' value='Undo Admin'></td>
</form>
                <?php
                 $sql1="SELECT subadmin FROM user WHERE id='".$row['id']."'";
$res1=mysqli_query($conn, $sql1);
$res2= mysqli_fetch_array($res1);
if($res2['subadmin']==1){
    echo '<td> <i class="fa fa-check-circle" style="font-size:24px"></i> SubAdmin</td>';
}else{
echo '<td><a href="makeSubadmin1.php?subadmin='.$row['id'].'" class = "nav">Make Subadmin</a></td>';
}
?>
                <form action='edit10.php' method="POST">
<td><input type='checkbox' name='check' value=<?php echo $row['id']; ?>></td>
<td><input type='submit' name='click' value='Undo SubAdmin'></td>
</form>
                <?php
                 $sql1="SELECT approved FROM user WHERE id='".$row['id']."'";
$res1=mysqli_query($conn, $sql1);
$res2= mysqli_fetch_array($res1);
if($res2['approved']==1){
    echo '<td > <i class="fa fa-check-circle" style="font-size:24px"></i> Approved</td>';
}else{
echo '<td><a href="approve11.php?subadmin='.$row['id'].'" class = "nav">Approve</a></td>';
}
?>
                
                <form action='edit11.php' method="POST">
<td><input type='checkbox' name='check' value=<?php echo $row['id']; ?>></td>
<td><input type='submit' name='click' value='Undo Approval'></td>
</form>
<!--     echo '<td><a href="delete.php?id=' . $row['id'] . '" class= "nav1">Delete</a></td>';-->



  
   
                   <?php
echo "</tr>";

}
               
}
// close table>

echo "</table> <br> <br> <br>";

?>
                  
                    
                    
                    
                    
                </table>   
                   
     <div align ="center">
                    <input type = "submit" name ="deletemarked" value="Delete Marked" />
                   
                           <input type="reset" value ="Clear Marked" />
                    </form>    
     
</body>
</html>
                        