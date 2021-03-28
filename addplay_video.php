<?php
session_start();
if ( $_SESSION['email']==true) {
  # code...
}else
header('location:admin_login.php');
$page='addplay_video';
 include('include/header.php');

  ?>

		   <div style="margin-left:17%;  width: 80%;">
		        <ul class="breadcrumb">
		        	<li class="breadcrumb-item active"><a href="home.php">Home</a></li>
		        	<li class="breadcrumb-item active"><a href="play_video.php">play_video</a></li>
		        	<li class="breadcrumb-item active">Add play_video</li>
		        </ul>  	   	
		   </div>

         <div style=" width: 70%; margin-left: 25%; ">
  	    <form action="addplay_video.php" method="post" enctype="multipart/form-data" name="playlistform" onsubmit=" return validateform() ">
			<h1>Add play_video</h1>
			<hr>
		  <div class="form-group">
		    <label for="email"> Title:</label>
		    <input type="text" placeholder="Title..." name="title" class="form-control" id="email">
		  </div>

		  <div class="form-group">
			  <label for="comment">video_link:</label>
			 <textarea class="form-control" placeholder="video_link..." rows="5" name="video_link" id="comment"></textarea>
			</div>

			<div class="form-group">
		    <label for="email"> Date:</label>
		    <input type="date"  name="date" class="form-control" id="email">
		  </div>

		    <div class="form-group">
		    <label for="email"> playlist:</label>
		     
               
		        <select class="form-control"  name="playlist" >
		       <?php
                include('db/connection.php');
                  $query=mysqli_query($conn,"select * from playlist");

                while($row=mysqli_fetch_array($query)){

                	
                	?>
		        	 <option value="<?php echo $row['playlist_name'];?>"><?php echo $row['playlist_name'];?></option>
		        	 
                 <?php } ?>
		        </select>
		        </div>


		        <div class="form-group">
		        	<label for="admin">Admin</label>
		        	<input type="text" class="form-control" disabled value="<?php echo $_SESSION['email'];  ?> ">
		        	
		        </div>
		  

		  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
		</form>
		<script>
			
       function validateform(){
         var x = document.forms['playlistform']['title'].value;
         var y = document.forms['playlistform']['video_link'].value;
         var z = document.forms['playlistform']['date'].value;
         var w = document.forms['playlistform']['playlist'].value;
         if (x=="") {
          	alert('Title Must Be Filled Out !');
          	return false;
          }
          if (y=="") {
          	alert('video_link Must Be Filled Out !');
          	return false;
          }
           if (y.length<10) {
          	alert('video_link At least 100 character !');
          	return false;
          }
          
       }
 
		</script>

  </div>
 
  <?php

include('db/connection.php');
if (isset($_POST['submit'])) {
	$title=$_POST['title'];
	$video_link=$_POST['video_link'];
		$date=$_POST['date'];
			
				$playlist=$_POST['playlist'];
				$admin=$_SESSION['email'];

     $query1=mysqli_query($conn,"insert into play_video(title,video_link,date,playlist,admin)values('$title','$video_link','$date','$playlist','$admin')");
     if ($query1) {
     	# code...
     	echo "<script>alert('Add Play_video uploaded Successfully !!')</script>  ";
     }else{
     	echo "<script>alert('Please Try Again!!')</script>  ";

     }


}

  ?>
