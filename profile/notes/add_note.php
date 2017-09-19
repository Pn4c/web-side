<?php include '../../languages/select_lang.php;' ?>
<html>
<body>
<form method="POST" action="<?php add_note(); ?>">
	<div class="input-group">
		<label for="input_title"><?php echo $lang['Add Note']; ?></label>
		<textarea type="text" class="form-control" name='note_content' placeholder="<?php echo $lang['Note']; ?>"></textarea>
		<button type='submit' name="add_note" class="btn btn-default btn-sm pull-right" style="margin:1% 0.5% 0px 0px;"><i class="fa fa-plus fa-lg"></i></button>
	</div>
</form>
</body>
</html>

<?php 
	function add_note(){
		include "../../static/database/database_connect.php";
		if (isset($_POST['add_note'])){
			
			$NickName = $_SESSION['NickName'];
			$NoteContent = $_POST['note_content'];
			$NoteDate = date('Y-m-d');
			
			$sql = "INSERT INTO `notes` (`UserNickName`, `Content`, `Date`) VALUES ('$NickName', '$NoteContent' , '$NoteDate')";
			$result = mysqli_query($db, $sql);
			
			header("location:notes.php");
		}
	}
?>
