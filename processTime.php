<?php
session_start();
date_default_timezone_set("Australia/Perth");

/*    //if(isset($_POST['but1'])){
    if($_POST['but1'] == 1){
    // $_SESSION['dateBase'] = $_POST['baseDate'];
     //$_SESSION['dateBase'] = $_POST['hours1'][0];
     $_SESSION['dateBase'] = $_POST['baseHour'];
     $date3 = date("d-M-y", strtotime($_SESSION['dateBase']."-1 weeks"));
     echo "saga";
}
//elseif(isset($_POST['but2'])){
   elseif($_POST['but2'] == 1){
   //  $_SESSION['dateBase'] = $_POST['baseDate'];
   //  $_SESSION['dateBase'] = $_POST['hours1'][0];
     $_SESSION['dateBase'] = $_POST['baseHour'];
     $date3 = date("d-M-y", strtotime($_SESSION['dateBase']."+1 weeks"));
     echo "Maga";
} else {
      $date3 = NULL;
      $date1 = date("d-M-y");
      $date2 = date("l");
         switch($date2){
  case "Thursday":   
            $date3 = date("d-M-y", strtotime($date1."-7 days"));
             break;
  case "Friday":   
            $date3 = date("d-M-y", strtotime($date1."-8 days"));
            break;
  case "Saturday": 
            $date3 = date("d-M-y", strtotime($date1."-9 days"));
            break;
  case "Sunday":  
            $date3 = date("d-M-y", strtotime($date1."-10 days"));
            break;
  case "Monday":    
            $date3 = date("d-M-y", strtotime($date1."+2 days"));
            break;
  case "Tuesday":  
            $date3 = date("d-M-y", strtotime($date1."+1 days"));
            break;
  case "Wednesday":    
            $date3 = date("d-M-y", strtotime($date1."+0 days"));
            break;
           }
     }
  */

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
      <aside> Hours are expressed in 0-24 hrs format</aside>
      </div>
      <hr id="lastHr"> </hr>
     <span id="wrapError"> &nbsp; <span id="errorSpan"> </span> &nbsp;</span>
     <br/>
     <span class="timesheetFor"> Timesheet for: &nbsp; <?php echo "<span id ='sessName'>". $_SESSION['name']."</span>" ?> </span>
     <span id="chckB1" class="chckB1"><input type="checkbox" id="chckB2"> &nbsp; For unpaid break minutes, check </input> </span>
     <br/>
   
       <div id="buttns">
       <!--  <input type="submit" name="but1" id="but1" value="previous week"> </input>
         <input type="submit" name="but2" value="next week"> Next Week </input> -->

      <button name="but1" id="but1">Previous Week</button>
      <button name="but2" id="but2"> Next Week </button>
       </div>
       <div class="Tb">
            <form action="submitTimesheet.php" method="POST">
            <table>
               <caption> Week worked: <span id="weekWorked">  </span>  </caption>
                     <tr class="firstRow">
                          <th class="days">Day</th><th vis="visible">Date</th><th vis="visible"> Start Time </th> <th vis="visible"> Finish Time </th> <th vis="visible"> Break min </th> <th vis="visible"> Hours worked </th>
                     </tr>
                      <tr>
                                 <td class="days"> Thursday</td>
                              <td> <input type="text" value="" name="hours1[]" class="inpDate" readonly></input> </td> 
                               <th class="days" invis="invisible">Start Time</th>
							  <td> <input type="text" placeholder="hh:mm" id="startHr1" onkeyup="timeValid(this)" class="startHrs" name="hours1[]"> </input>  </td>
                               <th class="days" invis="invisible">Finish Time</th>
							  <td> <input type="text" placeholder="hh:mm" id="endHr1" onkeyup="timeValid(this)" class="startHrs" name="hours1[]"> </input>  </td>
                               <th class="days" invis="invisible">Break Min</th>
							  <td> <input type="text" placeholder="minutes" id="breakT1" onfocus="animChckB2()" onblur="animChckB1()" name="hours1[]"> </input>  </td>
                               <th class="days" invis="invisible">Hours worked</th>
							  <td> <input type="text" placeholder="No of Hrs" id="hoursCalc1" onfocus="calculate(this)" class="startHrs" readonly name="hours1[]"> </input> </td>
                      </tr>
                      <tr>
					           <th class="days" invis="invisible">Day</th>
                              <td class="days"> Friday</td> 
							  <td> <input type="text" class="inpDate" value="" name="hours2[]" readonly >  </input> </td>
                                <th class="days" invis="invisible">Start Time</th>
							  <td> <input type="text" placeholder="hh:mm" id="startHr2" onkeyup="timeValid(this)" class="startHrs" name="hours2[]">  </input>  </td>
                                <th class="days" invis="invisible">Finish Time</th>
							  <td> <input type="text" placeholder="hh:mm" id="endHr2" onkeyup="timeValid(this)" class="startHrs" name="hours2[]"> </input>  </td>
                                <th class="days" invis="invisible">Break Min</th>
							  <td> <input type="text" placeholder="minutes" id="breakT2" onfocus="animChckB2()" onblur="animChckB1()" name="hours2[]"> </input>  </td>
                               <th class="days" invis="invisible">Hours worked</th>
							  <td> <input type="text" placeholder="No of Hrs" id="hoursCalc2" onfocus="calculate(this)" class="startHrs" readonly name="hours2[]"> </input></td>
                      </tr>
                      <tr>
					           <th class="days" invis="invisible">Day</th>
                              <td> Saturday</td> 
                              <td> <input type="text" class="inpDate" value="" name="hours3[]" readonly> </input> </td>
							   <th class="days" invis="invisible">Start Time</th>
                              <td> <input type="text" placeholder="hh:mm" id="startHr3" onkeyup="timeValid(this)" class="startHrs" name="hours3[]"> </input>  </td>
                                <th class="days" invis="invisible">Finish Time</th>
							  <td> <input type="text" placeholder="hh:mm" id="endHr3" onkeyup="timeValid(this)" class="startHrs" name="hours3[]"> </input>  </td>
                                <th class="days" invis="invisible">Break Min</th>
							  <td> <input type="text" placeholder="minutes" id="breakT3" onfocus="animChckB2()" onblur="animChckB1()" name="hours3[]"> </input>  </td>
                                <th class="days" invis="invisible">Hours worked</th>
							  <td> <input type="text" placeholder="No of Hrs" id="hoursCalc3" onfocus="calculate(this)" readonly class="startHrs" name="hours3[]"> </input> </td>
                      </tr>
                      <tr>
                              <td> Sunday</td> 
                              <td> <input type="text" class="inpDate" value="" name="hours4[]" readonly> </input> </td>
                              <td> <input type="text" placeholder="hh:mm" id="startHr4" onkeyup="timeValid(this)" class="startHrs" name="hours4[]"> </input>  </td>
                              <td> <input type="text" placeholder="hh:mm" id="endHr4" onkeyup="timeValid(this)" class="startHrs" name="hours4[]"> </input>  </td>
                              <td> <input type="text" placeholder="minutes" id="breakT4" onfocus="animChckB2()" onblur="animChckB1()" name="hours4[]"> </input>  </td>
                              <td> <input type="text" placeholder="No of Hrs" id="hoursCalc4" onfocus="calculate(this)" readonly class="startHrs" name="hours4[]"> </input> </td>
                      </tr>
                      <tr>
                              <td> Monday</td> 
                              <td> <input type="text" class="inpDate" value="" name="hours5[]" readonly> </input> </td> 
                              <td> <input type="text" placeholder="hh:mm" id="startHr5" onkeyup="timeValid(this)" class="startHrs" name="hours5[]"> </input>  </td>
                              <td> <input type="text" placeholder="hh:mm" id="endHr5" onkeyup="timeValid(this)" class="startHrs" name="hours5[]"> </input>  </td>
                              <td> <input type="text" placeholder="minutes" id="breakT5" onfocus="animChckB2()" onblur="animChckB1()" name="hours5[]"> </input>  </td>
                              <td> <input type="text" placeholder="No of Hrs" id="hoursCalc5" onfocus="calculate(this)" readonly class="startHrs" name="hours5[]"> </input> </td>
                      </tr>
                      <tr>
                              <td> Tuesday</td> 
                              <td> <input type="text" class="inpDate" value="" name="hours6[]" readonly> </input> </td> 
                              <td> <input type="text" placeholder="hh:mm" id="startHr6" onkeyup="timeValid(this)" class="startHrs" name="hours6[]"> </input>  </td>
                              <td> <input type="text" placeholder="hh:mm" id="endHr6" onkeyup="timeValid(this)" class="startHrs" name="hours6[]"> </input>  </td>
                              <td> <input type="text" placeholder="minutes" id="breakT6" onfocus="animChckB2()" onblur="animChckB1()" name="hours6[]"> </input>  </td>
                              <td> <input type="text" placeholder="No of Hrs" id="hoursCalc6" onfocus="calculate(this)" readonly  name="hours6[]"> </input> </td>
                      </tr>
                      <tr>
                             <td> Wednesday</td> 
                             <td> <input type="text" id="baseDate" class="inpDate" value="" name="hours7[]" readonly> </input>   </td>
                             <td> <input type="text" placeholder="hh:mm" id="startHr7" onkeyup="timeValid(this)" class="startHrs" name="hours7[]" > </input>  </td>
                             <td> <input type="text" placeholder="hh:mm" id="endHr7" onkeyup="timeValid(this)" class="startHrs" name="hours7[]"></input>  </td>
                             <td> <input type="text" placeholder="minutes" id="breakT7" onfocus="animChckB2()" onblur="animChckB1()" name="hours7[]"> </input>  </td>
                             <td> <input type="text" placeholder="No of Hrs" id="hoursCalc7" onfocus="calculate(this)" readonly class="startHrs" name="hours7[]"> </input> </td>
                     </tr>
                     <tr>
                             <td> Comments </td> 
                             <td> <textarea name="hours8[]"> </textarea> </td>
                             <td style="color: rgba(10,60,150, 0.8)"> <b>TOTAL</b>  </td>
                             <td style="color: rgba(10,60,150, 0.8)"> <b>No of Hours</b>  </td>
                             <td>  </td>
                             <td> <input type="text" placeholder="No of Hrs" id="hoursTotal" name="hours8[]" readonly> </input> </td>
                     </tr>
          </table>
  </div>
   <div style="clear: both; height: 15px;"> </div>
   <div style="height: 15px;"> 
        <span id="subDiv">
            <input type="submit" value="Submit"> </input> &nbsp; &nbsp; &nbsp; &nbsp;  
        </span>  
 </form>    
      <span class="cancelAll" onclick="deleteAll()"> Cancel All</span> 
   </div>
  </body>
</html>