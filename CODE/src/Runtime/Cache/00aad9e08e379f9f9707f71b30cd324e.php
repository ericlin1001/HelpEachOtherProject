<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<link rel="stylesheet" type="text/css" href="__ROOT__/Public/dist/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="__ROOT__/Public/css/Index_index.css"/>
		<script src="__ROOT__/Public/js/jquery-2.0.2.js"></script>
		<script type="text/javascript" src="__ROOT__/Public/dist/js/bootstrap.js"></script>
		<script src="__ROOT__/Public/js/Index_index.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				init_list(<?php echo (($count["0"]["count"])?($count["0"]["count"]):0); ?>,<?php echo (($user_count["0"]["count"])?($user_count["0"]["count"]):0); ?>,<?php echo (($message_count["0"]["count"])?($message_count["0"]["count"]):0); ?>,<?php echo (($ranking_count["0"]["count"])?($ranking_count["0"]["count"]):0); ?>,"<?php echo ($panel); ?>");
			});
		</script>
	</head>
	<body>
		<div>
			<nav class="navbar navbar-default my_nav" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="../Index/index">SYSU HEO</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			<li class="active"><a href="../Index/index">Home</a></li>
			<li><a href="#">User Center</a></li>
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Function<b class="caret"></b></a>
			<ul class="dropdown-menu">
			<li><a class="displayPoseTaskForm" href="#">Pose Task</a></li>
			<li><a class="displayViewTaskForm" href="#">View Task</a></li>
			<li><a class="displaySearchUserForm" href="#">Search User</a></li>
			<li><a class="displayMessageForm" href="#">View Message</a></li>
			<li><a class="displayRankingForm" href="#">View Ranking</a></li>
			<li class="divider"></li>
			<li><a class="displaySubmissForm" href="#">Submiss</a></li>
			<li><a class="displayFeedbackForm" href="#">Feedback Us</a></li>
			</ul>
			</li>
			</ul>
			<form class="navbar-form navbar-left" role="search" method="post" action="__ROOT__/index.php/Task/viewTask">
			<div class="form-group">
			<input type="hidden" name="type" value="all_type" placeholder="Search">
			<input type="hidden" name="status" value="all_status" placeholder="Search">
			<input type="text" class="form-control" name="key" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Search Task</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><?php echo ($_SESSION["username"]); ?></a></li>
			<li><a href="#"><?php echo ($_SESSION["gpp"]); ?></a></li>
			<li><a id="logout" href="#">Logout</a></li>
			</ul>
			</div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<div class="sidebar-nav">
					<ul class="nav nav-pills nav-stacked">
					<li class="nav-li"><a class="displayPoseTaskForm" href="#">Pose Task</a></li>
					<li class="nav-li"><a class="displayViewTaskForm" href="#">View Task</a></li>
					<li class="nav-li"><a class="displaySearchUserForm" href="#">Search User</a></li>
					<li class="nav-li"><a class="displayMessageForm" href="#">View Message</a></li>
					<li class="nav-li"><a class="displayRankingForm" href="#">View Ranking</a></li>
					<li class="nav-li"><a class="displaySubmissForm" href="#">Submiss</a></li>
					<li class="nav-li"><a class="displayFeedbackForm" href="#">Feedback Us</a></li>
					</ul>
					</div>
				</div>
				<div id="div1" class="col-lg-6">
					<div class="poseTask_div list_div">
						<div>
						<form method="post" action="../Task/poseTask" class="form-horizontal">
							<div class="form-group">
							<label class="control-label col-sm-2">Title&nbsp&nbsp</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="title" require>
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-sm-2">Desp</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="description">
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-sm-2">Type</label>
							<div class="col-sm-10">
							<select name="type" class="form-control"/>
								<option value="Fetch the express">Fetch the express</option>
								<option value="Pack a meal">Pack a meal</option>
							</select>
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-sm-2"> Available Time</label>
							<div class="col-sm-10">
							<input type="datetime-local" id="availabletime" step="1" name="availabletime"/>
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-sm-2"> Accomplish Time</label>
							<div class="col-sm-10">
							<input type="datetime-local" id="accomplishtime" step="1" name="accomplishtime"/>
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-sm-2 ">Receiver Gender</label>
							<div class="col-sm-10">
							<div class="radio">
							<label>
							<input type="radio" name="rgender" value="m" checked="checked"/>
							Male
							</label>
							</div>
							<div class="radio">
							<label>
							<input type="radio" name="rgender" value="f" />
							Female
							</label>
							</div>
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-sm-2">GPP</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="taskgpp" value="0"/>
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-sm-2">Note</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" name="note"/>
							</div>
							</div>
							<?php
 echo '<input type="hidden" name="pid" value="'.$_SESSION["uid"].'"/>'; ?>
							<button class="btn btn-lg btn-warning btn-block" type="submit">Pose Task</button>
						</form>
						</div>
					</div>
					<div class="task_div list_div">
						<form method="post" action="__ROOT__/index.php/Task/viewTask" class="form-horizontal">
							<div class="form-group">
							<label class="control-label col-sm-2">Type</label>
							<div class="col-sm-10">
							<select name="type" class="form-control">
								<option value="all_type">All Type</option>
								<option value="Fetch the express">Fetch the express</option>
								<option value="Pack a meal">Pack a meal</option>
							</select>
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-sm-2">Search Key</label>
							<div class="col-sm-10">
							<input type="text" name="key" class="form-control"/>
							</div>
							</div>
							<div class="form-group">
							<label class="control-label col-sm-2">Status</label>
							<div class="col-sm-10">
							<select name="status" class="form-control">
								<option value="all_status">All Status</option>
								<option value="New Pose">New Pose</option>
								<option value="Received">Received</option>
								<option value="Accomplished">Accomplished</option>
								<option value="Excess Available">ExcessAvailable</option>
								<option value="Excess Accommplish">ExcessAccomplish</option>
							</select>
							</div>
							</div>
							<button class="btn btn-lg btn-success btn-block" type="submit" name="viewTask" value="View Task">View Task</button>
							<button class="btn btn-lg btn-info btn-block" type="submit" name="viewTask" value="View My Pose Task">My Posed Task</button>
							<button class="btn btn-lg btn-warning btn-block" type="submit" name="viewTask" value="View My Received Task">My Received Task</button>
						</form>
						<?php
 R('Display/task_list',array($count,$data)); ?>
					</div>
					<div class="user_div list_div">
					<form method="post" action="../Task/searchUser" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-2">Search Key</label>
							<div class="col-md-10">
							<input type="text" class="form-control" id="user" name="user" value="" placeholder="Search"/>
							</div>
						</div>
							<button class="btn btn-lg btn-info btn-block" type="submit">Search User</button>
					</form>
					<?php
 R('Display/user_list',array($user_count,$user)); ?>
					</div>
					<div class="message_div list_div">
					<p id="p_new_message">You have new message</p>
					<?php
 R('Display/message_list',array($message_count,$message)); ?>
					</div>
					<div class="ranking_div list_div">
					<?php
 R('Display/ranking_list',array($ranking_count,$ranking)); ?>
					</div>
					<div class="submiss_div list_div">
						<form method="post" action="../Submiss/submiss" class="form-horizontal">
							<label class="control-label">Please input your articles</label>
							<textarea shape="circle" name="subcontent" rows="10" class="form-control"/></textarea>
							<button class="btn btn-lg btn-primary" type="submit">Submiss</button>
						</form>
					</div>
					<div class="feedback_div list_div">
					<form method="post" action="../Feedback/feedback" class="form-horizontal">
						<label class="control-label">Please input your advice</label>
						<textarea shape="circle" name="content" rows="10" class="form-control"/></textarea>
						<button class="btn btn-lg btn-info" type="submit">Feedback</button>
					</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					&times;
					</button>
						<h3>Welcome to SYSU HEO</h3>
					</div>
					<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					&times;
					</button>
						<h3>The more I help others to succeed, the more I succeed.</h3>
					</div>
					<div class="alert alert-info alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					&times;
					</button>
						<h3>True happiness comes from helping others.</h3>
					</div>
					<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					&times;
					</button>
						<h3>We make a living by what we get, but we make a life by what we give.</h3>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>