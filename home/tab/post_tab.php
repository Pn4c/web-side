
<head>
	<link href='post_tab_css.php' rel='stylesheet' type='text/css'>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	
	<script>
		function openCityS(evt, cityName) {
			// Declare all variables
			var i, tabcontentS, tablinks;

			// Get all elements with class="tabcontentS" and hide them
			tabcontentS = document.getElementsByClassName("tabcontentS");
			for (i = 0; i < tabcontentS.length; i++) {
				tabcontentS[i].style.display = "none";
			}

			// Get all elements with class="tablinks" and remove the class "active"
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			// Show the current tab, and add an "active" class to the button that opened the tab
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";
		}
		
		function tab_image(){
			document.getElementById("tab-image-post").click();
		}
		
		function defaPost(){
			document.getElementById("tab-image-text").click();
		}
		
	</script>

</head>
<body>
	
	<br />
	
<div class="tab">
  <button class="tablinks" onclick="openCityS(event, 'Post-Text')" id="tab-image-text"><span class="glyphicon glyphicon-font"></span></button>
  <button class="tablinks" onclick="openCityS(event, 'Post-Image')" id="tab-image-post"><span class="glyphicon glyphicon-picture"></span></button>
  <button class="tablinks pull-right" onclick="openCityS(event, 'Add-Note')" id="tab-add-note"><span class="glyphicon glyphicon-plus"></span></button>
</div>
	
	
<div id="Post-Text" class="tabcontentS" >
		<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>" id="form-post" enctype="multipart/form-data">
		  
			<div class="form-group" >
			  <label for="input_title"><?php //echo $lang['Post Something']; ?></label>
			  <textarea type="text" class="form-control" id="fadeout" name="input_content" rows="5" id="input_content" placeholder="<?php echo $lang['Content']; ?>"></textarea>
			</div>

			<div class="form-group">	
				  <input type="text" class="form-control" id="input_title" placeholder="<?php echo $lang['Title']; ?>" name="input_title">
				  <select name="input_feeling" class="form-control" id="inlineFormCustomSelect">
					<option value="Successful"><?php echo $lang['Successful']; ?></option>
					<option value="Happy"><?php echo $lang['Happy']; ?></option>
					<option value="Sad"><?php echo $lang['Sad']; ?></option>
					<option value="Excited"><?php echo $lang['Excited']; ?></option>
					<option value="Dead"><?php echo $lang['Dead']; ?></option>
					<option value="Disappointed"><?php echo $lang['Disappointed']; ?></option>
					<option value="Lonely"><?php echo $lang['Lonely']; ?></option>
				 </select>
				  <input type="submit" class="btn btn-default" name="post_button" id="post_button" value="<?php echo $lang['Create Post']; ?>" style="float: right;">
					<br /><br />
			</div>

		</form>
</div>

<div id="Post-Image" class="tabcontentS">
		<form method="POST" id="form-post" enctype="multipart/form-data">

			<div class="form-group" >
			  <label for="input_title"><?php //echo $lang['Post Something']; ?></label>
		 		
				<?php
					if(isset($_FILES['fileToUpload']['name'])){

						$var  = '<img src="../uploads/' . $_FILES['fileToUpload']['name'] . '" style="width:100%;">'; 
						echo '
							<p style="color:white;" id="post-img"><img src="../uploads/'.$_FILES["fileToUpload"]["name"] .'"  style="width:100%;"></p>
							<p class="pull-right" style="" id="post-img">'. $_FILES["fileToUpload"]["name"] .'</p><br/><br />
						';
						?>
							<script>
							// Get the element with id="defaultOpen" and click on it
							document.getElementById("tab-image-post").click();
							</script>
						<?php
						
					}
				?>
				
				<div class="panel-heading" >
					<input type="file" onchange="this.form.submit();" style="display:none;" class="btn btn-default pull-right" name="fileToUpload" id="fileToUpload">
					<label class="pull-right" for="fileToUpload" style="color:white;"><i style="background-color:#ddd;" class="fa fa-file-image-o fa-2x" aria-hidden="true"></i><br /></label>
				</div>
				<?php 
					if(isset($_FILES['fileToUpload']['name'])){
						$_SESSION['Content'] = '/uploads/' . $_FILES['fileToUpload']['name']; 
					}
				?>
				
				<textarea type="text" class="form-control" id="fadeout" name="input_content" rows="5" id="input_content" placeholder="<?php echo $lang['Content']; ?>"></textarea>
			
				
			</div>

			<div class="form-group">	
				  <input type="text" class="form-control" id="input_title" placeholder="<?php echo $lang['Title']; ?>" name="input_title">
				  <select name="input_feeling" class="form-control" id="inlineFormCustomSelect">
					<option value="Successful"><?php echo $lang['Successful']; ?></option>
					<option value="Happy"><?php echo $lang['Happy']; ?></option>
					<option value="Sad"><?php echo $lang['Sad']; ?></option>
					<option value="Excited"><?php echo $lang['Excited']; ?></option>
					<option value="Dead"><?php echo $lang['Dead']; ?></option>
					<option value="Disappointed"><?php echo $lang['Disappointed']; ?></option>
					<option value="Lonely"><?php echo $lang['Lonely']; ?></option>
				 </select>
				  <input type="submit" class="btn btn-default" name="post_button_image" id="post_button" value="<?php echo $lang['Create Post']; ?>" style="float: right;">
					<br /><br />
			</div>

		</form>
</div>

<div id="Add-Note" class="tabcontentS" >
		<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>" id="form-post" >
		  
			<div class="form-group" >
			  <label for="input_title"><?php //echo $lang['Post Something']; ?></label>
			  <textarea class="form-control" id="fadeout" name="input_content" rows="5" id="input_content" placeholder="<?php echo $lang['Content']; ?>"></textarea>
			</div>

			<div class="form-group">	
				  <input type="submit" class="btn btn-default" name="add_note_button" id="post_button" value="<?php echo $lang['Add Note']; ?>" style="float: right;">
					<br /><br />
			</div>

		</form>
</div>


	
	<br />

</body>


<style>
body{
	background:white;
}
/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontentS {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
.tabcontentS {
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}
</style>