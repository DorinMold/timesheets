<?php
session_start();
date_default_timezone_set("Australia/Perth");
//if(isset($_POST['but1'])){
    if($_POST['but1'] == 1){
    // $_SESSION['dateBase'] = $_POST['baseDate'];
     //$_SESSION['dateBase'] = $_POST['hours1'][0];
     $_SESSION['dateBase'] = $_POST['baseHour'];
     $date3 = date("d-M-y", strtotime($_SESSION['dateBase']."-1 weeks"));
}
//elseif(isset($_POST['but2'])){
   elseif($_POST['but2'] == 1){
   //  $_SESSION['dateBase'] = $_POST['baseDate'];
   //  $_SESSION['dateBase'] = $_POST['hours1'][0];
     $_SESSION['dateBase'] = $_POST['baseHour'];
     $date3 = date("d-M-y", strtotime($_SESSION['dateBase']."+1 weeks"));
} else {
      $date3 = NULL;
      $date1 = date("d-M-y");
      $date2 = date("l");
         switch($date2){
  case "Thursday":   
            $date3 = date("d-M-y", strtotime($date1."-0 days"));
             break;
  case "Friday":   
            $date3 = date("d-M-y", strtotime($date1."-1 days"));
            break;
  case "Saturday": 
            $date3 = date("d-M-y", strtotime($date1."-2 days"));
            break;
  case "Sunday":  
            $date3 = date("d-M-y", strtotime($date1."-3 days"));
            break;
  case "Monday":    
            $date3 = date("d-M-y", strtotime($date1."-4 days"));
            break;
  case "Tuesday":  
            $date3 = date("d-M-y", strtotime($date1."-5 days"));
            break;
  case "Wednesday":    
            $date3 = date("d-M-y", strtotime($date1."-6 days"));
            break;
           }
     }
  $daysSet=array($date3, date("d-M-y", strtotime($date3."+1 days")), date("d-M-y", strtotime($date3."+2 days")), date("d-M-y", strtotime($date3."+3 days")), date("d-M-y", strtotime($date3."+4 days")), date("d-M-y", strtotime($date3."+5 days")), date("d-M-y", strtotime($date3."+6 days")));
  echo json_encode($daysSet);
?>