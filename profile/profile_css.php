<?php header('Content-type: text/css; charset: UTF-8'); ?>

body{
	
}
#sidenavbar-menu{
	font-family: verdana;
	font-size: 12px;
	font-weight: 200;
	background-color: #2e353d;
	top: 0px;
	color: #e1ffff;
	border: 0px solid #2e353d;
}
#right-panel:hover{
	-webkit-animation: right-panel 1s 1 ;
	background:rgba(0,0,0,0.1);
}
@-webkit-keyframes right-panel {
	 from {
   		background:rgba(255,255,255,1);
  	 }

	to {
		background:rgba(0,0,0,0.1);
	}
}
#update-post-button{
	color:black;
	background:rgba(255,255,255,1);
	border:0px;
	border-radius:0px 0px 10px 10px;
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
#delete-post-button{
	color:black;
	background:rgba(255,255,255,1);
	border:0px;
	border-radius:0px 0px 0px 10px;
}
#delete-post-button:hover,#delete-note-button:hover{
	-webkit-animation: fadeout 1s 1;
	background-color:#C02727;
}
@-webkit-keyframes fadeout {
	 from {
		background-color:rgba(255,255,255,1);
  	 }

	to {
		background-color:#C02727;
	}
}
#each-note{
	/*animation: roll 0s infinite;*/
	background-color:rgba(25,114,164,0.7);
	border:0px;
}
a{
	text-decoration: none !important;
}
#profil-header{
	-webkit-animation: profil-header 1s 1;
	transform: translateY(0%);
}
@-webkit-keyframes profil-header {
	 from {
		transform: translateY(-50%);
  	 }

	to {
		transform: translateY(0%);
	}
}
