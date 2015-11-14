<!DOCTYPE html>
<html>
	<head>
		<title>Nurse Task Manager Homepage</title>
		<link rel="stylesheet" href="css/style1.css"/>
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/jquery-2.1.3.js"></script>
		<script>
		$(document).ready(function(){
			$('#task').click(function(){
				$('#form_overlay').fadeIn('slow');
				$('#form_overlay_div').fadeIn('slow');
			});
		});
		$(document).ready(function(){
			$('.close-button').click(function(){
				$('#form_overlay').fadeOut('fast');
				$('#form_overlay_div').fadeOut('fast');
			});
		});
		$(document).ready(function(){
			$('#view').click(function(){
				$('#table_overlay').fadeIn('slow');
				$('#table_overlay_div').fadeIn('slow');
			});
		});
		$(document).ready(function(){
			$('.close-button').click(function(){
				$('#table_overlay').fadeOut('fast');
				$('#table_overlay_div').fadeOut('fast');
			});
		});
		// $(document).ready(function(){
		// 	$('.close-button').click(function(){
		// 		$('#overlay1').fadeOut('fast');
		// 		$('#overlay_div1').fadeOut('fast');
		// 	});
		// });
		</script>
	</head>
	<body>
		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">Ghana Health Services</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="AboutUs.html">About Us</a></li>
						<li><a href="elements.html">Contact</a></li>
						<!-- <li><a href="#" class="button special">Sign Up</a></li> -->
                </nav>
		<!-- Banner -->

				<section id="banner">
				<h2 style="color:#3cadd4">Nurses Task Manager</h2>
				<p>Efficient, Quick and Reliable way to manage nurses' activities</p>
				<ul class="actions">
					<li>
						<a href="#" class="button big" id="task">Add Nurse</a>
					</li>
					<li>
						<a href="#" class="button big" id="update">Update Nurse</a>
					</li>
					<li>
						<a href="#" class="button big" id="admin">Delete Nurse</a>
					</li>
					<li>
						<a href="#" class="button big" id="view">View Nurses</a>
					</li>
				</ul>
			    </section>
					</ul>

			</header>
			<div id="form_overlay"></div>
			<div id="form_overlay_div">
				<div class="close-button">X</div>
				<form action="nurseFunction.php" method="GET">
<h3><i><b>Add a new nurse</b></i></h3>
<table>
	<tr>
		<td>
		<div>Employee id:</td><td><input type="Text" name="id" size="40"></div>	</td>
		</tr>
		<tr>
			<td>
				<div>First Name:</td><td> <input type="text" name="Fname" size="40"></div>
			</td>
		</tr>
		<tr>
			<td><div>Second Name:</td><td><input type="text" name="Lname" size="40"></div></td>
		</tr>
		<tr>
			<td><div>Department:</td><td><input type="text" name="dept" size="40"></div></td>
		</tr>
		<tr>
			<td><div>Contact:</td><td><input type="text" name="contact" size="40"></div></td>
		</tr>
		<tr>
			<td><div><input type="Submit" value="Add"></div></td>
		</tr>

		</table>

</form>
<?php
if (isset($_REQUEST['id'])){
	include_once("nurses.php");
	$obj_nurse= new nurses();
	$theId=$_REQUEST['id'];
	$theFname =$_REQUEST['Fname'];
	$theLname =$_REQUEST['Lname'];
	$theDept = $_REQUEST['dept'];
	$thecontact = $_REQUEST['contact'];

	if(!$obj_nurse->add_nurse($theId,"$theFname","$theLname","$theDept","$thecontact")){
		echo "The nurse was not added";
	}
	else{
		echo "A nurse was added successfully";
	}

}
?>
			</div>
			<div id="table_overlay"></div>
			<div id="table_overlay_div">
				<div class="close-button">X</div>
						<?php
include_once ("nurses.php");
$objnurse = new nurses();
	$objnurse->view_all_nurses();

	if(!$row=$objnurse->fetch()){
echo "There are no nurses currently";
	}

	echo "<center><table border='1'>";
	echo "<tr><td>Employee_id</td><td>First Name</td><td>Last Name</td><td>Department</td>
	      <td>Contact</td></tr>";
	while ($row) {
		echo "<tr><td>{$row['employee_id']}</td><td>{$row['first_name']}</td><td>{$row['last_name']}</td>";
		echo "<td>{$row['department']}</td><td>{$row['contact']}</td></tr>";
		$row =$objnurse->fetch();
	}
	echo "</table></center>";

?>
			</div>
	</body>
</html>
