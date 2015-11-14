<?php
include_once ("adb.php");
class administrator extends adb{

function add_administrator($empid,$fname, $lname,$con){
	$str_query ="insert into administrators set
				employee_id = '$empid',
				first_name = '$fname',
				last_name = '$lname',
				Contact = '$con'";
				print($str_query);
			return $this->query($str_query);
	}

function get_administrator($id){
	$str_query = "select employee_id, first_name, last_name,Contact
					from administrators
					where employee_id ='$id'";

			if(!$this->query($str_query)){
				return false;
			}
			return $this->fetch();
}
function update_administrator($id, $fname, $lname, $contact){
	$str_query = "update administrators set
				  first_name = '$fname',
				  last_name = '$lname',
				  Contact = '$contact',
				  where employee_id = $id";
		return $this->query($str_query);
}
function delete_administrator($id){
	$str_query = "delete from administrators
				  where employee_id = '$id'";
		return $this->query($str_query);
	}
function search_administrator($name){
	$str_query = "select * from administrators
				 where first_name like '%$name%'";
			if(!$this->query($str_query)){
				return false;
			}
				return $this->query($str_query);
}
function view_administrators(){
	$str_query = "SELECT employee_id, first_name,last_name, Contact
				FROM administrators";
				return $this->query($str_query);
}
}
?>
