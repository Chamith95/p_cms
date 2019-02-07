<?php

if(isset($_POST['create_user'])){


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

    $query="INSERT INTO users(user_firstname, user_lastname, user_role, 
    username, user_email, user_password) ";

    $query .="VALUES('{$user_firstName}','{$user_lastName}','{$user_role}',
    '{$username}','{$user_email}','{$user_password}')";

    $create_user_query=mysqli_query($connection,$query);

    confirmQuery($create_user_query);

    echo "User Created: "." "."<a href='users.php'>View Users</a>";


}

?>

<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="firstName">First Name</label>
    <input type="text" class="form-control" name="user_firstName">
</div>

<div class="form-group">
    <label for="lastName">Last Name</label>
    <input type="text" class="form-control" name="user_lastName">
</div>

<div class="form-group">
    <label for="user_role">User Role</label>
        <select name="user_role" id="post_category">
        <option value="Subscriber">Subscriber </option>
        <option value="Admin">Admin</option>
 
        </select>
    </div>




<!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file"  name="image">
</div> -->

<div class="form-group">
    <label for="username">UserName</label>
    <input type="text" class="form-control" name="username">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email">
</div>

<div class="form-group">
    <label for="email">Password</label>
    <input type="password" class="form-control" name="user_password">
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit"  name="create_user" value="Create User">
</div>

</form>




</div>
















</form>