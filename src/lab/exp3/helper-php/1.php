
<?php 

$options_path="../Exp3/options.txt";
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
