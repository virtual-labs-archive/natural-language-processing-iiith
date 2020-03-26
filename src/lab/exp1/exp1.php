<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

<style type="text/css">
.spmHandler {
   background: transparent;
   padding: 5px;
   border: 0px ;


}
</style>
<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">
function checkValue(word){
	document.getElementById("answer").innerHTML="";
	check(word,document.getElementById('root').value,document.getElementById('category').value,document.getElementById('gender').value,document.getElementById('number').value,document.getElementById('person').value,document.getElementById('case').value,document.getElementById('tense').value);
	return false;
}

function check(word,root,category,gender,number,person,case1,tense){
	$('#fldiv').load('exp1.php?index='+word+'&root='+root+'&category='+category+'&gender='+gender+'&form='+number+'&person='+person+'&tense='+tense+'&reference='+case1+'&turn=1');
}

function getAnswer(word)
{
	document.getElementById("get_hide").innerHTML="<button onclick=\"hideAnswer('"+word+"');\">Hide Answers</button>";
	$('#answer').load('exp1_answer.php?word='+word);
}

function hideAnswer(word)
{
	document.getElementById("get_hide").innerHTML="<button onclick=\"getAnswer('"+word+"');\">Get Answers</button>";
	document.getElementById("answer").innerHTML="";
}

function change()
{
	try{
		document.getElementById("tick_cross").innerHTML="";
	}
	catch(err){}
	document.getElementById("right_wrong").innerHTML="";
	document.getElementById("get_hide").innerHTML="";
	document.getElementById("answer").innerHTML="";
}

</script>
</head>
<body>

<?php 
$rootWord;
function getOptionValue($str)
{
	$fp=fopen("features.txt","r");
	$root=array();
	$flag=0;
	while(!feof($fp))
	{
		$string=fgets($fp);
		$string=str_replace("\n","\t",$string);
		$try=explode("\t",$string);
		if(in_array($try[$str],$root)==false and strlen($try[$str])!=0)
		{
			if($try[$str]=="na")
				$flag=1;
			else
				array_push($root,$try[$str]);
		}
	}
	if($flag==1)
		array_push($root,"na");
	fclose($fp);
	return $root;
}

function getOptionValueRestrict($str)
{
	$fp=fopen("features.txt","r");
	$word=array();
	while(!feof($fp))
	{
		$string=fgets($fp);
		$string=str_replace("\n","\t",$string);
		$try=explode("\t",$string);
		if(in_array($try[0],$word)==false and $try[1]==$str)
			array_push($word,$try[0]);
	}
	fclose($fp);
	return $word;
}

function showList($list,$val,$ansStr,$word)
{
	foreach ($list as $i)
	{
		if($i==$val)
			$ansStr.="<option selected='true' value=".$i.">".$i."</option>";
		else
			$ansStr.="<option value=".$i.">".$i."</option>";
	}
	$ansStr.= "</select>";
	return $ansStr;
}

function check($val,$word,$cat)
{
	$fp=fopen("features.txt","r");
	$wor=array();
	while(!feof($fp))
	{
		$str=fgets($fp);
		$str=str_replace("\n","\t",$str);
		$try=explode("\t",$str);
		if(in_array($try[$cat],$wor)==false and $try[0]==$word)
			array_push($wor,$try[$cat]);
	}
	$flag=0;
	foreach($wor as $i)
		if($i==$val)
			$flag=1;
	return $flag;
}

function display($flag)
{
	$str="";
	if($flag==0)
		$str=$str."<img src='wrong.png' height='25' width='25'/>";
	else if($flag==1)
		$str=$str."<img src='right.png' height='25' width='25'/>";
	return $str;
}

$I;

if(isset($_GET['index']))
	$I=$_GET['index'];

$fp=fopen("features.txt","r");
$root=array();
while(!feof($fp))
{
	$str=fgets($fp);
	$str=str_replace("\n","\t",$str);
	$try=explode("\t",$str);
	if(in_array($try[1],$root)==false and $try[0]==$I)
		array_push($root,$try[1]);
}
fclose($fp);

$rootWord=$root[0];
$myWord=$I;

$listROOT=getOptionValueRestrict($rootWord);
$listCATEGORY=getOptionValue(2);
$listGENDER=getOptionValue(3);
$listFORM=getOptionValue(4);		
$listPERSON=getOptionValue(6);		
$listTENSE=getOptionValue(9);		
$listREFERENCE=getOptionValue(5);

$cROOT;
$flag=1;
if($_GET['root']=="%")
{
	$flag=0;
	$cROOT=$listROOT[rand(0,sizeof($listROOT)-1)];
}
else
	$cROOT=$_GET['root'];
	
$cCATEGORY;
if($_GET['category']=="%")
{
	$flag=0;
	$cCATEGORY=$listCATEGORY[rand(0,sizeof($listCATEGORY)-1)];
}
else
	$cCATEGORY=$_GET['category'];

$cGENDER;
if($_GET['gender']=="%")
{
	$flag=0;
	$cGENDER=$listGENDER[rand(0,sizeof($listGENDER)-1)];
}
else
	$cGENDER=$_GET['gender'];

$cFORM;
if($_GET['form']=="%")
{
	$flag=0;
	$cFORM=$listFORM[rand(0,sizeof($listFORM)-1)];
}
else
	$cFORM=$_GET['form'];
       
$cPERSON;
if($_GET['person']=="%")
{
	$flag=0;
	$cPERSON=$listPERSON[rand(0,sizeof($listPERSON)-1)];
}
else
	$cPERSON=$_GET['person'];
	
$cTENSE;
if($_GET['tense']=="%")
{
	$flag=0;
	$cTENSE=$listTENSE[rand(0,sizeof($listTENSE)-1)];
}
else
	$cTENSE=$_GET['tense'];
	
$cREFERENCE;
if($_GET['reference']=="%")
{
	$flag=0;
	$cREFERENCE=$listREFERENCE[rand(0,sizeof($listREFERENCE)-1)];
}
else
	$cREFERENCE=$_GET['reference'];

echo "<p style=\"font-style:italic;color:blue;\">Select the Correct morphological analysis for the above word using dropboxes (NOTE : na = not applicable)</p>";
print "<br/>
<style type='text/css'>
#tick_cross td img {
width: 25px;
height: 25px;
}

#outputT {
width:921px!important; 
background-color:#FFD4A8;
}

#outputT tr td.hidden {
	display:none;
}

#outputT tr td img {
	height:25px;
	width: 25px;
}
</style>
<table id='outputT'>";
/**
<tr>
<th>WORD</th>
<th>ROOT</th>
<th>CATEGORY</th>
<th>GENDER</th>
<th>NUMBER</th>
<th>PERSON</th>
<th>CASE</th>
<th>TENSE</th>
<th></th>
</tr>";
**/


$flag_chk=0;
if($flag==1)
{
	print "<script type='text/javascript'>
$(document).ready(function(){
	$('#outputT tr td.hidden').each(function(){
$(this).removeClass('hidden');
});
});
</script>";
}


$default_option = array("root"=>$cROOT, "category"=>$cCATEGORY, "gender"=>$cGENDER, "form"=>$cFORM, "person"=>$cPERSON, "tense"=>$cTENSE, "reference"=>$cREFERENCE);

print "<tr>";
echo "<td>WORD</td>";
echo "<td align='center' class='WORD' style='color:red;font-weight:bold'>".$myWord."</td>";
print "</tr>";

print "<tr>";
echo "<td>ROOT</td>";
echo "<td align='center' class='ROOT' > ".showList($listROOT,$default_option["root"],"<select name='root' id='root' class='spmHandler' onchange=change()>",$myWord)."</td>";

	$flag=check($cROOT,$myWord,1);
	if($flag==0)
		$flag_chk=1;
	echo "<td align='center' class='check hidden'>".display($flag)."</td>";
	

print "</tr>";

print "<tr>";
echo "<td>CATEGORY</td>";
echo "<td align='center' class='CATEGORY' > ".showList($listCATEGORY,$default_option["category"],"<select name='category' id='category' class='spmHandler' onchange=change()>",$myWord)."</td>";
	$flag=check($cCATEGORY,$myWord,2);
	if($flag==0)
		$flag_chk=1;
	echo "<td align='center' class='check hidden'>".display($flag)."</td>";
	
print "</tr>";

print "<tr>";
echo "<td>GENDER</td>";
echo "<td align='center' class='GENDER' > ".showList($listGENDER,$default_option["gender"],"<select name='gender' id='gender' class='spmHandler' onchange=change()>",$myWord)."</td>";
	$flag=check($cGENDER,$myWord,3);
	if($flag==0)
		$flag_chk=1;
	echo "<td align='center' class='check hidden'>".display($flag)."</td>";
	
print "</tr>";

print "<tr>";
echo "<td>NUMBER</td>";
echo "<td align='center' class='NUMBER'> ".showList($listFORM,$default_option["form"],"<select name='number' id='number' class='spmHandler' onchange=change() >",$myWord)."</td>";
	$flag=check($cFORM,$myWord,4);
	if($flag==0)
		$flag_chk=1;
	echo "<td align='center' class='check hidden'>".display($flag)."</td>";
	
print "</tr>";

print "<tr>";
echo "<td>PERSON</td>";
echo "<td align='center' class='PERSON'>".showList($listPERSON,$default_option["person"],"<select name='person' id='person' class='spmHandler' onchange=change()>",$myWord)."</td>";
	$flag=check($cPERSON,$myWord,6);
	if($flag==0)
		$flag_chk=1;
	echo "<td align='center' class='check hidden'>".display($flag)."</td>";
	
print "</tr>";

print "<tr>";
echo "<td>CASE</td>";
echo "<td align='center' class='CASE' >".showList($listREFERENCE,$default_option["reference"],"<select name='case' id='case' class='spmHandler' onchange=change()>",$myWord)."</td>";
	$flag=check($cREFERENCE,$myWord,5);
	if($flag==0)
		$flag_chk=1;
	echo "<td align='center' class='check hidden'>".display($flag)."</td>";
	
print "</tr>";

print "<tr>";
echo "<td>TENSE</td>";
echo "<td align='center' class='TENSE' >".showList($listTENSE,$default_option["tense"],"<select name='tense' id='tense' class='spmHandler' onchange=change() >",$myWord)."</td>";
	$flag=check($cTENSE,$myWord,9);
	if($flag==0)
		$flag_chk=1;
	echo "<td align='center' class='check hidden'>".display($flag)."</td>";

print "</tr>";

print "<tr>";
echo "<td align='center'><button onclick=\"checkValue('".$myWord."');\">Check</button></td><td class='hidden'>";

if($flag_chk==0 and $_GET['turn']!="%")
	echo "<br/><br/><p id='right_wrong' style='text-align:center;font-size:30px;color:#008000'>Right answer!!!</p>";
else if($flag_chk==1)
{
	echo "<br/><br/><p id='right_wrong' style='text-align:center;font-size:30px;color:#FF0000'>Wrong answer!!!</p>";	
	echo "<br/><br/><div id='get_hide'><button onclick=\"getAnswer('".$myWord."');\">Get Answers</button></div>";
}

print "</td></tr>";


print "</table>";



echo "<br/><br/><div align=\"center\" id='answer'></div>";
?>
</body>
</html>

<!--Changes By Harsha 
Line numbers:
Added 227 line
 -->
