<?php include('partials/menu.php'); ?>

    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>

            <br />

            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //displaying session message
                    unset($_SESSION['add']); //removing session message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <br><br><br>

            <!-- Button to Add Admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br /><br /><br />

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>



                <?php 
                    //Query to get all admin
                    $sql = "SELECT * FROM tbl_admin";
                    $res = mysqli_query($conn, $sql);

                    //Check whether the query is Executed or not
                    if($res==TRUE)
                    {
                        // Count Rows to Check whether we have data in the database or not
                        $count = mysqli_num_rows($res); //Function to get all the rows in database

                        $sn=1; //Create a Variable and assign the value

                        //Check the num of rows
                        if($count>0)
                        {
                            //We have data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //Using while loop to get all the data from the database
                                //And while loop will run as long as we have data in database

                                //Get individual data
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //Display the value in our table
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //We do not have data in database
                        }
                    }
                ?>
            </table>



        </div>
    </div>
    <!-- Main Content Section Ends -->

<?php include('partials/footer.php'); ?>