<?php
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'questionbank'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

    $id= $_GET['id'];
    $query= "SELECT choice.choice_text,question.name FROM choice INNER JOIN answer ON choice.answer_id=answer.id INNER JOIN question on answer.question_id=question.id where choice.id='$id'"; 
    $result= mysqli_query($conn, $query);
    if(!$result){
        die(mysqli_errno($conn));
    }
        while ($row = mysqli_fetch_array($result)) {
            $choiceName=$row['choice_text'];
            $questionName=$row['name'];
        }
      
?>
<html>
    <body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
                 <link rel = "stylesheet" type ="text/css" href = "a.css"/>
        <link rel ="stylesheet" type ="text/css" href ="font-awesome.css"/>

<div class="container">
    <h2>Edit information</h2>

    <div class="regisFrm">


<form method="post" action="edit1.php?id=<?php echo $id;?>">
 <input  type ="text " name =" question" placeholder="Question" value="<?php echo $questionName;?> " required="">
            <input type="text" name="choice" placeholder="Choice" value =" <?php echo $choiceName;?>" required="">
            
         
  
                <input type="submit" name="update" value="UPDATE">
            </div>
        </form>
    </div>
</div>
          </div>
</form>
</body>
</html>
   <?php 
        if(isset($_POST['update'])){
     $edit_record1= $_GET['id'];
     $choice=$_POST['choice'];
     $question=$_POST['question'];
     
            $query1="update choice set
choice_text='$choice' where id='$id'";
            $query2="update question inner join answer on question.id=answer.question_id inner join choice on choice.answer_id=answer.id set question.name='$question' where choice.id='$id'";
            
            if(mysqli_query($conn, $query1)){
                echo 'Record Updated';
            }
            
            if(mysqli_query($conn, $query2)){
                echo 'Record Updated';
            }
}

        

           
