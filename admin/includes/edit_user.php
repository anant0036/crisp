<?php

    if(isset($_GET['edit_user']))
    {
      $the_user_id = $_GET['edit_user'];

      $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
      $edit_users_query = mysqli_query($connection,$query);

      while($row = mysqli_fetch_assoc($edit_users_query))
      {
          $user_id        = $row['user_id'];
          $username       = $row['username'];
          $user_password  = $row['user_password'];
          $user_firstname = $row['user_firstname'];
          $user_lastname  = $row['user_lastname'];
          $user_email     = $row['user_email'];
          $user_image     = $row['user_image'];
          $user_role      = $row['user_role'];



      }
    }
    if(isset($_POST['edit_user']))
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


                
        $query = "UPDATE users SET ";
        $query .="user_firstname  = '{$user_firstname}', ";
        $query .="user_lastname = '{$user_lastname}', ";
        $query .="user_role = '{$user_role}', ";
        $query .="username   = '{$username}', ";
        $query .="user_email= '{$user_email}', ";
        $query .="user_password  = '{$user_password}' ";
        $query .= "WHERE user_id = '{$the_user_id}' ";

        $edit_user_query = mysqli_query($connection,$query);


        echo "DONE";

    }

?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="post_category">First Name</label>
    <input type="text" value="<?php echo $user_firstname; ?>" name="user_firstname" class="form-control">
</div>


<!-- <div class="form-control">
    <label for="post_category">Post Author</label>
    <input type="text" name="author" class="form-control">
</div> -->


<div class="form-group">
    <label for="post_status">Last Name</label>
    <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
</div>


<select name="user_role" id="">

    <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>
    <?php
    
    if($user_role == 'Admin')
    {
      echo"<option value = 'Subscriber'>Subscriber</option>";
    }

    else
    {
      echo "<option value = 'Admin'>Admin</option>";
    }

    ?>

</select>




<!-- <div class="form-group">
    <label for="post_image"></label>
    <input type="file" name="image">
</div> -->


<div class="form-group">
    <label for="post_tags">Username</label>
    <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
</div>


<div class="form-group">
    <label for="post_content">E-mail</label>
    <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">

</div>

<div class="form-group">
    <label for="post_content">Password</label>
    <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">

</div>


<div class="form-group">
    <input type="submit" value="Update User" name="edit_user" class="btn btn-primary">
</div>

</form>