<?php
   include('config/config.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Task manager</title>
</head>
<body>
    <h1>Task Manager</h1></a>

	<h3>Add list page</h3>

	<p>
		<?php 
		    //check whether session is create or not
		    if (isset($_SESSION['add_fail'])) {
             //display session msg
		   	 echo $_SESSION['add_fail'];
		   	 //remove the msg after display once
		   	 unset($_SESSION['add_fail']);
		   }
		 ?>
	</p>

	<!--form to add-list starts here -->

	<div class="add-list">
     	<a href="<?php echo SITEURL; ?>manage-list.php">Manage List</a>
    
        <form method="POST" action="">
     	<table>
     		<tr>
            	<td>list Name:</td>
            	<td><input type="text" name="list_name" placeholder="Type list name here" required="required"></td>
            </tr>

            <tr>
            	<td>list Description:</td>
            	<td><textarea name="list_disc" placeholder="Type list Description here"></textarea></td>
            </tr>

            <tr>
            	<td><input type="submit" name="submit" value="Save"></td>
            </tr>

     	</table>

     	</form>
     </div>
     <!--form to add-list starts here -->

</body>
</html>

<?php 

    //check whether post is submitted or not
    if(isset($_POST['submit']))
    {
    	//echo "form Submitted";
    	//get the values from form and save it in variables
    	$list_name=$_POST['list_name'];
    	$list_disc=$_POST['list_disc'];

    	//connect database
    	$connection=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

        //check database
    	/*if(mysqli_connect_errno()){
    		die('database connection failed'.mysqli_connect_errno());
    	}else{
    		echo "Connection successful";
    	}*/
        
        //another connection check type
    	/*if ($connection==true) {
    		echo "Database connected";
    	}*/

        //select database
        //$db_select=mysqli_select_db($connection,DB_NAME);

    	//sql query to insert data into database
    	$sql="INSERT INTO table_list SET 
    	  list_name='$list_name',
    	  list_disc='$list_disc'
		  ";

    	//excute query and insert into database
    	$res=mysqli_query($connection,$sql);

    	//check whether the query excuted successfully or not
    	if($res==true){
    		//echo "Data inserted";

    		//creatw a session variable to display msg
    		$_SESSION['add']="List added successfully";
    		//redirect to manage-list page
    		header('location:manage-list.php');
    	}else{
    		//echo "Failed";
    		//creatw a session variable to display msg
    		$_SESSION['add_fail']="Failed to add list";
    		//redirect to same page
    		header('location:add-list.php');	
    	}


    }


 ?>