 <?php
   $user="localhost";
   $name="root";
   $pass="";
 $db ="student_mana";
 
 $con = mysqli_connect($user,$name,$pass);
 
 mysqli_select_db($con,$db);
 
 ?>