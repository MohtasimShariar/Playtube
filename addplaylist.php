<?php
session_start();
if ( $_SESSION['email']==true) {
  # code...
}else
header('location:admin_login.php');
$page='playlist';
 include('include/header.php');

  ?>

  <div style=" width: 70%; margin-left: 25%; margin-top: 10%">
  	   
  	
		<form action="addplaylist.php" method="post" name="playlistform" onsubmit=" return validateform() ">
			<h1>Add playlist</h1>
			<hr>
		  <div class="form-group">
		    <label for="email"> Playlist:</label>
		    <input type="text" placeholder="Enter playlist Name " name="playlist" class="form-control" id="email">
		  </div>
		  <div class="form-group">
			  <label for="comment">Description:</label>
			 <textarea class="form-control" placeholder="Enter playlist Description" rows="5" name="des" id="comment"></textarea>
			</div>
		  <input type="submit" name="submit" class="btn btn-primary" value="Add playlist">
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
	
	$playlist_name=$_POST['playlist'];
	$des=$_POST['des'];

	 $check = mysqli_query($conn,"select * from playlist where playlist_name='$playlist_name' ");

	  if (mysqli_num_rows($check)>0) {
	  	 echo "<script> alert('playlist Name Already Be taken !!')</script>";
	  exit();
   }

	$query=mysqli_query($conn,"insert into  playlist(playlist_name,des)values('$playlist_name','$des')");

	if($query){
		 echo "<script> alert('playlist Add Successfully')</script>";
	}else{
		 echo "<script> alert('Please try Again')</script>";
	}
}



  ?>