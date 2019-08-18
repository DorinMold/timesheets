<?php
session_start();
require_once("connectionDatabase.php");
date_default_timezone_set("Australia/Perth");
$userN = array();
echo "<br/> <br/> <br/>";
echo "<h4> Either: Select a week OR a year and leave the other criteria as None </h4>";

// echo "<h3 style='position: fixed; margin-left: 300px; top: 80px; color: red;'>Credentials incorrect. Please retry</h3>";
echo "<h3 style='margin-left: 200px; margin-top: 100px'> Employee &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Week &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; Year</h3>";
echo "<hr/>";
echo "<form action='report.php' method='POST'>";
echo "<select name='nameEmployee' style='margin-left: 200px; margin-top: 10px; width: 100px; height: 20px;'>";
echo " <option> All users </option> ";
$result = mysqli_query($conn, "SELECT * FROM Users");
//$result = asort($result['UserN']);
while($r = mysqli_fetch_assoc($result)){
   if ($r['UserN'] != "Admin") array_push($userN, $r['UserN']);
}

asort($userN);

foreach($userN as $user){
    if ($r['UserN'] != "Admin") echo " <option> " . $user . " </option> ";
}

echo "</select>";

//$d1 = mktime(0,0,0,10,26,2016);

$day = time();


$d1 = date("l", $day);


switch($d1){
  case "Thursday":   
            $d2 = date("d-M-y", strtotime(date("d-M-y",$day)."+6 days")); 
             break;
  case "Friday":   
            $d2 = date("d-M-y", strtotime(date("d-M-y",$day)."+5 days")); 
            break;
  case "Saturday": 
            $d2 = date("d-M-y", strtotime(date("d-M-y",$day)."+4 days")); 
            break;
  case "Sunday":  
            $d2 = date("d-M-y", strtotime(date("d-M-y",$day)."+3 days")); 
            break;
  case "Monday":    
            $d2 = date("d-M-y", strtotime(date("d-M-y",$day)."+2 days")); 
            break;
  case "Tuesday":  
            $d2 = date("d-M-y", strtotime(date("d-M-y",$day)."+1 days")); 
            break;
  case "Wednesday":    
            $d2 = date("d-M-y", strtotime(date("d-M-y",$day)."+0 days")); 
            break;
           }
  $days = array();
for($i=0;$i<20;$i++){
    $days[$i] = $d2;
    $d2 = date("d-M-y", strtotime($d2."-7 days"));
}

//$sql = "SELECT ";
//mysqli_query();

echo "<select name='weekWork' style='margin-left: 70px; margin-top: 10px; width: 100px; height: 20px;'>";
echo " <option> None </option> ";
for($i=0;$i<20;$i++){
   echo " <option> $days[$i] </option> ";
}
//echo " <option> Show all year </option> ";
//echo " <option> Show totals </option> ";
echo "</select>";

echo "<select name='yearWork' style='margin-left: 70px; margin-top: 10px; width: 100px; height: 20px;'>";
echo " <option> None </option> ";
for($i=2016;$i<2040;$i++){
echo " <option> $i </option> ";
      }
echo "</select> <br/> <br/> <br/> <br/>";

echo "<button name='but3' style='margin-left: 250px;'> Report </button>";
echo "</form>";


?>