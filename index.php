<?php
   session_start();
   require_once('connectionDatabase.php');
   if(isset($_POST['submButt']) && isset($_POST['nameTsh']) && empty($_POST['nameTsh']) == false && empty($_POST['passw']) == false ){
       $name = $_POST['nameTsh'];
       $passw = $_POST['passw'];
       $sql = "SELECT * from Users WHERE `UserN` = '$name' AND `Password` = '$passw'";
       $query = mysqli_query($conn, $sql);
       if(mysqli_num_rows($query) == NULL) { 
               echo "<h3 style='position: fixed; margin-left: 300px; top: 80px; color: red;'>Credentials incorrect. Please retry</h3>";
                    }else{
       $_SESSION['name'] = $name;
       if($name=="Admin"){
          header("Location: admin.php");
            }else{
          header("Location: processTime.php");}
        }
 }elseif(isset($_POST['submButt']) && empty($_POST['nameTsh']) && empty($_POST['passw'])){
    $c = "Name not present";
    $d = "Password not present";
 }elseif(isset($_POST['submButt']) && empty($_POST['passw']) && !empty($_POST['nameTsh'])){
    $d = "Password not present";
 }elseif(isset($_POST['submButt']) && !empty($_POST['passw']) && empty($_POST['nameTsh'])){
    $c = "Name not present";
 }
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="style.css"> </link>
</head>
<div id="mainDiv">
  <hr>
     <form method="POST" action="#">
        <br/>
            <h2>Period of timesheet:  &nbsp; Last Thursday - This week's Wednesday </h2>
        <br/>
            <span> Name &nbsp; &nbsp; &nbsp; </span><input type="text" name="nameTsh"> </input> &nbsp; &nbsp; &nbsp;  <span style="background-color: yellow"> <?php echo @$c; ?> </span>
       <br/>
       <br/>
            <span> Password &nbsp;</span><input type="password" name="passw"> </input> &nbsp; &nbsp; &nbsp;  <span style="background-color: yellow"> <?php echo @$d; ?> </span>
       <br/>
       <br/>
            <button type="submit" name="submButt"> Access your timesheet </button>
      <br/>
      <br/>
   </form>
 <hr>
</div>
</html>


