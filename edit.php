  <?php
session_start();
error_reporting(0);
if ( $_SESSION['email']==true) {
  # code...
}else
header('location:admin_login.php');
$page='playlist';
 include('include/header.php');

  ?>

  <?php
 include('db/connection.php');
  $id=$_GET['edit'];

  $query=mysqli_query($conn,"select * from playlist where id='$id' ");

 while ($row=mysqli_fetch_array($query)) {
 	 $playlist=$row['playlist_name'];
  	 $des=$row['des'];

 }
 

  ?>

  <div style=" width: 70%; margin-left: 25%; margin-top: 10%">
  	   
  	
		<form action="edit.php" method="post" name="playlistform" onsubmit=" return validateform() ">
			<h1>Update playlist</h1>
			<hr>
		  <div class="form-group">
		    <label for="email"> playlist:</label>
		    <input type="text" name="playlist" value="<?php  echo $playlist;  ?>" class="form-control" id="email">
		  </div>
		  <div class="form-group">
			  <label for="comment">Description:</label>

			 <textarea class="form-control" rows="5" name="des" id="comment"><?php echo $des; ?></textarea>
			</div>
			<input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>" >
		  <input type="submit" name="submit" class="btn btn-primary" value=" Update playlist">
		</form>
		<script>
			
       function validateform(){
         var x = document.forms['playlistform']['playlist'].value;
          if (x=="") {
          	alert('playlist Must Be Filled Out !');
          	return false;
          }
       }

		</script>

  </div>

  <?php
include('db/connection.php');
if (isset($_POST['submit'])) {
	$id=$_POST['id'];
     $playlist =$_POST['playlist'];
     $des=$_POST['des'];

     $query1=mysqli_query($conn,"update playlist set playlist_name='$playlist' , des='$des' where id='$id' ");
     if($query1){
     	echo "<script>alert('playlist Updated Successfully !')</script>";
       echo "<script >window.location='http://localhost/playtube/playlist.php' ;</script>";
     	

     }else{
     	echo "playlist Not Update";
     }
}


  ?>

  
