 <?php
 require_once("index.php");
 require_once("connect.php");
 
 ?>
 <div class="stud_log">
 <br><br>
 <br><br>
 <center>
 <table border="1" style="font-size:18px;">
 
 	 <form action="" method="POST">
		<input type="text" placeholder="type user name" name="searchterm" id="input">
	    <input type="submit" name="submitbtn" value="Search" style="border:1px solid#ddd;background:tomato;border-radius:8px;color:white;padding:10px;">
	</form>
 
 <?php
	
	
 
	 ?>
 <tr>
	 <th>student name</th>
	 <th>subject name</th>
	 <th>teacher name</th>
	 <th>semester name</th>
 </tr>
 
 <?php
	  if(isset($_REQUEST["searchterm"])){
	  $SearchTarm	= $_REQUEST["searchterm"]; 
	  
	$select ="SELECT * from join_table
					INNER JOIN course on join_table.course_code=course.course_code
					INNER JOIN student on join_table.std_id= student.std_id
					INNER JOIN semester on join_table.semester_id=semester.semester_id
					INNER JOIN teacher ON join_table.teacher_id= teacher.teacher_id
					
					    WHERE std_name LIKE '%$SearchTarm%'";
			
	       $run = mysqli_query($con,$select);
	   
	   
	   while($rows = mysqli_fetch_array($run)){ ?>
		  
		 <tr> 
		  <td> <?php echo $rows['std_name'];?></td>
		   <td><?php echo $rows['course_name'];?></td>
		  <td><?php echo $rows['teacher_name'];?></td>
		  <td> <?php echo $rows['semester_name'];?></td>
		
		  </tr>
		  
		 <?php  
	   
	   
   }
	  }
 ?>
 
 </table>
 
 </center>
  </div>
  <?php
  require_once("footer.php"); 
 ?>