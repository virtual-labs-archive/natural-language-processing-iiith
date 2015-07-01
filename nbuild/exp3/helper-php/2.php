<style type='text/css'>
.right_wrong_image_td img {
width:25px;
height:25px;
}
</style>
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

$answer_path="../Exp3/answers_opt.txt";
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
	echo "<td class='right_wrong_image_td' id = \"check".$j."\"></td>";
	echo "</tr>";
      
}
?>
</table>
