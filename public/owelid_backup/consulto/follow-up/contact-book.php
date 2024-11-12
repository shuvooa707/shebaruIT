<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Contact Book</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/bmscl">Home</a></li>
				<li class="breadcrumb-item"><a href="/bmscl/follow-up">Follow Up</a></li>
				<li class="breadcrumb-item active">Contact Book</li>
			</ol>
			<hr>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-user-plus fa-fw"></i> Add Contact</button>
	<br><br>
	<div class="row">
		<?php $end=50;
		for($i=0;$i<$end;$i++){
		?>
		<div class="col xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="panel panel-default panel-border">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-3">
							<img style="height:70px" class="img-circle" src="../img/contact-default.png" alt="">
						</div>
						<div class="col-xs-9">
							<h4><a href="">Salah Uddin</a></h4>
							<span><i class="fa fa-mobile fa-fw"></i> <a href="tel:01778333300">01778333300</a></span><br>
							<span><i class="fa fa-mobile fa-fw"></i> <a href="tel:01778333300">01778333300</a></span><br>
							<span><i class="fa fa-at fa-fw"></i> <a href="mailto:salahuddin@bmscl.com.bd">salahuddin@bmscl.com.bd</a></span><br>
							<span><i class="fa fa-map-marker fa-fw"></i>Dhaka, Bangladesh</span>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<ul class="list-inline">
						<li><a href="#"><i class="fa fa-bell fa-fw"></i>12 Notifications</a></li>
						<li><a href="#"><i class="fa fa-group fa-fw"></i>54 Followers</a></li>
						<li><a href="#"><i class="fa fa-twitter fa-fw"></i>Retweet</a></li>
					</ul>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
	<!-- Modal -->
	<div id="add" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Contact</h4>
				</div>
				<div class="modal-body">			
					<div class="form-group">
						<label for="">Phone No.</label>
						<input type="text" name="phone" class="form-control" placeholder="Enter Phone No.">
					</div>
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" class="form-control" placeholder="Enter student's name">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="text" class="form-control" placeholder="Password">
					</div>
				</div>
				<div class="modal-footer">			
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save Contact</button>
				</div>
			</form>
		</div>

	  </div>
	</div>
<!-- /#page-wrapper -->
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../footer.php'); ?>