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
		FROM users';
		
$query = mysqli_query($conn, $sql);
$i = 1;
if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<title>All users list</title>
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
               
	</style>
</head>
<body>
	<h1>Table 1</h1>
	<table class="data-table">
		<caption class="title">View All Users</caption>
		<thead>
			<tr>
                                               <?php
  function count_user()
{
   $conn=mysqli_connect('localhost','root',"",'questionbank');
    $sql = "SELECT COUNT(*) FROM users";
    if ($result=mysqli_query($conn, $sql)){
        $row= mysqli_fetch_array($result);
        $rowcount = $row[0];
        mysqli_free_result($result);
    }
    return $rowcount;
}

   echo 'Available Users :' , count_user();
?>
				<th>NO</th>
				<th>FIRST NAME</th>
				<th>About </th>
                               
                             
                                <th>Edit</th>
			
				<th>Delete</th>
		
		</thead>
		<tbody>
		<?php
		
		while ($row = mysqli_fetch_array($query))
                { 
      echo "<tr>";

echo '<td>' . $i++  .'</td>';

echo '<td>' . $row['first_name'] . '</td>';

echo '<td>' . $row['description'] . '</td>';


echo '<td><a href="edit.php?edit=' . $row['id'] . '">Edit</a></td>';

echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';

echo "</tr>";

}

// close table>

echo "</table> <br> <br> <br>";

?>
                <form action ="view.php " method="get">
                    Search a Record: <input type ="text" name ="search">
                <input type ="submit" name ="submit" value ="Find Now">
                </form>
             <?php
             if(isset($_GET['search'])) {
             $search_record = $_GET['search'];
$query2 = "select * from users where first_name='$search_record' OR email = '$search_record' OR last_name ='$search_record' ";
             $run2 = mysqli_query($conn, $query2);
             
           
             
         
 ?>
                <h1>You have Searched</h1>
	<table class="data-table">
		
		<thead>
			<tr>
                            
				<th>FIRST NAME</th>
				<th>LAST NAME</th>
                                <th>EMAIL</th>
				<th>PHONE</th>
				<th>DESCRIPTION</th>
                               
                                <th>EDIT</th>
                                <th>DELETE</th>
          </thead>
		<tbody>
                    <?php
	 while ($row2 = mysqli_fetch_assoc($run2)) {
                 $name123 = $row2['first_name'];
                 $last123 = $row2['last_name'];
                 $email123 = $row2['email'];
                 $phone123 = $row2['phone'];
                 $date123 = $row2['description'];
                
                
                 
                 echo '<td>' . $name123 . '</td>';
                 
     echo '<td>' . $last123 . '</td>';
       echo '<td>' . $email123 . '</td>';
         echo '<td>' . $phone123 . '</td>';
           echo '<td>' . $date123 . '</td>';
            
           echo '<td><a href="edit.php?edit=' . $row['id'] . '">Edit</a></td>';

           echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                        
             }}
?>

               
                    
                    
                    
                    
                    
                    
                </table>   
</body>
</html>
                        