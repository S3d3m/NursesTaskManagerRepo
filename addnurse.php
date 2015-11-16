<!DOCTYPE html>
<html>
<head>
    <title>
        <h2>Add Nurse to the System</h2>
    </title>
<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
<!--css file-->
<style type="text/css">
body {
    background-color: #CCC;
    margin:80px 80px 100px 100px;
}

div#fixedheader {
    position:fixed;
    top:0px;
    left:0px;
    width:100%;
    background:#333;
    padding:20px;
    background-color:green;
}
div#fixedfooter {
    position:fixed;
    bottom:0px;
    left:0px;
    width:100%;
    
    background:#333;
    padding:8px;
    background-color:green;
}
   
</style>
</head>
<body>
<!--header-->
<div id="fixedheader"> <center><h2>Register as a nurse</h2></center></div>

<CENTER><h2>Register a new nurse</h2></CENTER>
<center>
<!--A form to take details of the nurse-->
    <form method="GET" action="addnurse.php">
    <label for="nurseid">Nurse Id</label><input type="text" id="nurseid" name="nurseid"><br>
    <label for="nursefname">Nurse First Name</label><input type="text" id="nursefname" name="nursefname"><br>
    <label for="nursesname">Nurse Second Name</label><input type="text" id="nursesname" name="nursesname"><br>
    <label for="nursecontact"> Contact</label><input type="text" id="nursecontact" name="nursecontact"><br>
    <input type="submit" value="Register">
    </form>
    </center>
    <!--footer-->
    <div id="fixedfooter"><center>A nurse was successfully added</center></div>

<!--php code to connect to database-->
<?php
include ('adb.php');
$myadb = new adb();
if (isset($_REQUEST['nurseid'])) {

//taking the data from the form
$id =$_REQUEST['nurseid'];
$firstname=$_REQUEST['nursefname'];
$secondname=$_REQUEST['nursesname'];
$contact=$_REQUEST['nursecontact'];
echo($id);
//Querry to add a nurse
$str_query="INSERT INTO addnurse values('$id','$firstname','$secondname','$contact')";
if($myadb->query($str_query)==true){

    echo "succesfully inserted";
}
else{
    echo "nothing was inserted";
}
}


?>

</body>
</html>





