<?php
include ("includes/header_admin.html"); 
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
                   .title {
                    text-align: center;
                   font-size: 40px;
                    
                }
               
	</style>
</head>
<body>
	<h1>Table 1</h1>
	<table class="data-table">
		<caption class="title">Viewing All Admins</caption>
		<thead>
			<tr>
                                              
				<th>NO</th>
				<th>FIRST NAME</th>
				<th>About </th>
                                
		
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($query))
                { 
                      if($row['admin'] == 1 ){ 
      echo "<tr>";

echo '<td>' . $i++  .'</td>';

echo '<td>' . $row['first_name'] . '</td>';

echo '<td>' . $row['description'] . '</td>';

//$sql1="SELECT approved FROM user WHERE id='".$row['id']."'";
//$res1=mysqli_query($conn, $sql1);
//$res2= mysqli_fetch_array($res1);


echo "</tr>";
                      }
}

// close table>

echo "</table> <br> <br> <br>";

?>
         
                    
                    
                    
                </table>   
</body>
</html>
                        