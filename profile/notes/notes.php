<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/navbar-fixed-side.css" rel="stylesheet" />
<?php session_start(); ?>
<?php include 'notes_actions.php';?>
<?php include '../../languages/select_lang.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head> 
        <title>Y4X0rt</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href='notes_css.php' rel='stylesheet' type='text/css'>
        
</head>
<body>
    
<div class="container-fluid" style="background-color:rgba(0,0,0,0.5);">
	<header style="box-shadow: 5px 5px 50px #2e353d;">
		<div class="hidden-xs bg-default " style="opacity: 1;">
			<div class="row">
				<div class="col-md-2 col-md-offset-5">			
					<div class="brand" style="opacity:1;"><img style="width:140px;height:140px;margin:30px;" src="/static/images/person.png"></div>
					<h3 style="opacity: 1;"><?php echo $_SESSION['NickName'];?></h3>
					<h6 style="opacity: 1;"><?php echo $_SESSION['Email']; ?></h6>
				</div>
			</div>
		</div>
	</header>
	<br /><br />

	<div class="col-md-3">

		<div class="panel panel-default pull-left" id="sidenavbar-menu" style="width:90%;margin:10% 0px 3% 0px;">
			<div class="panel-body" id="right-panel" style="border:1px solid rgba(0,0,0,0.1);" onclick="location.href='../../home/home.php'" style="text-align:left;">
                <i class="fa fa-home fa-lg"></i> <?php echo $lang['Home']; ?></div>
			<div class="panel-body" id="right-panel" style="border:1px solid rgba(0,0,0,0.1);" onclick="location.href='../../profile/profile.php'">
                <i class="fa fa-user fa-lg"></i> <?php echo $lang['Profile']; ?></div>
			<div class="panel-body" id="right-panel" style="border:1px solid rgba(0,0,0,0.1);" onclick="location.href='../notes/notes.php'" >
                <span class="glyphicon glyphicon-tasks"></span> <?php echo $lang['Notes']; ?></div>
			<div class="panel-body" id="right-panel" style="border:1px solid rgba(0,0,0,0.1);" style="text-align:left;">
                <span class="glyphicon glyphicon-pencil"></span> <?php echo $lang['Edit Profile']; ?></div>
			<div class="panel-body" id="right-panel" style="border:1px solid rgba(0,0,0,0.1);">
                <span class="fa fa-gear fa-lg"></span> <?php echo $lang['Settings']; ?></div>
		</div>
        
	</div>
	
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-9">
				<?php include "add_note.php" ?>			
			</div>
		</div>
		<?php 
		$NickName = $_SESSION['NickName'];

		//connect database
		include "../../static/database/database_connect.php";
		$sql = "SELECT * FROM notes WHERE UserNickName='$NickName' AND State='0' ORDER BY id DESC";
		$result = mysqli_query($db, $sql);
		
		echo '<div class="row"><div class="col-md-4"><label for="input_title">'. $lang['Notes'] .'</label></div></div>';
	
		if(mysqli_num_rows($result) >= 1){
			$counter=0;
			echo '<div class="row">';
			while($each_data = mysqli_fetch_assoc($result)){
				$noteID = $each_data['ID']
					?>
					<div class="col-md-9">
						<form class='delete-post' method='POST' action='<?php tickNote() ?>'>
						 <div class="panel-group">
							<div class="panel panel-default">
								<input type="hidden" value="<?php echo $noteID; ?>" name='noteID'>
								<button type='submit' name="tick_note" class="btn btn-default btn-sm pull-right" style="margin:1% 0.5% 0px 0px;"><i class="glyphicon glyphicon-ok"></i></button>
								<div class="panel-footer" style="text-align:left;"><?php echo $each_data['Date']; ?></div>		            				
								<div class="panel-body"><?php echo $each_data['Content']; ?></div>							
							 </div>
						 </div>
						</form>

					</div>
				<?php
				
				$counter = $counter + 1;
			}
			echo '</div>';
		}
		else{
			echo 'No note yet';
		}
		?>
		

		<?php 
		$NickName = $_SESSION['NickName'];

		//connect database
		include "../../static/database/database_connect.php";
		$sql = "SELECT * FROM notes WHERE UserNickName='$NickName' AND State='1' ORDER BY id DESC";
		$result = mysqli_query($db, $sql);
		
		echo '<div class="row"><div class="col-md-4"><label for="input_title">'. $lang['You Have Already Done'] .'</label></div></div>';
	
		if(mysqli_num_rows($result) >= 1){
			$counter=0;
			echo '<div class="row">';
			while($each_data = mysqli_fetch_assoc($result)){
				$noteID = $each_data['ID']
					?>
					<div class="col-md-9">
						<form class='delete-post' method='POST' action='<?php deleteNote() ?>'>
						 <div class="panel-group">
							<div class="panel panel-danger">
								<input type="hidden" value="<?php echo $noteID; ?>" name='noteID'>
								<button type='submit' name="delete_note" class="btn btn-default btn-sm pull-right" style="margin:1% 0.5% 0px 0px;"><i class="glyphicon glyphicon-remove"></i></button>
								<button type='submit' name="re_note" class="btn btn-default btn-sm pull-right" style="margin:1% 0.5% 0px 0px;"><i class="glyphicon glyphicon-repeat"></i></button>
								<div class="panel-heading" style="text-align:left;"><?php echo $each_data['Date']; ?></div>		            				
								<div class="panel-body"><?php echo $each_data['Content']; ?></div>							
							 </div>
						 </div>
						</form>

					</div>
				<?php
				
				$counter = $counter + 1;
			}
			echo '</div>';
		}
		
		?>

	</div>
	
</div>	
</body>
</html>
