<?php header('Content-type: text/css; charset: UTF-8 '); ?>

h3,h6 {
    text-align: center;
}
header{
	color: black;
	font-family: verdana;
	font-size: 12px;
	font-weight: 200;
    border-bottom: 1px solid #ddd;
}
#button_myprofile{
    font-family: verdana;
	font-size: 12px;
	font-weight: 200;
	top: 0px;
	color: black;
	border: 1px solid #ddd;
}
#button_myprofile:hover{
	-webkit-animation: button_myprofile 1s 1 ;
	background:rgba(0,0,0,0.1);
}
@-webkit-keyframes button_myprofile {
	 from {
   		background:rgba(255,255,255,1);
  	 }

	to {
		background:rgba(0,0,0,0.1);
	}
}