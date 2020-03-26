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
<script type="text/javascript">
function checkValue(root,category,gender,form,person,tense,reference){
	check(document.getElementById('userWord').value,root,category,gender,form,person,tense,reference);
	return false;
}

function check(word,root,category,gender,number,person,tense,case1){
	if(word=="null")
	{
		alert("Select word");
		return;
	}
	$('#option').load('exp2_opt.php?index='+word+'&root='+root+'&category='+category+'&gender='+gender+'&form='+number+'&person='+person+'&reference='+case1+'&tense='+tense);
}

function set(temp)
{
	temp1=temp.split("_");
	root=temp1[0];
	category=temp1[1];
	gender=temp1[2];
	form=temp1[3];
	person=temp1[4];
	tense=temp1[5];
	reference=temp1[6];
	lang=temp1[7];
	scr=temp1[8];

	$('#fldiv').load('exp2.php?root='+root+'&category='+category+'&gender='+gender+'&form='+form+'&person='+person+'&tense='+tense+'&reference='+reference+'&lang='+lang+'&scr='+scr);

	try{
	document.getElementById("right_wrong").innerHTML="";}
	catch(err){}
	document.getElementById("get_hide").innerHTML="";
}

function warn(temp)
{
	if(temp=="null")
	{
		alert("Select word");
		return;
	}
}

</script>
</head>
<body>

<?php

$rootWord;

function getOptionValueRestrict($str,$lang,$scr)
{
	$fp=fopen("features.txt","r");
	$root=array();
	$flag=0;
	while(!feof($fp))
	{
		$string=fgets($fp);
		$string=str_replace("\n","\t",$string);
		$try=explode("\t",$string);
		if(in_array($try[$str],$root)==false and strlen($try[$str])!=0 and $try[7]==$lang and $try[8]==$scr)
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

function update($type1,$value1,$type2,$value2)
{
	if($type1==$type2)
		return $value2;
	else 
		return $value1;
}

function showList($list,$val,$ansStr,$cROOT,$cCATEGORY,$cGENDER,$cFORM,$cPERSON,$cTENSE,$cREFERENCE,$lang,$scr,$cat)
{
	foreach ($list as $i)
	{
		if($i==$val)
			$ansStr.="<option value='".update($cat,$cROOT,"root",$i)."_".update($cat,$cCATEGORY,"category",$i)."_".update($cat,$cGENDER,"gender",$i)."_".update($cat,$cFORM,"form",$i)."_".update($cat,$cPERSON,"person",$i)."_".update($cat,$cTENSE,"tense",$i)."_".update($cat,$cREFERENCE,"reference",$i)."_".$lang."_".$scr."_".$i."' selected='true'>".$i."</option>";
		else
			$ansStr.="<option value='".update($cat,$cROOT,"root",$i)."_".update($cat,$cCATEGORY,"category",$i)."_".update($cat,$cGENDER,"gender",$i)."_".update($cat,$cFORM,"form",$i)."_".update($cat,$cPERSON,"person",$i)."_".update($cat,$cTENSE,"tense",$i)."_".update($cat,$cREFERENCE,"reference",$i)."_".$lang."_".$scr."_".$i."'>".$i."</option>";
	}
	$ansStr.= "</select>";
	return $ansStr;
}

$lang=$_GET['lang'];
$scr=$_GET['scr'];

$listROOT=getOptionValueRestrict(1,$lang,$scr);
$listCATEGORY=getOptionValue(2);
$listGENDER=getOptionValue(3);		
$listFORM=getOptionValue(4);		
$listPERSON=getOptionValue(6);		
$listTENSE=getOptionValue(9);		
$listREFERENCE=getOptionValue(5);

$cROOT;
if($_GET['root']=="%")
	$cROOT=$listROOT[rand(0,sizeof($listROOT)-1)];
else
	$cROOT=$_GET['root'];
	
$cCATEGORY;
if($_GET['category']=="%")
	$cCATEGORY=$listCATEGORY[rand(0,sizeof($listCATEGORY)-1)];
else
	$cCATEGORY=$_GET['category'];

$cGENDER;
if($_GET['gender']=="%")
	$cGENDER=$listGENDER[rand(0,sizeof($listGENDER)-1)];
else
	$cGENDER=$_GET['gender'];

$cFORM;
if($_GET['form']=="%")
	$cFORM=$listFORM[rand(0,sizeof($listFORM)-1)];
else
	$cFORM=$_GET['form'];
       
$cPERSON;
if($_GET['person']=="%")
	$cPERSON=$listPERSON[rand(0,sizeof($listPERSON)-1)];
else
	$cPERSON=$_GET['person'];
	
$cTENSE;
if($_GET['tense']=="%")
	$cTENSE=$listTENSE[rand(0,sizeof($listTENSE)-1)];
else
	$cTENSE=$_GET['tense'];
	
$cREFERENCE;
if($_GET['reference']=="%")
	$cREFERENCE=$listREFERENCE[rand(0,sizeof($listREFERENCE)-1)];
else
	$cREFERENCE=$_GET['reference'];
	

print "<div style=\"color:blue; font-style:italic\">Select root and  features</div>";
print "<table id='outputT' width=\"100%\" style=\"background-color:#FFD4A8; font-size:95%\" >
<tr style=\"font-size:95%\">
<th>ROOT</th>
<th>CATEGORY</th>
<th>GENDER</th>
<th>NUMBER</th>
<th>PERSON</th>
<th>CASE</th>
<th>TENSE</th>
<th></th>
</tr>";

$default_option = array("root"=>$cROOT, "category"=>$cCATEGORY, "gender"=>$cGENDER, "form"=>$cFORM, "person"=>$cPERSON, "CASE"=>$cCASE, "tense"=>$cTENSE, "reference"=>$cREFERENCE);

print "<tr>";
echo "<td align='center' class='ROOT' > ".showList($listROOT,$default_option["root"],"<select name='root' id='root' class='spmHandler' onchange='set(this.value);'>",$cROOT,$cCATEGORY,$cGENDER,$cFORM,$cPERSON,$cTENSE,$cREFERENCE,$lang,$scr,"root")."</td>";
echo "<td align='center' class='CATEGORY' > ".showList($listCATEGORY,$default_option["category"],"<select name='category' id='category' class='spmHandler' onchange='set(this.value);'>",$cROOT,$cCATEGORY,$cGENDER,$cFORM,$cPERSON,$cTENSE,$cREFERENCE,$lang,$scr,"category")."</td>";
echo "<td align='center' class='GENDER' > ".showList($listGENDER,$default_option["gender"],"<select name='gender' id='gender' class='spmHandler' onchange='set(this.value);'>",$cROOT,$cCATEGORY,$cGENDER,$cFORM,$cPERSON,$cTENSE,$cREFERENCE,$lang,$scr,"gender")."</td>";
echo "<td align='center' class='NUMBER'> ".showList($listFORM,$default_option["form"],"<select name='number' id='number' class='spmHandler' onchange='set(this.value);'>",$cROOT,$cCATEGORY,$cGENDER,$cFORM,$cPERSON,$cTENSE,$cREFERENCE,$lang,$scr,"form")."</td>";
echo "<td align='center' class='PERSON'>".showList($listPERSON,$default_option["person"],"<select name='person' id='person' class='spmHandler' onchange='set(this.value);'>",$cROOT,$cCATEGORY,$cGENDER,$cFORM,$cPERSON,$cTENSE,$cREFERENCE,$lang,$scr,"person")."</td>";
echo "<td align='center' class='CASE' >".showList($listREFERENCE,$default_option["reference"],"<select name='case' id='case' class='spmHandler' onchange='set(this.value);'>",$cROOT,$cCATEGORY,$cGENDER,$cFORM,$cPERSON,$cTENSE,$cREFERENCE,$lang,$scr,"reference")."</td>";
echo "<td align='center' class='TENSE' >".showList($listTENSE,$default_option["tense"],"<select name='tense' id='tense' class='spmHandler' onchange='set(this.value);'>",$cROOT,$cCATEGORY,$cGENDER,$cFORM,$cPERSON,$cTENSE,$cREFERENCE,$lang,$scr,"tense")."</td>";
print "</tr>";

print "</table>";

$root=$cROOT;

$fp=fopen("features.txt","r");
$word=array();
while(!feof($fp))
{
	$string=fgets($fp);
	$string=str_replace("\n","\t",$string);
	$try=explode("\t",$string);
	if(in_array($try[0],$word)==false and $try[1]==$root)
		array_push($word,$try[0]);
}
array_push($word,"NONE");
fclose($fp);

echo '<br/><br/>';
echo '<select name="word" id="userWord" onchange="warn(this.value);">';
echo '<option value="null" selected="selected">---Select Word---</option>';
foreach($word as $i)
	echo '<option value="'.$i.'">'.$i.'</option>';
echo '</select>';

echo '<br/><br/>';

echo "<button onclick=\"checkValue('".$cROOT."','".$cCATEGORY."','".$cGENDER."','".$cFORM."','".$cPERSON."','".$cTENSE."','".$cREFERENCE."');\">Check</button>";

?>
</body>
</html>
