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
    <td>Teacher name:</td><td> <input type="text" name="teacher_name" id="input">
	</tr>
	<tr>
       <td></td><td><input type="submit" name="subm" value="submit" ></td>
   </tr>
   </form>
 </table>
 </center>
  </div>
 <?php
   if(isset($_REQUEST['subm'])){
	   
	  $teacher_name= $_REQUEST['teacher_name'];
	 
	  $insert ="insert into teacher(teacher_name) values('$teacher_name') ";
	  
	  $run = mysqli_query($con, $insert);
	  if($run){
		  
		  echo"data inserted";
		  
	  }
	   
   }
 
 
 
 ?>
  <?php
  require_once("footer.php"); 
 ?>