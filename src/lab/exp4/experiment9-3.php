<html>
<head>
<script type="text/javascript">
function checkCondition2(ans)
{  
   your_ans = new Array();
   cor_ans = new Array();
   cor_ans = ans.split('*'); 
   var count=cor_ans.length;
   var i;
   var all=1;
   for(i=0;i<count;i++)				//to store your answer
       your_ans[i]=document.getElementById("2."+i).value;
    for (i=0;i<count;i++)
    {
	if(parseFloat(your_ans[i])!=parseFloat(cor_ans[i]))
             { document.getElementById("2td."+i).innerHTML="<input type= \"text\" size= \"3\" name=\"2."+i+"\"id=\"2."+i+"\" style=\"background-color:red;\" value=\""+your_ans[i]+"\"/>";
               all=0;
             }
            
	else
	   document.getElementById("2td."+i).innerHTML="<input type= \"text\" size= \"3\" name=\"2."+i+"\"id=\"2."+i+"\" style=\"background-color:green;\" value=\""+your_ans[i]+"\"/>";
           
     
   }
        if(all==1)
          document.getElementById("result").innerHTML="<h2 style=\"color:green;\">Right Answer</h2>";
        else
          document.getElementById("result").innerHTML="<h2 style=\"color:red;\">Wrong Answer</h2>";
          

}
</script>
</head>
<body><div id='answer'>
<?php
$file=$_POST['file'];
$sentence_path="Exp9/sentences/sen-".$file.".txt";
$f1 =  fopen($sentence_path, "r");
$buffer0=fread($f1, filesize($sentence_path));
$buffer1=split("&", $buffer0);
$sen=split("#", $buffer1[0]);
$count=count($sen);  
$answers=$buffer1[1];
?>
<br/><br/>
<h4 align="center"> Find probabilities of the following sentences: </h4><br/><br/>
<table cellspacing="-2" cellpadding="4" border="1" style="text-align:center;">
<tr><th>Sentence</th><th>Probability</th>
<?php 
for($i=0;$i<$count;$i++)
         echo "<tr><td>".$sen[$i]."</td><td id=\"2td.".$i."\"><input type= \"text\" size= \"3\" name=\"2.".$i."\"id=\"2.".$i."\" value=\"0\"/></td></tr>";
 
echo "</table><br/><br/>";
echo "<input type=\"hidden\" name=\"answers\" id=\"answers\" value=\"".$answers."\"/>";
echo "<button onclick=\"checkCondition2('".$answers."');\"> Submit</button><br/><br/>";
?>
<div id="result"></div>
</div></body>
</html>
