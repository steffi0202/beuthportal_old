<?php
$Studiengang=$_POST['Studiengang'];
$Modul=$_POST['Modul'];
$Zeit=$_POST['Zeitaufwand'];
//$Mod_desc=$_POST['Modul_des'];
$Prof=$_POST['Dozent'];
//$Prof_des=$_POST['Dozent_des'];
$Stars=$_POST['Sterne'];


// Create connection
$conn=mysql_connect("localhost","root","");
mysql_select_db("beuthportal");

// Check connection
if($conn === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}

//write into DB
$select="insert into ranking(Studiengang,Modul,Zeitaufwand, Dozent, Sterne) values ('".$Studiengang ."', '".$Modul ."', '".$Zeit ."', '".$Prof ."', '".$Stars ."',)";
$sql=mysql_query($select);


//Feedback
if($select){

    echo("<br>Input data is succeed");

} else{

    echo("<br>Input data is fail");

}

mysql_close();
?>
