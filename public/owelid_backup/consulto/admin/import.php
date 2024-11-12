<?php
/*
#Admin
*/
?>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Import Data</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	
	
	<a href="<?php echo APP_PATH; ?>import/update_course.php" class="btn btn-primary">Update Courses</a>
	<a href="<?php echo APP_PATH; ?>import/import_pro.php" class="btn btn-primary">Add New Courses</a>
	<a href="<?php echo APP_PATH; ?>import/import_uni.php" class="btn btn-primary">Add Universities</a>
</div>
<!-- /#page-wrapper -->


<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../footer.php'); ?>