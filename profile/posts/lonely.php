<div class="panel-group" id="panel-group">
	<div class="panel panel-default" style="background-size: 100% 100%; background-image:url('../../static/images/lonely.jpg');border:0px;">
		<div class="panel-heading pull-right" id="header-nickname" style="background-color: rgba(205,201,199,0.01);"><kbd><?php echo $each_data['UserNickName']; ?></kbd></div>
		<?php $date = strtotime($each_data['Date']) ?>
		<div class="panel-heading" style="background-color: rgba(205,201,199,0.9);"><?php echo $each_data['Title']  . " - " . date('H:i', $date); ?></div>
		<div class="panel-body" style="padding:3% 0px 3% 20%;color:rgba(0,0,0);background-color: rgba(205,201,199,0.1);"><div style="box-shadow:0px 0px 50px #FFFFFF;background:rgba(255,255,255,0.5); border-radius:8px;padding:5% 5% 5% 5%;margin:0px 5% 0px 0px;"><?php echo $each_data['Content']; ?></div></div>
		<div class="panel-footer" style="text-align:right; background-color: rgba(205,201,199,0.5);"><?php echo date('Y-m-d', $date); ?></div>
	</div>
</div>
