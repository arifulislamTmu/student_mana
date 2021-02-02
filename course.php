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
    <td>Course name:</td><td><input type="text" name="course_name" id="input"></td>
  </tr>
  <tr>
   <td></td><td><input type="submit" name="subm" value="submit"></td>
   </tr>
   </form>
 
 </center>
 </table>
 </div>
 <?php
   if(isset($_REQUEST['subm'])){
	   
	  $course_name = $_REQUEST['course_name'];
	 
	  $insert ="insert into course(course_name) values('$course_name') ";
	  
	  $run = mysqli_query($con, $insert);
	  if($run){
		  
		  echo"data inserted";
		  
	  }
	   
   }
 
 
 
 ?>
  <?php
  require_once("footer.php"); 
 ?>