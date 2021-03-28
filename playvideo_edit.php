<?php
session_start();
if ( $_SESSION['email']==true) {
  # code...
}else
header('location:admin_login.php');

 include('include/header.php');

  ?>

  <?php

 include('db/connection.php');

 $id=$_GET['edit'];
 $query=mysqli_query($conn,"select * from play_video where id ='$id' ");
  while ($row=mysqli_fetch_array($query)) {
     $id=$row['id'];
      $title=$row['title'];
       $video_link=$row['video_link'];
        $date=$row['date'];
          $playlist=$row['playlist'];


  	# code...
  }

  ?>

		   <div style="margin-left:17%;  width: 80%;">
		        <ul class="breadcrumb">
		        	<li class="breadcrumb-item active"><a href="home.php">Home</a></li>
		        	<li class="breadcrumb-item active"><a href="playvideo_edit.php">play video edit</a></li>
		        	<li class="breadcrumb-item active">Add play video</li>
		        </ul>  	   	
		   </div>

         <div style=" width: 70%; margin-left: 25%; ">
  	    <form action="playvideo_edit.php" method="post" enctype="multipart/form-data" name="playlistform" onsubmit=" return validateform() ">
			<h1>Update play video</h1>
			<hr>
		  <div class="form-group">
		    <label for="email"> Title:</label>
		    <input type="text" value="<?php echo $title; ?>" placeholder="Title..." name="title" class="form-control" id="email">
		  </div>

		  <div class="form-group">
			  <label for="comment">video_link:</label>
			 	 <textarea class="form-control" placeholder="video_link..." rows="5" name="video_link" id="comment"><?php echo $video_link; ?> </textarea>
			</div>

			<div class="form-group">
		    <label for="email"> Date:</label>
		    <input type="date"  name="date" value="<?php echo $date ;?>" class="form-control" id="email">
		  </div>
          <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
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

		  <input type="submit" name="submit" class="btn btn-primary" value="Update">
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


include('db/connection.php');
if (isset($_POST['submit'])) {
	$id=$_POST['id'];
	$title=$_POST['title'];
	$video_link=$_POST['video_link'];
		$date=$_POST['date'];
				$playlist=$_POST['playlist'];


	$sql= mysqli_query($conn,"update play_video set title='$title', video_link='$video_link' , date='$date' , playlist='$playlist' where id='$id' ");
	if ($sql) {
		 echo "<script>alert('News update Successfully !!')</script>  ";
		 echo "<script >window.location='http://localhost/playtube/play_video.php' ;</script>";
	} else{
		echo "<script>alert('Please try again !!')</script>  ";
	}
			

}

  ?>
