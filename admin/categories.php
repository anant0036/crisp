<?php  include "includes/admin_header.php";  ?>

<div id="wrapper">

<!-- Navigation -->

<?php  include "includes/admin_nav.php";  ?>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">WELCOME<small>BHUSHAN</small></h1>

<div class="col-xs-6">

<?php //CREATE 

    insert_categories();

?>

<form action="" method="post">
<label for="cat-title">Add Category</label>
<div class ="form-group">
<input type="text" class="form-control" name="cat_title" >
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="submit">
</div>


</form>

<!--UPDATE-->


<?php 

if(isset($_GET['edit']))
{
    $cat_id = $_GET['edit'];
    include "includes/update_categories.php";
} 

?>


</div>

<div class="col-xs-6">



<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Id</th>
<th>Category Title</th>
</tr>
</thead>

<tbody>
<tr>
    <?php
        //all caregiores
        findAllCategories();
    ?>

    <?php //DELETE

        deleteCategories();
    
    ?>

<!-- <td>Baseball</td>
<td>basketball</td> -->
</tr>
</tbody>

</table>

</div>

</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php  include "includes/admin_footer.php";  ?>