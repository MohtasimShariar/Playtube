<?php
 include('db/connection.php');
 $id=$_GET['del'];
 $query=mysqli_query($conn,"delete  from playlist where id='$id'");
  if ($query) {
  	 echo "<script> alert('playlist deleted !')</script> ";
  	   echo "<script >window.location='http://localhost/playtube/playlist.php' ;</script>";

  }else{
  	echo "Please Try again";
  }


?>