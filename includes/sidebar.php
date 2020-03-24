<div class="well">

            <?php
                
                $query = "SELECT * FROM categories";
                $select_all_categories_sidebar = mysqli_query($connection,$query);

                

            ?>

    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

            <?php
            while($row = mysqli_fetch_assoc($select_all_categories_sidebar))
                {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    
                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                }
            ?>
                </ul>
                </div>
        <!-- /.col-lg-6 -->
        
        <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
</div>


<!-- login -->
<div class="well">

<h4>login</h4>
<form action="includes/login.php" method="post">

<div class="form-group">
    <input name="username" type="text" class="form-control" placeholder="Enter Username">
</div>
<div class="form-group">
    <input name="password" type="password" class="form-control" placeholder="Enter Password">
</div>

<span class="input-group-btn">
    <button class="btn btn-success" name="login" type="submit">Submit</button>
</span>


</form>

</div>