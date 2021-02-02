 <?php
 require_once("index.php");
 require_once("connect.php");
 
 ?>
 <div class="stud_log">
 <br><br>
 <br><br>
 <center>
 <table border="2px" style="font-size:18px;border-collapse:collapse;">
 
 	 <form action="" method="POST">
		<input type="text" placeholder="type user name" name="searchterm" required=""; id="input">
	    <input type="submit" name="submitbtn" value="Search" style="border:1px solid#ddd;background:tomato;border-radius:8px;color:white;padding:10px;">
	</form>
 
	 <br>
 <tr>
    <th>S.L</th>
	 <th>student name</th>
	 <th>subject name</th>
	 <th>class test</th>
	 <th>Assaingment</th>
	 <th>Mid exam</th>
	 <th>final exam</th>
	 <th>Total Marks</th>
	 <th>GPA</th>
	 
	 
 </tr>
 
 <?php
	  if(isset($_REQUEST["searchterm"])){
	  $SearchTarm	= $_REQUEST["searchterm"]; 
	  
	$select ="SELECT * FROM mark_table

					INNER join student ON mark_table.std_id= student.std_id
					INNER JOIN course ON mark_table.course_code=course.course_code
										
					    WHERE std_name LIKE '%$SearchTarm%'";
			
	       $run = mysqli_query($con,$select);
	   
	   $count = 1;
	   while($rows = mysqli_fetch_array($run)){ 
	    
	   ?>
	   
		 <tr> 
		 
		    <td style="text-align:center"> <?php echo  $count; $count++;?></td>
		    <td style="text-align:center"> <?php echo $rows['std_name'];?></td>
		   <td style="text-align:center"><?php echo $rows['course_name'];?></td>
		   <td style="text-align:center"><?php echo $rows['class_marks'];?></td>
		   <td style="text-align:center"><?php echo $rows['ass_marks'];?></td>
		   <td style="text-align:center"><?php echo $rows['mid_marks'];?></td>
		   <td style="text-align:center"><?php echo $rows['final_marks'];?></td>
		   <td style="text-align:center"><?php echo $rows['total_mark'];?></td>
		   <td style="text-align:center"><?php echo $rows['GPA'];?></td>
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