 <?php
 require_once("index.php");
 require_once("connect.php");
 
 ?>
 
 
 <div class="stud_log">
 <br><br>
 <br><br>
 <center>
 
 <table>
   <form action="" method="POST">
  <tr>  
  <td>Student name:</td><td><select name="std_id" id="input">
 
 <?php
   
   $select ="select * from student";
   
     $run =mysqli_query($con,$select);
   
    while($rows = mysqli_fetch_array($run )){ ?>
	 
	 <option value="<?php echo $rows['std_id']; ?>"><?php echo $rows['std_name']; ?>
 
 </option>
	
	<?php
   }
  
  ?>
  </select></td>
  
  </tr>
   
 <tr>
  <td>course name:</td><td><select name="course_code" id="input">
 
 <?php
 
 $select ="select * from course";
  
  $run =mysqli_query($con,$select);
   
   while($rows = mysqli_fetch_array($run )){ ?>
	   
	   <option value="<?php echo $rows['course_code']; ?>"><?php echo $rows['course_name']; ?>
	   </option>
	<?php
   }
  
  ?>
 </select></td>
 
 </tr>
 
 <tr>
   <td>Teacher Name:</td><td><select name="teacher_id" id="input">
 
 <?php
  
  $select ="select * from teacher";
  
  $run =mysqli_query($con,$select);
  
  while($rows = mysqli_fetch_array($run )){ ?>
	  
	  <option value="<?php echo $rows['teacher_id']; ?>">
	   
	   <?php echo $rows['teacher_name']; ?>
	   
	   </option>
	<?php
   }
  
  ?>
 </select>
 
 </td></tr>
    <tr>
   <td>Select Semester:</td><td><select name="semester_id" id="input">
 
 <?php
  
  $select ="select * from semester";
  
  $run =mysqli_query($con,$select);
  
  while($rows = mysqli_fetch_array($run )){ ?>
	  
	  <option value="<?php echo $rows['semester_id']; ?>">
	   
	   <?php echo $rows['semester_name']; ?>
	   
	   </option>
	<?php
   }
  
  ?>
 </select>
 
 </td></tr>
 
 
    <tr>
	 <td></td><td><input type="submit" name="subm" value="submit"></td>
	</tr>
 </table>
 </center>
  </div>
 <?php
   if(isset($_REQUEST['subm'])){
	   
	  $std_name = $_REQUEST['std_id'];
	  $course_name = $_REQUEST['course_code'];
	  $teacher_name = $_REQUEST['teacher_id'];
	  $semester_name = $_REQUEST['semester_id'];
	  
	  if($course_name){
		  
		  $query= "SELECT * FROM `join_table` where std_id='$std_name' AND course_code='$course_name'" ;
		 
		 $check= mysqli_query($con,$query);
				
				if( $check){
					
					if(mysqli_num_rows($check)>0){
						
						echo"
						   you are already register
						 
						";
						
						
					}else{
	 
	  $insert ="insert into `join_table`(std_id,course_code,teacher_id,semester_id) values('$std_name ',' $course_name','$teacher_name','$semester_name') ";
	  
	  $run = mysqli_query($con, $insert);
	  if($run){
		  
		  echo"data inserted";
		  
	  }
	    }
   }
 
	  }
   }
 ?>
 <?php
  require_once("footer.php"); 
 ?>