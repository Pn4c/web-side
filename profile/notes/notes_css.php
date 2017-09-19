<?php header('Content-type: text/css; charset: UTF-8'); ?>

body{
	background-image: url("../../static/images/pn4c_arka.png");
	background-attachment:fixed;
}
h3,h6 {
    text-align: center;
}
header{
	background-color: #2e353d;
	color: #e1ffff;
	font-family: verdana;
	font-size: 12px;
	font-weight: 200;
}
#sidenavbar-menu{
	font-family: verdana;
	font-size: 12px;
	font-weight: 200;
	background-color: #2e353d;
	top: 0px;
	color: #e1ffff;
	border: 0px solid #2e353d;
	box-shadow: 5px 5px 50px #2e353d;
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
