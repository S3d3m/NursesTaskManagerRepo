<!--
Author:Rahab Wangari
Description:Nurse class
-->

<?php
include_once ("adb.php");
class nurses extends adb {

	function nurses(){

	}
	function add_nurse($Eid,$first_name,$last_name,$dept,$contact){
		$str_query="INSERT INTO nurses (employee_id, first_name,last_name,department,Contact)
		            Values($Eid,'$first_name','$last_name','$dept','$contact')";
		           // echo "$str_query";
		return  $this->query($str_query);
}
	function delete_nurse($Eid){
		$str_query="DELETE FROM nurses WHERE employee_id =$Eid";
		return $this->query($str_query);
}
	function update_nurse($Eid,$first_name,$last_name,$dept,$contact){
		$str_query="UPDATE nurses set first_name='$first_name',last_name='$last_name',
		            department='$dept',Contact='$contact' WHERE employee_id=$Eid";
		return $this->query($str_query);

	}
	function search_nurse($Eid){
		$str_query="SELECT employee_id, first_name,last_name,department,contact FROM nurses
		             where employee_id=$Eid";
		        return $this->query($str_query);
}
	function view_all_nurses(){
		$str_query="SELECT employee_id, first_name,last_name,department,contact FROM nurses";
		return $this->query($str_query);
	}
}
?>
