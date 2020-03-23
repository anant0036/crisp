<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


    <!-- Navigation -->
    <?php include  "includes/nav.php" ?> 

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


                <?php 

                if(isset($_GET['p_id']))
                {
                    $the_post_id = $_GET['p_id'];
                }
                
                    $query = "SELECT * FROM posts WHERE post_id = '$the_post_id' ";
                    $select_all_post_query = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_post_query))
                    {

                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                ?>
                        <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                    <a href="#"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                        

                   <?php } ?>


                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> -->
            
                <!-- Blog Comments -->

                <?php

                   if(isset($_POST['create_comment']))
                   {
                        $the_post_id = $_GET['p_id'];

                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];

                        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                        $query .= "VALUES ($the_post_id , '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

                        $create_comment_query = mysqli_query($connection,$query);

                        // echo "DONE!";

                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                        $query .= "WHERE post_id = $the_post_id ";

                        $update_comment_count = mysqli_query($connection, $query);

                    }  
                   
                    

                
                
                ?>




                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="POST" role="form">

                    <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="comment_author" class="form-control">
                    </div>
                    
                    <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="comment_email" class="form-control">

                    </div>

                        <div class="form-group">
                        <label for="comment">Your Comment</label>

                        <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php
                    
                $query = "SELECT * FROM comments WHERE comment_post_id = '{$the_post_id}' ";
                $query .= "AND comment_status = 'approved' ";
                $query .= "ORDER BY comment_id DESC ";
                $select_comment_query = mysqli_query($connection, $query);

                if(!$select_comment_query)
                {
                    die('Query Failed'.mysqli_error($connection));

                }

                while($row = mysqli_fetch_array($select_comment_query))
                {
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];
                    
 
                ?>

                    <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                    </div>

                <?php } ?>


                <!-- Comment -->
                <!-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div> -->

                <!-- Comment -->
                
            
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                    

                <?php
                
                        if(isset($_POST['submit']))
                        {
                            $search = $_POST['search'];

                            $query = " SELECT * FROM posts WHERE post_tags LIKE '%$search' ";
                            $search_query = mysqli_query($connection,$query);

                            if(!$search_query)
                            {
                                die("fail" .mysqli_error($connection));
                            }

                            $count = mysqli_num_rows($search_query);

                            if($count == 0)
                            {
                                echo "NO RESULT";
                            }

                            else
                            {
                                echo "SOME RESULT";
                            }
                        }
                    

                ?>
                

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <?php include  "includes/sidebar.php" ?> 

                <!-- Side Widget Well -->
                <?php include  "includes/widget.php" ?>
                
            </div>

        </div>
        <!-- /.row -->

        <hr>
<!-- footer -->
<?php

include "includes/footer.php"

?>
