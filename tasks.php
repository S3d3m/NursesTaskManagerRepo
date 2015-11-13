<?php
include_once ("adb.php");
class tasks extends adb{


      function tasks(){

      }

      
      function add_Task($name,$description,$s_date,$e_date,$location){
            
            $str_query="insert into tasks set task_name='$name',
                        task_description='$description',
                        start_date='$s_date',end_date='$e_date',location='$location'";
            return $this->query($str_query);
      }

      function update_task(){
              $str_query="select * from tasks";
            $result=$this->query($str_query).mysql_error();
            $row=$this->fetch();
            echo"<table border='2'>";
            echo"<tr><td>TASK ID</td><td>TASK NAME</td><td>TASK DESCRIPTION</td><td>START DATE</td>
                 <td>END DATE</td><td>LOCATION</td><td>UPDATE</td></tr>";
            while($row) {
                  echo "<tr><td>{$row["task_id"]}</td><td><a href=tasksdisplayselected.php?id=".$row["task_name"].">{$row["task_name"]}</td>";
                  echo"<td>{$row["task_description"]}</td><td>{$row["start_date"]}</td>
                  <td>{$row["end_date"]}</td><td>{$row["location"]}</td>
                  <td><a href=tasksupdate.php?id=".$row["task_id"].">UPDATE</td></tr>";
                  $row=$this->fetch();
            }
            echo"</table>";
      }

      function search_task($name){
            $str_query="select * from tasks where task_name like '%$name%'";
            return $this->query($str_query);
      }

      function delete_task(){
              $str_query="select * from tasks";
            $result=$this->query($str_query).mysql_error();
            $row=$this->fetch();
            echo"<table border='2'>";
            echo"<tr><td>TASK ID</td><td>TASK NAME</td><td>TASK DESCRIPTION</td><td>START DATE</td>
                 <td>END DATE</td><td>LOCATION</td><td>DELETE</td></tr>";
            while($row) {
                  echo "<tr><td>{$row["task_id"]}</td><td><a href=tasksdisplayselected.php?id=".$row["task_name"].">{$row["task_name"]}</td>";
                  echo"<td>{$row["task_description"]}</td><td>{$row["start_date"]}</td>
                  <td>{$row["end_date"]}</td><td>{$row["location"]}</td>
                  <td><a href=tasksdelete.php?id=".$row["task_id"].">DELETE</td></tr>";
                  $row=$this->fetch();
            }
            echo"</table>";
      }

      function display_task(){
            $str_query="select * from tasks";
            $result=$this->query($str_query).mysql_error();
            $row=$this->fetch();
            echo"<table border='2'>";
            echo"<tr><td>TASK ID</td><td>TASK NAME</td><td>TASK DESCRIPTION</td><td>START DATE</td>
                 <td>END DATE</td><td>LOCATION</td></tr>";
            while($row) {
                  echo "<tr><td>{$row["task_id"]}</td><td><a href=tasksdisplayselected.php?id=".$row["task_name"].">{$row["task_name"]}</td>";
                  echo"<td>{$row["task_description"]}</td><td>{$row["start_date"]}</td>
                  <td>{$row["end_date"]}</td><td>{$row["location"]}</td>";
                  $row=$this->fetch();
            }
            echo"</table>";
      }

      function display_selected_task($name){
            $str_query="select * from taskmanager.tasks where task_name='$name'";
            $result=$this->query($str_query).mysql_error();
            $row=$this->fetch();
            echo"<table border='2'>";
            echo"<tr><td>TASK ID</td><td>TASK NAME</td><td>TASK DESCRIPTION</td><td>START DATE</td>
                 <td>END DATE</td><td>LOCATION</td><td>UPDATE</td><td>DELETE</td></tr>";
            while($row) {
                  echo "<tr><td>{$row["task_id"]}</td><td><a href=tasksdisplayselected.php?id=".$row["task_name"].">{$row["task_name"]}</td>";
                  echo"<td>{$row["task_description"]}</td><td>{$row["start_date"]}</td>
                  <td>{$row["end_date"]}</td><td>{$row["location"]}</td>"."<td><a href=tasksupdate.php?id=".$row["task_id"].">UPDATE</td>";
                  echo"<td><a href=tasksdelete.php?id=".$row["task_id"].">DELETE</td></tr>";
                  $row=$this->fetch();
            }
            echo"</table>";
}
}
?>