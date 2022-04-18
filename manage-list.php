<?php 
  include('config/config.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Task Manager</title>
</head>
<body>
	<h1>Task Manager</h1></a>

	<h3>Manage list page</h3>

        <p>
        <?php 
            //check whether session is create or not
            if (isset($_SESSION['add'])) {
             //display session msg
             echo $_SESSION['add'];
             //remove the msg after display once
             unset($_SESSION['add']);
           }

           if(isset($_SESSION['update'])){
               echo $_SESSION['update'];
               unset($_SESSION['update']);
           }

           if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']) ;
           }

           if(isset($_SESSION['delete_fail'])){
            echo $_SESSION['delete_fail'];
            unset($_SESSION['delete_fail']) ;
           }
         ?>
    </p>

	<div class="manage-list">
		<a href="<?php echo SITEURL; ?>">Home</a>
     	<a href="<?php echo SITEURL; ?>add-list.php">Add List</a>
     	<table>
     		<tr>
     			<th>S.N</th>
     			<th>List name</th>
     			<th>Action</th>
            </tr>

            <?php
                 //connect database
                 $connection=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
                  
                 //sql query to display all data from database
                 $sql="SELECT * FROM table_list";

                 //Execute query
                 $result=mysqli_query($connection,$sql);

                 //check whether the query exucuted successfully or not
                 if($result==true){
                    //echo "exucuted";
                    //count the rows of data in database table
                    $count_rows=mysqli_num_rows($result);

                    //create a serial number variable
                    $sn=1;

                    //check whether there is data in database or not
                    if ($count_rows>0) {
                        //There's data in databse display in table
                        while ($row=mysqli_fetch_assoc($result)) {
                            //getting data from the database
                            $list_id=$row['list_id'];
                            $list_name=$row['list_name'];
                            ?>
                            
                            <tr>
                                <td><?php echo $sn++ ."."; ?></td>
                                <td><?php echo $list_name;?></td>
                                <td>
                                     <a href="<?php echo SITEURL; ?>update-list.php?list_id=<?php echo $list_id;?>">Update</a>
                                     <a href="<?php echo SITEURL; ?>delete-list.php?list_id=<?php echo $list_id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }else{
                        //no data to display in database
            ?>      
                    <tr>
                        <td colspan="3">No list added yet.</td>
                    </tr>
            <?php
                    }
                 }

            ?>

     	</table>
     </div>

</body>
</html>