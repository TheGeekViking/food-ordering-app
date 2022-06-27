<?php 

    // Include constant.php file here
    include('../config/constants.php');

    //1. Get the id of admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check the query executed successfully or not 
    if($res==true)
    {
        //Query Executed Successfully and Admin Deleted
        //echo "Admin Deleted";
        //Create Session Variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Delete Successfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete Admin
        //echo "Failed to delete Admin";

        $SESSION['delete'] = "<div class='error'>Failed to delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. Redirect to manage admin page with message (success/error)

?>