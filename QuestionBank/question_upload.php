<?php
session_start();

//connect to database
$db=mysqli_connect("localhost","root","","questionbank");
?>
<html>
    <head>
        <title>Login form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" type ="text/css" href = "style2.css"/>
        <link rel ="stylesheet" type ="text/css" href ="font-awesome.css"/>
    </head>
    <?php
        if (isset($_SESSION['username'])){ ?>
    <body onload="myFunction()">
        
        <div class="banner">
            
  <h1>Welcome to Question Generator  </h1> 
   
      <h4>  <a href="home.php">HOME</a>
 <a href="generate.php">GENERATE QUESTION</a>
      <a href="logout.php">LOGOUT</a></h4>  

  <h5><Welcome <?php echo $_SESSION['username']; ?></h5>
  <p>Upload your questions here!</p>    

 
</div>

   
       <div class ="container">
 
           <form action="upload_process.php" method="post">



<div id="mainselection1">
    
  
<select name="faculty">
<option value =''>Select Faculty</option>
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
 <br/>
<div id="mainselection0">
    
  <select name="sector">
       <option> Select Sector </option>
       <?php 

$connect=mysqli_connect('localhost','root','','questionbank');
$sql  = 'SELECT * FROM sector';

$result = mysqli_query($connect,$sql);

$sectorType = "";

while ($array =  mysqli_fetch_assoc($result)) {
	
$sectorType .= "<option value ='".$array['id']."'>".$array['name']." </option>";
}

echo $sectorType;
?>
</select>
</div>
<br/>
<div id="mainselection2">

<select name="subject">
  <option> Select Subject </option>
<?php 

$connect=mysqli_connect('localhost','root','','questionbank');


$sql  = 'SELECT * FROM subject';

$result = mysqli_query($connect,$sql);

$subjectType = "";

while ($array =  mysqli_fetch_assoc($result)) {
	
$subjectType .= "<option value ='".$array['id']."'>".$array['name']." </option>";
}

echo $subjectType;
?>
</select>
</div>

<br/>
<div id = "mainselection6" >

 <select name="TypeID" onchange="addInput(this.value)">
       <option> Select Question type </option>
<?php 

$connect=mysqli_connect('localhost','root','','questionbank');
$sql  = 'SELECT * FROM question_type';

$result = mysqli_query($connect,$sql);

$qustionType = "";

while ($array =  mysqli_fetch_assoc($result)) {
	
$qustionType .= "<option value ='".$array['id']."'>".$array['typename']." </option>";
}

echo $qustionType;
?>

</select>
    
</div>
<br/>

<div id="q">
    <button type="button" onclick="addInput(2)" >Add</button>
</div>
<br/>
<div id="mainselection4">
    
<select name="Importance_rating">
       <option> Give Importance Rating </option>
<option value ='1'>1</option>
<option value ='2'>2</option>
<option value ='3'>3</option>
<option value ='4'>4</option>
<option value ='5'>5</option>



</select>
</div>
<br/>
<div id="mainselection5">

<select name="Difficulty_rating">
       <option> select Difficulty level </option>
<option value ='1'>Easy</option>
<option value ='3'>Medium</option>
<option value ='5'>Hard</option>

</select>
</div>
<br/>
<div id="text">
    <input type="text" name="question1" style="  
    height: 100px;
    line-height:100px;
    width: 300px;
    font-size: 25px;
    margin-bottom: 20px;
    background-color: #fff;"  placeholder="Type your Questions ....."> 
</div>
<br/>
<input type="submit" name="submit" value="Upload" class="btn-login" />

      

</form>
      </div>    
         
</body>
  <footer>Copyright &copy; #CSE_16 </footer>  
       </html>
       
   <script>

var counter = 0;
var limit = 6;
function addInput(value){
    if (value == "1"){
        document.getElementById("text").style.visibility="visible";
        document.getElementById("q").style.visibility="hidden";
    }
    
     else if (value == "2"){
     document.getElementById("text").style.visibility="hidden";
     document.getElementById("q").style.visibility="visible";
     
     if (counter == limit)  {
         
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          if (counter == 0){
              newdiv.innerHTML = "<br><input type='text' name='question' placeholder='Type Question'><br><input type='text' name='answer' placeholder='Type answer'>" ;
             
          }
          
          else {
              newdiv.innerHTML = "Option " + (counter) + " <br><input type='text' name='myInputs[]'>";
             
          }
          
          document.getElementById("q").appendChild(newdiv);
          counter++;
     }
     }
}

function myFunction(){
    document.getElementById("q").style.visibility="hidden";
    document.getElementById("text").style.visibility="hidden";
   }
   function myFunction2(){
    document.getElementById("q").style.visibility="visible";
   }
</script>  
<?php

}
else echo "<p align='center'>Log In First</p>";
?>
       
