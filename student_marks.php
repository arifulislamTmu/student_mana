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
	  <td>Class Test:</td><td><input type="text" name="class_marks" id="input"></td>
	</tr> 
	
	 <tr>
	  <td>Assaignment:</td><td><input type="text" name="ass_marks" id="input"></td>
	</tr> 
	
    <tr>
	  <td>Mid Term:</td><td><input type="text" name="mid_marks" id="input"></td>
	</tr> 
	
    <tr>
	  <td>Final Exam:</td><td><input type="text" name="final_marks" id="input"></td>
	</tr> 
	
    
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
	 
	  $class_marks = $_REQUEST['class_marks'];
	  $ass_marks = $_REQUEST['ass_marks'];
	  $mid_marks = $_REQUEST['mid_marks'];
	  $final_marks = $_REQUEST['final_marks'];
	
	  
	   if(empty( $class_marks) or empty($ass_marks) or empty($mid_marks) or empty($final_marks)){
		  
		  echo "<span style='color:red; font-size:20px;'> field must not be empty</span><br>";
		 
	  }else{
	 
	 
	    if($course_name){
		  
		  $query= "SELECT * FROM  mark_table where std_id='$std_name' AND course_code='$course_name'" ;
		 
		 $check= mysqli_query($con,$query);
				
				if($check){
					
					if(mysqli_num_rows($check)>0){
						
						echo"
						   you are already register
						 
						";
									
						
	}else{
		  
	  $add =($class_marks+$ass_marks+$mid_marks+ $final_marks );
	  if($add>100){
		  echo"<span style='color:red;font-size:25px;'>Please Check Marks and Try again !!! </span>";
	  }else{
		$grad=" ";
		switch($add){
			case($add>=80):
			$grad="A+";
			break;
			
		case($add>=70):
			$grad="A";
			break;
			
		case($add>=60):
			$grad="A-";
			break;

        case($add>=50):
			$grad="B";
			break;
			
		case($add>=40):
			$grad="C";
			break;
			
		case($add>=33):
			$grad="D";
			break;
			
		case($add>=0):
			$grad="F";
			break;
			
			}
								
	  $insert ="insert into mark_table(std_id,course_code,class_marks,ass_marks,mid_marks,final_marks,total_mark,GPA) 
	  values('$std_name ',' $course_name','$class_marks','$ass_marks','$mid_marks','$final_marks','$add','$grad')";
	  
	  $run = mysqli_query($con, $insert);
	  if($run){
		  
		  echo"data inserted";
	  }
	  }
	  }
		  
	  }
		  
		}
	}


}
  
 ?>
 
 
 <?php
  require_once("footer.php"); 
 ?>