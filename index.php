<?php 
  include('config/config.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Task Manager</title>
</head>
<body>

	<h1>Task Manager</h1>

     <!-- Menu Strats Here -->
     <div class="menu">
     	<a href="<?php echo SITEURL; ?>">Home</a>
     	<a href="#">To Do</a>
     	<a href="#">Doing</a>
     	<a href="#">Done</a>
     	<a href="manage-list.php">Manage List</a>
     </div>
     <!-- Menu Ends Here -->

     <!-- Tasks Strats Here -->
     <div class="all-tasks">
     	<a href="#">Add Task</a>
     	<table>
     		<tr>
     			<th>S.N</th>
     			<th>Task Name</th>
     			<th>Priority</th>
     			<th>Deadline</th>
     			<th>Actions</th>
            </tr>

            <tr>
            	<td>1</td>
            	<td>Design a Website</td>
            	<td>Medium</td>
            	<td>23/05/2020</td>
            	<td>
            	   <a href="#">Update</a> 
            	   <a href="#">Delete</a>
                </td>
            </tr>
     	</table>
     </div>
     <!-- Tasks Ends Here -->   

</body>
</html>