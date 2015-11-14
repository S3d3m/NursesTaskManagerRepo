<!DOCTYPE html>
<!-- this -->
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
<<<<<<< HEAD
		// $(document).ready(function(){
		// 	$('#logadmin').click(function(){
		// 		$('#overlay1').fadeIn('slow');
		// 		$('#overlay_div1').fadeIn('slow');
		// 	});
		// });
		// $(document).ready(function(){
		// 	$('.close-button').click(function(){
		// 		$('#overlay').fadeOut('fast');
		// 		$('#overlay_div').fadeOut('fast');
		// 	});
		// });
=======
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
>>>>>>> refs/remotes/origin/kpotosu
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
<<<<<<< HEAD
						<a href="#" class="button big" id="task">Add Task</a>
					</li>
					<li>
						<a href="#" class="button big" id="nurse">Update Task</a>
					</li>
					<li>
						<a href="#" class="button big" id="admin">Delete Task</a>
					</li>
					<li>
						<a href="#" class="button big" id="admin">View Tasks</a>
=======
						<a href="#" class="button big" id="task">Add Administrator</a>
					</li>
					<li>
						<a href="#" class="button big" id="update">Update Administrator</a>
					</li>
					<li>
						<a href="#" class="button big" id="admin">Delete Administrator</a>
					</li>
					<li>
						<a href="#" class="button big" id="view">View Administrator</a>
>>>>>>> refs/remotes/origin/kpotosu
					</li>
				</ul>
			    </section>
					</ul>

			</header>
			<div id="form_overlay"></div>
			<div id="form_overlay_div">
				<div class="close-button">X</div>
<<<<<<< HEAD
				<form action= "adminFunction.php" method="GET">
			    <div>Tasks Name : <input type="text" name="tn"></div>
				<div>Tasks Description :</div>
				<div>
					<textarea name="td" cols="30" rows="5"></textarea>
				</div>
                <div>Start Date : <input type="date" name="sd"></div>
                <div>End Date : <input type="date" name="ed"></div>
                <div>Location : <input type="text" name="location"></div>
				<div><input type="submit" value="Add"></div>
			</form>
			<?php
			if(isset($_REQUEST['tn'])){
				include("tasks.php");
				//create object of manufacturers
				$obj=new Tasks();
				$name=$_REQUEST['tn'];
				$description=$_REQUEST['td'];
				$s_date=$_REQUEST['sd'];
				$e_date=$_REQUEST['ed'];
				$location=$_REQUEST['location'];
				if(!$obj->add_Task($name,$description,$s_date,$e_date,$location)){
					echo "Error adding".mysql_error();
				}else{
					echo "Adding $name, $description, $s_date, $e_date, $location";
				}
			}
		?>
			</div>
=======
				<	<form method ="GET" action ="adminFunction.php">
		<h3><i><b>Add a new Administrator</b></i></h3>
<table>
	<tr>
		<td>
		<div>Employee id:</td><td><input type="Text" name="empid" size="40"></div>	</td>
		</tr>
		<tr>
			<td>
				<div>First Name:</td><td> <input type="text" name="fname" size="40"></div>
			</td>
		</tr>
		<tr>
			<td><div>Second Name:</td><td><input type="text" name="lname" size="40"></div></td>
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
		if (isset ($_REQUEST['empid'])){
			include_once ("administrator.php");
		$obj = new administrator();
		$employee_id = $_REQUEST['empid'];
		$First_name = $_REQUEST['fname'];
		$Last_name = $_REQUEST['lname'];
		$Contact = $_REQUEST['contact'];

	if(!$obj->add_administrator($employee_id,$First_name,$Last_name,$Contact)){
		echo "Error adding";
	}
	else{
		echo "$First_name successfully added";
	}

		}
		?>
			</div>
			<div id="table_overlay"></div>
			<div id="table_overlay_div">
				<div class="close-button">X</div>
				<?php
include_once ("administrator.php");
$obj = new administrator();
	$obj->view_administrators();

	if(!$row=$obj->fetch()){
echo "There is no administrator now";
	}

	echo "<center><table border='1'>";
	echo "<tr ><td>Employee_id</td><td>First Name</td><td>Last Name</td><td>Contact</td>
	     </tr>";
	while ($row) {
		if ($i%2==0){
	$style ="style='background-color: BurlyWood'";
	}
	else{
		$style ="style='background-color:cornsilk'";
	}
	$i++;
		echo "<tr><td>{$row['employee_id']}</td><td>{$row['first_name']}</td><td>{$row['last_name']}</td>";
		echo "<td>{$row['Contact']}</td></tr>";
		$row =$obj->fetch();
	}
	echo "</table></center>";

?>
			</div>
>>>>>>> refs/remotes/origin/kpotosu
	</body>
</html>
