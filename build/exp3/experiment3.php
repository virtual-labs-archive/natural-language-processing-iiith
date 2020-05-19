<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

<script>

var AddDel=new Array; 					//global variable to store the correct Add-Del table

function checkCondition(){ 				//checks your answer

var par = document.getElementById("mySelection");
theIndx=par.selectedIndex;

answer = new Array();					//to store your answer
answer[0]=document.getElementById("delsingdr").value;
answer[1]=document.getElementById("delpludr").value;
answer[2]=document.getElementById("delsingob").value;
answer[3]=document.getElementById("delpluob").value;
answer[4]=document.getElementById("addsingdr").value;
answer[5]=document.getElementById("addpludr").value;
answer[6]=document.getElementById("addsingob").value;
answer[7]=document.getElementById("addpluob").value;

cor_answers=document.getElementById("answer").value;

cor_answers=cor_answers.split(" "); 


var ii=0;
flag=new Array(0,0,0,0,0,0,0,0);
flag1=0;
paradigm=par.options[theIndx].value;
var ind=(paradigm-1)*8+(2*paradigm);
for (var i=ind;i<ind+8;i++)
 { AddDel[ii]=cor_answers[i];
//   document.write(AddDel[ii] + "<br>");
   ii++;
 }




document.getElementById('check').innerHTML='<b>Correction</b>';

for (i=0; i<8;i++)
   {    if(answer[i]!=AddDel[i])
          {    	    flag[i]=1;
		    flag1=1;
		    document.getElementById('check'+i%4).innerHTML='<img src="wrong.png" style="height:25px; width:25px" alt="Wrong" /> ';
                    
         }	
	else if(flag[i-4]!=1)				//if the corresponding Add table is wrong dont overwrite
		    document.getElementById('check'+i%4).innerHTML='<img src="right.png" style="height:25px; width:25px" alt="Right" /> ';	      
  }

if(flag1==1)
      {  document.getElementById('result1').innerHTML='<br/> <p style="font-family:arial;color:red;font-size:20px;"> Error in your Add-Delete table!</p> <br/> <br/> <form action="javascript:correctTable()" > <input type="submit" value="Get Answer" onsubmit="correctTable();" /> </form><br/>';
	 document.getElementById('result2').innerHTML=''; //clear previous value stored in this section
	
      }

else
      {document.getElementById('result1').innerHTML='<br/> <p style="font-family:arial;color:green;font-size:20px;"> Correct Answer! </p> <br/> <br/>';
       document.getElementById('result2').innerHTML='';	//clear previous value stored in this section
       document.myform3.formvar.value = answer[0];
}
	

}

function clearForm()			//clears form on selecting a different root word
{
        var i;
	document.getElementById('check').innerHTML='';
	for (i=0; i<4;i++)
	   document.getElementById('check'+i).innerHTML='';
	document.getElementById("addsingdr").value='आ';
	document.getElementById("addpludr").value='आ';
	document.getElementById("addsingob").value='आ';
	document.getElementById("addpluob").value='आ';
	document.getElementById("delsingdr").value='आ';
	document.getElementById("delpludr").value='आ';
	document.getElementById("delsingob").value='आ';   
	document.getElementById("delpluob").value='आ';  
	document.getElementById('result2').innerHTML=''; 
	document.getElementById('result1').innerHTML='';   
}

function correctTable()				//prints the correct table
{
     document.getElementById('result2').innerHTML='<table cellspacing="-2" cellpadding="4" border="1" style="text-align:center;"><tr><th>Delete</th><th>Add</th><th>Number</th><th>Case</th></tr> <tr><td>'+ AddDel[0]+ '</td><td>'+ AddDel[4] + '</td><td>sing</td><td>dr</td> </tr><tr><td>'+ AddDel[1]+ '</td><td>'+ AddDel[5] + '</td><td>plu</td><td>dr</td> </tr><tr><td>'+ AddDel[2]+ '</td><td>'+ AddDel[6] + '</td><td>sing</td><td>ob</td> </tr><tr><td>'+ AddDel[3]+ '</td><td>'+ AddDel[7] + '</td><td>plu</td><td>ob</td> </tr></table>';

}

</script>

</head>
<body>
<form action="javascript:checkCondition()" target="_parent" method="post" >
<div id="mainContainer">

<div id="selector_spm">
<center>
<?php 

$options_path="./Exp3/options.txt";
$f1 =  fopen($options_path, "r");
$buffer=fread($f1, filesize($options_path));
$options=split(" ", $buffer) ;
echo "<b>Select a Root Word</b> <br/>";
echo "<select name='mySelection' id='mySelection' onChange='clearForm();' >";
echo "<option value=\"".$options[0]."\" select=\"selected\">".$options[1]."</option>";
for($i=2; $i<count($options)-1; $i=$i+2)
   echo "<option value=\"".$options[$i]."\">".$options[$i+1]."</option>";
echo "</select>";


?>

</center>
</div>

</div>


<table width="100%">
<tr>
<td>
<table cellspacing="-2" cellpadding="4" border="1" style="text-align:center;">
<tr>
<b>Fill the add delete table here:</b>
<br /><br/>
<th>Delete</th>
<th>Add</th>
<th>Number</th>
<th>Case</th>
<th id="check"></th>
</tr>
<?php
         
$N=array("sing","plu","sing","plu");
$C=array("dr","dr","ob","ob");

$answer_path="./Exp3/answers_opt.txt";
$f2 =  fopen($answer_path, "r");
$buffer3=fread($f2, filesize($answer_path));
$answer=split(" ", $buffer3) ;


for($j=0;$j<4;$j++){
	echo "<tr>";
	echo "<td><select name=\""."del".$N[$j].$C[$j]."\" id=\"del".$N[$j].$C[$j]."\">";
        for($y=0; $y<count($answer); $y++)
                     echo "<option>".$answer[$y]."</option>";
        echo "</select></td>";
        echo "<td><select name=\""."add".$N[$j].$C[$j]."\" id=\"add".$N[$j].$C[$j]."\">";
        for($z=0; $z<count($answer); $z++)
                     echo "<option>".$answer[$z]."</option>";
        echo "</select></td>";
	echo "<td>".$N[$j]."</td>";
	echo "<td>".$C[$j]."</td>";
	echo "<td id = \"check".$j."\"></td>";
	echo "</tr>";
      
}
?>
</table>
</td>
<td></td><td></td>

<td align="right">


<?php
//ladZakA
$table_path="./Exp3/paradigm.txt";
$f1 =  fopen($table_path, "r");
$buffer2=fread($f1, filesize($table_path));
echo "<input type='hidden' name='answer' id='answer' value=\"".$buffer2."\">";
$val=split(" ", $buffer2) ;
echo "<table cellspacing=\"-2\" cellpadding=\"4\" border=\"1\" style=\"text-align:center;\">";
echo "<tr> <b> For Example for ".$val[1].":</b><br/><br/>";
echo "<th>Delete</th><th>Add</th><th>Number</th><th>Case</th></tr>";
for($k=2;$k<6;$k++){
	echo "<tr>";
	echo "<td>".$val[$k]."</td>";
	echo "<td>".$val[$k+4]."</td>";
	echo "<td>".$N[$k-2]."</td>";
	echo "<td>".$C[$k-2]."</td>";
	echo "</tr>";
}

?>
</table>

</td>
</tr>
</table>

<br>
<br>

<!---<center><input type="submit" value="generate analyzer" onsubmit="showDig();" ></center>-->

 <center><input type="submit" value="Submit" onsubmit="checkCondition();" ></center> 

</form>

<div id="result1" align= "center" ><form></form></div>
<div id="result2" align= "center"></div>

<br />
<br>
</body>
</html>
