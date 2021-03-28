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
 $query=mysqli_query($conn,"select * from product where id ='$id' ");
  while ($row=mysqli_fetch_array($query)) {
     $id=$row['id'];
      $title=$row['title'];
       $description=$row['description'];
        $date=$row['date'];
         $image=$row['image'];
          $category=$row['playlist'];


  	# code...
  }

  ?>

		   <div style="margin-left:17%;  width: 80%;">
		        <ul class="breadcrumb">
		        	<li class="breadcrumb-item active"><a href="home.php">Home</a></li>
		        	<li class="breadcrumb-item active"><a href="product.php">product</a></li>
		        	<li class="breadcrumb-item active">Edit product</li>
		        </ul>  	   	
		   </div>

         <div style=" width: 70%; margin-left: 25%; ">
  	    <form action="product_edit.php" method="post" enctype="multipart/form-data" name="playlistform" onsubmit=" return validateform() ">
			<h1>Update product</h1>
			<hr>
		  <div class="form-group">
		    <label for="email"> Title:</label>
		    <input type="text" value="<?php echo $title; ?>" placeholder="Title..." name="title" class="form-control" id="email">
		  </div>

		  <div class="form-group">
			  <label for="comment">Description:</label>
			 	 <textarea class="form-control" placeholder="Description..." rows="5" name="description" id="comment"><?php echo $description; ?> </textarea>
			</div>

			<div class="form-group">
		    <label for="email"> Date:</label>
		    <input type="date"  name="date" value="<?php echo $date ;?>" class="form-control" id="email">
		  </div>

           <div class="form-group">
		    <label for="email"> image:</label>
		    <input type="file" value="<?php echo $image; ?>"  name="image" class="form-control img-image" id="email">
		    <img class="img img-image" src="images/<?php echo $image; ?>" alt=""  width="300">
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


include('db/connection.php');
if (isset($_POST['submit'])) {
	$id=$_POST['id'];
	$title=$_POST['title'];
	$description=$_POST['description'];
		$date=$_POST['date'];
			$image=$_FILES['image']['name'];
			$tmp_image=$_FILES['image']['tmp_name'];
				$playlist=$_POST['playlist'];

			move_uploaded_file($tmp_image,"images/$image");

	$sql= mysqli_query($conn,"update product set title='$title', description='$description' , date='$date' , image='$image' , playlist='$playlist' where id='$id' ");
	if ($sql) {
		 echo "<script>alert('product update Successfully !!')</script>  ";
		 echo "<script >window.location='http://localhost/playtube/product.php' ;</script>";
	} else{
		echo "<script>alert('Please try again !!')</script>  ";
	}
			

}

  ?>
