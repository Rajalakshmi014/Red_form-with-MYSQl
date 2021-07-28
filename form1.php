<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('dept.php');
if(isset($_POST['submit'])){
    $degree = $_POST['degree'];
    $dept = $_POST['dept'];

    $query= "INSERT INTO `course` (`degree`,`dept`) VALUES ('$degree','$dept')";
    $query_run = mysqli_query($connection,$query);

    if($query_run){
        echo "<div class='form'>
<h3>You have added your dept.</h3>
<br/>Click here to <a href='form2.php'>Register</a></div>";
    }
    else{
        
    }
}

?>



<div class="form">
<h3>Choose your course</h3>
<form name="form1" action="" method="post">
<input type="text" name="degree" placeholder="Enter your Degree" required />
<input type="text" name="dept" placeholder="Enter your dept" required />


<input type="submit" name="submit" value="Add" />
</form>
</div>
</body>
</html>