<?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
                include "connection.php";
                addTextPost();
        }

        function addTextPost(){
                global $connect;

                $title = $_POST['Title'];
                $nickName = $_POST['UserNickName'];
                $content = $_POST['Content'];
                $feeling = $_POST['Feeling'];
                $type = 0;
                $date = date('Y-m-d H:i:s');

                $query = "INSERT INTO `posts` (`Title`, `UserNickName`, `Content`, `Feeling`, `Type`, `Date`) VALUES ('$title','$nickName','$content', '$feeling', '$type', '$date');";


                mysqli_query($connect, $query) or die (mysqli_error($connect));
                mysqli_close($connect);


        }


?>
