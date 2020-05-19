<html>
<body>
<h3>Morph Analyser</h3>
<br/>
<h4>Definition</h4>
<p>Morphemes are considered as smallest meaningful units of language. These morphemes can either be a root word(play) or affix(-ed). Combination of these morphemes is called morphological process. So, word "played" is made out of 2 morphemes "play" and "-ed". Thus finding all morphemes part of a word and thus describing properties of a word is called "Morphological Analysis". For example, "played" has information verb "play" and "past tense", so given word is past tense form of verb "play".</p><br/>

<p>
<br/>
<p>
<h4>Analysis of a word : </h4><br/>
</p
     बच्चों  = बच्चा<i>(root)</i> + ओं<i>(suffix)</i><br/> (ओं=3 plural oblique)<br/>
</p>
<br/>
A <i>linguistic paradigm</i> is the complete set of variants of a given lexeme. These variants can be classified according to shared inflectional categories (eg: number, case etc) and arranged into tables.<br/><br/><br/>
<h4> Paradigm for बच्चा</b> </h4><br/>
<table border="1">
<tr>
<th> case/num </th>
<th> singular </th>
<th> plural </th>
</tr>
<tr>
<td> direct </td>
<td> बच्चा</b> </td>
<td> बच्चे</b> </td>
</tr>
<tr>
<td> oblique </td>
<td> बच्चे</b> </td><td> बच्चों </b> </td>
</tr>
</table>

</p>
<br/><br/>
<h4>Algorithm to get बच्चों  from बच्चा</h4>
<br/>
<ol>
<li>Take Root बच्च<b>आ</b></li>
<li>Delete <b>आ</b></li>
<li>output बच्च</li> 
<li>Add <b>ओं </b> to output</li>
<li>Return बच्चों  </b></li>
</ol><br/>

<p> Therefore आ is deleted and ओं is added to get बच्चों  </p> <br/><br/>

<h4>Add-Delete table for बच्चा</h4><br/>
<script type='text/javascript'>
$(document).ready(function(){
$("#ADD-DELETE").load("helper_php/add_delete_table.php");
});

</script>
<div id="ADD-DELETE">
</div>

<h4> Paradigm Class </h4>
<p> Words in the same paradigm class behave similarly, for Example लड़क is in the same paradigm class as बच्च, so लड़का would behave similarly as बच्चा as they share the same paradigm class.<p><br/><br/>


<br>
<hr>
</body>
</html>
