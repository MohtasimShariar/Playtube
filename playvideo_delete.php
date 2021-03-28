<?php
 include('db/connection.php');

 $id=$_GET['del'];
 $query = mysqli_query($conn,"delete  from play_video where id='$id' ");
 if ($query) {
 	 echo "<script> alert('play_video deleted !')</script> ";
  	   echo "<script >window.location='http://localhost/playtube/play_video.php' ;</script>";
 
 }else{
 	echo "Please Try again";
 }

?>