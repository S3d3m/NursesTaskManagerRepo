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
						<a href="#" class="button big" id="task">Add Task</a>
					</li>
					<li>
						<a href="#" class="button big" id="update">Update Task</a>
					</li>
					<li>
						<a href="#" class="button big" id="admin">Delete Task</a>
					</li>
					<li>
						<a href="#" class="button big" id="view">View Task</a>
					</li>
				</ul>
			    </section>
					</ul>

			</header>
			<div id="form_overlay"></div>
			<div id="form_overlay_div">
				<div class="close-button">X</div>
				<form action= "taskFunction.php" method="GET">
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
			<div id="table_overlay"></div>
			<div id="table_overlay_div">
				<div class="close-button">X</div>
		<?php

			include("tasks.php");

			$obj=new Tasks();
			// 	if(!$obj->display_task()){
			// 		echo " Error displaying".mysql_error();
			// 	}
			// 	else{
			// 		echo " displaying";
			// 	}
			$obj->display_task();
			if(!$row=$obj->fetch()){
				echo"there are no tasks currently";
			}
			echo"<table border='2'>";
            echo"<tr><td>TASK ID</td><td>TASK NAME</td><td>TASK DESCRIPTION</td><td>START DATE</td>
                 <td>END DATE</td><td>LOCATION</td></tr>";
            while($row) {
                  echo "<tr><td>{$row["task_id"]}</td><td><a href=tasksdisplayselected.php?id=".$row["task_name"].">{$row["task_name"]}</td>";
                  echo"<td>{$row["task_description"]}</td><td>{$row["start_date"]}</td>
                  <td>{$row["end_date"]}</td><td>{$row["location"]}</td>";
                  $row=$obj->fetch();
            }
            echo"</table>";
		?>
			</div>
	</body>
</html>
