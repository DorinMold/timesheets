<?php
session_start();
require_once("connectionDatabase.php");
date_default_timezone_set("Australia/Perth");
$i = 0;
$user = "";
$name = $_POST['nameEmployee'];
$week = $_POST['weekWork'];
$year = $_POST['yearWork'];


/*echo date("d-m-y",$b2);
echo date("d-m-y",$b1); */

    echo "<div style='text-align: center;'>"; 
  if (isset($name)){
    echo "<br/> Report for: &nbsp; <b>". $name ."</b><br/><hr/>";
          if($year=="None"){
               $b2 = strtotime($week);
               $b1 = strtotime($week."-6 days");
       //echo $b1 = date("d-M-y", $b1)."<br/>";
       //echo $b2 = date("d-M-y", $b2)."<br/>";
              // $b2 = mktime(0,0,0,date("m",$b2),date("d",$b2),date("Y",$b2));
              // $b1 = mktime(0,0,0,date("m",$b1),date("d",$b1),date("Y",$b1));
               echo " <span style='background-color: yellow;'> Period: " . $week . "</span><br/><br/>";
               $b2 = $b2 + 49000;
               if($name=="All users"){     
                $query = mysqli_query($conn, "SELECT * FROM Timesheet WHERE (`DayDateTransf` > $b1 AND `DayDateTransf` < $b2) ORDER BY `DayDate` ASC");
                   }else{
                $query = mysqli_query($conn, "SELECT * FROM Timesheet WHERE `Name` = '$name' AND (`DayDateTransf` > $b1  AND `DayDateTransf` < $b2) ORDER BY `DayDate` ASC");
                   }
          }else{
               $b1 = strtotime("1 January".$year);
               $b2 = strtotime("1 January".$year."+1 year");
       //echo $b1 = date("d-M-y", $b1)."<br/>";
       //echo $b2 = date("d-M-y", $b2)."<br/>";
               $b2 = mktime(0,0,0,1,1,date("Y",$b2));
               $b1 = mktime(0,0,0,1,1,date("Y",$b1));
            echo " <span style='background-color: yellow;'> Period: " . $year . "</span><br/><br/>";
               if($name=="All users"){     
                $query = mysqli_query($conn, "SELECT * FROM Timesheet WHERE (`DayDateTransf` > $b1 AND `DayDateTransf` < $b2) ORDER BY `DayDateTransf` ASC");
            }else{
                $query = mysqli_query($conn, "SELECT * FROM Timesheet WHERE `Name` = '$name' AND (`DayDateTransf` > $b1  AND `DayDateTransf` < $b2))");
            }
         }
    if(@mysqli_num_rows($query) > 0) {
            if($year=="None"){
                mysqli_data_seek($query,0);
                $t1 = mysqli_fetch_row($query);
                $timeAd = $t1[7];
                //$query = mysqli_query($conn, "SELECT * FROM Timesheet WHERE `Name` = '$name' AND `TimeAdded` = '$timeAd' ORDER BY `DayDate` ASC");
         
                    if($name!="All users"){
                       $query = mysqli_query($conn, "SELECT * FROM Timesheet WHERE `Name` = '$name' AND `TimeAdded` = '$timeAd' ORDER BY '$name' ASC, `DayDateTransf` ASC");
                     } else {
                       $query = mysqli_query($conn, "SELECT * FROM Timesheet WHERE (`DayDateTransf` > $b1 AND `DayDateTransf` <= $b2) ORDER BY '$name' ASC");
                     }
              } 
               while($result = mysqli_fetch_array($query, MYSQLI_NUM)){
                 // echo  "<br/> &nbsp;" . mysqli_data_seek($result,$i)[1] . "&nbsp; &nbsp; &nbsp;" .  $result[2] . "&nbsp; &nbsp; &nbsp;  &nbsp;" . $result[3] ."&nbsp; &nbsp; &nbsp;  &nbsp;" . $result[4] ."&nbsp; &nbsp; &nbsp; <br/>" ; 
                  if(strtoupper($result[1]) == "TOTAL" && $name != "All users") {
                              $sql =  "<br/> &nbsp;" . $result[1] . "&nbsp; &nbsp; &nbsp;" . $result[2]."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" . $result[3]."&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp;" . $result[4] . "&nbsp; &nbsp; &nbsp;" . $result[5] . "&nbsp; &nbsp; &nbsp; <br/><br/>" . $result[6] ."<br/><br/><br/>";
                                  } else { 
                                  if($result[0]!==$user && strtoupper($result[1]) != "TOTAL" && $user!= "All users"){
                                           echo "<br/>";
                                           echo "<b>$result[0] </b><br/>";
                                           echo "<span style='display: inline-block; min-width: 300px; height: 2px; background-color: red;'> </span><br/>";
                                            }                    
                                  if(empty($result[4])==true && strtoupper($result[1]) != "TOTAL" ){
                                           $result[4] = "&nbsp; &nbsp;";
                                           echo  "&nbsp;" . $result[1] . "&nbsp; &nbsp; &nbsp;" . $result[2]."&nbsp; &nbsp; &nbsp;" . $result[3]."&nbsp; &nbsp; &nbsp;" . $result[4] . "&nbsp; &nbsp; &nbsp;" . $result[5] . "&nbsp; &nbsp; &nbsp;" . $result[6] ."<br/>";
                                           echo "<span style='display: inline-block; min-width: 300px; height: 2px; border-bottom: 1px solid blue;'> </span><br/>";
                                           $user = $result[0];
                                        } elseif(strtoupper($result[1]) != "TOTAL") {
                                           echo  "&nbsp;" . $result[1] . "&nbsp; &nbsp; &nbsp;" . $result[2]."&nbsp; &nbsp; &nbsp;" . $result[3]."&nbsp; &nbsp; &nbsp;" . $result[4] . "&nbsp; &nbsp; &nbsp;" . $result[5] . "&nbsp; &nbsp; &nbsp;" . $result[6] ."<br/>";
                                           echo "<span style='display: inline-block; min-width: 300px; height: 2px; border-bottom: 1px solid blue;'> </span><br/>";
                                           $user = $result[0];
                                        } 
                      }
               }
            }else{
                                    echo ($year == "None") ? "There's no data to show for week:  $week" : "There's no data to show for year:  $year";
                                 }
     
    echo $sql;
}
      echo "<br/> <br/>";
     
?>

<!DOCTYPE html>
<html>
<form action="admin.php" method="POST">
    <center><button style="height: 22px; font-weight: bold; width: 60px;"> Back </button></center>
</form>
<html>
<?php
   echo "</div>";
?>