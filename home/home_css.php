<?php header('Content-type: text/css; charset: UTF-8'); ?>

body{

}
#each-note{
	/*animation: roll 0s infinite;*/
	background-color:rgba(25,114,164,0.7);
	border:0px;
}
#delete-note-button:hover, #delete-notif-button:hover{
	-webkit-animation: fadeout 1s 1;
	background-color:#C02727;
}
#update-post-button{
	color:black;
	background:rgba(255,255,255,1);
	border:0px;
	border-radius:0px 0px 0px 0px;
	margin:0px 1% 0px 0px;
}
#update-post-button:hover{
	-webkit-animation: fadeout2 1s 1;
	background-color:#22EAAA;
}
@-webkit-keyframes fadeout2 {
	 from {
		background-color:rgba(255,255,255,1);
  	 }

	to {
		background-color:#22EAAA;
	}
}
@keyframes roll {
  0% {
	transform: rotate(0deg);
  }
  5% {
	transform: rotate(3deg);
  }
  10% {
	transform: rotate(-3deg);
  }
  15% {
	transform: rotate(3deg);
  }
  20% {
	transform: rotate(0deg);
  }
  100% {
	transform: rotate(0deg);
  }

}
#each-notif{
	-webkit-animation: roll 5s infinite;
	background-color:rgba(226,62,87,0.7);
	border:0px;
}
@-webkit-keyframes fadeout {
	 from {
		background-color:rgba(255,255,255,1);
  	 }

	to {
		background-color:#C02727;
	}
}
#a-text:hover, #a-name:hover{
	-webkit-animation: a-text 1s 1;
}
@-webkit-keyframes a-text {
	0% {
		transform: translateY(0%);
	}
	50%{
		transform: translateY(-5%);
	}
	100% {
		transform: translateY(0%);
  	}
}