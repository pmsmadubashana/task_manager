<?php 
    include('config/config.php');

    if(isset($_GET['list_id']))
    {

    	$list_id=$_GET['list_id'];

    	$connection=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME) ;

        if(mysqli_connect_errno()){
            die('database connection failed'.mysqli_connect_errno());
        }else{
            echo "Connection successful";
        }

        $sql="DELETE FROM table_list WHERE list_id=$list_id";

        $result=mysqli_query($connection,$sql);

        if ($result==true) {
            echo "date inserted";
    	   $_SESSION['delete']="List delete successfully";
    	   header('location:manage-list.php');
        }else{
            echo "Data inserted failed";
            $_SESSION['delete_fail']="Failed to delete list";
            header('location:manage-list.php');
        }

    }
    else
    {
       //redirect to manage-list page
       header('location:manage-list.php');
    }

 ?>