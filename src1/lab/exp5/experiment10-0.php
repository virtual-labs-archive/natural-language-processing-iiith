<html>
<head>
<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">

function checkCondition(b,count,file)
{ 
your_ans = new Array();
cor_ans = new Array();
cor_ans = b.split(','); 
var all=1;
var i;

for(i=0;i<count;i++)				//to store your answer
   { your_ans[i]=document.getElementById(i).value;
   }
for (i=0;i<count;i++)
    {   
	if(parseFloat(your_ans[i])-parseFloat(cor_ans[i]))
         {  
            document.getElementById("td"+i).innerHTML="<input type= \"text\" size= \"3\" name=\""+i+"\"id=\""+i+"\" style=\"background-color:red;\" value=\""+your_ans[i]+"\"/>";
            all=0;
         }
	else
	   document.getElementById("td"+i).innerHTML="<input type= \"text\" size= \"3\" name=\""+i+"\"id=\""+i+"\" style=\"background-color:green;\" value=\""+your_ans[i]+"\"/>";
           
     }

if(all==1)
 {   document.getElementById('showAns').innerHTML="";
     document.getElementById('result').innerHTML="<h2 style=\"color:green;\">Right Answer</h2>";
    
 }
else
     document.getElementById('result').innerHTML="<h2 style=\"color:red;\">Wrong Answer</h2>";


}
</script>
</head>
<body>
<?php

$f=$_GET['fileno'];
$file=$f.'.txt';
$full_path='Exp10/'.$file;
$f1 =  fopen($full_path, "r");
$buffer=fread($f1, filesize($full_path));
$parts=split("&", $buffer); 
$counts=$parts[0];      
$smoothed=$parts[1];
$order=$parts[2];
$info=$parts[3];
$c=explode(",", $counts); 
$o=explode(",", $order);
$in=explode(",", $info);
$size=count($o);
?>
<br/> <br/>
<p style="font-size:130%">Bigram counts for the corpus:</p><br/>
<table cellspacing="2" cellpadding="8" border="1" style="text-align:center;">
<tr><th></th>
<?php 
for($i=0;$i<$size;$i++)
         echo "<th>".$o[$i]."</th>";
echo '</tr>';
$i=0;
for($k=0;$k<$size;$k++) 
{  
   echo "<tr><th>".$o[$k]."</th>";
   for($j=0;$j<$size;$j++)
   {           echo "<td>".$c[$j+$k*$size]."</td>";
               $i++;
   }

   echo "</tr>"; 
}
echo "</table><br/>";
echo "<p style=\"font-size:130%\">N = ".$in[0]."   V = ".$in[1]."</p><br/><br/>";
echo "<p style=\"font-size:130%\">Fill the bigram probabilities after add-one smoothing: (Upto 4 decimal places)</p><br/>";
echo "<table cellspacing=\"2\" cellpadding=\"8\" border=\"1\" style=\"text-align:center;\"><br/>";
echo "<tr><th></th>";
for($i=0;$i<$size;$i++)
         echo "<th>".$o[$i]."</th>";
echo '</tr>';
$i=0;
for($k=0;$k<$size;$k++) 
{  
   echo "<tr><th>".$o[$k]."</th>";
   for($j=0;$j<$size;$j++)
   {           echo "<td id=\"td".$i."\"><input type= \"text\" size= \"3\" name=\"".$i."\"id=\"".$i."\" value=\"0\"/></td>";
               $i++;
   }
   echo "</tr>"; 
         
} 
echo "</table><br/><br/>";
echo "<br/><button onclick=\"checkCondition('".$smoothed."', '".$i."', '".$file."');\"> Submit</button><br/><br/>";
echo "<div id=\"result\"></div><br/>";
echo"<div id=\"showAns\"><a href=\"experiment10-1.php?smoothed=".$smoothed."&order=".$order."&file=".$file."\" target=\"_blank\">Show Answer</a></div>";

echo "</div>";
?>
</body>
</html>
