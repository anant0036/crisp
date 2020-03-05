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

                    echo "<li><a href='#'>{$cat_title}</a></li>";
                }
            ?>
                </ul>
                </div>
        <!-- /.col-lg-6 -->
        
        <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
</div>