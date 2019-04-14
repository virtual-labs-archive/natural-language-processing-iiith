<html>
<head>
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
	if(parseFloat(your_ans[i])!=parseFloat(cor_ans[i]))
         {  
            document.getElementById("td"+i).innerHTML="<input type= \"text\" size= \"3\" name=\""+i+"\"id=\""+i+"\" style=\"background-color:red;\" value=\""+your_ans[i]+"\"/>";
            all=0;
         }
	else
	   document.getElementById("td"+i).innerHTML="<input type= \"text\" size= \"3\" name=\""+i+"\"id=\""+i+"\" style=\"background-color:green;\" value=\""+your_ans[i]+"\"/>";
           
     }

if(all==1)
 {   document.getElementById('showAns').innerHTML="";
     document.getElementById('sentence').innerHTML="<br/><br/><button onclick=\"sen_prob("+file+");\"> Take a quiz </button</p><br/><br/>";
 }


}
function sen_prob(cno)
{

$('#sentence').load('experiment9-3.php',{file:cno});


}


function check(){ alert('hi')};

</script>
</head>
<body>
<?php
$bigrams=$_POST['bigrams'];
$b=str_replace(",", "#",$bigrams);
$o=$_POST['order'];
$file=$_POST['file'];
$order=explode(",", $o);
$size=count($order);
?>
<br/><br/><div align="center">
<table cellspacing="-2" cellpadding="4" border="1" style="text-align:center;">
<tr><th></th>
<?php 
for($i=0;$i<$size;$i++)
         echo "<th>".$order[$i]."</th>";
echo '</tr>';
$i=0;
for($k=0;$k<$size;$k++) 
{  
   echo "<tr><th>".$order[$k]."</th>";
   for($j=0;$j<$size;$j++)
   {           echo "<td id=\"td".$i."\"><input type= \"text\" size= \"3\" name=\"".$i."\"id=\"".$i."\" value=\"0\"/></td>";
               $i++;
   }
   echo "</tr>"; 
         
} 
echo "</table><br/><br/>";
echo "<br/><button onclick=\"checkCondition('".$bigrams."', '".$i."', '".$file."');\"> Submit</button><br/><br/>";
echo"<div id=\"showAns\"><a href=\"experiment9-2.php?bigrams=".$bigrams."&order=".$o."&file=".$file."\" target=\"_blank\">Show Answer</a></div>";
#echo "<div id=\"showAns\"><button onclick=\"window.open('experiment9-2.php?bigrams=".$bigrams."&order=".$o."&file=".$file."');\"> Show Answer</button></div>";
echo "<div id=\"sentence\"></div>";
echo "</div>";
?>
</body>
</html>
