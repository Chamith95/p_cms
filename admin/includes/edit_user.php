<?php

if(isset($_GET['edit_user'])){

    $the_user_id=$_GET['edit_user'];

 
    $query="SELECT * FROM users WHERE user_id=$the_user_id" ;
    $select_users=mysqli_query($connection,$query);


while($row=mysqli_fetch_assoc( $select_users)){
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

if(isset($_POST['edit_user'])){


    // $post_category=$_POST['category'];
    $user_firstName=$_POST['user_firstName'];
    $user_lastName=$_POST['user_lastName'];
    $user_role=$_POST['user_role'];

   

    // $post_image=$_FILES['image']['name'];
    // $post_image_temp=$_FILES['image']['tmp_name'];

    $username=$_POST['username'];
    $user_email=$_POST['email'];
    $user_password=$_POST['user_password'];
    // $post_date=date('d-m-y');
    // $post_comment_count=4;
  

    // move_uploaded_file($post_image_temp,"../images/$post_image");

    $query="UPDATE users SET ";
    $query .="user_firstName ='{$user_firstName}', ";
    $query .="user_lastName ='{$user_lastName}', ";
    $query .="user_role ='{$user_role}', ";
    $query .="username ='{$username}', ";
    $query .="user_email ='{$user_email}', ";
    $query .="user_password ='{$user_password}' ";
    $query .="WHERE user_id ={$the_user_id} ";


    $edit_user_query=mysqli_query($connection,$query);

    confirmQuery($edit_user_query);

    header("Location: users.php");


}

?>

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
    <input class="btn btn-primary" type="submit"  name="edit_user" value="Update User">
</div>

</form>




</div>




</form>