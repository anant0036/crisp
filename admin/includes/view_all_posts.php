<table class="table table-bordered table-hover">
        <thead>
        
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        </thead>

        <tbody>

        <?php
        
            $query = "SELECT * FROM posts";
            $select_posts = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_posts))
            {
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_date = $row['post_date'];

                echo "<tr>";

                echo "<td>{$post_id}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_title}</td>";
                
                $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                $select_categories_id = mysqli_query($connection,$query);
    
                while($row = mysqli_fetch_assoc($select_categories_id))
                {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                
                    echo "<td>{$cat_title}</td>";
                }
                
                

                echo "<td>{$post_status}</td>";
                echo "<td><img width='100px' src='../images/$post_image' alt='image'></td>";
                echo "<td>{$post_tags}</td>";
                echo "<td>{$post_comment_count}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td><a href='post.php?source=edit_post&p_id={$post_id}'>EDIT</a></td>";
                echo "<td><a onClick=\" return confirm('After this DATA will be no more ARE YOU SURE!'); \" href='post.php?delete={$post_id}'>Delete</a></td>";


                echo "</tr>";

            }

        ?>

        <!-- <tr>
            <td>10</td>
            <td>bhushan</td>
            <td>boot</td>
            <td>boot</td>
            <td>ststus</td>
            <td>omagwes</td>
            <td>text</td>
            <td>comment</td>
            <td>56-56</td>
        </tr> -->
        </tbody>
</table>

<?php

if(isset($_GET['delete']))
{
    $the_post_id = $_GET['delete']; 
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location:  post.php");

}

?>