<?php include "includes/admin_header.php"?>

<?php
if(isset($_POST['update_profile'])){

 $username =$_SESSION['username'];
// $post_category=$_POST['category'];
$user_firstName=$_POST['user_firstName'];
$user_lastName=$_POST['user_lastName'];
$user_role=$_POST['user_role'];



// $post_image=$_FILES['image']['name'];
// $post_image_temp=$_FILES['image']['tmp_name'];

$nusername=$_POST['username'];
$user_email=$_POST['email'];
$user_password=$_POST['user_password'];
// $post_date=date('d-m-y');
// $post_comment_count=4;


// move_uploaded_file($post_image_temp,"../images/$post_image");

$query="UPDATE users SET ";
$query .="user_firstName ='{$user_firstName}', ";
$query .="user_lastName ='{$user_lastName}', ";
$query .="user_role ='{$user_role}', ";
$query .="username ='{$nusername}', ";
$query .="user_email ='{$user_email}', ";
$query .="user_password ='{$user_password}' ";
$query .="WHERE username ='{$username}'";


$edit_user_query=mysqli_query($connection,$query);

confirmQuery($edit_user_query);

header("Location: profile.php");


}

?>
<?php

if(isset($_SESSION['username'])){

    $username =$_SESSION['username'];

    $query="SELECT * FROM users WHERE username ='{$username}'";

    $select_user_profile_query=mysqli_query($connection,$query);

    while($row=mysqli_fetch_array($select_user_profile_query)){
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_image=$row['user_image'];
        $user_role=$row['user_role'];


    }

}

?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                <h1 class="page-header">
                        Welcome To Admin
                        <small>Author</small>
                    </h1>       
                    <form action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" value="<?php echo $user_firstname ?> " class="form-control" name="user_firstName">
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" value="<?php echo $user_lastname ?> " class="form-control" name="user_lastName">
                    </div>

                    <div class="form-group">
                        <label for="user_role">User Role</label>
                            <select name="user_role" id="user_role">

                            <option value=<?php echo $user_role ?>><?php echo $user_role ?></option>
                            <?php

                            if($user_role=="Admin"){
                            echo  '<option value="subscriber">Subscriber</option>';

                            }
                            else{
                            echo   '<option value="admin">Admin</option>';   

                            }


                            ?>

                        
                    
                            </select>
                        </div>




                    <!-- <div class="form-group">
                        <label for="post_image">Post Image</label>
                        <input type="file"  name="image">
                    </div> -->

                    <div class="form-group">
                        <label for="username">UserName</label>
                        <input type="text" value="<?php echo $username ?>"class="form-control" name="username">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" value="<?php echo $user_email ?>" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" value="<?php echo $user_password ?>" class="form-control" name="user_password">
                    </div>




                    <div class="form-group">
                        <input class="btn btn-primary" type="submit"  name="update_profile" value="Update profile">
                    </div>

                    </form>




</div>




</form>

                
       

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>