<?php require_once("../header.php"); ?>
 <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Open New File </h1>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
	<div style="padding-bottom:20px" class="text-info">
		<span class="compulsory">*</span> <i>Denotes compulsory fields.</i>
	</div>

	<div class="row">
		
		<div class="col-lg-8">
			<div class="form-group">
				<label>Student Name <span class="compulsory">*</span></label>
				<input class="form-control" type="text" name="student" placeholder="Please type the student name">
			</div>
			<div class="form-group">
				<label>University <span class="compulsory">*</span></label>
				<input class="form-control" type="text" name="university" placeholder="Please type the university name">
			</div>
			<div class="form-group">
				<label>Course <span class="compulsory">*</span></label>
				<input class="form-control" type="text" name="course" placeholder="Please type the course name">
			</div>
			<div class="form-group">
				<label>Email Address</label>
				<input class="form-control" type="text" name="email" placeholder="someone@email.com">
			</div>
			<div class="form-group">
				<label>Mobile No. <span class="compulsory">*</span></label>
				<input class="form-control" type="text" name="mobile" placeholder="01XXXXXXXXX">
			</div>
			<div class="form-group">
				<label>Passport No.</label>
				<input class="form-control" type="text" name="mobile" placeholder="XXXXXXXXX">
			</div>
			<label>EMGS Payment</label>
			<div class="form-group input-group">
				<span class="input-group-addon">BDT</span>
				<input class="form-control" placeholder="00000" type="text">
				<span class="input-group-addon">RM 2800</span>
			</div>
		</div>
		<!-- /.col-lg-8 -->
		<div class="col-lg-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-bell fa-fw"></i> Notifications Panel
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="list-group">
						<a href="#" class="list-group-item">
							<i class="fa fa-comment fa-fw"></i> New Comment
							<span class="pull-right text-muted small"><em>4 minutes ago</em>
							</span>
						</a>
						<a href="#" class="list-group-item">
							<i class="fa fa-twitter fa-fw"></i> 3 New Followers
							<span class="pull-right text-muted small"><em>12 minutes ago</em>
							</span>
						</a>
						<a href="#" class="list-group-item">
							<i class="fa fa-envelope fa-fw"></i> Message Sent
							<span class="pull-right text-muted small"><em>27 minutes ago</em>
							</span>
						</a>
						<a href="#" class="list-group-item">
							<i class="fa fa-tasks fa-fw"></i> New Task
							<span class="pull-right text-muted small"><em>43 minutes ago</em>
							</span>
						</a>
						<a href="#" class="list-group-item">
							<i class="fa fa-upload fa-fw"></i> Server Rebooted
							<span class="pull-right text-muted small"><em>11:32 AM</em>
							</span>
						</a>
						<a href="#" class="list-group-item">
							<i class="fa fa-bolt fa-fw"></i> Server Crashed!
							<span class="pull-right text-muted small"><em>11:13 AM</em>
							</span>
						</a>
						<a href="#" class="list-group-item">
							<i class="fa fa-warning fa-fw"></i> Server Not Responding
							<span class="pull-right text-muted small"><em>10:57 AM</em>
							</span>
						</a>
						<a href="#" class="list-group-item">
							<i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
							<span class="pull-right text-muted small"><em>9:49 AM</em>
							</span>
						</a>
						<a href="#" class="list-group-item">
							<i class="fa fa-money fa-fw"></i> Payment Received
							<span class="pull-right text-muted small"><em>Yesterday</em>
							</span>
						</a>
					</div>
					<!-- /.list-group -->
					<a href="#" class="btn btn-default btn-block">View All Alerts</a>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
				</div>
				<div class="panel-body">
					<div id="morris-donut-chart"></div>
					<a href="#" class="btn btn-default btn-block">View Details</a>
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
			<div class="chat-panel panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-comments fa-fw"></i> Chat
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-chevron-down"></i>
						</button>
						<ul class="dropdown-menu slidedown">
							<li>
								<a href="#">
									<i class="fa fa-refresh fa-fw"></i> Refresh
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-check-circle fa-fw"></i> Available
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-times fa-fw"></i> Busy
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-clock-o fa-fw"></i> Away
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#">
									<i class="fa fa-sign-out fa-fw"></i> Sign Out
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<ul class="chat">
						<li class="left clearfix">
							<span class="chat-img pull-left">
								<img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
							</span>
							<div class="chat-body clearfix">
								<div class="header">
									<strong class="primary-font">Jack Sparrow</strong>
									<small class="pull-right text-muted">
										<i class="fa fa-clock-o fa-fw"></i> 12 mins ago
									</small>
								</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
								</p>
							</div>
						</li>
						<li class="right clearfix">
							<span class="chat-img pull-right">
								<img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
							</span>
							<div class="chat-body clearfix">
								<div class="header">
									<small class=" text-muted">
										<i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
									<strong class="pull-right primary-font">Bhaumik Patel</strong>
								</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
								</p>
							</div>
						</li>
						<li class="left clearfix">
							<span class="chat-img pull-left">
								<img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
							</span>
							<div class="chat-body clearfix">
								<div class="header">
									<strong class="primary-font">Jack Sparrow</strong>
									<small class="pull-right text-muted">
										<i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
								</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
								</p>
							</div>
						</li>
						<li class="right clearfix">
							<span class="chat-img pull-right">
								<img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
							</span>
							<div class="chat-body clearfix">
								<div class="header">
									<small class=" text-muted">
										<i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
									<strong class="pull-right primary-font">Bhaumik Patel</strong>
								</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
								</p>
							</div>
						</li>
					</ul>
				</div>
				<!-- /.panel-body -->
				<div class="panel-footer">
					<div class="input-group">
						<input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
						<span class="input-group-btn">
							<button class="btn btn-warning btn-sm" id="btn-chat">
								Send
							</button>
						</span>
					</div>
				</div>
				<!-- /.panel-footer -->
			</div>
			<!-- /.panel .chat-panel -->
		</div>
		<!-- /.col-lg-4 -->
	</div>
	<!-- /.row -->
</div>
        <!-- /#page-wrapper -->
<?php require_once("../footer.php"); ?>