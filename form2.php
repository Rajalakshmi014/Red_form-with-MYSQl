<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
<body>
<?php
require('dept.php');
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $rollno = $_POST['rollno'];
    $gender = $_POST['gender'];


    $query= "INSERT INTO `course` (`username`,`rollno`,`gender`) VALUES ('$username','$rollno','$gender')";
    $query_run = mysqli_query($connection,$query);

    if($query_run){
        echo '<script type="text/javascript">alert("data saved")</script>';

    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';

    }
}
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">

<input type="text" name="username" placeholder="Enter your name" required /><br><br>
<input type="text" name="rollno" placeholder="Roll number" required /><br><br>
<p>Select your gender </p>
<input type="radio" id="html" name="gender" value="Male">
<label for="Male">Male</label><br><br>
<input type="radio" id="Female" name="gender" value="Female">
<label for="Female">Female</label><br><br>
<label for="degree">Select your degree:</label>
  <select name="degree" id="degree">
    <?php
    
    include "dept.php";  // Using database connection file here
    $degree = mysqli_query($connection, "SELECT degree From course");  // Use select query here 
    $sql = mysqli_query($connection,"SELECT degree FROM course GROUP BY degree");
    

    while($data = mysqli_fetch_array($sql))
    {
        echo "<option value='". $data['degree'] ."'>" .$data['degree'] ."</option>";  // displaying data in option menu
    }
    
     
    ?>  
  </select>
  <br> <br>

  <label for="dept">Select your dept:</label>
  <select name="dept" id="dept">
    <?php
    include "dept.php";
  $dept = mysqli_query($connection, "SELECT dept From course");  // Use select query here 
    $sqli = mysqli_query($connection,"SELECT dept FROM course GROUP BY dept");

    
    while($data = mysqli_fetch_array($sqli))
    {
        echo "<option value='". $data['dept'] ."'>" .$data['dept'] ."</option>";  // displaying data in option menu
    }
      ?>  
    
  </select>
  <br> <br>


<input type="submit" name="submit" value="Register" />
</form>
</div>
</body>
</html>
