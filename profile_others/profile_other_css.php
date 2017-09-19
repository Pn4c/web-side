<?php header('Content-type: text/css; charset: UTF-8'); ?>

body{

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
#each-note{
	/*animation: roll 0s infinite;*/
	background-color:rgba(25,114,164,0.7);
	border:0px;
}
#delete-note-button{
	display:none;
}
#update-post-button{
	display:none;
}
textarea[type="text"]{
	border:0px;
	border-bottom:1px solid #ddd;
	border-radius:0px;
}
input[type="text"]{
	border:0px;
	border-bottom:1px solid #ddd;
	border-radius:0px;
}
#comment-button{
	border:0px;
}
#comment-button:hover{
	border:0px;
	background:rgba(0,0,0,0);
}