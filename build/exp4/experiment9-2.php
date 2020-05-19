<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

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
