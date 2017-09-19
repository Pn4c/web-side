<div class="navbar navbar-default navbar-fixed-top tab" style="background:rgba(255,255,255,1); position:fixed;top:0px;width:100%;">
	<div class="col-md-1 col-xs-1">
		<div onclick="location.href='/home/home.php';" style="cursor: pointer;">
			<p id="app-logo" style="margin:0px 0px;"><img style="height:5%;" src="../static/images/pn4c-logo2.png" /></p>
		</div>
	</div>

	<div class="col-md-6 col-md-offset-1 col-xs-3 col-xs-offset-1">
		<form class="navbar-form" method="POST">
				<div class="form-inline">
				<input type="text" style="border:0px;border-bottom:1px solid #ddd;border-radius:0px;" style="width:50%;" name="search_nickname" class="form-control pull-left" placeholder="<?php echo $lang['Search']; ?>">

				<button type="submit" style="border:0px;" name="search_button" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
				</div>
		</form>
	</div>

	<div class="col-md-2 col-xs-3">
		<form action="/settings/settings.php"><button class="btn btn-default pull-right" type="submit" style="border:0px;"><span style="font-size:1.2em;" class="glyphicon glyphicon-cog"></span></button></form>
		<form action="/profile/profile.php"><button class="btn btn-default pull-right" type="submit" style="border:0px;"><span style="font-size:1.2em;" class="glyphicon glyphicon-user"></span></button></form>
		<form action="/home/home.php"><button class="btn btn-default pull-right" type="submit" style="border:0px;"><span style="font-size:1.2em;" class="glyphicon glyphicon-home"></span></button></form>
	</div>
		<form method="POST" ><button onclick="<?php logout(); ?>" class="btn btn-default pull-right" type="submit" name="logout-button" style="border:0px;"><span style="font-size:1.2em;" class="glyphicon glyphicon-log-out"></span></button></form>
</div>

<?php
	
	function logout(){
		if (isset($_POST['logout-button'])){
			unset($_COOKIE['NickName']);
			header("location:/index.php");
		}
	}

?>