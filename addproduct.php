<?php
session_start();
if ( $_SESSION['email']==true) {
  # code...
}else
header('location:admin_login.php');
$page='addproduct';
 include('include/header.php');

  ?>

		   <div style="margin-left:17%;  width: 80%;">
		        <ul class="breadcrumb">
		        	<li class="breadcrumb-item active"><a href="home.php">Home</a></li>
		        	<li class="breadcrumb-item active"><a href="product.php">product</a></li>
		        	<li class="breadcrumb-item active">Add product</li>
		        </ul>  	   	
		   </div>

         <div style=" width: 70%; margin-left: 25%; ">
  	    <form action="addproduct.php" method="post" enctype="multipart/form-data" name="playlistform" onsubmit=" return validateform() ">
			<h1>Add product</h1>
			<hr>
		  <div class="form-group">
		    <label for="email"> Title:</label>
		    <input type="text" placeholder="Title..." name="title" class="form-control" id="email">
		  </div>

		  <div class="form-group">
			  <label for="comment">Description:</label>
			 <textarea class="form-control" placeholder="Description..." rows="5" name="description" id="comment"></textarea>
			</div>

			<div class="form-group">
		    <label for="email"> Date:</label>
		    <input type="date"  name="date" class="form-control" id="email">
		  </div>

           <div class="form-group">
		    <label for="email"> Image:</label>
		    <input type="file"  name="image" class="form-control img-image" id="email">
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
         var y = document.forms['playlistform']['description'].value;
         var z = document.forms['playlistform']['date'].value;
         var w = document.forms['playlistform']['playlist'].value;
         if (x=="") {
          	alert('Title Must Be Filled Out !');
          	return false;
          }
          if (y=="") {
          	alert('Description Must Be Filled Out !');
          	return false;
          }
           if (y.length<10) {
          	alert('Description At least 100 character !');
          	return false;
          }
          
       }
 
		</script>

  </div>
 
  <?php

include('db/connection.php');
if (isset($_POST['submit'])) {
	$title=$_POST['title'];
	$description=$_POST['description'];
		$date=$_POST['date'];

			$image=$_FILES['image']['name'];
			$tmp_image=$_FILES['image']['tmp_name'];
				$playlist=$_POST['playlist'];
				$admin=$_SESSION['email'];
			move_uploaded_file($tmp_image,"images/$image");

     $query1=mysqli_query($conn,"insert into product(title,description,date,playlist,image,admin)values('$title','$description','$date','$playlist','$image','$admin')");
     if ($query1) {
     	# code...
     	echo "<script>alert('product uploaded Successfully !!')</script>  ";
     }else{
     	echo "<script>alert('Please Try Again!!')</script>  ";

     }


}

  ?>
