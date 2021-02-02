 
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
     <td>Student name:</td><td><input type="text" name="std_name"id="input"></td>
  </tr>
 
 <tr>
    <td>Student group:</td><td><input type="text" name="std_section" id="input"></td>
  </tr>
   
   <tr>
     <td></td><td><input type="submit" name="subm" value="submit"></td>
   </tr>
  
   </form>
 </table>
 
 </center>
 </div>
 <?php
   if(isset($_REQUEST['subm'])){
	   
	  $student_name= $_REQUEST['std_name'];
	  $student_group= $_REQUEST['std_section'];
	  
	  $insert ="insert into student(std_name,std_section) values('$student_name','$student_group') ";
	  
	  $run = mysqli_query($con, $insert);
	  if($run){
		  
		  echo"data inserted";
		  
	  }
	   
   }
 
 
 
 ?>
  <?php
  require_once("footer.php"); 
 ?>