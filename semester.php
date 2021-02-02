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
    <td>Semester name:</td><td><input type="text" name="semester_name" id="input"></td>
  </tr>
  <tr>
   <td></td><td><input type="submit" name="subm" value="submit"></td>
   </tr>
   </form>
 
 </center>
 </table>
 <?php
   if(isset($_REQUEST['subm'])){
	   
	  $semester_name = $_REQUEST['semester_name'];
	 
	  $insert ="insert into semester(semester_name) values('$semester_name') ";
	  
	  $run = mysqli_query($con, $insert);
	  if($run){
		  
		  echo"data inserted";
		  
	  }
	   
   }
 
 
 
 ?>
  <?php
  require_once("footer.php"); 
 ?>