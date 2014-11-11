<html>
<title>Word and its features</title>
<body>

The standard N-gram models are trained from some corpus. The finiteness of the training corpus leads to the absence of some perfectly acceptable N-grams. This results in sparse bigram matrices. This method tend to underestimate the probability of strings that do not occur in their training corpus.
<br/> <br/>
There are some techniques that can be used for assigning a non-zero probabilty to these 'zero probability bigrams'. This task of reevaluating some of the zero-probability and low-probabilty N-grams, and assigning them non-zero values, is called smoothing. Some of the techniques are: Add-One Smoothing, Witten-Bell Discounting, Good-Turing Discounting.<br/><br/>

<h4>Add-One Smoothing </h4><br/>

In Add-One smooting, we add one to all the bigram counts before normalizing them into probabilities. This is called add-one smoothing.<br/><br/>

<h4>Application on unigrams </h4></br>
The unsmoothed maximum likelihood estimate of the unigram probability can be computed by dividing the count of the word by the total number of word tokens N

<pre>
P(w<sub>x</sub>) = c(w<sub>x</sub>)/sum<sub>i</sub>{c(w<sub>i</sub>)}
      = c(w<sub>x</sub>)/N
</pre>

<br/>
Let there be an adjusted count c<sup>*</sup>.<br/>
c<sub>i</sub><sup>*</sup> = (c<sub<i</sub>+1)*N/(N+V)<br/>
where where V is the total number of word types in the language.
<br/>
Now, probabilities can be calculated by normalizing counts by N.<br/>
p<sub>i</sub><sup>*</sup> = (c<sub<i</sub>+1)/(N+V) <br/><br/>

<h4>Application on bigrams </h4><br/>
Normal bigram probabilities are computed by normalizing each row of counts by the unigram count:<br/>
P(w<sub>n</sub>|w<sub>n-1</sub>) = C(w<sub>n-1</sub>w<sub>n</sub>)/C(w<sub>n-1</sub>)<br/><br/>
For add-one smoothed bigram counts we need to augment the unigram count by the number of total word types in the vocabulary V:<br/>
p<sup>*</sup>(w<sub>n</sub>|w<sub>n-1</sub>) = ( C(w<sub>n-1</sub>w<sub>n</sub>)+1 )/( C(w<sub>n-1</sub>)+V )<br/><br/>

</body>
</html>
