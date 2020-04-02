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
                
                    $query = "SELECT * FROM posts ORDER BY post_date DESC; ";
                    $select_all_post_query = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_post_query))
                    {

                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'],0,100);
                        $post_status = $row['post_status'];

                        if(strtolower($post_status) == 'published')
                        {
                            
                        
                ?>
                        <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    </a>
                    
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <a class="btn btn-success" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                        

                   <?php } } ?>


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
