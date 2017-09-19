<?php header("Content-type: text/css; charset: UTF-8"); ?>

#posts-head{
	font-family: verdana;
	font-size: 15px;
	font-weight: 200;
	background-color: #2e353d;
	top: 0px;
	border: 0px solid #2e353d;
	box-shadow: 5px 5px 50px #2e353d;
}
#notes{
	font-family: verdana;
	font-size: 12px;
	font-weight: 200;
	background-color: #2e353d;
	top: 0px;
	border: 0px solid #2e353d;
	box-shadow: 5px 5px 50px #2e353d;
}
@-webkit-keyframes ah {
	 from {
    margin-top: -10%;
	opacity:0;
  }

  to {
    margin-top: 0%;
opacity:1;
  }
}

@-webkit-keyframes right-panel {
	 from {
   		background:rgba(255,255,255,1);
  	 }

	to {
		background:rgba(0,0,0,0.1);
	}
}

#right-panel:hover{
	-webkit-animation: right-panel 1s 1 ;
	background:rgba(0,0,0,0.1);
}