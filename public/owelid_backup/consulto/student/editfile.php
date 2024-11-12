<?php require_once("../header.php"); ?>
 <div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Existing File </h1>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


	<div style="padding-bottom:20px" class="text-info">
		<span class="compulsory">*</span> <i>Denotes compulsory fields.</i>
	</div>

	<div class="row">
		
		<div class="col-lg-8">
			<form>
			<fieldset class="form-group">
				<legend>Student Info</legend>
				<div class="form-group">
					<label>Student's Name <span class="compulsory">*</span></label>
					<input class="form-control" type="text" name="student" placeholder="Please type the student's name">
				</div>
				<div class="form-group">
					<label>Father's Name</label>
					<input class="form-control" type="text" name="father" placeholder="Please type the father's name">
				</div>
				<div class="row">
					<div class="col-lg-6 form-group">
						<label>Passport No.</label>
						<input class="form-control" type="text" name="mobile" placeholder="XXXXXXXXX">
					</div>
					<div class="col-lg-6 form-group">
						<label>Date of Birth</label>
						<input class="form-control" type="text" name="dob" placeholder="DD-MM-YYYY">
					</div>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<legend>Course Selection</legend>
				<div class="row">
					<div class="col-lg-6 form-group">
						<select class="form-control">
							<option value="">Select University</option>
							<option value="IIUM">International Islamic University Malaysia</option>
							<option value="UM">University of Malaya</option>
							<option value="UPM">University Putra Malaysia</option>
							<option value="UTM">University Technology Mara</option>
							<option value="MMU">Multimedia University</option>
						</select>
					</div>
					<div class="col-lg-6 form-group">
						<select class="form-control">
							<option value="">Level of Study</option>
							<option value="Ph.D">Ph.D</option>
							<option value="Masters">Masters</option>
							<option value="Bachelor">Bachelor</option>
							<option value="Diploma">Diploma</option>
							<option value="Foundation">Foundation</option>
							<option value="Certificate">Certificate</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>Subject of Study <span class="compulsory">*</span></label>
					<input class="form-control" type="text" name="course" placeholder="Please type the course name">
				</div>
			</fieldset>	
			<fieldset class="form-group">
				<legend>Contact Info</legend>
				<div class="row">	
					<div class="col-lg-6 form-group">
						<label>Mobile No. <span class="compulsory">*</span></label>
						<input class="form-control" type="text" name="mobile" placeholder="01XXXXXXXXX">
					</div>
					<div class="col-lg-6 form-group">
						<label>Alternative Contact</label>
						<input class="form-control" type="text" name="mobile2" placeholder="01XXXXXXXXX">
					</div>
				</div>
				<div class="form-group">
					<label>Email Address</label>
					<input class="form-control" type="text" name="email" placeholder="someone@email.com">
				</div>
				<div class="row">
					<div class="col-lg-6 form-group">
						<label>Current Address</label>
						<textarea class="form-control" rows="3" name="currentAddress"></textarea>
					</div>
					<div class="col-lg-6 form-group">
						<label>Permanent Address <button type="button" class="btn btn-xs btn-info" id="sameAddress">Same</button></label>
						<textarea class="form-control" rows="3" name="permanentAddress"></textarea>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Payment</legend>
				<div class="form-group" id="history" style="background:#EEE;padding:10px;">
					<h4>Total Payable: RM 17800</h4>
					<ul>
						<li>1st Payment (EMGS): RM 2800</li>
						<li>2nd Payment (Misc & Tuition Fee): RM 15000</li>
					</ul>
					<hr>
					<h4>Total Paid: RM 2800 = BDT 53284.19</h4>
					<ul>
						<li>Paid @ 1 Jan, 2017: RM 2631.58 * 19 = BDT 50000</li>
						<li>Paid @ 2 Jan, 2017: RM 168.42 * 19.5 = BDT 3284.19</li>
					</ul>
					<hr>
					<h4>Amount Due: RM 15000 = BDT 285000 (Approximately)</h4>
				</div>
				<button type="button" class="btn btn-xs btn-info" id="showHistory" style="margin-bottom:10px">Payment History</button><br>
				
				<label>Amount</label>
				<div class="form-inline">
					<div class="input-group">
						<span class="input-group-addon">BDT</span>
						<input class="form-control" id="amountBDT" placeholder="00000" type="text">	
					</div>
					<span style="padding:0 20px">/</span>
					<div class="input-group">
						<input class="form-control" id="ex_rate" type="text" value="19">
						<span class="input-group-addon" id="amountRM">RM 0</span>
					</div>
					<p class="help-block"><i>The balance payment <b>RM 9736.84</b> should be adjusted in next payment.</i></p>
				</div>
				
			</fieldset>
			<button type="submit" name="submit" class="btn btn-info" style="margin-top:20px;width:100%"><i class="fa fa-save"></i> Save</button>
			</form>
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