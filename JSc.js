 window.addEventListener("load", function(){
          setTimeout(function(){
                var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var j = new Date();
                var T = new String();
                var V = new String();
         switch(weekday[j.getDay()]){
     case "Monday":
          j.setDate(j.getDate() + 2);
          T = j.getDate();
           break;
     case "Tuesday":
         j.setDate(j.getDate() + 1);
         T = j.getDate();
           break;
     case "Wednesday":
         j.setDate(j.getDate() + 0);
         T = j.getDate();
           break;
     case "Thursday":
         j.setDate(j.getDate() + 6);
         T = j.getDate();
           break;
     case "Friday":
         j.setDate(j.getDate() + 5);
         T = j.getDate();
           break;
     case "Saturday":
         j.setDate(j.getDate() + 4);
         T = j.getDate();
           break;
     case "Sunday":
         j.setDate(j.getDate() + 3);
         T = j.getDate();
           break;
       }
	   document.getElementById("weekWorked").textContent = j.getDay().toString() + " - " + j.toString().toLocaleString("en",{month:"long"}) + j.getYear().toString();
       T = parseInt(T);
	   if(T.toString().length == 1) T = "0" + T.toString();
                V = document.getElementByClassName("inpDate")[0].value;
				
                //document.getElementByClassName("inpDate")[0].innerHTML = V;
                if(document.getElementById("weekWorked").textContent.substr(0,2) != T.toString()){
                      alert("This is not the last week worked!");
                         }
                  }, 400);


   /*  doesn't work because it's readonly
            var dateFields = document.getElementsByClassName("inpDate");
            dateFields.item(5).addEventListener("", function(){
                 if(document.getElementById("weekWorked").textContent.substr(0,2) != T.toString()){
                      alert("This is not the last week worked!");
                         } else {
                           alert('baga');
                         }
                  }); */
  

      var hrsFields = document.getElementsByClassName("startHrs");
       for (var i = 0; i<hrsFields.length;i++){
          // hrsFields[i].addEventListener("blur", checkValidity);
            hrsFields.item(i).addEventListener("blur", checkValidity);
             }; 

   //document.getElementsByClassName("startHrs")[0].addEventListener("blur", function(checkValidity){checkValidity(e)});
             
            // timeChange1();  

  //$(document).ready(function(){
	   
        if($('.inpDate').eq(0).val() == ""){
           $.post("timeProcess.php", { }, function(data){
			   alert('mango');
             return replaceTime(data);
           });
         }
   timeChange1();
      $("window").scroll(function(){
         alert($('#Tb').scrollTop());
          });
      // });
                       }) 

function timeValid(e){
     var T = e.value;
     if(T.length==5 && isNaN(T.substr(0,2)) == false ){
        if(T.substr(3,2)>=60){
            alert("Number of minutes incorrect");
          }else if(T.substr(0,2)>=24){
              alert("Number of hours incorrect");
           }
      }
     if(T.length==2 && isNaN(T.substr(0,2)) == false  ){
         if(T > 24 && T.substr(0,1)!= "0"){
           e.value = "0" + T;
            }
     }else if(T.length==4 && isNaN(T.substr(0,2)) == false ){
        if(T.substr(2,1)!= ":"){
        e.value=T.substr(0,2) + ":" + T.substr(2,2);
         T = e.value
              if(T.length==5){
                    if(T.substr(3,2)>=60){
                       alert("Number of minutes incorect");
                     }
                    if(Number(T.substr(0,2))>=24){
                       alert("The hours figure is incorrect")
                    }
             }
         }
      }else if(T.length>5 && isNaN(T.substr(0,2)) == false ){
       e.value = T.slice(0,-1);
   }else if(T.length==3 && T.substr(0,1)!= "0" && T.substr(0,2) < 24) {
      e.value = "0" + T;
      if(T.indexOf(":")==-1) {e.value = T.substr(0,2) + ":" + T.substr(2,2);}
   }

}

function checkValidity(e){
      //alert(e.target.id);
   if(e.target.value.toString().length != 5 && isNaN(e.target.value.substr(0,2)) == false ){
      document.getElementById("errorSpan").innerText="ERROR: Hour NOT correct";
      document.getElementById("errorSpan").textContent="ERROR: Hour NOT correct";
      document.getElementById("wrapError").style.backgroundColor="rgba(0,0,0,0.8)";
      document.getElementById("errorSpan").style.fontSize = "12";
      document.getElementById("wrapError").style.position = "absolute";
      document.getElementById("wrapError").style.display="inline";
      document.getElementById("wrapError").style.top = e.target.offsetTop+e.target.offsetParent.offsetTop-e.target.clientHeight-8+"px";
      document.getElementById("wrapError").style.left = e.target.offsetLeft+e.target.offsetParent.offsetLeft-e.target.clientWidth-105+"px";
     // setTimeout(function () { 
          //    if(e.target.value != "") {e.target.focus();}
               e.target.focus();
               return false;
     //       }, 2000); 
   }else if(isNaN(e.target.value.substr(0,2)) == true && e.target.value.toLowerCase().indexOf("sick") == -1 && e.target.value.toLowerCase().indexOf("annu") == -1 && e.target.value.toLowerCase().indexOf("holid") == -1 ){
      document.getElementById("errorSpan").innerText="ERROR: NOT Sick Nor Holiday";
      document.getElementById("errorSpan").textContent="ERROR: NOT Sick Nor Holiday";
      document.getElementById("wrapError").style.backgroundColor="rgba(0,0,0,0.8)";
       //  if(e.target.value != "") {e.target.focus();}
      document.getElementById("wrapError").style.position = "absolute";
      document.getElementById("wrapError").style.display="inline";
      document.getElementById("wrapError").style.top = e.target.offsetTop+e.target.offsetParent.offsetTop-e.target.clientHeight-8+"px";
      document.getElementById("wrapError").style.left = e.target.offsetTop+e.target.offsetParent.offsetTop-e.target.clientHeight-105+"px";
            e.target.focus();
               return false;
   }else{
      document.getElementById("errorSpan").innerText="";
      document.getElementById("errorSpan").textContent="";
      //document.getElementById("wrapError").style.backgroundColor="white";
      document.getElementById("wrapError").style.display="none";
   }
}

function calculate(e){
        var cells = document.getElementsByTagName("input");
        if(e.id=="hoursCalc1"){
           var T1 = document.getElementById("startHr1");
           var T2 = document.getElementById("endHr1");
           if (document.getElementById("chckB2").checked == true){var T3 = parseInt(document.getElementById("breakT1").value);}
              else{var T3 = 0;}
         }else if(e.id=="hoursCalc2"){
           var T1 = document.getElementById("startHr2");
           var T2 = document.getElementById("endHr2");
           if (document.getElementById("chckB2").checked == true){var T3 = parseInt(document.getElementById("breakT2").value);}
              else{var T3 = 0;}
         }else if(e.id=="hoursCalc3"){
           var T1 = document.getElementById("startHr3");
           var T2 = document.getElementById("endHr3");
           if (document.getElementById("chckB2").checked == true){var T3 = parseInt(document.getElementById("breakT3").value);}
              else{var T3 = 0;}
         }else if(e.id=="hoursCalc4"){
           var T1 = document.getElementById("startHr4");
           var T2 = document.getElementById("endHr4");
           if (document.getElementById("chckB2").checked == true){var T3 = parseInt(document.getElementById("breakT4").value);}
              else{var T3 = 0;}
         }else if(e.id=="hoursCalc5"){
           var T1 = document.getElementById("startHr5");
           var T2 = document.getElementById("endHr5");
           if (document.getElementById("chckB2").checked == true){var T3 = parseInt(document.getElementById("breakT5").value);}
              else{var T3 = 0;}
         }else if(e.id=="hoursCalc6"){
           var T1 = document.getElementById("startHr6");
           var T2 = document.getElementById("endHr6");
           if (document.getElementById("chckB2").checked == true){var T3 = parseInt(document.getElementById("breakT6").value);}
              else{var T3 = 0;}
         }else if(e.id=="hoursCalc7"){
           var T1 = document.getElementById("startHr7");
           var T2 = document.getElementById("endHr7");
          if (document.getElementById("chckB2").checked == true){var T3 = parseInt(document.getElementById("breakT7").value);}
              else{var T3 = 0;}
         }
          if(document.getElementById("chckB2").checked == true && T3 == undefined || T3 == null || T3.toString() == "NaN"){var T3 = 0;
                     document.getElementById("errorSpan").innerText="ERROR: You haven't put any break minutes";
                     document.getElementById("errorSpan").textContent="ERROR: You haven't put any break minutes";
                     document.getElementById("wrapError").style.backgroundColor="blue";
         }else{
                     document.getElementById("errorSpan").innerText="";
                     document.getElementById("errorSpan").textContent="";
                     document.getElementById("wrapError").style.backgroundColor="";
         }

         if(   parseInt(Number(T2.value.substr(0,2))) >= parseInt(Number(T1.value.substr(0,2)))  ) 

              {
             
                   e.value = parseInt(Number(T2.value.substr(0,2))) - parseInt(Number(T1.value.substr(0,2)));
         //------------------------------------------------------------------------------------------------------
                    if( (parseInt(Number(T2.value.substr(3,2))) - T3) >= parseInt(Number(T1.value.substr(3,2))) )
                   {
                        if(parseInt(Number(T2.value.substr(3,2))) - (parseInt(Number(T1.value.substr(3,2))) + T3) < 10)
                          {
                              e.value = e.value.toString() + ":0"  +  (parseInt(Number(T2.value.substr(3,2))) - parseInt(Number(T1.value.substr(3,2))) - parseInt(T3)).toString();
                          }
                           else
                          {
                              e.value = e.value.toString() + ":"   +  (parseInt(Number(T2.value.substr(3,2))) - parseInt(Number(T1.value.substr(3,2))) - parseInt(T3)).toString();
                          }
                     }
                    else
                    {
                        e.value = (e.value - 1).toString() + ":"  + (parseInt(Number(T2.value.substr(3,2))) - parseInt(Number(T1.value.substr(3,2))) - T3 + 60).toString();
                    } 
              }
          else 
              {
                 e.value = 24 + parseInt(Number(T2.value.substr(0,2))) - parseInt(Number(T1.value.substr(0,2)));
                
                    if((parseInt(Number(T2.value.substr(3,2)))-T3) >= parseInt(Number(T1.value.substr(3,2))) )
                       {
                             if(parseInt(Number(T2.value.substr(3,2))) - (parseInt(Number(T1.value.substr(3,2))) + T3) < 10)
                                   {
                                          e.value = e.value.toString() + ":0" + ( parseInt(Number(T2.value.substr(3,2))) - parseInt(Number(T1.value.substr(3,2))) - parseInt(T3) ).toString();
                                   } 
                                    else
                                   {
                             e.value = e.value.toString() + ":" +  ( parseInt(Number(T2.value.substr(3,2))) - parseInt(Number(T1.value.substr(3,2))) - parseInt(T3) ).toString();
                                   }
                      }
                       else
                      {
                      e.value = (e.value - 1).toString() + ":"  + (parseInt(Number(T2.value.substr(3,2))) - parseInt(Number(T1.value.substr(3,2))) - T3 + 60).toString();
                      }      
                }  
         //-----------------------------------------  
   
 
   if(e.value == "NaN:NaN"){e.value="00:00";}
   if(e.value.indexOf(":")==1) {e.value = "0" + e.value.toString();
             if(e.value.length == 4){e.value = e.value.toString() + "0";}
                      }
      else if(e.value.length == 4){e.value = e.value.toString() + "0";}
   
   if(document.getElementById("hoursCalc1").value != "") {
                  var val1 = document.getElementById("hoursCalc1").value.toString();
                  var value1 = parseInt(Number(val1.substr(3,2)));
                   val1 = parseInt(Number(val1.substr(0,2)));
                     }
                      else {var val1 = 0;
                            var value1 = 0;}
   if(document.getElementById("hoursCalc2").value != "") {
                 var val2 = document.getElementById("hoursCalc2").value.toString();
                 var value2 = parseInt(Number(val2.substr(3,2)));
                  val2 = parseInt(Number(val2.substr(0,2)));
                     }
                     else {var val2 = 0;
                           var value2 = 0;}
   if(document.getElementById("hoursCalc3").value != "") {
                 var val3 = document.getElementById("hoursCalc3").value.toString();
                 var value3 = parseInt(Number(val3.substr(3,2)));
                  val3 = parseInt(Number(val3.substr(0,2)));
                     }
                     else {var val3 = 0;
                           var value3 = 0;}
   if(document.getElementById("hoursCalc4").value != "") {
                 var val4 = document.getElementById("hoursCalc4").value.toString();
                 var value4 = parseInt(Number(val4.substr(3,2)));
                  val4 = parseInt(Number(val4.substr(0,2)));
                     }
                     else {var val4 = 0;
                          var value4 = 0;}
   if(document.getElementById("hoursCalc5").value != "") {
                 var val5 = document.getElementById("hoursCalc5").value.toString();
                 var value5 = parseInt(Number(val5.substr(3,2)));
                  val5 = parseInt(Number(val5.substr(0,2)));
                     }
                     else {var val5 = 0;
                           var value5 = 0;}
   if(document.getElementById("hoursCalc6").value != "") {
                 var val6 = document.getElementById("hoursCalc6").value.toString();
                 var value6 = parseInt(Number(val6.substr(3,2)));
                  val6 = parseInt(Number(val6.substr(0,2)));
                     }
                     else {var val6 = 0;
                           var value6 = 0;}
   if(document.getElementById("hoursCalc7").value != "") {
                 var val7 = document.getElementById("hoursCalc7").value.toString();
                 var value7 = parseInt(Number(val7.substr(3,2)));
                  val7 = parseInt(Number(val7.substr(0,2)));
                     }
                     else {var val7 = 0;
                          var value7 = 0;}
    setTimeout(function(){
                   var valT = val1 + val2 + val3 + val4 + val5 + val6 + val7;
                   var valt = value1 + value2 + value3 + value4 + value5 + value6 + value7;
                   if (valt >= 60){
                       var rest = valt % 60;
                          if(rest==0) { valT = valT + valt/60;                
                                        valt = 0;
                        } else {
                                        valT = valT + Math.floor(valt/60);
                                        valt = rest.toFixed(0);
                      }
                   }
                   //e.parentElement.previousSibling.previousSibling.focus();  
                       if(valT<10 && valt<10){ document.getElementById("hoursTotal").value = "0" + valT.toString()+ ":0" + valt.toString();
                              }else if(valT<10 && valt>=10){
                                    document.getElementById("hoursTotal").value = "0" + valT.toString()+ ":"+ valt.toString();
                              }else if(valT>=10 && valt<10){
                                    document.getElementById("hoursTotal").value = valT.toString()+ ":0"+ valt.toString();
                              }else{
                                    document.getElementById("hoursTotal").value = valT.toString()+ ":" + valt.toString();
                              } 
                      } ,100);   
}

function animChckB1(){
   setTimeout(function(){ document.getElementById("chckB1").className="chckB1";},300);
}

function animChckB2(){
     var r = document.getElementById("chckB1");
     if (document.getElementById("chckB2").checked == false){r.className="chckB2";}
}



function timeChange1(){
       var baseHour;
       $("#but1").on("click",function(e){ 
            baseHour = $('.inpDate').eq(0).val();
            $.post("timeProcess.php", {but1: 1, but2: 0, baseHour: baseHour }, function(data){
                 return replaceTime(data);
                          });
                 //e.stopPropagation();
                 setTimeout(function(){
                 baseHour = $('.inpDate').eq(0).val();
                 var b = baseHour.toString().split("-");
                 switch(b[1].toLowerCase()){
                 case "jan": 
                       mb = 0;
                       break;
                 case "feb":
                       mb = 1;
                       break;
                 case "mar":
                       mb = 2;
                       break;
                 case "apr":
                       mb = 3;
                       break;
                 case "may":
                       mb = 4;
                       break;
                 case "jun":
                       mb = 5;
                       break;
                 case "jul":
                       mb = 6;
                       break;
                 case "aug":
                       mb = 7;
                       break;
                 case "sep":
                       mb = 8;
                       break;
                 case "oct":
                       mb = 9;
                       break;
                 case "nov":
                       mb = 10;
                       break;
                 case "dec":
                       mb = 11;
                       break;
                          }
                    var bDate = new Date(parseInt("20"+b[2].toString()),mb,b[0]);   
                    var cDate = new Date();
                    var dDiff = (cDate - bDate) / 86400000;
                    if (dDiff>7){alert("You are not in the current period!");}
                    b = "";
                    bDate = "";
                    cDate = "";
                    dDiff = "";
                 },800)


      });
       $("#but2").click(function(){ 
             baseHour = $('.inpDate').eq(0).val();
              $.post("timeProcess.php", {but1:0, but2: 1, baseHour: baseHour }, function(data){
                return replaceTime(data);
            })

           setTimeout(function(){
                 baseHour = $('.inpDate').eq(6).val();
                 var b = baseHour.toString().split("-");
                 switch(b[1].toLowerCase()){
                 case "jan": 
                       mb = 0;
                       break;
                 case "feb":
                       mb = 1;
                       break;
                 case "mar":
                       mb = 2;
                       break;
                 case "apr":
                       mb = 3;
                       break;
                 case "may":
                       mb = 4;
                       break;
                 case "jun":
                       mb = 5;
                       break;
                 case "jul":
                       mb = 6;
                       break;
                 case "aug":
                       mb = 7;
                       break;
                 case "sep":
                       mb = 8;
                       break;
                 case "oct":
                       mb = 9;
                       break;
                 case "nov":
                       mb = 10;
                       break;
                 case "dec":
                       mb = 11;
                       break;
                          }
                    var bDate = new Date(parseInt("20"+b[2].toString()),mb,b[0]);   
                    var cDate = new Date();
                    var dDiff = (bDate - cDate) / 86400000;
                    //alert(Math.abs(dDiff));
                    if(dDiff>7){alert("You are not in the current period!");}
                    b = "";
                    bDate = "";
                    cDate = "";
                    dDiff = "";
                 },800)


      });
 }

function replaceTime(data){
           for(var i=0;i<=6;i++){
                $('.inpDate').eq(i).val(JSON.parse(data)[i]);
               /* $('.inpDate').eq(i).val(JSON.parse(data)[i]);
                $('.inpDate').eq(2).val(JSON.parse(data)[2]);
                $('.inpDate').eq(3).val(JSON.parse(data)[3]);
                $('.inpDate').eq(4).val(JSON.parse(data)[4]);
                $('.inpDate').eq(5).val(JSON.parse(data)[5]);
                $('.inpDate').eq(6).val(JSON.parse(data)[6]); */
                 }
                $('#weekWorked').text(JSON.parse(data)[6]);
}

function deleteAll(){
    var f = document.querySelectorAll("input[type=text]");
    var i = f.length;
    for(var j = 1; j<i; j++){
      if(j % 5 > 0) f[j].value = "";
   }
   return false;
}