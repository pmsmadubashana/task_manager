<?php
   include('config/config.php');

   if(isset($_GET['list_id']))
   {
       $list_id = $_GET['list_id'];

       $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

       //Database connection check
       /*if(mysqli_connect_errno()){
           die('Database connection failed'.mysqli_connect_errno());
       }else{
           echo 'Database connection ok';
       }*/

       $sql="SELECT * FROM table_list WHERE list_id = $list_id";
       
       $result=mysqli_query($conn,$sql);

       if($result==true){
           $row=mysqli_fetch_assoc($result);

           $list_name = $row['list_name'];
           $list_disc=$row['list_disc'];
              
       }else{
           header('Location:manage-list.php');

       }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task Manager</title>
</head>
<body>

    <h1>Task Manager</h1>

    <p>
        <?php 
          if(isset($_SESSION['update_fail'])){
              echo $_SESSION['update_fail'];
              unset($_SESSION['update_fail']);
          }
        
        ?>
    </p>
 
    <div class="add-list">
     	<a href="<?php echo SITEURL; ?>manage-list.php">Manage List</a>
    
        <form method="POST" action="">
     	<table>
     		<tr>
            	<td>list Name:</td>
            	<td><input type="text" name="list_name" value="<?php echo $list_name; ?>" required="required"></td>
            </tr>

            <tr>
            	<td>list Description:</td>
            	<td><textarea name="list_disc"><?php echo $list_disc; ?></textarea></td>
            </tr>

            <tr>
            	<td><input type="submit" name="submit" value="Update"></td>
            </tr>

     	</table>

     	</form>
     </div>
</body>
</html>

<?php 

    if(isset($_POST['submit']))
    {
        $list_name=$_POST['list_name'];
        $list_disc=$_POST['list_disc'];

        $conn1=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

        $sql="UPDATE table_list SET
           list_name='$list_name'
           list_disc='$list_disc'
           WHERE list_id='$list_id'
           ";

        $result2=mysqli_query($conn1,$sql);

        if($result2==true){
            echo "database connected";
        }else{
            echo "database not connected";
        }

        /*if($result2==true){
            $_SESSION['update']="List updated successfully";
            header('location:manage-list.php');

        }else{
            $_SESSION['updat_fail']="List update failed";
            header('location:manage-list.php?list_id=$list_id');

        }*/

        
    }

?>