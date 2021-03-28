<?php
session_start();
error_reporting(0);
if ( $_SESSION['email']==true) {
  # code...
}else
header('location:admin_login.php');
$page='play_video';
 include('include/header.php');

  ?>
 <div style="margin-left:16%;  width: 90%;">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
         
          <li class="breadcrumb-item active">play video</li>
        </ul>       
       </div>

  <div style=" width: 70%; margin-left: 20%; margin-top: 5%">
  	    <div class="text-right">
  	    <a   class="btn btn-primary" href="addplay_video.php">Add play video</a> 
  	    	
   </div>
    <table class="table table-bordered">
       <tr>
         <th>Id</th>
         <th>Title</th>
         <th>video link</th>
         <th>Date</th>
         <th>playlist</th>
         <th>Admin</th>
         
         <th>Edit</th>
         <th>Delete</th>
       </tr>
        <?php
        include('db/connection.php');
           $page=$_GET['page'];
           if($page=="" || $page==1){
            $page1=0;
           }
           else{
              $page1=($page*3)-3;

           }
           
      $query=mysqli_query($conn,"select * from play_video limit $page1,3");
       while ($row=mysqli_fetch_array($query)) {
         ?>
         <tr>
           <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
             <td><?php echo substr($row['video_link'],0,100 ); ?></td>
               <td><?php echo date("F jS ,y", strtotime($row['date'])); ?></td>
                 <td><?php echo $row['playlist']; ?></td>
                   <td><?php echo $row['admin'];?></td>
                   <td><a class="btn btn-info btn-sm" href="playvideo_edit.php?edit=<?php echo $row['id'];?>">edit</a></td>
                     <td><a class="btn btn-danger btn-sm" href="playvideo_delete.php?del=<?php echo $row['id'];?>">delete</a></td>
                    
         </tr>
         
       
     
       <?php }  ?>
         </table>
             <ul class="pagination">
               <li class="page-item disabled">
                 <a href="#" class="page-link" >Pervious</a>
               </li>
              <?php

       $sql=mysqli_query($conn,"select * from play_video");
       $count=mysqli_num_rows($sql);
       $a=$count/3;
        ceil($a);
        for ($b=1; $b <=$a ; $b++) { 
          ?>
      
             
         <li class="page-item"><a class="page-link" href="play_video.php?page= <?php echo $b;?>"><?php echo $b; ?></a></li>
          
       
          <?php 
        }
       ?>
                <li class="page-item disabled">
                 <a href="#" class="page-link" >Next</a>
               </li>
       </ul>

       

  </div>


  

  