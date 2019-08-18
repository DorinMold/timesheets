<?php
session_start();
$h1 = $_GET['d1'];
$h2 = $_GET['d2'];
$h3 = $_GET['d3'];
$h4 = $_GET['d4'];
$h5 = $_GET['d5'];
$h6 = $_GET['d6'];
$h7 = $_GET['d7'];
//ini_set('max_execution_time', 100);
require_once('connectionDatabase.php');
//$dateB = $_SESSION['basedate'];
$name = $_SESSION['name'];
/*$dayDate = array();
$hrSt = array();
$hrEnd = array();
$dayBreak = array();
$workTime = array();*/
$finalT = array(); 
$slice = array();
$i = 0;
            //$sql = "SELECT `TimeAdded` FROM Timesheet WHERE `DayDate` = '$dateB' AND `Name` = '$name'";
            //$res = mysqli_query($conn,$sql);
//$rNo = mysqli_num_rows($res);
//echo $rNo;
            //$time = mysqli_fetch_array($res, MYSQLI_NUM); 
            //$t = $time[0];
            //$sql = "SELECT * FROM Timesheet WHERE `TimeAdded` = '$t' AND `Name` = '$name' ORDER BY `DayDate` ASC";
$sql = "SELECT `DayDate`, `StartHour`, `EndHour`,`BreakMin`, `WorkTime`, `Comments` FROM Timesheet WHERE `TimeAdded` = (SELECT `TimeAdded` FROM Timesheet WHERE `DayDate` IN ('$h1', '$h2', '$h3', '$h4', '$h5', '$h6', '$h7') AND `Name` = '$name' LIMIT 1) ORDER BY `DayDate` ASC";
$res = mysqli_query($conn,$sql);
//$time = mysqli_fetch_array($res, MYSQLI_NUM); 
$r =  mysqli_num_rows($res);
$slice = g($res, $finalT);


$h1p = array_search($h1, $finalT[0]);
$h2p = array_search($h2, $finalT[0]);
$h3p = array_search($h3, $finalT[0]);
$h4p = array_search($h4, $finalT[0]);
$h5p = array_search($h5, $finalT[0]);
$h6p = array_search($h6, $finalT[0]);
$h7p = array_search($h7, $finalT[0]); 

if($h1p > -1){
  $slice[0] = array_slice($finalT[0],$h1p,5);
}else{$slice[0]=array($h1,0,0,0,0);}

if($h2p > -1){
  $slice[1] = array_slice($finalT[0],$h2p,5);
}else{$slice[1]=array($h2,0,0,0,0);}

if($h3p > -1){
  $slice[2] = array_slice($finalT[0],$h3p,5);
}else{$slice[2]=array($h3,0,0,0,0);}

if($h4p > -1){
  $slice[3] = array_slice($finalT[0],$h4p,5);
}else{$slice[3]=array($h4,0,0,0,0);}

if($h5p > -1){
  $slice[4] = array_slice($finalT[0],$h5p,5);
}else{$slice[4]=array($h5,0,0,0,0);}

if($h6p > -1){
  $slice[5] = array_slice($finalT[0],$h6p,5);
}else{$slice[5]=array($h6,0,0,0,0);}

if($h7p > -1){
  $slice[6] = array_slice($finalT[0],$h7p,5);
}else{$slice[6]=array($h7,0,0,0,0);}

  

/*if($r==8){
g($res, $finalT);
}elseif($r==7){
   g($res, $finalT);
   if(in_array($h1, $finalT[0])==false){
      $slice = array_merge([0,0,0,0,0],$finalT[0]);
      $finalT[0] = $slice1; 
     }

   if(in_array($h2, $finalT[0])==false){
      $slice = array_merge([0,0,0,0,0],$finalT[0]);
      $finalT[0] = $slice1;
     }

   if(in_array($h3, $finalT[0])){
   array_push($finalT[0],0,0,0,0,0);
     }

   if(in_array($h4, $finalT[0])){
   array_push($finalT[0],0,0,0,0,0);}

   if(in_array($h5, $finalT[0])){
   array_push($finalT[0],0,0,0,0,0);}

   if(in_array($h6, $finalT[0])){
   array_push($finalT[0],0,0,0,0,0);}

   if(in_array($h7, $finalT[0])){
   array_push($finalT[0],0,0,0,0,0);}
   
}elseif($r==6){
    g($res, $finalT);
    for($i=5;$i<=6;$i++){
    array_push($finalT[0],0,0,0,0,0);
     }
}elseif($r==5){
    g($res, $finalT);
   for($i=4;$i<=6;$i++){
    array_push($finalT[0],0,0,0,0,0);
     }
    
}elseif($r==4){
     g($res, $finalT);
   for($i=3;$i<=6;$i++){
    array_push($finalT[0],0,0,0,0,0);
     }
    
}elseif($r==3){
     g($res, $finalT);
   for($i=2;$i<=6;$i++){
    array_push($finalT[0],0,0,0,0,0);
     }
   
}elseif($r==2){
    g($res, $finalT);
   for($i=1;$i<=6;$i++){
    array_push($finalT[0],0,0,0,0,0);
     }

}elseif($r==1){ 
     g($res, $finalT);
   for($i=0;$i<=6;$i++){
    array_push($finalT[0],0,0,0,0,0);
     }  
} */


function g(&$res, &$finalT){
   global $conn;
   global $name;
   global $dateB;
   $final=array(); 
  //$res = mysqli_query($conn,$sql);
  while($time = mysqli_fetch_array($res, MYSQLI_NUM)){
  if(trim($time[1]) != "TOTAL") {
     //if($time[1] != NULL) $daydate[$i] = $time[1];
     //     else $daydate[$i] = 0; 
     //if($time[2] != NULL) $hrSt[$i] = $time[2]; 
     //     else $hrSt[$i] = 0;
     //if($time[3] != NULL) $hrEnd[$i] = $time[3];
     //     else $hrEnd[$i] = 0;
     //if($time[4] != NULL) $dayBreak[$i] = $time[4];
     //     else $dayBreak[$i] = 0;
     //if($time[5] != NULL) $workTime[$i] = $time[5];
      //    else $workTime[$i] = 0;
    //echo $time[3];
    array_push($final,$time[0], $time[1], $time[2], $time[3], $time[4]);
    $i++;
   }else{
      if ($time[6]!= NULL) $comm = $time[6];
      //$totalTime = $time[4];
      array_push($finalT, $final);
      array_push($finalT, array($time[6],$time[4]));
      $dateB = $finalT[0][0];
      $del = mysqli_fetch_array(mysqli_query($conn,"SELECT `TimeAdded` FROM Timesheet WHERE `DayDate`='$dateB' AND `Name` = '$name' LIMIT 1"));
      (string)$d = $del[0];
      mysqli_query($conn, "DELETE FROM Timesheet WHERE `Name` = '$name' AND `TimeAdded`='$d'");
      return $finalT;
   }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
   <link  rel="stylesheet" type="text/css" href="style.css"/>
   <script type="text/javascript" src="jquery-3.1.1.js"> </script>
   <script type="text/javascript" src="JSc.js"> </script>
 
</head>
 <body scroll="yes">
      <div id="firstHr"> 
      <aside> Hours are expressed in 0-24 hrs format </aside>
       </div>
      <hr id="lastHr"> </hr>
     <br/>
     <span id="wrapError"> &nbsp; <span id="errorSpan"> </span> &nbsp;</span>
     <span style="margin-left: 2px;"> Timesheet for: &nbsp; <?php echo "<span style='text-decoration: underline; font-size: larger; font-weight: bold;'>". $_SESSION['name']."</span>" ?> </span>
     <div id="chckB1" class="chckB1"><input type="checkbox" id="chckB2"> &nbsp; For unpaid break minutes, check </input> </div>
   
       <div id="buttns" style="margin:1% auto;">
       <!--  <input type="submit" name="but1" id="but1" value="previous week"> </input>
         <input type="submit" name="but2" value="next week"> Next Week </input> -->

      <button name="but1" id="but1">Previous Week</button>
      <button name="but2" id="but2"> Next Week </button>
       </div>
       <div class="Tb">
        <span id="weekWorked" style="width:150px;" > Alter ha Timesheet:  <?php echo $h7 ?> </span>
            <form action="submitTimesheet.php" method="POST">  
                     <table>
                     <tr>
                          <th class="days">Day</th><th>Date</th><th> Start Time </th> <th> Finish Time </th> <th> Break min </th> <th> Hours worked </th>
                     </tr>
                      <tr>
                              <td class="days"> Thursday</td>
                              <td> <input type="text" value=<?php echo $slice[0][0] ?> name="hours1[]" class="inpDate" readonly></input> </td> 
                              <td> <input type="text" value="<?php echo $slice[0][1] ?>" placeholder="hh:mm" id="startHr1" onkeyup="timeValid(this)" class="startHrs" name="hours1[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[0][2] ?>" placeholder="hh:mm" id="endHr1" onkeyup="timeValid(this)" class="startHrs" name="hours1[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[0][3] ?>" placeholder="minutes" id="breakT1" onfocus="animChckB2()" onblur="animChckB1()" name="hours1[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[0][4] ?>" placeholder="No of Hrs" id="hoursCalc1" onfocus="calculate(this)" class="startHrs" readonly name="hours1[]"> </input> </td>
                      </tr>
                      <tr>
                              <td class="days"> Friday</td> 
                              <td> <input type="text" class="inpDate" value=<?php echo date("d-M-y", strtotime($slice[0][0]."+1 days")) ?> name="hours2[]" readonly >  </input> </td>
                              <td> <input type="text" value="<?php echo $slice[1][1] ?>"  placeholder="hh:mm"  id="startHr2" onkeyup="timeValid(this)" class="startHrs" name="hours2[]">  </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[1][2] ?>" placeholder="hh:mm" id="endHr2" onkeyup="timeValid(this)" class="startHrs" name="hours2[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[1][3] ?>" placeholder="minutes"  id="breakT2" onfocus="animChckB2()" onblur="animChckB1()" name="hours2[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[1][4] ?>" placeholder="No of Hrs" id="hoursCalc2" onfocus="calculate(this)" class="startHrs" readonly name="hours2[]"> </input></td>
                      </tr>
                      <tr>
                              <td> Saturday</td> 
                              <td> <input type="text" class="inpDate" value="<?php echo date("d-M-y", strtotime($slice[0][0]."+2 days")) ?>" name="hours3[]" readonly> </input> </td>
                              <td> <input type="text" value="<?php echo $slice[2][1] ?>" placeholder="hh:mm" id="startHr3" onkeyup="timeValid(this)" class="startHrs" name="hours3[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[2][2] ?>" placeholder="hh:mm" id="endHr3" onkeyup="timeValid(this)" class="startHrs" name="hours3[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[2][3] ?>" placeholder="minutes" id="breakT3" onfocus="animChckB2()" onblur="animChckB1()" name="hours3[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[2][4] ?>" placeholder="No of Hrs" id="hoursCalc3" onfocus="calculate(this)" readonly class="startHrs" name="hours3[]"> </input> </td>
                      </tr>
                      <tr>
                              <td> Sunday</td> 
                              <td> <input type="text" class="inpDate" value="<?php echo $slice[3][0] ?>" name="hours4[]" readonly> </input> </td>
                              <td> <input type="text" value="<?php echo $slice[3][1] ?>" placeholder="hh:mm" id="startHr4" onkeyup="timeValid(this)" class="startHrs" name="hours4[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[3][2] ?>" placeholder="hh:mm" id="endHr4" onkeyup="timeValid(this)" class="startHrs" name="hours4[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[3][3] ?>" placeholder="minutes" id="breakT4" onfocus="animChckB2()" onblur="animChckB1()" name="hours4[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[3][4] ?>" placeholder="No of Hrs" id="hoursCalc4" onfocus="calculate(this)" readonly class="startHrs" name="hours4[]"> </input> </td>
                      </tr>
                      <tr>
                              <td> Monday</td> 
                              <td> <input type="text" class="inpDate" value=<?php echo $slice[4][0] ?> name="hours5[]" readonly> </input> </td> 
                              <td> <input type="text" value="<?php echo $slice[4][1] ?>" placeholder="hh:mm" id="startHr5" onkeyup="timeValid(this)" class="startHrs" name="hours5[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[4][2] ?>" placeholder="hh:mm" id="endHr5" onkeyup="timeValid(this)" class="startHrs" name="hours5[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[4][3] ?>" placeholder="minutes" id="breakT5" onfocus="animChckB2()" onblur="animChckB1()" name="hours5[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[4][4] ?>" placeholder="No of Hrs" id="hoursCalc5" onfocus="calculate(this)" readonly class="startHrs" name="hours5[]"> </input> </td>
                      </tr>
                      <tr>
                              <td> Tuesday</td> 
                              <td> <input type="text" class="inpDate" value="<?php echo $slice[5][0] ?>" name="hours6[]" readonly> </input> </td> 
                              <td> <input type="text" value="<?php echo $slice[5][1] ?>" placeholder="hh:mm" id="startHr6" onkeyup="timeValid(this)" class="startHrs" name="hours6[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[5][2] ?>" placeholder="hh:mm" id="endHr6" onkeyup="timeValid(this)" class="startHrs" name="hours6[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[5][3] ?>" placeholder="minutes" id="breakT6" onfocus="animChckB2()" onblur="animChckB1()" name="hours6[]"> </input>  </td>
                              <td> <input type="text" value="<?php echo $slice[5][4] ?>" placeholder="No of Hrs" id="hoursCalc6" onfocus="calculate(this)" readonly  name="hours6[]"> </input> </td>
                      </tr>
                      <tr>
                             <td> Wednesday</td> 
                             <td> <input type="text" id="baseDate" class="inpDate" value="<?php echo $slice[6][0] ?>" name="hours7[]" readonly> </input>   </td>
                             <td> <input type="text" value="<?php echo $slice[6][1] ?>" placeholder="hh:mm" id="startHr7" onkeyup="timeValid(this)" class="startHrs" name="hours7[]" > </input>  </td>
                             <td> <input type="text" value="<?php echo $slice[6][2] ?>" placeholder="hh:mm" id="endHr7" onkeyup="timeValid(this)" class="startHrs" name="hours7[]"></input>  </td>
                             <td> <input type="text" value="<?php echo $slice[6][3] ?>" placeholder="minutes" id="breakT7" onfocus="animChckB2()" onblur="animChckB1()" name="hours7[]"> </input>  </td>
                             <td> <input type="text" value="<?php echo $slice[6][4] ?>" placeholder="No of Hrs" id="hoursCalc7" onfocus="calculate(this)" readonly class="startHrs" name="hours7[]"> </input> </td>
                     </tr>
                     <tr>
                             <td> Comments </td> 
                             <td> <textarea name="hours8[]" value="<?php echo $finalT[1][0] ?>"> </textarea> </td>
                             <td style="color:red"> <b>TOTAL</b>  </td>
                             <td style="color:red"> <b>No Of Hours</b>  </td>
                             <td>  </td>
                             <td> <input type="text" value=<?php echo $finalT[1][1] ?> placeholder="No of Hrs" id="hoursTotal" name="hours8[]" readonly> </input> </td>
                     </tr>
          </table>
  </div>
   <br/>
        <span id="subDiv">
            <input type="submit" value="Submit">
        </span>  
 </form>
 </div> 
    <span class="cancelAll" onclick="deleteAll()"> Cancel All</span>  
</body>
</html>