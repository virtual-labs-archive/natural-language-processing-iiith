<html>
<title>Word and its features</title>
<body>
<p>
Analysis of words into root and affix(es) are called Morphological analysis of the word.  It is mandatory to identify root of a word for any natural language processing task. A root word can have various forms. For example, the word 'play' in English has the following forms: 'play', 'plays', 'played' and 'playing'. Hindi shows more number of forms for the word 'खेल' which is equivalent to 'play'. The forms of 'khela' are the following:</p><br>

खेल, खेला, खेली, खेलुंगा, खेलुंगी, खेलेगा, खेलेगी, खेलते, खेलती, खेलने, खेलकर <br><br>

For Telugu root Adadam (ఆడడం), the forms are the following::<br><br>

Adutaanu, AdutunnAnu, Adenu, Ademu, AdevA, AdutAru, Adutunnaru, AdadAniki, Adesariki, AdanA, Adinxi, Adutunxi, AdinxA, AdeserA, Adestunnaru, ... <br><br>
<p>
Thus we understand morphological richness of one language might vary from that of another language. Indian languages are generally morphologically rich languages and therefore morphological analysis of words become a very significant task for Indian languages.</p><br>

<b>Types of Morphology</b><br><br>

Morphology is of two types,<br><br>

   1. Inflectional morphology<br><br>

      Deals with word forms of a root, where there is no change in lexical category. For example, 'played' is an inflection of the root word 'play'. Here, both 'played' and 'play' are verbs.<br>
   2. Derivational morphology<br><br>

      Deals with word forms of a root, where there is a change in the lexical category. For example, the word form 'happiness' is a derivation of the word 'happy'. Here, 'happiness' is a derived noun form of the adjective 'happy'.<br><br>

<b>Morphological Features:</b><br><br>

All words will have its lexical category attested during morphological analysis.<br>
A noun and pronoun can take suffix of the following features: gender, number, person, case<br>
For example, morphological analysis of the words are given below:<br><br>
<pre>
Language   input:word   output:analysis
Hindi      लडके                     rt=लड़का, cat=n, gen=m, num=sg, case=obl 
Hindi      लडके                     rt=लड़का, cat=n, gen=m, num=pl, case=dir 
Hindi      लड़कों                    rt=लड़का, cat=n, gen=m, num=pl, case=obl
</pre>
<br><br>      
A verb can take suffix of the following features: tense, aspect, modality, gender, number, person
<br><br>
<pre>
Language   input:word    output:analysis
Hindi      हँसी                       rt=हँस, cat=v, gen=fem, num=sg/pl, per=1/2/3 tense=past, aspect=pft 
English    toys	         rt=toy, cat=n, num=pl, per=3    	
</pre>
<br>
'gen' stands for gender. The value of gender can be masculine, feminine or neuter in Hindi. For English, it is only masculine or feminine.<br>
'num' stands for number. The value of number can be singual (sg) or plural (pl).<br>
'per' stands for person. The value of person can be 1, 2 or 3<br>
The value of tense can be present, past or future.<br>
The value of aspect can be perfecT (pft), continuous (cont) or habitual (hab).<br>
</body>
</html>
