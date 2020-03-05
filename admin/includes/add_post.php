<form action="" method="" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" name="title" class="form-control">
</div>


<div class="form-group">
    <label for="post_category">Post Category Id</label>
    <input type="text" name="post_category_id" class="form-control">
</div>

<div class="form-group">
    <label for="post_category">Post Author</label>
    <input type="text" name="post_author" class="form-control">
</div>


<!-- <div class="form-control">
    <label for="post_category">Post Author</label>
    <input type="text" name="author" class="form-control">
</div> -->


<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status">
</div>


<div class="form-group">
    <label for="post_image">Post Images</label>
    <input type="file" name="image">
</div>


<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
</div>


<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>


<div class="form-group">
    <input type="submit" value="Publish Post" name="create_post" class="btn btn-primary">
</div>

</form>