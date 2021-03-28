<?php
 include('db/connection.php');

 $id=$_GET['del'];
 $query = mysqli_query($conn,"delete  from product where id='$id' ");
 if ($query) {
 	 echo "<script> alert('product deleted !')</script> ";
  	   echo "<script >window.location='http://localhost/playtube/product.php' ;</script>";
 
 }else{
 	echo "Please Try again";
 }

?>