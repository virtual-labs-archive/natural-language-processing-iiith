<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />  
<script type="text/javascript">
</script>
</head>
<body><div id='answer'>
<?php
$bigrams=explode(",",$_GET['bigrams']);
$order=explode(",",$_GET['order']);
$size=count($order);
$file=$_GET['file'];
echo "<p style=\"text-align:center;\"> <h1>Bigram probability Table for Corpus".$file."</h1></p><br/><br/>";
echo "<table cellspacing=\"-2\" cellpadding=\"4\" border=\"1\" style=\"text-align:center;\">";
echo "<tr><th></th>";
for($i=0;$i<$size;$i++)
         echo "<th>".$order[$i]."</th>";
 
echo '</tr>';
$i=0;
for($k=0;$k<$size;$k++) 
{  
   echo "<tr><th>".$order[$k]."</th>";
   for($j=0;$j<$size;$j++)
   {           echo "<td id=\"td".$i."\">".$bigrams[$i]."</td>";
               $i++;
   }
   echo "</tr>"; 
         
} 


?>
</table></div></body>
</html>
