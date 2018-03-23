<?php 
include ("includes/header_admin.html"); 

?>

<html >
<head>
  <meta charset="UTF-8">
  <title>Question_upload</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
    
    body {
  background: #f39c12;
}
.center-on-page {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%,-50%);
          transform: translate(-50%,-50%);
}
h1 {
    position: fixed;
  
}
/* Reset Select */
select {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  appearance: none;
  outline: 0;
  box-shadow: none;
  border: 0 !important;
  background: #2c3e50;
  background-image: none;
}
/* Custom Select */
.select {
  position: fixed;
  display: block;
  width: 14em;
  height: 3em;
  line-height: 3;
  background: #2c3e50;
  overflow: hidden;
  border-radius: .25em;
 top: -2em;
  right: 41em;
  bottom: 10em;

}
.select1 {
  position: fixed;
  display: block;
 width: 14em;
  height: 3em;
  line-height: 3;
  background: #2c3e50;
  overflow: hidden;
  border-radius: .25em;
 top: -2em;
  right: 26em;
  bottom: 10em;

}
.select1::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  padding: 0 1em;
  background: #34495e;
  pointer-events: none;
}
.select2::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  padding: 0 1em;
  background: #34495e;
  pointer-events: none;
}
.select3::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  padding: 0 1em;
  background: #34495e;
  pointer-events: none;
}
.select4::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  padding: 0 1em;
  background: #34495e;
  pointer-events: none;
}
.select5::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  padding: 0 1em;
  background: #34495e;
  pointer-events: none;
}
.select2 {
  position: fixed;
  display: block;
 width: 14em;
  height: 3em;
  line-height: 3;
  background: #2c3e50;
  overflow: hidden;
  border-radius: .25em;
 top: -2em;
  right: 11em;
  bottom: 10em;

}
.select3 {
  position: fixed;
  display: block;
 width: 14em;
  height: 3em;
  line-height: 3;
  background: #2c3e50;
  overflow: hidden;
  border-radius: .25em;
 top: -2em;
  right: -4em;
  bottom: 10em;

}
.select4 {
  position: fixed;
  display: block;
 width: 14em;
  height: 3em;
  line-height: 3;
  background: #2c3e50;
  overflow: hidden;
  border-radius: .25em;
 top: -2em;
  right: -19em;
  bottom: 10em;

}
.select5 {
  position: fixed;
  display: block;
 width: 14em;
  height: 3em;
  line-height: 3;
  background: #2c3e50;
  overflow: hidden;
  border-radius: .25em;
 top: -2em;
  right: -35em;
  bottom: 10em;

}
select {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0 0 0 .5em;
  color: #fff;
  cursor: pointer;
  margin-bottom: 100px;
}
select::-ms-expand {
  display: none;
}
/* Arrow */
.select::after {
  content: '\25BC';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  padding: 0 1em;
  background: #34495e;
  pointer-events: none;
}
/* Transition */
.select:hover::after {
  color: #f39c12;
}
.select::after {
  -webkit-transition: .25s all ease;
  transition: .25s all ease;
}
    
    .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;

    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
  
}
    .button5:hover {
    background-color: #555555;
    color: white;
}
#q{
    color: blueviolet;
  position: fixed;  
    right: 40em;
}
.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
    
</style>
  
</head>

<body>
    <form method="post" action="upload_process1.php">
  <div class="center-on-page">
  
      <br> <br>
  <div class="select">
    <select name="faculty" id="slct">
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
  <div class="select1">
    <select name="subject" id="slct">
 <option value =''>Select Subject</option>
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
   <div class="select2">
    <select name="sector" id="slct">
 <option value =''>Select Sector</option>
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
  
    <div class="select3">
    <select name="TypeID" onchange="addInput(this.value)" id="slct">
 <option value =''>Select Question Type</option>
 <?php 

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
      
  <div id="q">
      <button type="button" class="button button2" onclick="addInput(2)" >Add</button>
</div>
     <div class="select4">
    <select name="Importance_rating" id="slct">
 <option value =''> Give Importance Rating </option>
<option value ='1'>1</option>
<option value ='2'>2</option>
<option value ='3'>3</option>
<option value ='4'>4</option>
<option value ='5'>5</option>
    </select>
       
       
       
       
  </div>
       <div class="select5">
    <select name="Difficulty_rating" id="slct">
      <option value=" "> select Difficulty level </option>
<option value ='1'>Easy</option>
<option value ='3'>Medium</option>
<option value ='5'>Hard</option>
    </select>
       
       
  </div>
  <div id="text">
    <input type="text" name="question1" style="  
    height: 100px;
    line-height:100px;
    width: 300px;
    font-size: 25px;
    margin-bottom: 20px;
    background-color: #fff;"  placeholder="Type your Questions ....."> 
</div>  
<button class="button button5">Upload</button>
</div>
  <script>
           document.getElementById("q").style.visibility="hidden";
           document.getElementById("text").style.visibility="hidden";
  </script>
  
</body>
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


</script>  
</form>
