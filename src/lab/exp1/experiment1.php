<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">
var index;

function getSelectedValue(){
	getdata(document.getElementById('userWord').value);
	return false;
}

function getdata(ind){
	if(ind=='null')
	{
		alert("Select word");
		document.getElementById("fldiv").innerHTML="";
		return;
	}
	$('#fldiv').load('exp1.php?index='+ind+'&root=%&category=%&gender=%&form=%&person=%&tense=%&reference=%&turn=%');
}
var lang;
var src;

function getOption(temp){

	temp1=temp.split("_");
	lang=temp1[0];
	scr=temp1[1];
	document.getElementById("option").innerHTML="";
	document.getElementById("fldiv").innerHTML="";

	if(lang=="null")
	{
		alert("Select language");
		return;
	}

	$('#option').load('exp1_opt.php?lang='+lang+'&script='+scr);
}

</script>
</head>
<body>
<table width="100%">
<tr>
<td align="center">
<p style="font-style:italic;color:blue">Select a Language which you know better</p>
<select name="lang" autocomplete="off" onchange="getOption(this.value);">
<option value="null_null">---Select Language---</option>
<option value="en_roman");'>English</option>
<option value="hi_devanagiri");'>Hindi</option>
</select>
</td>
</tr>
</table>
<br/><div align="center" id='option'></div>
<br/><div align="center" id='fldiv'></div>
</body>
</html>
<!--
Edited By harsha:
Added Line 42
-->
