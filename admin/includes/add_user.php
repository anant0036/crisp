<?php

    if(isset($_POST['create_user']))
    {

        $user_firstname  = $_POST['user_firstname'];
        $user_lastname   = $_POST['user_lastname'];
        $user_role       = $_POST['user_role'];
        $username        = $_POST['username'];
        $user_email      = $_POST['user_email'];
        $user_password   = $_POST['user_password'];
        
        
        // $post_image         = $_FILES['image']['name'];
        // $post_image_temp    = $_FILES['image']['tmp_name'];
        // $post_date          = date('d-m-y');
        // $post_comment_count = 4;

        // move_uploaded_file($post_image_temp, "../images/$post_image");
        $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
        $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') "; 


        
        // $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ";
        // $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags},'{$post_comment_count}','{$post_status}')";
        $create_user_query = mysqli_query($connection, $query);

        comfirm($create_user_query);

    }

?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="post_category">First Name</label>
    <input type="text" name="user_firstname" class="form-control">
</div>


<!-- <div class="form-control">
    <label for="post_category">Post Author</label>
    <input type="text" name="author" class="form-control">
</div> -->


<div class="form-group">
    <label for="post_status">Last Name</label>
    <input type="text" class="form-control" name="user_lastname">
</div>


<select name="user_role" id="">

    <option value = "Subscriber">Select Option</option>
    <option value = "Admin">Admin</option>
    <option value = "Subscriber">Subscriber</option>

</select>




<!-- <div class="form-group">
    <label for="post_image"></label>
    <input type="file" name="image">
</div> -->


<div class="form-group">
    <label for="post_tags">Username</label>
    <input type="text" class="form-control" name="username">
</div>


<div class="form-group">
    <label for="post_content">E-mail</label>
    <input type="email" class="form-control" name="user_email">

</div>

<div class="form-group">
    <label for="post_content">Password</label>
    <input type="password" class="form-control" name="user_password">

</div>


<div class="form-group">
    <input type="submit" value="Add User" name="create_user" class="btn btn-primary">
</div>

</form>