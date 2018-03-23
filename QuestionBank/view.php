
<?php
require ("includes/header_admin.html"); 
echo '</br></br></br></br>';

?>




<?php
session_start();
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'questionbank'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
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
	<title>   </title>
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
                .title {
                    text-align: center;
                   font-size: 40px;
                    
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
    background-color: #508abb;
    color: white;
    font-family: monospace;
    font-size: 16px;
    padding: 6px 22px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;
}

a.nav1:hover, a.nav1:active {
    background-color: #6ea1cc;
}
  a.nav2:link, a.nav2:visited {
    background-color: red;
    color:white;
    font-family: monospace;
    font-size: 16px;
    padding: 6px 22px;
    text-align: center; 
    text-decoration: none;
    display: inline-block;
}

a.nav2:hover, a.nav2:active {
    background-color: #508abb;
}
	</style>
</head>
<body>

	<table class="data-table">
               
		<caption class="title">Viewing All user</caption>
             
		<thead>
			<tr>
                          
			<th>NO</th>
				<th>FIRST NAME</th>
				<th>About </th>
                                 <th>APPROVE</th>
                    
                                <th>MAKE SUBADMIN</th>
                              
			
				<th>Delete</th>
                                <th> Revoke </th>
		
		</thead>
		<tbody>
               
		<?php
		
		while ($row = mysqli_fetch_array($query))
                {if($row['superadmin'] != 1 && $_SESSION['id'] != $row['id'] && $row['admin'] !=1  ){ 
      echo "<tr>";

echo '<td>' . $i++  .'</td>';

echo '<td>' . $row['first_name'] . '</td>';

echo '<td>' . $row['description'] . '</td>';

$sql1="SELECT approved FROM user WHERE id='".$row['id']."'";
$res1=mysqli_query($conn, $sql1);
$res2= mysqli_fetch_array($res1);
if($res2['approved']==1){
    echo '<td><i class="fa fa-check-circle" style="font-size:24px"></i> Approved</td>';
}else{
    echo '<td><a href="approve.php?approve='.$row['id'].'" class= "nav">Approve</a></td>';
}

$sql1="SELECT subadmin FROM user WHERE id='".$row['id']."'";
$res1=mysqli_query($conn, $sql1);
$res2= mysqli_fetch_array($res1);
if($res2['subadmin']==1){
    echo '<td><i class="fa fa-check-circle" style="font-size:24px"></i> SubAdmin</td>';
}else{
echo '<td><a href="makeSubadmin.php?subadmin='.$row['id'].'" class = "nav1">Make Subadmin</a></td>';
}


echo '<td><a href="delete5.php?id=' . $row['id'] . '" class= "nav2">Delete</a></td>'?>
<form action='edit4.php' method="POST">
<td><input type='checkbox' name='check' value=<?php echo $row['id']; ?>></td>
<td><input type='submit' name='click' value='Revoke'></td>
 
</form>;
<?php
echo "</tr>";

}
               
}
// close table>
 
echo "</table> <br> <br> <br>";

?>
 
         

               
                    
                    
                    
                    
                    
                    
                </table>   
</body>
</html>
                        