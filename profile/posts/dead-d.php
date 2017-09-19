<div class="panel-group" id="panel-group">
	<div class="panel panel-default" style="border:0px;">
		<form method="POST">
			<button style="background:rgba(0,0,0,0);border:0px;" type="submit" class="btn btn-danger pull-right" name="delete-post-button" value=""><i class="fa fa-times fa-2x" aria-hidden="true"></i></button>
			<input type="hidden" name="postID" value="<?php echo $each_data['ID'] ?>">
		</form>
		<?php $date = strtotime($each_data['Date']) ?>
		<div class="panel-heading" style="background-color: rgba(71,71,65,0.9);"><?php echo $each_data['Title']  . " - " . date('H:i', $date); ?></div>
		<div class="panel-body" style="padding:0px 0px 0px 0px;color:rgba(0,0,0,1);background-color: rgba(71,71,65,0.5);"><div style="background:rgba(255,255,255,0.5);"><?php echo $each_data['Content']; ?></div></div>
		<div class="panel-footer" style="text-align:right; background-color: rgba(71,71,65,0.5);"><?php echo date('Y-m-d', $date); ?></div>
	</div>
</div>
