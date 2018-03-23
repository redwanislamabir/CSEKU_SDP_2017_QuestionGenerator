<?php
include ("includes/header_admin.html"); 
//include ("includes/dbconfig.php"); 

?>

<html>
    <head>
      
 <link rel="stylesheet" href="assets/css/style_generate.css">
<title></title>
</head>
<body>
	 
   <form method="post" action="generate_table.php">
  
  
	    <h1><font size="2"> <?php echo "Date : " . date("Y/m/d")."  . " ; ?> Generate Question... & Please be careful about your data !<b/> </font></h1>
	    

    

    	<div class="leftcontact">
			      <div class="form-group">
			        <p>Authority Name<span>*</span></p>
			        <span class="icon-case"><i class="fa fa-pencil"></i></span>
				       
				        <input type="text" name="aname" data-rule="required" data-msg="Please fill up this field " placeholder="Authority Name"/>

                <div class="validation"></div>
       </div> 

            <div class="form-group">
            <p>Exam Name <span>*</span></p>
            <span class="icon-case"><i class="fa fa-pencil"></i></span>
				<input type="text" name="ename" placeholder="Exam Name"/>
                <div class="validation"></div>
			</div>

			<div class="form-group">
			<p>Time</p>	
			<span class="icon-case"><i class="fa fa-pencil"></i></span>
               <input type="text" name="time" placeholder="Time ( in min )"/>
                <div class="validation"></div>
			</div>	

			<div class="form-group">
			<p>Marks <span>*</span></p>
			<span class="icon-case"><i class="fa fa-pencil"></i></span>
				<input type="text" name="marks" placeholder="Marks Per Question"/>
                <div class="validation"></div>
			</div>

			<div class="form-group">
			<p>Number Of Questions <span>*</span></p>
			<span class="icon-case"><i class="fa fa-pencil"></i></span>
				<input type="text" name="num" placeholder="Number Of Questions"/>
                <div class="validation"></div>
			</div>

			<div class="form-group">
			<p>Course/Subject Code<span>*</span></p>
			<span class="icon-case"><i class="fa fa-pencil"></i></span>
				<input type="text" name="courseid" placeholder="Course Code  "/>
                <div class="validation"></div>
			</div>	



				<div class="form-group">
			<p>Exam Date<span>*</span></p>

			    <input id="date" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="date" value="<?php echo " " . date("d/m/Y")."" ; ?>" type="text">
    <script>
    $(function(){
        $('#date').combodate();    
    });
    </script>
			</div>


	</div>

	<div class="rightcontact">	

			<div class="form-group">
			<p>Type<span>*</span></p>
			<span class="icon-case"><i class="fa fa-pencil"></i></span>
<select name="type">
<option value =''>--SELECT--</option>
<?php 
//include ("includes/dbconfig.php"); 
$connect=mysqli_connect('localhost','root','','questionbank');
$sql  = 'SELECT * FROM type';
$result = mysqli_query($connect,$sql);
$qustionType = "";
while ($array =  mysqli_fetch_assoc($result)) {
	
$qustionType .= "<option value ='".$array['id']."'>".$array['name']." </option>";
}
echo $qustionType;
?>
</select>

			</div>


			<div class="form-group">
			<p>Level <span>*</span></p>
			<span class="icon-case"><i class="fa fa-pencil"></i></span>
<select name="sector">
<option value =''>--SELECT--</option>
<?php 
$connect=mysqli_connect('localhost','root','','questionbank');
$sql  = 'SELECT * FROM sector';
$result = mysqli_query($connect,$sql);
$sector = "";
while ($array =  mysqli_fetch_assoc($result)) {
	
$sector .= "<option value ='".$array['id']."'>".$array['name']." </option>";
}
echo $sector;
?>
</select>
			</div>	

			<div class="form-group">
			<p>Faculty <span>*</span></p>	
			<span class="icon-case"><i class="fa fa-pencil"></i></span>
<select name="faculty">
<option value =''>--SELECT--</option>
<?php 
$connect=mysqli_connect('localhost','root','','questionbank');
$sql  = 'SELECT * FROM faculty';
$result = mysqli_query($connect,$sql);
$facultyname= "";
while ($array =  mysqli_fetch_assoc($result)) {
	
$facultyname .= "<option value ='".$array['id']."'>".$array['name']." </option>";
}
echo $facultyname;
?>

</select>
			</div>

			<div class="form-group">
			<p>Subject <span>*</span></p>
			<span class="icon-case"><i class="fa fa-pencil"></i></span>
                
<select name="subject">
<option value =''>--SELECT--</option>
<?php 
$connect=mysqli_connect('localhost','root','','questionbank');
$sql  = 'SELECT * FROM subject';
$result = mysqli_query($connect,$sql);
$subject = "";
while ($array =  mysqli_fetch_assoc($result)) {
	
$subject .= "<option value ='".$array['id']."'>".$array['name']." </option>";
}
echo $subject;
?>

</select>
			</div>
<div class="form-group">
			        <p>Importane &  Difficulty :  <span>*</span></p>
			        <p> (Sumation must be 100) <span>***</span></p>
			        <input type="text" name="he" style="width:155px" placeholder="High&Easy(%)"/>
<input type="text" name="hm" style="width:155px" placeholder="High&Medium(%)"/>
<input type="text" name="hh" style="width:155px" placeholder="High%Hard(%)"/>
<input type="text" name="me" style="width:155px" placeholder="Medium&Easy(%)"/>

<input type="text" name="mh" style="width:155px" placeholder="Medium&Hard(%)"/>
<input type="text" name="le" style="width:155px" placeholder="Low&Easy(%)"/>
<input type="text" name="lm" style="width:155px" placeholder="Low&Medium(%)"/>
<input type="text" name="lh" style="width:155px" placeholder="Low&Hard(%)"/>

<input type="text" name="mm" style="width:165px" placeholder="Medium&Medium(%)"/>
       </div> 
		
				
	</div>
	</div>

<button type="submit" class="bouton-contact"  >Generate <i class="fa fa-superpowers"> </i> </button>
	
</form>	

  
</body>
</html>
<?php
include ("includes/footer.html"); 
?>