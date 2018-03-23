
<?php
include ("includes/header_admin.html"); 
//include ("includes/dbconfig.php"); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="assets/css/tableadjust.css">


<link rel="stylesheet" href="assets/css/bootstrap.min.css" crossorigin="anonymous">  -->


</head>
<body>
<br/>
<br/>
<br/>
<br/><br/>
<style>
td,th [type=first]{
  width: 300%;
    text-align: center;
}


input[type='headtext']
{
  width: 100%;
  text-align: center;
  font-size: 6px;
}

table [type='big'] {
    width: 400%;
}
tr [type='big'] {
    width: 400%;
}

td [type='big'] {
    width: 180%;
}



input[type='big']
{
  width: 100%;
}


td [type='big1'] {
    width: 300%;
    text-align: center;
}
</style>

<div id="print">
<?php

//require('mc_table.php');
$n=0;
$aname=$_POST['aname'];
$ename=$_POST['ename'];
$time=$_POST['time'];
$marks=$_POST['marks'];
$num=$_POST['num'];
$type=$_POST['type'];
$level=$_POST['sector'];
$faculty=$_POST['faculty'];
$subject=$_POST['subject'];
$sector=$_POST['sector'];
$course_code=$_POST['courseid'];
$date=$_POST['date'];

$he=$_POST['he'];
$hm=$_POST['hm'];
$hh=$_POST['hh'];
$me=$_POST['me'];
$mh=$_POST['mh'];
$le=$_POST['le'];
$lm=$_POST['lm'];
$lh=$_POST['lh'];
$mm=$_POST['mm'];

$vhe=$num*$he*(1/100);
$vhm=$num*$hm*(1/100);
$vhh=$num*$hh*(1/100);
$vme=$num*$me*(1/100);
$vmh=$num*$mh*(1/100);
$vle=$num*$le*(1/100);
$vlm=$num*$lm*(1/100);
$vlh=$num*$lh*(1/100);
$vmm=$num*$mm*(1/100);






if($he+$hm+$hh+$me+$mh+$le+$lm+$lh+$mm!=100){
 header("location: ginterface.php");
 die("Importance & diffuculty Rating Sumation must be 100  , please go back and solve this ");

}





$con=mysqli_connect("localhost","root","","questionbank");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }













$tx=round($time/60);
$ty=$time-($tx*60);
$total=$marks*$num;




//small fonts 

$fsid='SELECT faculty_subject.id FROM faculty_subject, faculty, sector, subject WHERE faculty.id ='.$faculty.' AND sector.id='.$sector.' AND subject.id='.$subject.' AND faculty_subject.faculty_id  = faculty.id AND faculty_subject.subject_id = subject.id';
$result_fsid = mysqli_query($con,$fsid);
while ($arr =  mysqli_fetch_array($result_fsid)) {
$fsid_no = $arr[0] ;


}
$arr[10];
$data = "";
$data.="<table class='table table-bordered'>"; 
$data.="<thead>";
$data.="<thead>";
$data.="<th>";
//$data.="<td></td>";
$data.="<h2><b><input type='headtext' style='border: 0px' value='".$aname."'></b></h2>";
$data.="</th>";
$data.="</thead>";
$data.="<tbody>";

$data.="<tr>";
$data.="<td><input type='text' style='border: 0px' value='".$ename."'></td>";
$data.="</tr>";



$sql='SELECT name FROM `type` WHERE id = '.$type ;
$result = mysqli_query($con,$sql);
$typ="";

while ($array =  mysqli_fetch_assoc($result)) {

$typ.= $array['name'] ;
//echo "Question Type : ".$typ;
//echo "<br/>";

$data.="<tr>";
$data.="<td><input type='text' style='border: 0px' value='Question Type : ".$typ."'</td>";
$data.="</tr>";


}

$sql='SELECT name FROM `sector` WHERE id = '.$sector ;
$result = mysqli_query($con,$sql);
$sec="";

while ($array =  mysqli_fetch_assoc($result)) {

$sec.= $array['name'] ;
//echo "Level  : ";
//echo $sec."<br>";

$data.="<tr>";
$data.="<td><input type='text' style='border: 0px' value='Level : ".$sec."'</td>";
$data.="</tr>";

}

if($sec==4){
  $data.="<tr>";
$data.="<td><input type='text' style='border: 0px' value='Course No. : ".$course_code."'</td>";
$data.="</tr>";
  
}
else {
  $data.="<tr>";
$data.="<td><input type='text' style='border: 0px' value='Subject Code. : ".$course_code."'</td>";
$data.="</tr>";
 
}

$sql='SELECT name FROM `faculty` WHERE id = '.$faculty ;
$result = mysqli_query($con,$sql);
$fac="";

while ($array =  mysqli_fetch_assoc($result)) {

$fac.= $array['name'] ;

$data.="<tr>";
$data.="<td><input type='text' style='border: 0px' value='Faculty : ".$fac."'</td>";
$data.="</tr>";

}

$sql='SELECT name FROM `subject` WHERE id = '.$subject ;
$result = mysqli_query($con,$sql);
$sub="";

while ($array =  mysqli_fetch_assoc($result)) {

$sub.= $array['name'] ;


$data.="<tr>";
$data.="<td><input type='text' style='border: 0px' value='Subject :".$sub."'</td>";
$data.="</tr>";

}
$data.="<tr>";
$data.="<td><input type='text' style='border: 0px' value='Total Marks : ".$total."'</td>";
$data.="</tr>";


$data.="<tr>";
$data.="<td><input type='text' style='border: 0px' value='Time : ".$tx." Hours "." ".$ty." Min(s)'</td>";
$data.="</tr>";


$data.="<tr>";
$data.="<td type='first'><input type='text' style='border: 0px' value='Date : ".$date."'</td>";
$data.="</tr>";



if($type==2){

  $data.="<tr>";
$data.="<td type='big1'><input type='big' style='border: 0px' value='Important Notice : Number of each Question is ".$marks." Read The Questions Carefully and give The Correct Answer'</td>";
$data.="</tr>";

}

$data.="</tbody>";

$data.="</table>"; 

echo $data;

//
$x=0;
// vhe
$data = "";
$data.="<table class='table table-bordered'>";
 $data.="<tbody>";
for( $i = 0; $i<$vhe; $i++ ) {

$sql="SELECT name ,id FROM question WHERE type_id =".$type."  ORDER BY RAND() LIMIT 1 " ;

//$sql='SELECT name FROM 9RE  faculty_subject_id='.$faculty_subject_id';
$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
$question = $array['name'] ;
$question_id = $array['id'] ;
$x=1+$i;


$data.="<tr type='big' >";
$data.="<span><td > <input type='big'  style='border: 0px' value='".$x.". ".$question."'</td></span>";
$data.="</tr>";

if($type==2){



for( $o =0; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==0){
  $data.="<tr>";
$data.="<td><input type='text' style='border: 0px' value='(A). ".$mychoice."'</td>";


}
if($o==1){

$data.="<td><input type='text' style='border: 0px' value='(B). ".$mychoice."'</td>";

}
if($o==2){

$data.="<td><input type='text' style='border: 0px' value='(C). ".$mychoice."'</td>";


}

if($o==3){

$data.="<td><input type='text' style='border: 0px' value='(D). ".$mychoice."'</td>";

$data.="</tr>";

}







}


}

}


 }    
//last part
     

       }


$data.="</tbody>";

$data.="</table>"; 

echo $data;






/*

//vgg
for( $i = 0; $i<$vhm; $i++ ) {

$sql="SELECT name  FROM question WHERE  importance =5 AND (diffuculty =3 OR diffuculty= 4) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;

$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhe+1;

$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}



         }
}


//for vhh
for( $i = 0; $i<$vhh; $i++ ) {

$sql="SELECT name  FROM question WHERE  importance =5 AND diffuculty =5 AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;

$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+1;

$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}


         }
}


//for vme 
for( $i = 0; $i<$vme; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =3 OR importance =4) AND (diffuculty =1 OR diffuculty= 2) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;

$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+$vhh+1;

$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}




         }
}


//for vmh
for( $i = 0; $i<$vmh; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =3 OR importance =4) AND (diffuculty =3 OR diffuculty= 4) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+$vhh+$vme=1;

$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}



         }
}
//for vmm
for( $i = 0; $i<$vmm; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =3 OR importance =4) AND (diffuculty=5) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;
$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+$vhh+$vme+$vmh+1;
$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}




         }
}


//for vle
for( $i = 0; $i<$vle; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =1 OR importance =2) AND (diffuculty =1 OR diffuculty= 2) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;
$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;

$x=$i+$vhm+$vhe+$vhh+$vme+$vmh+$vmm+1;
$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}



         }
}

//for vlm
for( $i = 0; $i<$vlm; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =3 OR importance =4) AND (diffuculty =3 OR diffuculty= 4) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;
$result = mysqli_query($con,$sql);
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+$vhh+$vme+$vmh+$vmm+$vle+1;
$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}


         }
}

//for vle
for( $i = 0; $i<$vlh; $i++ ) {

$sql="SELECT name  FROM question WHERE  (importance =1 OR importance =2) AND (diffuculty =5 ) AND type_id ='.$type.' AND faculty_subject_id =".$fsid_no." ORDER BY RAND() LIMIT 1 " ;
$question="";

while ($array =  mysqli_fetch_assoc($result)) {
	
$question .= $array['name'] ;
$x=$i+$vhm+$vhe+$vhh+$vme+$vmh+$vmm+$vlm+1;
$pdf->SetFont('Times','B',8);
$pdf->Ln();
if($x%9==0 || $x==8 ||$x==17 and $x!=9 and $x!=18 and $type==2   ){
  $pdf->AddPage();
}

$pdf->Cell(229.75, 6, ''.$x.'. '.$question, 2, 0, 'L');
$pdf->Ln();
if($type==2){



for( $o =1; $o<5; $o++ ){


$sqlc="SELECT DISTINCT choice.choice_text FROM choice,question,answer WHERE choice.answer_id=answer.id AND answer.question_id =question.id AND question.id=".$question_id." AND choice.choice_index =".$o."  ORDER BY RAND() LIMIT 1";
$result_choice = mysqli_query($con,$sqlc);
$mychoice="";

while ($array =  mysqli_fetch_assoc($result_choice)) {
$mychoice = $array['choice_text'] ;


//random







if($o==1){
$pdf->Cell(229.75, 6, '( A )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==2){
$pdf->Cell(250.75, 6, '( B )  '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}
if($o==3){
$pdf->Cell(229.75, 6, '( C ) '.$mychoice, 2, 0, 'L');
$pdf->Ln();
}

if($o==4){
$pdf->Cell(229.75, 6, '( D ) '.$mychoice, 2, 0, 'L');

}







}


}

}


         }
}
*/

mysqli_close($con);


?>
</div>
<button class="btn btn-primary" onclick="CallPrint('print')">Print</button>






  
</form> 
<script language="javascript" type="text/javascript">
    function CallPrint(id) {
        var prtContent = document.getElementById(id);
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
        prtContent.innerHTML = strOldOne;
    }
</script>
</body>
</html>
<?php
include ("includes/footer.html"); 
?>