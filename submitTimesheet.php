<?php
     session_start();
     require_once('connectionDatabase.php');
      $name = $_SESSION['name'];
    if(mysqli_num_rows(mysqli_query($conn, "SELECT `DayDate` FROM Timesheet WHERE `DayDate` = '". $_POST["hours1"][0] ."' AND `Name` = '$name' "))>0){
        $z = $_POST["hours1"][0];
    }elseif(mysqli_num_rows(mysqli_query($conn, "SELECT `DayDate` FROM Timesheet WHERE `DayDate` = '". $_POST["hours2"][0] ."' AND `Name` = '$name' "))>0){  
        $z = $_POST["hours2"][0];
    }elseif(mysqli_num_rows(mysqli_query($conn, "SELECT `DayDate` FROM Timesheet WHERE `DayDate` = '". $_POST["hours3"][0] ."' AND `Name` = '$name' "))>0){
        $z = $_POST["hours3"][0];
    }elseif(mysqli_num_rows(mysqli_query($conn, "SELECT `DayDate` FROM Timesheet WHERE `DayDate` = '". $_POST["hours4"][0] ."' AND `Name` = '$name' "))>0){
        $z = $_POST["hours4"][0];
    }elseif(mysqli_num_rows(mysqli_query($conn, "SELECT `DayDate` FROM Timesheet WHERE `DayDate` = '". $_POST["hours5"][0] ."' AND `Name` = '$name' "))>0){
        $z = $_POST["hours5"][0];
    }elseif(mysqli_num_rows(mysqli_query($conn, "SELECT `DayDate` FROM Timesheet WHERE `DayDate` = '". $_POST["hours6"][0] ."' AND `Name` = '$name' "))>0){
        $z = $_POST["hours6"][0];
    }elseif(mysqli_num_rows(mysqli_query($conn, "SELECT `DayDate` FROM Timesheet WHERE `DayDate` = '". $_POST["hours7"][0] ."' AND `Name` = '$name' "))>0){
        $z = $_POST["hours7"][0];
    }else{
        $z = $_POST["hours1"][0];
    }
    $h1=$_POST["hours1"][0];
    $h2=$_POST["hours2"][0];
    $h3=$_POST["hours3"][0];
    $h4=$_POST["hours4"][0];
    $h5=$_POST["hours5"][0];
    $h6=$_POST["hours6"][0];
    $h7=$_POST["hours7"][0];
    $r = mysqli_query($conn, "SELECT `DayDate` FROM Timesheet WHERE `DayDate` = '". $z ."' AND `Name` = '$name' ");
    $res = mysqli_num_rows($r);
   //if condition opens here and ends close to the bottom
    if ($res > 0){
         header("refresh:3; url=changeTimesheet.php?d1=$h1&d2=$h2&d3=$h3&d4=$h4&d5=$h5&d6=$h6&d7=$h7");
         echo "<br/><br/><br/><h3>For the period selected another timesheet has been submitted</h3>";
          $_SESSION['basedate'] = $z;
    }
    else{
    
   (int)$breakTotal;
   //number_format($breakTotal,2);

   $message = "";
   $t = date("d/m/y h:i:s",time());
   //$t = time();
  if (empty($_POST["hours1"][1]) == false) { foreach($_POST["hours1"] as $k=>$v){
        sleep(0.1);
        if ($k == 0){$date = $v;}
        elseif($k == 1){$start = $v;}
        elseif($k == 2){$finish = $v;}
        elseif($k == 3){$break = $v;}
        elseif($k == 4){$hrs = $v;       
           // mysqli_query($conn, "INSERT INTO Timesheet VALUES('$name', '$date', '$start', '$finish', '$break', '$hrs', NULL, '$t',". mktime(0,0,0,date('m',strtotime($date)),date('d',strtotime($date)),date('Y',strtotime($date))).")");
              mysqli_query($conn, "INSERT INTO Timesheet VALUES('$name', '$date', '$start', '$finish', '$break', '$hrs', NULL, '$t',". strtotime($date) .")");
            $message = "$name $date \n $start    $finish     $break    $hrs \n";
        }
   }
      $breakTotal = $break;
}
   
 if (empty($_POST["hours2"][1]) == false)  {foreach($_POST["hours2"] as $k=>$v){
         sleep(0.1);
         if ($k == 0){$date = $v;}
        elseif($k == 1){$start = $v;}
        elseif($k == 2){$finish = $v;}
        elseif($k == 3){$break = $v;}
        elseif($k == 4){$hrs = $v;       
            mysqli_query($conn, "INSERT INTO Timesheet VALUES('$name', '$date', '$start', '$finish', '$break', '$hrs', NULL, '$t',". strtotime($date) .")");
            $message .= "              $start    $finish     $break    $hrs \n";
        }
   } 
     $breakTotal =$breakTotal + $break;
 }
 if (empty($_POST["hours3"][1]) == false) { foreach($_POST["hours3"] as $k=>$v){
        sleep(0.1);
         if ($k == 0){$date = $v;}
        elseif($k == 1){$start = $v;}
        elseif($k == 2){$finish = $v;}
        elseif($k == 3){$break = $v;}
        elseif($k == 4){$hrs = $v;       
            mysqli_query($conn, "INSERT INTO Timesheet VALUES('$name', '$date', '$start', '$finish', '$break', '$hrs', NULL, '$t',". strtotime($date) .")");
           $message .= "              $start    $finish     $break    $hrs \n";
        }
   }
     $breakTotal = $breakTotal + $break;
}
   
if (empty($_POST["hours4"][1]) == false)  { foreach($_POST["hours4"] as $k=>$v){
        sleep(0.1);
        if ($k == 0){$date = $v;}
        elseif($k == 1){$start = $v;}
        elseif($k == 2){$finish = $v;}
        elseif($k == 3){$break = $v;}
        elseif($k == 4){$hrs = $v;       
            mysqli_query($conn, "INSERT INTO Timesheet VALUES('$name', '$date', '$start', '$finish', '$break', '$hrs', NULL, '$t',". strtotime($date) .")");
             $message .= "              $start    $finish     $break    $hrs \n";
        }
   }
      $breakTotal = $breakTotal + $break;
}

if (empty($_POST["hours5"][1]) == false)  { foreach($_POST["hours5"] as $k=>$v){
         sleep(0.1);
         if ($k == 0){$date = $v;}
        elseif($k == 1){$start = $v;}
        elseif($k == 2){$finish = $v;}
        elseif($k == 3){$break = $v;}
        elseif($k == 4){$hrs = $v;       
            mysqli_query($conn, "INSERT INTO Timesheet VALUES('$name', '$date', '$start', '$finish', '$break', '$hrs', NULL, '$t',". strtotime($date) .")");
             $message .= "              $start    $finish     $break    $hrs \n";
        }
   }
     $breakTotal = $breakTotal + $break;
}

if (empty($_POST["hours6"][1]) == false)  { foreach($_POST["hours6"] as $k=>$v){
        sleep(0.1);
         if ($k == 0){$date = $v;}
        elseif($k == 1){$start = $v;}
        elseif($k == 2){$finish = $v;}
        elseif($k == 3){$break = $v;}
        elseif($k == 4){$hrs = $v;       
            mysqli_query($conn, "INSERT INTO Timesheet VALUES('$name', '$date', '$start', '$finish', '$break', '$hrs', NULL, '$t',". strtotime($date) .")");
             $message .= "              $start    $finish     $break    $hrs \n";
        }
   }
     $breakTotal = $breakTotal + $break;
}
if (empty($_POST["hours7"][1]) == false) {  foreach($_POST["hours7"] as $k=>$v){
         sleep(0.1);
         if ($k == 0){$date = $v;}
        elseif($k == 1){$start = $v;}
        elseif($k == 2){$finish = $v;}
        elseif($k == 3){$break = $v;}
        elseif($k == 4){$hrs = $v;       
            mysqli_query($conn, "INSERT INTO Timesheet VALUES('$name', '$date', '$start', '$finish', '$break', '$hrs', NULL, '$t',". strtotime($date) .")");
             $message .= "              $start    $finish     $break    $hrs \n";
        }
   } 
      $breakTotal += $break;
}

   foreach($_POST["hours8"] as $k=>$v){
         sleep(0.1);
         if ($k == 0){$comm = mysqli_real_escape_string($conn, $v);}
       /* elseif($k == 1){$start = NULL;}
        elseif($k == 2){$finish = NULL;}
        elseif($k == 3){$break = $v;} */
        elseif($k == 1){$total = $v;       
        (string)$breakTotal =  $breakTotal;
        $timeSt =  strtotime($_POST["hours7"][0]) - 43202;
            mysqli_query($conn, "INSERT INTO Timesheet VALUES('$name', 'TOTAL', 'TOTAL', NULL, '$breakTotal', '$total', '$comm', '$t','$timeSt')");
             $message .= "              $comm       $total \n";
        }
   } 

   echo "<br/> <br/> &nbsp; &nbsp; <h3>$name, your timesheet has been submited to payroll</h3>";
   header("refresh:3; url=index.php");
   $_SESSION['name'] = "";
   mail("accounts@uniquecurtainswa.com.au", "Chris sent timesheet", "Vaca", "From: <mmm@ggg.com>");
}

//foreach($_POST['hours1'] as $key=>$value){
//    foreach($_POST['hours1'] as $key=>$value){
//     echo  $value."<br/> <br/> <br/>";
    // if (is_array($value)){
    //   foreach($value as $k=>$v){
    //      echo $v."<br/>";
    //   }
  // }
//}

?>		