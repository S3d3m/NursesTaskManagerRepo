<?php
include ('adb.php');
$myadb = new adb();

if (isset($_POST['id'])) {
	
$id=$_POST['id'];
$firstname=$_POST['firstname'];
$secondname=$_POST['secondname'];
$contact=$_POST['contact'];



$str_query="Insert into nurse values('$id','$firstname','$secondname','$contact')";
if($myadb->query($str_query)==true){
    echo "succesfully inserted";
}
else{
    echo "nothing was inserted";
}

}




?>
